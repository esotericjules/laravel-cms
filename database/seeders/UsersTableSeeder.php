<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //grab the first user with the specified email
        $user = User::where('email', 'julietonyekaoha@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Juliet Onyekaoha',
                'email' => 'julietonyekaoha@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'), // this password needs to be hashed before saving it to the database
            ]);
        }
    }
}