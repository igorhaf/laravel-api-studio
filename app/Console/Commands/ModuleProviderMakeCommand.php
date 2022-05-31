<?php

namespace App\Console\Commands;

class ModuleProviderMakeCommand extends FileGeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'module:make:provider {name} {module_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service provider class';

    /**
     * @var string
     */
    protected $type = 'Providers';

    protected $namespace = 'Providers';
    /**
     * @var string
     */
    protected $stub_file = 'module-provider';

    /**
     * @var string
     */
    protected $suffix = 'ServiceProvider';

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
            'namespace'    => 'App\\Modules\\'.$this->argument('module_name').'\\'.$this->namespace,
            'class'        => $this->getSingularClassName($this->argument('name')).$this->suffix,
        ];
    }


}
