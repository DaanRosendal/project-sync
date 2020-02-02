<?php

namespace App\Http\Controllers;

use App\Consultant;
use Illuminate\Http\Request;

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
        //dd(Consultant::where('is_admin', '=', 0)->get());
        //dd(Consultant::where('id', '=', request()->consultant_id)->get());
        return view('user.rapporten', [
            'consultants' => Consultant::where('is_admin', '=', 0)->get(), // Alle users behalve admins
            'geselecteerdeConsultant' => Consultant::where('id', '=', request()->consultant_id)->first(),
        ]);
    }
}
