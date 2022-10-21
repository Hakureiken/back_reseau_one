<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Contact_form;
use illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as RequestGuzzle;


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

        $contact_form -> reference = $request -> reference;
        $contact_form -> first_name = $request -> first_name;
        $contact_form -> last_name = $request -> last_name;
        $contact_form -> email = $request -> email;
        $contact_form -> telephone = $request -> telephone;
        $contact_form -> content = $request -> content;

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

    // by API
    public function storeFromFront(Request $request)
    {
        // stockage dans le crm le prospect et la formation qui lui est lié
        dd($request);
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
            'Content-Type' => 'application/json'
        ];
        $body = json_encode([
            "name" => $request -> first_name . ' ' . $request -> last_name,
            "emailAddress" => $request -> email,
            "phoneNumber" => $request -> telephone,
            "description" => $request -> content,
            "trainingsIds" => [
                $request -> id
            ]
        ]);
        dd($body);
        $requestGuzzle = new RequestGuzzle('POST', 'https://crm.reseau-one.com/api/v1/Lead', $headers, $body);
        $res = $client->sendAsync($requestGuzzle)->wait();
        $content = json_decode($res->getBody());

        // stockage dans le crm l'id du prospect qui est lié à la formation
        $clientOne = new Client();
        $headersOne = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
            'Content-Type' => 'application/json'
        ];
        $bodyOne = json_encode([
            "leadsIds" => [
                $content -> id
            ]
        ]);

        $requestGuzzleOne = new RequestGuzzle('POST', 'https://crm.reseau-one.com/api/v1/Lead', $headersOne, $bodyOne);
        $resOne = $clientOne->sendAsync($requestGuzzleOne)->wait();
        $contentOne = json_decode($resOne->getBody());


        // on stock dans la bdd de laravel
        $contact_form = new Contact_form;

        $contact_form -> reference = $request -> reference;
        $contact_form -> first_name = $request -> first_name;
        $contact_form -> last_name = $request -> last_name;
        $contact_form -> email = $request -> email;
        $contact_form -> telephone = $request -> telephone;
        $contact_form -> content = $request -> content;

        $contact_form -> save();

        return $request;
    }
}
