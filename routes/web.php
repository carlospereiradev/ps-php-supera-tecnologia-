<?php

use App\Http\Controllers\{
    HomeController,
    MaintenanceController,
    VehicleController
};

use Illuminate\Support\Facades\{
    Auth,
    Route
};

Auth::routes();

Route::middleware('auth')->group(function () {
    
    //Home
    Route::get('/', [HomeController::class, 'index'])->name('home');
   
    //Vehicles
    Route::prefix('veiculos')->group(function () {
        
        //Vehicle Controller
        Route::controller(VehicleController::class)->group(function () {
            
            Route::get('/', 'index')->name('vehicles.index');
            Route::get('/add', 'create')->name('vehicles.create');
            Route::post('/add', 'store')->name('vehicles.store');
            Route::get('/editar/{id_veiculo}', 'edit')->name('vehicles.edit');
            Route::put('/editar/{id_veiculo}', 'update')->name('vehicles.update');
            Route::delete('/editar/{id_veiculo}', 'destroy')->name('vehicles.destroy');
        });

        //Maintenance Controller
        Route::controller(MaintenanceController::class)->group(function () {
            
            Route::get('/{id_veiculo}/manutencoes', 'index')->name('vehicles.maintenances.index');
            Route::get('/{id_veiculo}/manutencoes/add', 'create')->name('vehicles.maintenances.create');
            Route::post('/{id_veiculo}/manutencoes/add', 'store')->name('vehicles.maintenances.store');
            Route::get('/{id_veiculo}/manutencoes/editar/{id_manutencao}', 'edit')->name('vehicles.maintenances.edit');
            Route::put('/{id_veiculo}/manutencoes/editar/{id_manutencao}', 'update')->name('vehicles.maintenances.update');
            Route::delete('/{id_veiculo}/manutencoes/editar/{id_manutencao}', 'destroy')->name('vehicles.maintenances.destroy');
        });
    });
});