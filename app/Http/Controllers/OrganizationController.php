<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Organization;
use GuzzleHttp\Psr7\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::all();

        // appel API
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
        ];
        $request = new Request('GET', 'https://crm.reseau-one.com/api/v1/Account', $headers);
        $res = $client->sendAsync($request)->wait();
        $data = json_decode($res->getBody());

        return view('organization.index', compact('organizations','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organization = new Organization;

        $organization -> name = $request -> name;
        $organization -> adress = $request -> adress;

        $organization -> save();

        return redirect() -> route('organization.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
        ];
        $leskeke = '632473e9e60cfb94b';
        $request = new Request('GET', 'https://crm.reseau-one.com/api/v1/Account/'.$leskeke, $headers);
        $res = $client->sendAsync($request)->wait();
        $data = json_decode($res->getBody());
        return view('organization.show', compact('organization','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
        ];
        $leskeke = '632473e9e60cfb94b';
        $request = new Request('GET', 'https://crm.reseau-one.com/api/v1/Account/'.$leskeke, $headers);
        $res = $client->sendAsync($request)->wait();
        $data = json_decode($res->getBody());

        return view('organization.edit', compact('organization','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(\Illuminate\Http\Request $request, Organization $organization)
    {
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
            'Content-Type' => 'application/json'
        ];
        $body = '{"type": "stagiaire super sympa"}';
        // dd(($body));
        $request_guzzle = new Request('PATCH', 'https://crm.reseau-one.com/api/v1/Account/632473e9e60cfb94b', $headers, $body);
        // dd($request_guzzle);
        $res = $client->sendAsync($request_guzzle)->wait();
        $data = json_decode($res->getBody());
        dd($data);

        if (isset($request -> name) && isset($request -> adress)) {
            $organization -> name = $request -> name;
            $organization -> adress = $request -> adress;
            $organization -> save();
        }


        return redirect() -> route('organization.show', $organization -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization -> delete();

        return redirect() -> route('organization.index');
    }
}
