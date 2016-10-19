<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DonationsController extends Controller
{
    /**
     * Display button for go option.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        if (auth('web')->check()) {
            return redirect('/donate');
        } else {
            return view('home');
        }
    }

    /**
     * Show info to Beering.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutBeering()
    {
        return view('about.beering');
    }

    /**
     * Show info to donations.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutDonation()
    {
        return view('about.donation');
    }

    /**
     * Show step for donate.
     *
     * @return \Illuminate\Http\Response
     */
    public function donate()
    {
        return 'Donate step...';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }
}