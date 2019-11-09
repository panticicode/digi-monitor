<?php

use Illuminate\Database\Seeder;
use App\Models\Email;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Email::truncate();

        Email::create([
            'key' => 'birth-date',
            'subject' => 'Happy Birth Date for Member of DigiMonitor !',
            'content' => file_get_contents(database_path('seeds/mails/birth-date.md'))
        ]); 

        Email::create([
            'key' => 'members',
            'subject' => 'Mail for Members in DigiMonitor !',
            'content' => file_get_contents(database_path('seeds/mails/members.md'))
        ]); 

        Email::create([
            'key' => 'users',
            'subject' => 'Mail for Users in DigiMonitor !',
            'content' => file_get_contents(database_path('seeds/mails/users.md'))
        ]); 
    }
}
