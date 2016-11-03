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

    protected $controller = 'roles';
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
        $roles = Role::paginate(25);

        return view($this->views['index'], [
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

        return view($this->views['create'], [
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
        $this->validate($request, [
            'name' => 'required|unique:roles,name|min:3|max:100',
            'permissions' => 'required',
        ]);

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
        $role = Role::find($id);
        $modules = Module::all();

        return view($this->views['edit'], [
            'data' => [
                'role'    => $role,
                'modules' => $modules
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
            'name' => 'required|unique:roles,name,'.$id.'|min:3|max:100',
            'permissions' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        $role->permissions()->detach();

        foreach ($request->permissions as $module_id => $actions) {
            foreach ($actions as $action_id) {
                $permission = Permission::where('module_id', $module_id)
                                        ->where('action_id', $action_id)->first();
                $role->permissions()->attach($permission);
            }
        }

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

        $role = Role::find($id);
        $role->permissions()->detach();
        $role->delete();

        return redirect()->route($this->views['index']);
    }
}
