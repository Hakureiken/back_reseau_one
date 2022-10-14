<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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

        return User::create([
            'crm_id' => null,
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'mobilityDepartment' => json_encode($input['mobilityDepartment']),
            'poste' => $input['poste'],
            'telephone' => $input['telephone'],
            'organization_id' => $input['organization_id'],
            'role' => 0,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
