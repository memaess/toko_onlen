<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'name' => 'Administrator 01',
            'email' => 'admin@mail.com',
            'password' => bcrypt('nanozero1')
        ]);
        $user->assignRole('Administrator');

        $user = User::firstOrCreate([
            'name' => 'Employee 01',
            'email' => 'employee@mail.com',
            'password' => bcrypt('nanozero1')
        ]);
        $user->assignRole('Employee');

        $user = User::firstOrCreate([
            'name' => 'Owner 01',
            'email' => 'owner@mail.com',
            'password' => bcrypt('nanozero1')
        ]);
        $user->assignRole('Owner');

        $user = User::firstOrCreate([
            'name' => 'Buyer 01',
            'email' => 'buyer@mail.com',
            'password' => bcrypt('nanozero1')
        ]);
        $user->assignRole('Buyer');
    }
}
