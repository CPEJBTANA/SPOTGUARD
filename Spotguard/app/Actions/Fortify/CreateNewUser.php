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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required'],
            'mobile_number' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'car_brand' => ['required', 'string', 'max:255'],
            'body_type_id' => ['required'],
            'car_color' => ['required'],
            'car_license_plate' => ['required'],

            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'middle_name' => $input['middle_name'],
            'last_name' => $input['last_name'],
            'birth_date' => $input['birth_date'],
            'mobile_number' => $input['mobile_number'],
            'address' => $input['address'],
            'car_brand' => $input['car_brand'],
            'body_type_id' => $input['body_type_id'],
            'car_color' => $input['car_color'],
            'car_license_plate' => str_replace(' ', '', $input['car_license_plate']),
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
        ])->assignRole(1); //Resident

    }
}
