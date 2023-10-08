<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\User::insert([
            [ 
                'first_name' => 'Manoj',
				'last_name' => 'Poosalingam',
				'address_line_1' => 'Steindl Imre Utca',
				'city' => 'Budapest',
				'post_code' => '1054',
				'country' => 'Hungary',
				'mobile_no' => '2038692200',
                'email' => 'mp39490@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Payvox@123'),
				'identity_no' => '124234234',
                'gender' => 'Male',
				'role' => 'user',
                'status_id' => 1,
                'remember_token' => Str::random(10)
            ]
        ]);
    }
}
