<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('email', 'supperadmin@monitor.com')->forceDelete();

        User::create([
            'role' => User::ROLE_SUPPER_ADMIN,
            'name' => 'Supper Admin',
            'email' => 'supperadmin@monitor.com',
            'password' => bcrypt('123123'),
            'unique_id' => '131323213'
        ]);
    }
}
