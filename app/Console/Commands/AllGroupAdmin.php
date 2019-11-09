<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Mail\SupperAdmin as SendMailForSupperAdmin;
use App\Notifications\TestNotification as Test;

class AllGroupAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendgroup:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        
        $users = User::where('role', '!=', 'SupperAdmin')->orderBy('created_at', 'desc')->get();

        $dateOfMoth = date("Y-m-t", strtotime(now()));
        $time = strtotime($dateOfMoth) - strtotime(now());
   
        if ((int)($time/86400) <= 7 && (int)($time/86400) >=0) {
            foreach ($users as $user) {
                if (count($user->getMembers()->get())) {
                    \Mail::to($user)->send(new SendMailForSupperAdmin($user));
                }
            }
        }
    }
}
