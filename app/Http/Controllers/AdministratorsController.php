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

    protected $redirectTo = '/admin/init';

    protected $redirectAfterLogout = '/admin/login';

    public function __construct()
    {
        $this->middleware('allow:init,show', ['only' => 'init']);
    }

    public function init(Request $request)
    {
        return view('admin.init');
    }
}
