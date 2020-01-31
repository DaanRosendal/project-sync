<?php

namespace App\Http\Controllers;

use App\Declaratie;
use App\Project;
use App\Kost;
use DB;
use Illuminate\Http\Request;

class DeclaratiesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.declareren', [
            'projecten' => Project::all(),
            'kostenomschrijvingen' => Kost::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // TODO Integrity Constraint Violation error handling: Je hebt deze kostenpost al gedeclareerd

        // Check of bij kostenomschrijving "Reiskosten - Eigen Auto" is ingevoerd
        if (request()->kosten_id == 101){
            request()->validate([
                'project_id' => 'required',
                'kosten_id' => 'required',
                'bedrag' => 'required|integer|between:10,100' // Is eigenlijk afstand in kilometer
            ]);

            // Bij Reiskosten - Eigen Auto is de vergoeding 50 cent per kilometer. Dus bedrag aka afstand / 2 is de vergoeding.
            $bedrag = request()->bedrag / 2;
        } else {
            request()->validate([
                'project_id' => 'required',
                'kosten_id' => 'required',
                'bedrag' => 'required|integer'
            ]);
            $bedrag = request()->bedrag;
        }

        // Check of de gebruiker al eerder een declaratie heeft aangevraagd bij dit project
        if (Declaratie::where([
            ['user_id', '=', auth()->id()],
            ['project_id', '=', request()->project_id]
        ])->exists()){
            // Selecteer declaratie_id om de kosten aan de bestaande declaratie te linken
            $declaratie_id = Declaratie::select('id')->where([
                ['user_id', '=', auth()->id()],
                ['project_id', '=', request()->project_id]
            ])->pluck('id');

            // Eerste array item naar string
            $declaratie_id = $declaratie_id[0];

            //dd($declaratie_id);

            // Maak kosten voor de declaratie aan
            DB::table('declaratie_kost')->insert([
                ['declaratie_id' => $declaratie_id, 'kost_id' => request('kosten_id'), 'bedrag' => $bedrag]
            ]);
        } else {
            // Maak nieuwe declaratie aan
            $declaratie = new Declaratie(request(['project_id']));
            $declaratie->user_id = auth()->id();
            $declaratie->save();

            // Maak kosten voor de declaratie aan
            DB::table('declaratie_kost')->insert([
                ['declaratie_id' => $declaratie->id, 'kost_id' => request('kosten_id'), 'bedrag' => $bedrag]
            ]);
        }

        return redirect(route('declareren'));
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
