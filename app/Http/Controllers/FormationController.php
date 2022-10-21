<?php

namespace App\Http\Controllers;

use App\Models\Module;
use GuzzleHttp\Client;
use App\Models\Formation;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as RequestGuzzle;

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
        $modules = Module::All();
        return view('formation.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laraRef = bin2hex(random_bytes(10)).time();

        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
            'Content-Type' => 'application/json'
        ];

        $request -> module_id = json_encode($request -> module_id);

        $bodyArray = json_encode([
            "name" => $request -> name,
            "assignedUserId" => "632836db1b7252184",
            "concernedPublic" => $request -> concernedPublic,
            "dateAndLocation" => $request -> dateAndLocation,
            "description" => $request -> description,
            "objective" => $request -> objective,
            "prerequisite" => $request -> prerequisite,
            "trainingprogram" => $request -> module_id,
            "reference" => $request -> reference,
            "laraRef" => $laraRef,
            "durationHours" => $request -> duration_hours,
            "durationDays" => $request -> duration_days,
        ]);
        $requestGuzzle = new RequestGuzzle('POST', 'https://crm.reseau-one.com/api/v1/training', $headers, $bodyArray);
        $res = $client->sendAsync($requestGuzzle)->wait();
        echo $res->getBody();

        $formation = new Formation;

        $formation -> name = $request -> name;
        $formation -> assignedUserId = "632836db1b7252184";
        $formation -> assignedUserName  = "Kévin Gasté";
        $formation -> laraRef = $laraRef;
        $formation -> concernedPublic = $request -> concernedPublic;
        $formation -> dateAndLocation = $request -> dateAndLocation;
        $formation -> description = $request -> description;
        $formation -> objective = $request -> objective;
        $formation -> prerequisite = $request -> prerequisite;
        $formation -> trainingprogram = $request -> module_id;
        $formation -> reference = $request -> reference;
        $formation -> duration_hours = $request -> duration_hours;
        $formation -> duration_days = $request -> duration_days;
        $formation -> document_id = "1";
        $formation -> is_submitted = false;

        $formation -> save();

        return redirect() -> route('formation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(string $laraRef)
    {
        $modules = Module::All();
        $formation = Formation::where('laraRef', htmlspecialchars($laraRef))->firstOrFail();
        $countHours = 0;
        $countDays = 0;
        return view('formation.show', compact('formation','modules','countHours','countDays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(string $laraRef)
    {
        $modules = Module::All();
        $formation = Formation::where('laraRef', htmlspecialchars($laraRef))->firstOrFail();
        $count = 0;
        return view('formation.edit', compact('formation', 'modules', 'count'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $laraRef)
    {
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
            'Content-Type' => 'application/json'
        ];
        $varTest = '/6336e66331be8e6d3';
        $request -> module_id = json_encode($request -> module_id);

        $bodyArray = json_encode([
            "name" => $request -> name,
            "assignedUserId" => "632836db1b7252184",
            "concernedPublic" => $request -> concernedPublic,
            "dateAndLocation" => $request -> dateAndLocation,
            "description" => $request -> description,
            "objective" => $request -> objective,
            "prerequisite" => $request -> prerequisite,
            "trainingprogram" => $request -> module_id,
            "durationHours" => $request -> duration_hours,
            "durationDays" => $request -> duration_days,
        ]);
        $requestGuzzle = new RequestGuzzle('PATCH', 'https://crm.reseau-one.com/api/v1/training'.$varTest, $headers, $bodyArray);
        $res = $client->sendAsync($requestGuzzle)->wait();
        echo $res->getBody();

        
        $formation = Formation::where('laraRef', htmlspecialchars($laraRef))->firstOrFail();

        // $request -> module_id = json_encode($request -> module_id);

        $formation -> name = $request -> name;
        $formation -> assignedUserId = "632836db1b7252184";
        $formation -> assignedUserName  = "Kévin Gasté";
        $formation -> concernedPublic = $request -> concernedPublic;
        $formation -> dateAndLocation = $request -> dateAndLocation;
        $formation -> description = $request -> description;
        $formation -> objective = $request -> objective;
        $formation -> prerequisite = $request -> prerequisite;
        $formation -> trainingprogram = $request -> module_id;
        $formation -> reference = $request -> reference;
        $formation -> duration_hours = $request -> duration_hours;
        $formation -> duration_days = $request -> duration_days;
        $formation -> document_id = "1";
        $formation -> is_submitted = false;

        $formation -> save();

        return redirect() -> route('formation.show', $formation -> laraRef);
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

    public function createFormation(Request $request)
    {
        $formation = new Formation;
        
        $formation -> id_crm = $request -> id;
        $formation -> laraRef = bin2hex(random_bytes(10)).time();
        $formation -> assignedUserName = $request -> assignedUserName;
        $formation -> assignedUserId = $request -> assignedUserId;
        $formation -> name = $request -> name;
        $formation -> concernedPublic = $request -> concernedPublic;
        $formation -> dateAndLocation = $request -> dateAndLocation;
        $formation -> description = $request -> description;
        $formation -> objective = $request -> objective;
        $formation -> prerequisite = $request -> prerequisite;
        $formation -> trainingprogram = $request -> trainingprogram;
        $formation -> reference = $request -> reference;
        $formation -> duration_hours = $request -> duration_hours;
        $formation -> duration_days = $request -> duration_days;
        $formation -> document_id = $request -> document_id;
        $formation -> is_submitted = $request -> is_submitted;
        $formation -> created_at = date('Y-m-d h:i:s');
        $formation -> updated_at = date('Y-m-d h:i:s');

        $formation -> save();
    }
}
