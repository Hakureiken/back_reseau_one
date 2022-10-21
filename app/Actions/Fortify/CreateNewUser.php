<?php

namespace App\Actions\Fortify;

use App\Models\User;
use GuzzleHttp\Client;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Psr7\Request as RequestGuzzle;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // création de l'utilisateur dans l'onglet contact du CRM
        $client = new Client();
        $headers = [
            'X-API-KEY' => 'a5ad5c59a1cf03d6a9cb826510ef6a40',
            'Content-Type' => 'application/json'
        ];
        $body = json_encode([
            // ajouter accountId
            "accountId"=> $input['crm_id'],
            "firstName"=> $input['first_name'],
            "lastName"=> $input['last_name'],
            "phoneNumber"=> $input['telephone'],
            "emailAddress"=> $input['email']
        ]);

        $request = new RequestGuzzle('POST', 'https://crm.reseau-one.com/api/v1/Contact', $headers, $body);
        $res = $client->sendAsync($request)->wait();
        $content = json_decode($res->getBody());

        return User::create([
            'organization_id' => $input['organization_id'],
            'crm_id' => $content->id,
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'description' => null,
            'mobilityDepartment' => json_encode($input['mobilityDepartment']),
            'poste' => $input['poste'],
            'telephone' => $input['telephone'],
            'role' => 0,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
