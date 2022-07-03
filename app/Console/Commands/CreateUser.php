<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'new:user {name : name of the user} {--email= : email of the user} {--pwd= : password of the user (default:123456)}';

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
     * @return int
     */
    public function handle()
    {
        $newUser['name']=$this->argument('name');
        $newUser['email']=$this->option('email')??'';
        $pwd = $this->option('pwd')??'123456';
        $newUser['password'] =Hash::make($pwd);

        if(User::create($newUser)){
            $this->info('success');
        }
    }
}
