<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;


class CreateDocsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "doc:gen";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "generate api documentation";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      try {
        // check the actions

        // check methods

        //code...

        // put_file_contents() in DocsController
      } catch (\Throwable $th) {
        //throw $th;
        $this->error("Faild to genereate docs!");
      }
    }
}
