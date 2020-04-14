<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate([
            'name' => 'Administrator',
            'guard_name' => 'web'
        ]);
        Role::firstOrCreate([
            'name' => 'Employee',
            'guard_name' => 'web'
        ]);
        Role::firstOrCreate([
            'name' => 'Owner',
            'guard_name' => 'web'
        ]);
        Role::firstOrCreate([
            'name' => 'Buyer',
            'guard_name' => 'web'
        ]);
    }
}
