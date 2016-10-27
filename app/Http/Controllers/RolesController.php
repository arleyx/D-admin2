<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Action;
use App\Module;
use App\Permission;
use App\Role;
use App\Http\Requests;

class RolesController extends Controller
{

    protected $module_name = 'roles';

    public function __construct()
    {
        $this->middleware('allow:'.$this->module_name.',index',  ['only' => 'index']);
        $this->middleware('allow:'.$this->module_name.',create', ['only' => 'create']);
        $this->middleware('allow:'.$this->module_name.',edit',   ['only' => 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', [
            'dataConfig' => [
                'action'    => request()->dataConfig['action'],
                'module'    => request()->dataConfig['module'],
                'modules'   => request()->dataConfig['modules'],
            ],
            'data' => [
                'roles'  => $roles,
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
        $modules = Module::all();

        return view('admin.roles.create', [
            'dataConfig' => [
                'action'    => request()->dataConfig['action'],
                'module'    => request()->dataConfig['module'],
                'modules'   => request()->dataConfig['modules'],
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
        $role = new Role;
        $role->name = $request->name;
        $role->save();

        foreach ($request->permissions as $module_id => $actions) {
            foreach ($actions as $action_id) {
                $permission = Permission::where('module_id', $module_id)
                                        ->where('action_id', $action_id)->first();
                $role->permissions()->attach($permission);
            }
        }

        session()->flash('alert.success', collect([trans('alert.status.create')]));

        return redirect()->route('admin.roles.index');
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
        session()->flash('alert.success', collect([trans('alert.status.delete')]));

        $role = Role::find($id);
        $role->permissions()->detach();
        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
