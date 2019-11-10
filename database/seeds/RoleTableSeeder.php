<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [

            [
                'id' => 1,
                'name' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'facilitator'
            ],
            [
                'id' => 3,
                'name' => 'student'
            ],
            [
                'id' => 4,
                'name' => 'canada_admin'
            ],
            [
                'id' => 5,
                'name' => 'nigeria_admin'
            ],

        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
