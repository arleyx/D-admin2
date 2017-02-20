<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Mail;

use App\User;
use App\Country;
use App\Group;
use App\Profile;

use Validator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Where to redirect users after logout.
     *
     * @var string
     */
    protected $redirectAfterLogout = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'showProfile', 'update']]);
    }

    public function showRegistrationForm()
    {
        $countries = Country::all();
        $groups = Group::all();

        return view('auth.register', [
            'data' => [
                'countries' => $countries,
                'groups' => $groups
            ]
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }*/

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'group_id' => 'required|numeric|exists:groups,id',
            'know_us' => 'required|min:3',
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'phone' => 'required|min:7|numeric',
            'country' => 'required|numeric|exists:countries,id',
            'citizenship' => 'required|numeric|exists:countries,id',
            'occupation' => 'required|min:3',
            'about_you' => 'required|min:3',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $profile = new Profile;

        $profile->know_us = $request->know_us;
        $profile->name = $request->name;
        $profile->lastname = $request->lastname;
        $profile->phone = $request->phone;
        $profile->country = $request->country;
        $profile->citizenship = $request->citizenship;
        $profile->occupation = $request->occupation;
        $profile->about_you = $request->about_you;
        $profile->email = $request->email;
        $profile->save();

        $user = new User;

        $user->profile_id = $profile->id;
        $user->group_id = $request->group_id;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Mail::send('emails.register', ['data' => ['profile' => $profile]], function ($message) use ($user) {
            $message->subject('Welcome! to Beering Honey');
            $message->to($user->email);
        });

        \Auth::guard($this->getGuard())->login($user);

        return redirect($this->redirectPath());
    }

    public function showProfile()
    {
        $user = Auth::user();
        $countries = Country::all();

        return view('auth.profile', [
            'data' => [
                'countries' => $countries,
                'user' => $user
            ]
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'know_us' => 'required|min:3',
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'phone' => 'required|min:7|numeric',
            'country' => 'required|numeric|exists:countries,id',
            'citizenship' => 'required|numeric|exists:countries,id',
            'occupation' => 'required|min:3',
            'about_you' => 'required|min:3',
            'password' => 'confirmed|min:8',
        ]);

        $profile = Auth::user()->profile;

        $profile->know_us = $request->know_us;
        $profile->name = $request->name;
        $profile->lastname = $request->lastname;
        $profile->phone = $request->phone;
        $profile->country = $request->country;
        $profile->citizenship = $request->citizenship;
        $profile->occupation = $request->occupation;
        $profile->about_you = $request->about_you;
        $profile->save();

        if ($request->has('password')) {
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();
        }

        session()->flash('alert.success', collect([trans('alert.status.edit')]));

        return redirect(url('/my-profile'));
    }
}
