<?php

namespace App\Http\Controllers;

use App\Models\Contact_form;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_forms = Contact_form::all();
        return view('contact_form.index', compact('contact_forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact_form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact_form = new Contact_form;

        $contact_form -> name = $request -> name;
        $contact_form -> content = $request -> content;
        $contact_form -> starting_date = $request -> starting_date;
        $contact_form -> ending_date = $request -> ending_date;
        $contact_form -> document_id = $request -> document_id;

        $contact_form -> save();

        return redirect() -> route('contact_form.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Contact_form  $contact_form
     * @return \Illuminate\Http\Response
     */
    public function show(Contact_form $contact_form)
    {
        return view('contact_form.show', compact('contact_form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact_form  $contact_form
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact_form $contact_form)
    {
        return view('contact_form.edit', compact('contact_form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact_form  $contact_form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact_form $contact_form)
    {
        $contact_form -> name = $request -> name;
        $contact_form -> content = $request -> content;
        $contact_form -> starting_date = $request -> starting_date;
        $contact_form -> ending_date = $request -> ending_date;
        $contact_form -> document_id = $request -> document_id;

        $contact_form -> save();

        return redirect() -> route('contact_form.show', $contact_form -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact_form  $contact_form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact_form $contact_form)
    {
        $contact_form -> delete();

        return redirect() -> route('contact_form.index');
    }
}
