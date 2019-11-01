<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Messages;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone'=>$faker->phoneNumber,
        'description'=>$faker->name,
        'image'=>'/uploads/default007.jpg',
        'email_verified_at' => now(),
        'role'=>'1',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Courses::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category' => $faker->name,
        'image'=>'/uploads/default007.jpg',
        'start'=>$faker->date(),
        'end'=>$faker->date(),
        'description'=>$faker->sentence
    ];
});



$factory->define(Messages::class, function (Faker $faker) {
    do{
        $from =rand(1,15);
        $to=rand(1,15);
    } while($from===$to);
    return [
        'to'=>$to,
        'from'=>$from,
        'message'=>$faker->sentence
    ];
});
