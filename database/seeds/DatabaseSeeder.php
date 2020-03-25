<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
//    public function run()
//    {
//        // $this->call(UsersTableSeeder::class);
//         $this->call(RoleTableSeeder::class);


    public function run()
    {
        //$this->call(RoleTableSeeder::class);

        $adminUser = User::create( [
            'firstname' => 'admin',
            'lastname' => 'Mojo Blanco',
            'email' => 'admin11@gmail.com',
            'password' => bcrypt('password'),
            'phone'=>122,
            'image'=>'/uploads/default007.jpg',
            'country'=>'Canada',
        ]);
        $adminUser->assignRole('admin');

        $canadaUser = User::create( [
            'firstname' => 'canada',
            'lastname' => 'c_admin',
            'email' => 'canada_admin@gmail.com',
            'password' => bcrypt('password'),
            'phone'=>122,
            'image'=>'/uploads/default007.jpg',
            'country'=>'Canada',
        ]);
        $canadaUser->assignRole('canada_admin');

        $nigeriaUser = User::create( [
            'firstname' => 'nigeria',
            'lastname' => 'n_admin',
            'email' => 'nigeria_admin@gmail.com',
            'password' => bcrypt('password'),
            'phone'=>122,
            'image'=>'/uploads/default007.jpg',
            'country'=>'Nigeria',
        ]);

        $nigeriaUser->assignRole('nigeria_admin');
    }
}
