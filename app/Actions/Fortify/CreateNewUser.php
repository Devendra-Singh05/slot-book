<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'number' => ['required', 'regex:/^\+?[0-9]{1,4}?[0-9]{7,10}$/','unique:users'  ],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

         $user= User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'number' => $input['number'],

            'password' => Hash::make($input['password']),
        ]);
        // Role Assign करें (User या Vendor)
        $role = $input['role'] ?? 'user'; // अगर role नहीं मिलता तो default 'user'
        $user->assignRole($role);

        return $user;
    }
}