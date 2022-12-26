<?php

use App\Http\Controllers\Api\MaintenanceApiController;
use Illuminate\Support\Facades\Route;

Route::get('/manutencoes/{uuid}', [MaintenanceApiController::class, 'index']);
