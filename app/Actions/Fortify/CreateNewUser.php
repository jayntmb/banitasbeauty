<?php

namespace App\Actions\Fortify;

use App\Models\Client;
use App\Models\Contact;
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
        // dd($input);
        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'role_id' => '5',
            'nom' => $input['nom'],
            'postnom' => $input['postnom'],
            'prenom' => $input['prenom'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'statut_id' => '1',
        ]);

        Contact::create([
            'telephone' => $input['telephone'],
            'email' => $input['email'],
            'user_id' => $user->id,
            'statut_id' => '1',
        ]);

        return Client::create([
            'poste' => $input['poste'],
            'user_id' => $user->id,
            'statut_id' => '1',
        ]);
    }
}
