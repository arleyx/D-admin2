<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InitController extends Controller
{
    public function __construct()
    {
        $this->middleware('allow:init,show', ['only' => 'init']);
    }

    public function init(Request $request)
    {
        return view('admin.init');
    }
}
