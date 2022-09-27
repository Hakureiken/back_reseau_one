<?php

namespace App\Http\Controllers;

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
        $laraRef = bin2hex(random_bytes(10)).time();
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
            'Content-Type' => 'application/json'
        ];

        $bodyArray = json_encode([
            "name" => $request -> name,
            "assignedUserId" => "632836db1b7252184",
            "concernedPublic" => $request -> concernedPublic,
            "dateAndLocation" => $request -> dateAndLocation,
            "description" => $request -> description,
            "objective" => $request -> objective,
            "prerequisite" => $request -> prerequisite,
            "trainingprogram" => $request -> trainingprogram,
            "reference" => $request -> reference,
            "laraRef" => $laraRef,
            "durationHours" => $request -> duration_hours,
            "durationDays" => $request -> duration_days,
        ]);
        // dd($bodyArray);
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
        $formation -> trainingprogram = $request -> trainingprogram;
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
        $formation = Formation::where('laraRef', htmlspecialchars($laraRef))->firstOrFail();
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
        $formation -> assignedUserId = "632836db1b7252184";
        $formation -> assignedUserName  = "Kévin Gasté";
        $formation -> concernedPublic = $request -> concernedPublic;
        $formation -> dateAndLocation = $request -> dateAndLocation;
        $formation -> description = $request -> description;
        $formation -> objective = $request -> objective;
        $formation -> prerequisite = $request -> prerequisite;
        $formation -> trainingprogram = $request -> trainingprogram;
        $formation -> reference = $request -> reference;
        $formation -> duration_hours = $request -> duration_hours;
        $formation -> duration_days = $request -> duration_days;
        $formation -> document_id = "1";
        $formation -> is_submitted = false;

        $formation -> save();

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
}
