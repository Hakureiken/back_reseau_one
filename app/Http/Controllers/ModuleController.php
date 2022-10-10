<?php

namespace App\Http\Controllers;

use App\Models\Module;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as RequestGuzzle;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view('module.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // stock information in the API 
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
            'Content-Type' => 'application/json'
        ];

        $bodyArray = json_encode([
            "name" => $request -> name,
            "assignedUserId" => "632836db1b7252184",
            "program" => $request -> program,
            "description" => $request -> description,
            "reference" => $request -> reference,
            "domain" => $request -> domain,
            "durationHours" => $request -> durationHours,
            "durationDays" => $request -> durationDays,
        ]);

        $requestGuzzle = new RequestGuzzle('POST', 'https://crm.reseau-one.com/api/v1/module', $headers, $bodyArray);
        $res = $client->sendAsync($requestGuzzle)->wait();
        echo $res->getBody();

        // on stock les informations dans la bdd laravel
        $module = new Module;

        $module -> name = $request -> name;
        $module -> reference = $request -> reference;
        $module -> program = $request -> program;
        $module -> description = $request -> description;
        $module -> domain = $request -> domain;
        $module -> durationHours = $request -> durationHours;
        $module -> durationDays = $request -> durationDays;

        $module -> save();

        return redirect() -> route('module.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return view('module.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('module.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
            'Content-Type' => 'application/json'
        ];
        $varTest = '/633703672899afcfa';
        $request -> module_id = json_encode($request -> module_id);

        $bodyArray = json_encode([
            "name" => $request -> name,
            "program" => $request -> program,
            "description" => $request -> description,
            "domain" => $request -> domain,
            "durationHours" => $request -> durationHours,
            "durationDays" => $request -> durationDays,
        ]);

        // dd($request->durationHours);
        $requestGuzzle = new RequestGuzzle('PATCH', 'https://crm.reseau-one.com/api/v1/module'.$varTest, $headers, $bodyArray);
        $res = $client->sendAsync($requestGuzzle)->wait();
        echo $res->getBody();


        $module -> name = $request -> name;
        $module -> program = $request -> program;
        $module -> description = $request -> description;
        $module -> domain = $request -> domain;
        $module -> durationHours = $request -> durationHours;
        $module -> durationDays = $request -> durationDays;

        $module -> save();

        return redirect() -> route('module.show', $module -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module -> delete();

        return redirect() -> route('module.index');
    }
}
