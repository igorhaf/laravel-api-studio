<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class FileGeneratorCommand extends Command
{
    protected $signature = 'module:make:filegenerator';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description;

    protected $type;

    private Filesystem $files;

    protected $stub_file;

    protected $suffix;
    protected bool $module_in_file = true;
    protected $timestamp_in_file;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if (! $this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }

    /**
     * Get the full path of generate class.
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        if (! empty($this->prefix)) {
            $prefix = $this->prefix;
        } else {
            $prefix = null;
        }
        if (! empty($this->suffix)) {
            $suffix = $this->suffix;
        } else {
            $suffix = null;
        }
        $this->module_in_file = $this->getSingularClassName($this->argument('name'));
        if ($this->module_in_file == false) {
            $module_in_file = $this->getSingularClassName($this->argument('name'));
        } else {
            $module_in_file = $this->argument('name');
        }
        if ($this->timestamp_in_file == true) {
            $timestamp_in_file = date('Y_m_d_His').'_';
        } else {
            $timestamp_in_file = null;
        }

        return app_path('Modules').'/'.$this->argument('module_name').'/'.$this->type.'/'.$timestamp_in_file.$module_in_file.$prefix.$suffix.'.php';
    }

    /**
     * Return the Singular Capitalize Name.
     *
     * @param $name
     * @return string
     */
    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    /**
     * Replace the stub variables(key) with the desire value.
     *
     * @param $stub
     * @param  array  $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('{{ '.$search.' }}', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Get the stub path and the stub variables.
     *
     * @return bool|mixed|string
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * Create a new command instance.
     *
     * @param  Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Return the stub file path.
     *
     * @return string
     */
    public function getStubPath()
    {
        return __DIR__.'/../../../stubs/'.$this->stub_file.'.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\'.$this->type;
    }
}
