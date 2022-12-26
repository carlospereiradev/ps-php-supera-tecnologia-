<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaintenanceApiResource;
use App\Models\User;
use Carbon\Carbon;

class MaintenanceApiController extends Controller
{
    public function index($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        
        $maintenances = $user->maintenances->where('scheduled_to', '>=', Carbon::now())
                                ->where('scheduled_to', '<=', Carbon::now()->addDays(7))
                                ->all();

        return MaintenanceApiResource::collection($maintenances);
    }
}
