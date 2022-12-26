<?php

namespace App\Observers;

use App\Models\Maintenance;
use Illuminate\Support\Facades\Auth;

class MaintenanceObserver
{
    public function creating(Maintenance $maintenance)
    {
        $maintenance->user_id = Auth::id();

    }
}
