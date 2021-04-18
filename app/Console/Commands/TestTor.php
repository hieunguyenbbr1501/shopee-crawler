<?php

namespace App\Console\Commands;

use Dapphp\TorUtils\ControlClient;
use Illuminate\Console\Command;

class TestTor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tor:test';

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
        $tc = new ControlClient();

        try {
            $tc->connect('127.0.0.1', 9050); // connect to controller at 127.0.0.1:9051
            $tc->authenticate();   // authenticate using hashedcontrolpassword "password"
            $tc->signal(ControlClient::SIGNAL_NEWNYM); // send signal to change IP

            $tc->authenticate(); // can also use cookie or empty auth
            $tc->signal(ControlClient::SIGNAL_NEWNYM);
            echo "Signal sent - IP changed successfully!\n";
        } catch (\Exception $ex) {
            echo "Signal failed: " . $ex->getMessage() . "\n";
        }
    }
}
