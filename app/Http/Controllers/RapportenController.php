<?php

namespace App\Http\Controllers;

use App\Consultant;
use App\Declaratie;
use Illuminate\Http\Request;
use DB;

class RapportenController extends Controller
{
    public function showConsultants()
    {
        return view('user.rapporten',[
            'consultants' => Consultant::where('is_admin', '=', 0)->get(), // Alle users behalve admins
        ]);
    }


    /*
     * @param  \Illuminate\Http\Request  $request
     */
    public function showRapport() {
        $geselecteerdeConsultant = Consultant::where('id', '=', request()->consultant_id)->first();

        // Check of de gebruiker al iets declareerd heeft
        if (Declaratie::where('user_id', '=', request()->consultant_id)->count() == 0) {
            return redirect()->back()->withErrors(['consultantHeeftGeenDeclaraties' => 'Consultant ' . $geselecteerdeConsultant->name . " heeft nog niets gedeclareerd!"]);
        }

        // Alle benodigde data voor het rapport in 1 query uit de database halen
        $kosten = DB::table('declaraties')
            ->join('projecten', 'declaraties.project_id', '=', 'projecten.id')
            ->join('users', 'declaraties.user_id', '=', 'users.id')
            ->join('declaratie_kost', 'declaraties.id' , '=', 'declaratie_kost.declaratie_id')
            ->join('kosten', 'declaratie_kost.kost_id', '=', 'kosten.id')
            ->where('user_id', '=', request()->consultant_id)
            ->orderByRaw('projecten.naam ASC, kosten.id')
            ->select(
                'users.name as consultant',
                'projecten.naam as projectnaam',
                'kosten.id as kostencode',
                'kosten.omschrijving as omschrijving',
                'declaratie_kost.created_at as datum',
                'declaratie_kost.bedrag as bedrag')
            ->get();

        return view('user.rapporten', [
            'consultants' => Consultant::where('is_admin', '=', 0)->get(), // Alle users behalve admins
            'geselecteerdeConsultant' => Consultant::where('id', '=', request()->consultant_id)->first(),
            'kosten' => $kosten,
        ]);
    }
}
