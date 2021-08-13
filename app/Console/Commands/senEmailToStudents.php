<?php

namespace App\Console\Commands;

use App\Jobs\JopSendEmailToUser;
use App\Models\EmailTest\Mail;
use Illuminate\Console\Command;

class senEmailToStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:students';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send emails to students in school';

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
        $data = Mail::chunck(10,function($q){
            dispatch( new JopSendEmailToUser($data));
        });
    }
}
