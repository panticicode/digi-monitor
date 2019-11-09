<?php

use App\Models\Member;

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'full_name'         => $faker->name,
        'is_admin'          => 1,
        //'is_admin'          => $faker->numberBetween(1,4),
        'date_of_birth'     => $faker->optional($weight = 0.9)->dateTimeBetween('-40 years', '-18 years'),
        'gender'            => $faker->randomElement(['Male','Female']),
        'phone'             => $faker->optional($weight = 0.9)->phoneNumber, 
        'email'             => $faker->safeEmail, 
        'nationality'       => $faker->sentence(7,11), 
		'address'           => $faker->optional($weight = 0.9)->address,
		'suburb'            => $faker->text(), 
		'employment'        => $faker->randomElement(['Yes','No']), 
		'occupation'        => $faker->text(),  
		'tither'            => $faker->randomElement(['Yes','No']), 
		'weekly_tither'     => $faker->randomElement(['Yes','No']),
		'monthly_tither'    => $faker->randomElement(['Yes','No']), 
		'marital_status'    => $faker->randomElement(['Yes','No']),
		'weeding_date'      => $faker->randomElement(['Yes','No']), 
		'born_again'        => $faker->randomElement(['Yes','No']), 
		'baptized'          => $faker->randomElement(['Yes','No']),
		'tongues'           => $faker->randomElement(['Yes','No']),
		'sunday_attendance' => $faker->randomElement(['Yes','No']), 
		'bible_study'       => $faker->randomElement(['Yes','No']), 
		'tuesday_service'   => $faker->randomElement(['Yes','No']), 
		'friday_prayers'    => $faker->randomElement(['Yes','No']),
		'night_vigil'       => $faker->randomElement(['Yes','No']), 
		'pregnant'          => $faker->randomElement(['Yes','No','N/A']), 
		'delivery_date'     => $faker->optional($weight = 0.9)->dateTimeBetween('-2 years', '-1 years'),
      ];
});
