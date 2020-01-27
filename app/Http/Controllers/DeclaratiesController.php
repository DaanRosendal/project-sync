<?php

namespace App\Http\Controllers;

use App\Declaratie;
use App\Kost;
use Illuminate\Http\Request;

class DeclaratiesController extends Controller
{
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
        return view('user.declareren', [
            'kosten' => Kost::all()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Declaratie  $declaratie
     * @return \Illuminate\Http\Response
     */
    public function show(Declaratie $declaratie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Declaratie  $declaratie
     * @return \Illuminate\Http\Response
     */
    public function edit(Declaratie $declaratie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Declaratie  $declaratie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Declaratie $declaratie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Declaratie  $declaratie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Declaratie $declaratie)
    {
        //
    }
}
