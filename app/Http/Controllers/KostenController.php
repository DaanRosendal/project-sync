<?php

namespace App\Http\Controllers;

use App\Kost;
use Illuminate\Http\Request;

class KostenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.kosten.index', [
            'kosten' => Kost::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kosten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(['omschrijving' => 'required']);
        $kost = new Kost(request(['omschrijving']));
        $kost->save();

        return redirect(route('admin.kosten.index'))->withSuccess('Kost ' . request()->omschrijving . ' aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function show(Kost $kost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kost  $kost
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Kost $kost)
    {
        return view('admin.kosten.edit', compact('kost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kost $kost)
    {
        $oudeOmschrijving = $kost->omschrijving;
        $kost->update(request()->validate(['omschrijving' => 'required']));

        return redirect(route('admin.kosten.index'))->withSuccess('Kost ' . $oudeOmschrijving . ' is aangepast naar ' . request()->omschrijving . '!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kost $kost)
    {
        $kost->delete();

        return redirect(route('admin.kosten.index'))->withSuccess('Kost ' . $kost->omschrijving . ' is verwijderd!');
    }
}
