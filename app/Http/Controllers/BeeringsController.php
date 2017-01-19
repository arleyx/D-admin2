<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Beering;

class BeeringsController extends Controller
{
    protected $controller = 'beerings';
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
        $beerings = Beering::paginate(25);

        return view($this->views['index'], [
            'data' => [
                'beerings'  => $beerings,
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
        return view($this->views['create']);
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
            'title' => 'required|min:3',
            'objective' => 'required|min:10',
            'description' => 'required|min:10',
            'amount' => 'required|numeric|min:10',
        ]);

        $beering = new Beering;

        $beering->title = $request->title;
        $beering->objective = $request->objective;
        $beering->description = $request->description;
        $beering->amount = $request->amount;
        $beering->save();

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
        $beering = Beering::find($id);

        return view($this->views['edit'], [
            'data' => [
                'beering' => $beering
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
            'title' => 'required|min:3',
            'objective' => 'required|min:10',
            'description' => 'required|min:10',
            'amount' => 'required|numeric|min:10',
        ]);

        $beering = Beering::find($id);

        $beering->title = $request->title;
        $beering->objective = $request->objective;
        $beering->description = $request->description;
        $beering->amount = $request->amount;
        $beering->save();

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

        Beering::destroy($id);

        return redirect()->route($this->views['index']);
    }
}
