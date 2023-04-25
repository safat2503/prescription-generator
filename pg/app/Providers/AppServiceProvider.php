<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ModelTestingController;

class AppServiceProvider extends ServiceProvider
{
  

    public function register()
    {
        $this->app->bind(ModelTestingController::class);
    }

    
}
