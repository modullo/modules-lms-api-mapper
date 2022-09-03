<?php

namespace Modullo\ModulesLmsApiMapper;

use Illuminate\Support\ServiceProvider;

class ModulesLmsApiMapperServiceProvider  extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'modules-lms-api-mapper');

        // $this->publishes([
        //     __DIR__.'/resources/carousel' => public_path('LearningBase'),
        // ], 'modullo-modules');

/*        $this->publishes([
            __DIR__.'/resources/js/app/' => public_path('/'),
        ], 'modullo-modules');

        $this->publishes([
            __DIR__.'/resources/js/' => resource_path('js/vendor/modules-lms-base-accounts')
        ],'modullo-modules');

        $this->publishes([
            __DIR__.'/resources/js' => public_path('vendor/modules-lms-base-accounts'),
        ], 'modullo-modules');*/

        $this->publishes([
            __DIR__.'/config/modules-lms-api-mapper.php' => config_path('modules-lms-api-mapper.php')
        ],'modullo-modules');
        if (!class_exists('CreateApiMappersTable')){
            $this->publishes([
                __DIR__ . '/../database/migrations/create_api_mappers_table.php.stub' => $this->getMigrationFileName($filesystem,'create_api_mappers_table')
            ], 'modullo-modules');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/navigation-menu.php', 'modullo-navigation-menu.modules-lms-base-accounts'
        );
    }
}
