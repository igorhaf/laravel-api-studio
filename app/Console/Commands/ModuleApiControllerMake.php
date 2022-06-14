<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleApiControllerMake extends FileGeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'module:make:api:controller {name} {module_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new controller provider class';

    /**
     * @var string
     */
    protected $type = 'Http/Controllers/Api/v1';

    protected $namespace = 'Http\Controllers\Api\v1';

    /**
     * @var string
     */
    protected $stub_file = 'module-api-controller';

    /**
     * @var string
     */
    protected $suffix = 'Controller';

    /**
     **
     * Map the stub variables present in stub to its value.
     *
     * @return array
     */
    public function getStubVariables()
    {
        return [
            'namespace'    => 'App\\Modules\\'.$this->argument('module_name').'\\'.$this->namespace,
            'class'        => $this->getSingularClassName($this->argument('name')).$this->suffix,
        ];
    }

    public function handle()
    {
        parent::handle();
        /*$txt = "data-to-add";
        $myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);*/

        $myfile = fopen(base_path('routes/api.php'), 'a') or exit('Unable to open route file!');
        $txt = "Route::prefix('".$this->camelCase2UnderScore($this->argument('module_name')).'/'.$this->camelCase2UnderScore($this->argument('name'))."')->group(function () {";
        fwrite($myfile, "\n".$txt);
        $txt = "    Route::post('/', [App\\Modules\\".$this->argument('module_name').'\\Http\\Controllers\\Api\\v1\\'.$this->argument('name')."Controller::class, 'store']);";
        fwrite($myfile, "\n".$txt);
        $txt = "    Route::put('/{id}', [App\\Modules\\".$this->argument('module_name').'\\Http\\Controllers\\Api\\v1\\'.$this->argument('name')."Controller::class, 'update']);";
        fwrite($myfile, "\n".$txt);
        $txt = "    Route::get('/{id}', [App\\Modules\\".$this->argument('module_name').'\\Http\\Controllers\\Api\\v1\\'.$this->argument('name')."Controller::class, 'show']);";
        fwrite($myfile, "\n".$txt);
        $txt = "    Route::get('/', [App\\Modules\\".$this->argument('module_name').'\\Http\\Controllers\\Api\\v1\\'.$this->argument('name')."Controller::class, 'index']);";
        fwrite($myfile, "\n".$txt);
        $txt = "    Route::delete('/{id}', [App\\Modules\\".$this->argument('module_name').'\\Http\\Controllers\\Api\\v1\\'.$this->argument('name')."Controller::class, 'destroy']);";
        fwrite($myfile, "\n".$txt);
        $txt = '});';
        fwrite($myfile, "\n".$txt);
        fclose($myfile);
    }

    public function camelCase2UnderScore($str, $separator = '_')
    {
        if (empty($str)) {
            return $str;
        }
        $str = lcfirst($str);
        $str = preg_replace('/[A-Z]/', $separator.'$0', $str);

        return strtolower($str);
    }
}
