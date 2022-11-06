<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;


class CreateActionCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "create:action {action}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "create actions";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // try {
        //    $action = $this->argument('action');
        // //    $class_action = 'App\\Actions\\'.ucfirst($action).'Action';
        //    $dir    = 'App\\Actions\\' . ucfirst($action). '.php';
        //    if (file_exists($dir))
        //    {
        //     $this->error('Action Already Exists!');
        //    }
           $stubPath  = '../../../../stubs/Action.stub';
           if ($stubPath)
           {
            $this->info($stubPath);
           }
        //    $stub    = 
        // } catch (Exception $e) {
        //     $this->error("An error occurred");
        // }
    }
}
