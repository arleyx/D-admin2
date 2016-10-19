<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Module;
use App\Http\Requests;

class AdministratorsController extends Controller
{
    use AuthenticatesUsers;

    protected $loginView = 'admin.login';

    protected $guard = 'administrators';

    protected $redirectTo = '/admin/dashboard';

    protected $redirectAfterLogout = '/admin/login';

    public function __construct()
    {
        $this->middleware('profile:dashboard', ['only' => 'dashboard']);
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard', [
            'dataConfig' => [
                'modules'   => $request->dataConfig['modules'],
                'module'    => $request->dataConfig['module'],
            ]
        ]);
    }
}
