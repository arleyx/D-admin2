<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Module;
use App\Administrator;
use App\Role;
use App\Http\Requests;

class AdministratorsController extends Controller
{
    use AuthenticatesUsers;

    protected $loginView = 'admin.login';

    protected $guard = 'administrators';

    protected $redirectTo = '/admin/init';

    protected $redirectAfterLogout = '/admin/login';

    protected $controller = 'administrators';
    protected $views = [];

    public function __construct()
    {
        $this->middleware('allow:'.$this->controller.',index',  ['only' => ['index']]);
        $this->middleware('allow:'.$this->controller.',create', ['only' => ['create', 'store']]);
        $this->middleware('allow:'.$this->controller.',edit',   ['only' => ['edit', 'update']]);

        $this->views = [
            'index'  => 'admin.'.$this->controller.'.index',
            'create' => 'admin.'.$this->controller.'.create',
            'edit'   => 'admin.'.$this->controller.'.edit',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrators = Administrator::paginate(25);

        return view($this->views['index'], [
            'data' => [
                'administrators'  => $administrators,
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view($this->views['create'], [
            'data' => [
                'roles' => $roles
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role_id' => 'required|numeric|exists:roles,id',
            'name' => 'required|min:3',
            'email' => 'required|unique:administrators,email|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $administrator = new Administrator;

        $administrator->role_id = $request->role_id;
        $administrator->name = $request->name;
        $administrator->email = $request->email;
        $administrator->password = bcrypt($request->password);
        $administrator->save();

        session()->flash('alert.success', collect([trans('alert.status.create')]));

        return redirect()->route($this->views['index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $administrator = Administrator::find($id);

        return view($this->views['edit'], [
            'data' => [
                'administrator' => $administrator,
                'roles' => $roles
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'role_id' => 'required|numeric|exists:roles,id',
            'name' => 'required|min:3',
            'email' => 'required|unique:administrators,email,'.$id.'|email',
            'password' => 'confirmed|min:8',
        ]);

        $administrator = Administrator::find($id);

        $administrator->role_id = $request->role_id;
        $administrator->name = $request->name;
        $administrator->email = $request->email;

        if ($request->has('password'))
            $administrator->password = bcrypt($request->password);

        $administrator->save();

        session()->flash('alert.success', collect([trans('alert.status.edit')]));

        return redirect()->route($this->views['index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        session()->flash('alert.success', collect([trans('alert.status.delete')]));

        Administrator::destroy($id);

        return redirect()->route($this->views['index']);
    }
}
