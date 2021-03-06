<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyFilesCommand extends Command
{
    protected $signature = 'copy:files';

    protected $description = 'Copy files from package laravel8acl to existing applications';

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
        // Files to overwrite here. Only copy in provider
        if(File::exists(base_path('routes/web.php'))){
            File::copy(base_path('routes/web.php'), base_path('routes/web.php').'.BAK');
            File::copy(base_path('vendor/ribafs/laravel-acl-exist/up/web.php'), base_path('routes/web.php'));
        }

        if(File::exists(app_path('Models/User.php'))){
            File::copy(app_path('Models/User.php'), app_path('Models/User.php').'.BAK');
            File::copy(base_path('vendor/ribafs/laravel-acl-exist/up/User.php'), app_path('Models/User.php'));
        }

        if(File::exists(base_path('resources/views/welcome.blade.php'))){
            File::copy(base_path('resources/views/welcome.blade.php'), base_path('resources/views/welcome.blade.php').'.BAK');
            File::copy(base_path('vendor/ribafs/laravel-acl-exist/up/welcome.blade.php'), base_path('resources/views/welcome.blade.php'));
        }

        if(File::exists(base_path('resources/views/layouts/app.blade.php'))){
            File::copy(base_path('resources/views/layouts/app.blade.php'), base_path('resources/views/layouts/app.blade.php').'.BAK');
            File::copy(base_path('vendor/ribafs/laravel-acl-exist/up/app.blade.php'), base_path('resources/views/layouts/app.blade.php'));
        }

        if(File::exists(app_path('Providers/AppServiceProvider.php'))){
            File::copy(app_path('Providers/AppServiceProvider.php'), app_path('Providers/AppServiceProvider.php').'.BAK');
            File::copy(base_path('vendor/ribafs/laravel-acl-exist/up/AppServiceProvider.php'), app_path('Providers/AppServiceProvider.php'));
        }

        if(File::exists(base_path('config/app.php'))){
            File::copy(base_path('config/app.php'), base_path('config/app.php').'.BAK');
            File::copy(base_path('vendor/ribafs/laravel-acl-exist/up/app.php'), base_path('config/app.php'));
        }

        if(File::exists(app_path('Http/Kernel.php'))){
            File::copy(app_path('Http/Kernel.php'), app_path('Http/Kernel.php').'.BAK');
            File::copy(base_path('vendor/ribafs/laravel-acl-exist/up/Kernel.php'), app_path('Http/Kernel.php'));
        }

        if(File::exists(database_path('seeders/DatabaseSeeder.php'))){
            File::copy(database_path('seeders/DatabaseSeeder.php'), database_path('seeders/DatabaseSeeder.php').'.BAK');
            File::copy(base_path('vendor/ribafs/laravel-acl-exist/up/DatabaseSeeder.php'), database_path('seeders/DatabaseSeeder.php'));
        }

        $this->info(PHP_EOL);
        $this->info('Arquivos copiados com sucesso.'.PHP_EOL);
    }
}
