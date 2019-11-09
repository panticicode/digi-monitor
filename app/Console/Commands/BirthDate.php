<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Notifications\BirthDate as BirthDateNotification;

class BirthDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthdate:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail birthdate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();
       
        foreach ($users as $user) {
            if (now()->format('m-d') == date('m-d', strtotime($user->birth_date))) {
                $user->notify(new BirthDateNotification());
            }
        }
    }
}
