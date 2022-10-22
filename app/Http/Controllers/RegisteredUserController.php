<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use GuzzleHttp\Psr7\Request as RequestGuzzle;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Http\Responses\RegisterResponse;

class RegisteredUserController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the registration view.
     *
     * @param  Request  $request
     * @return \Laravel\Fortify\Contracts\RegisterViewResponse
     */
    public function create(Request $request)
    {
        $regions = [];

        $clientBis = new Client();
        $body = '';
        $requestGuzzleBis = new RequestGuzzle('GET', 'https://geo.api.gouv.fr/departements?fields=region', [], $body);
        $resBis = $clientBis->sendAsync($requestGuzzleBis)->wait();
        $departements = json_decode($resBis->getBody());

        foreach ($departements as $key => $departement) {
            if (!in_array($departement -> region -> nom, $regions)) {
                $regions[$departement -> region -> code] = $departement -> region -> nom;
            }
        }

        sort($regions);
        
        return view('auth.register', compact('regions', 'departements'));
    }

    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\CreatesNewUsers  $creator
     * @return \Laravel\Fortify\Contracts\RegisterResponse
     */
    public function store(Request $request, CreatesNewUsers $creator): RegisterResponse
    {
        $allRequest = $request->all();
        $organization = new Organization;

        if (!Organization::where('siret',$request -> siret)->get()->first()) {

            // stockage dans l'api
            $client = new Client();
            $headers = [
                'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
                'Content-Type' => 'application/json',
                'timeout' => 20,
                'verify' => false
            ];
            $body = json_encode([
                "name" => "Les Kékés bisbisbis",
                "billingAddressStreet" => $request -> numVoieEtablissement . $request -> typeVoieEtablissement . $request -> libelleVoieEtablissement,
                "billingAddressCity" => $request -> libelleCommuneEtablissement,
                "billingAddressCountry" => 'France',
                "billingAddressPostalCode" => $request -> postalCodeEtablissement,
                "siret" => $request -> siret,
                "opcoOpca" => $request -> opcoOpca,
                "codeAPENAF" => $request -> codeAPENAF,
                "numTVA" => $request -> numTVA,
                "idcc" => $request -> idcc,
                "createdAt" =>"2022-09-16 13:02:33",
                "modifiedAt" =>"2022-09-16 18:58:00",
            ]);

            $requestGuzzle = new RequestGuzzle('POST', 'https://crm.reseau-one.com/api/v1/Account', $headers, $body);
            $res = $client->send($requestGuzzle);
            $content = json_decode($res->getBody());

            $organization -> crm_id = $content -> id;
            $organization -> siret = $request -> siret;
            $organization -> denominationUniteLegale = $request -> denominationUniteLegale;
            $organization -> libelleCommuneEtablissement = $request -> libelleCommuneEtablissement;
            $organization -> postalCodeEtablissement = $request -> postalCodeEtablissement;
            $organization -> numVoieEtablissement = $request -> numVoieEtablissement;
            $organization -> typeVoieEtablissement = $request -> typeVoieEtablissement;
            $organization -> libelleVoieEtablissement = $request -> libelleVoieEtablissement;
            $organization -> numSalaries = $request -> numSalaries;
            $organization -> opcoOpca = $request -> opcoOpca;
            $organization -> codeAPENAF = $request -> codeAPENAF;
            $organization -> numTVA = $request -> numTVA;
            $organization -> idcc = $request -> idcc;

            $organization -> save();
            
            $allRequest['organization_id'] = $organization -> id;
            $allRequest['crm_id'] = $organization -> crm_id;
        } else {
            $existingOrganization = Organization::where('siret',$request -> siret)->get()->first();

            $allRequest['organization_id'] = $existingOrganization -> id;
            $allRequest['crm_id'] = $existingOrganization -> crm_id;
        }

        event(new Registered($user = $creator->create($allRequest)));

        $this->guard->login($user);

        return app(RegisterResponse::class);
    }
}

