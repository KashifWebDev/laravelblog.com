<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        $logFolderName = date('Y-m-d').'/'. date('H').'_00';

        // Ensure the directory exists
        $logPath = storage_path('logs/' . $logFolderName);
        if (!is_dir($logPath)) {
            mkdir($logPath, 0777, true);
        }

        Log::getLogger()->pushHandler(new StreamHandler(storage_path('logs/' . $logFolderName . '/laravel.log'), Logger::DEBUG));
    }
}
