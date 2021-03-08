<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrawlKeyword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:keyword';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl Keyword data';

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
        $source = "keywords.txt";
        $contents = file_get_contents($source);
        $contents = preg_replace( "/\r|\n/", "", $contents );
        $arrfields = explode(',', $contents);
        dd($arrfields);
    }
}
