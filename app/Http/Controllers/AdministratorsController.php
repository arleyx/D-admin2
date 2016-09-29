<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests;

class AdministratorsController extends Controller
{
    use AuthenticatesUsers;

    protected $loginView = 'admin.login';

    protected $guard = 'administrators';

    protected $redirectTo = '/admin/dasboard';

    protected $redirectAfterLogout = '/admin/login';

    public function __construct()
    {
        $this->middleware('auth:administrators', ['only' => 'admin']);
    }

    public function admin()
    {
        return view('admin.dashboard');
    }
}
