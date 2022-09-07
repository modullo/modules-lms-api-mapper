<?php

use Illuminate\Support\Facades\Route;
use Modullo\ModulesLmsLearningBase\Http\Controllers\ModulesLmsApiMapperController;

Route::group(['namespace' => 'Modullo\ModulesLmsApiMapper\Http\Controllers','middleware' => ['web']],function() {


    Route::middleware('auth')->group(function () {
        Route::group(['prefix' => 'tenant'],function(){
//            Route::get('/learners','ModulesLmsLearningBaseTenantController@management')->name('tenant-learners');
//            Route::post('learners/store-bulk','ModulesLmsApiMapperController@storeBulk');
//            Route::resource('learners','ModulesLmsApiMapperController');
//            Route::get('/api-mapper','ModulesLmsApiMapperController@index')->name('lms.mapper');
            Route::resource('api-mapper','ModulesLmsApiMapperController');
            Route::resource('user-mapper','UserMapperController');
        });
    });

});
