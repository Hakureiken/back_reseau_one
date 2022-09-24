<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        return view('formation.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formation = new Formation;

        $formation -> name = $request -> name;
        $formation -> content = $request -> content;
        $formation -> starting_date = $request -> starting_date;
        $formation -> ending_date = $request -> ending_date;
        $formation -> document_id = $request -> document_id;

        $formation -> save();

        return redirect() -> route('formation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        return view('formation.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        return view('formation.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        $formation -> name = $request -> name;
        $formation -> content = $request -> content;
        $formation -> starting_date = $request -> starting_date;
        $formation -> ending_date = $request -> ending_date;
        $formation -> document_id = $request -> document_id;

        $formation -> save();

        return redirect() -> route('formation.show', $formation -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        $formation -> delete();

        return redirect() -> route('formation.index');
    }
}
