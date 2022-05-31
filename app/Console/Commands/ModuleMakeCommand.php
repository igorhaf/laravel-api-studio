<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ModuleMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make {name} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call("module:make:provider", ['name' => $this->argument('name'), 'module_name' => $this->argument('name')]);
        Artisan::call("module:make:api:controller", ['name' => $this->argument('name'), 'module_name' => $this->argument('name')]);
    }
}
