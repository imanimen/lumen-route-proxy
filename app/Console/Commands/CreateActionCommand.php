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
        try {
           $action = $this->argument('action');
           $dir    = base_path() . '/' . 'app/Actions/' . ucfirst($action) . 'Action.php';
           if (file_exists($dir))
           {
             $this->error('Action Already Exists!');
           }
           $stubPath  = base_path() . '/' . 'stubs/Action.stub';
           $stub      = file_get_contents($stubPath);
           $stub      = str_replace('{{action_name}}', $action, $stub);

           $write     = base_path() . '/' . 'app/Actions/' . ucfirst($action) . 'Action.php';
           file_put_contents($write, $stub);
        } catch (Exception $e) {
            $this->error("An error occurred");
        }
    }
}
