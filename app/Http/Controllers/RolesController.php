<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Action;
use App\Module;
use App\Profile;
use App\Http\Requests;

class RolesController extends Controller
{

    protected $module_name = 'roles';

    public function __construct()
    {
        $this->middleware('allow:'.$this->module_name.',index', ['only' => 'index']);
        $this->middleware('allow:'.$this->module_name.',create', ['only' => 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profiles = Profile::all();

        return view('admin.profiles.index', [
            'dataConfig' => [
                'action'    => $request->dataConfig['action'],
                'module'    => $request->dataConfig['module'],
                'modules'   => $request->dataConfig['modules'],
            ],
            'data' => [
                'profiles'  => $profiles,
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $modules = Module::all();

        return view('admin.roles.create', [
            'dataConfig' => [
                'action'    => $request->dataConfig['action'],
                'module'    => $request->dataConfig['module'],
                'modules'   => $request->dataConfig['modules'],
            ],
            'data' => [
                'modules' => $modules
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
        $profile = new Profile;
        $profile->name = $request->name;
        $profile->save();

        foreach ($request->modules as $module_id => $actions) {
            $module = Module::find($module_id);
            foreach ($actions as $action_id) {
                $action = Action::find($action_id);
                $profile->modules()->attach($module->id, ['action_id' => $action->id]);
            }
        }

        dd($request->all());
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
        return dd(Profile::find($id));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return dd($id);
    }
}
