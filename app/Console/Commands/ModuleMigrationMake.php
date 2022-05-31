<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ModuleMigrationMake extends FileGeneratorCommand
{
    protected string $prefix;

    public function __construct(Filesystem $files)
    {
        parent::__construct($files);
    }

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'module:make:migration {name} {module_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new controller provider class';

    /**
     * @var string
     */
    protected $type = 'Database/Migrations';

    protected $namespace = 'Database\Migrations';

    /**
     * @var string
     */
    protected $stub_file = 'migration.create';

    protected $timestamp_in_file = true;
    protected bool $module_in_file = false;
    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     *
     */
    public function getStubVariables()
    {
        return [
            'table'    =>  'teste',
        ];
    }
}
