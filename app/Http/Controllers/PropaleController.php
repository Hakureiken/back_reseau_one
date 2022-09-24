<?php

namespace App\Http\Controllers;

use App\Models\Propale;
use Illuminate\Http\Request;

class PropaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propales = Propale::all();
        return view('propale.index', compact('propales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $propale = new Propale;

        $propale -> name_devis = $request -> name_devis;
        $propale -> commande_id = $request -> commande_id;
        $propale -> is_accepted = $request -> is_accepted;
        
        $propale -> is_validated = ($request -> is_validated) ? true : false;

        $propale -> save();

        return redirect() -> route('propale.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Propale  $propale
     * @return \Illuminate\Http\Response
     */
    public function show(Propale $propale)
    {
        return view('propale.show', compact('propale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propale  $propale
     * @return \Illuminate\Http\Response
     */
    public function edit(Propale $propale)
    {
        return view('propale.edit', compact('propale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propale  $propale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propale $propale)
    {
        $propale -> name_devis = $request -> name_devis;
        $propale -> commande_id = $request -> commande_id;
        $propale -> is_accepted = $request -> is_accepted;
        $propale -> is_validated = $request -> is_validated;

        $propale -> save();

        return redirect() -> route('propale.show', $propale -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propale  $propale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propale $propale)
    {
        $propale -> delete();

        return redirect() -> route('propale.index');
    }
}
