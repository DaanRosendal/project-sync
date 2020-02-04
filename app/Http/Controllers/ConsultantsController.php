<?php

namespace App\Http\Controllers;

use App\Consultant;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ConsultantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.consultants.index', [
            'consultants' => Consultant::where('is_admin', '=', false)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.consultants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $password = Hash::make(request()->password);
        $consultant = new Consultant(['name' => request()->name, 'email' => request()->email, 'password' => $password]);
        $consultant->save();

        return redirect(route('admin.consultants.index'))->withSuccess('Consultant ' . request()->name . ' aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function show(Consultant $consultant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Consultant $consultant)
    {
        return view('admin.consultants.edit', compact('consultant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultant $consultant)
    {
        $oudeNaam = $consultant->name;
        $oudeEmail = $consultant->email;

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($consultant)],
        ]);

        $consultant->update(['name' => request()->name, 'email' => request()->email]);

        if ($oudeNaam != request()->name && $oudeEmail != request()->email){
            return redirect(route('admin.consultants.index'))
                ->withSuccess('Consultant ' . $oudeNaam . '\'s naam is aangepast naar ' . request()->name .
                    ' en zijn/haar e-mail is aangepast van' . $oudeEmail . ' naar ' . request()->email);
        } elseif ($oudeNaam != request()->name) {
            return redirect(route('admin.consultants.index'))
                ->withSuccess('Consultant ' . $oudeNaam . '\'s naam is aangepast naar ' . request()->name . '!');
        } elseif ($oudeEmail != request()->email) {
            return redirect(route('admin.consultants.index'))
                ->withSuccess('Consultant ' . $oudeNaam . '\'s e-mail is aangepast van ' . $oudeEmail . ' naar ' . request()->email . '!');
        } else {
            return redirect(route('admin.consultants.index'))
                ->withSuccess('Je hebt niks veranderd, er zijn geen wijzigingen doorgevoerd!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultant $consultant)
    {
        $consultant->delete();

        return redirect(route('admin.consultants.index'))->withSuccess('Consultant ' . $consultant->name . ' is verwijderd!');
    }
}
