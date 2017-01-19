<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Beering;
use App\Group;

class GroupsController extends Controller
{
    protected $controller = 'groups';
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
        $groups = Group::paginate(25);

        return view($this->views['index'], [
            'data' => [
                'groups'  => $groups,
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
        $beerings = Beering::all();

        return view($this->views['create'], [
            'data' => [
                'beerings' => $beerings
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
            'name' => 'required|min:3',
            'beering_id' => 'required|min:1',
            'about' => 'required|min:3',
            'record' => 'required|min:3',
        ]);

        $group = new Group;

        $group->name = $request->name;
        $group->beering_id = $request->beering_id;
        $group->about = $request->about;
        $group->record = $request->record;
        $group->save();

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
        $beerings = Beering::all();
        $group = Group::find($id);

        return view($this->views['edit'], [
            'data' => [
                'beerings' => $beerings,
                'group' => $group
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
            'name' => 'required|min:3',
            'beering_id' => 'required|min:1',
            'about' => 'required|min:3',
            'record' => 'required|min:3',
        ]);

        $group = Group::find($id);

        $group->name = $request->name;
        $group->beering_id = $request->beering_id;
        $group->about = $request->about;
        $group->record = $request->record;
        $group->save();

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

        Group::destroy($id);

        return redirect()->route($this->views['index']);
    }
}
