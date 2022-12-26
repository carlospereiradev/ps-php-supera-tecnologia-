<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMaintenanceRequest;
use App\Models\{
    Maintenance,
    User,
    Vehicle
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\ReturnTypePass;

class MaintenanceController extends Controller
{
    protected $authUser;

    public function __construct(Auth $authUser)
    {
        $this->authUser = $authUser;
    }

    public function index($vehicleId)
    {
        $vehicle = $this->getVehicleById($vehicleId);
        
        if (!$vehicle)
            return redirect()->route('vehicles.index');

        $maintenances = $vehicle->maintenances()->paginate();

        return view('vehicles.maintenances.index', compact('maintenances', 'vehicleId'));
    }

    public function create($vehicleId)
    {
        $vehicle = $this->getVehicleById($vehicleId);

        if (!$vehicle)
            return redirect()->route('vehicles.index');

        return view('vehicles.maintenances.create', compact('vehicle'));
    }

    public function store(StoreUpdateMaintenanceRequest $request, $vehicleId)
    {
        $vehicle = $this->getVehicleById($vehicleId);

        if (!$vehicle)
            return redirect()->route('vehicles.index');

        $vehicle->maintenances()->create($request->all());

        return redirect()->route('vehicles.maintenances.index', $vehicleId);
    }

    public function edit($vehicleId, $maintenanceId)
    {
        $maintenance = $this->getMaintenanceById($maintenanceId);

        if (!$maintenance)
            return redirect()->route('vehicles.maintenances.index', $vehicleId);

        $vehicle = $maintenance->vehicle;
        
        return view('vehicles.maintenances.edit', compact('vehicle', 'maintenance'));                     
    }

    public function update(StoreUpdateMaintenanceRequest $request, $vehicleId, $maintenanceId)
    {
        $maintenance = $this->getMaintenanceById($maintenanceId);
        
        if (!$maintenance)
            return redirect()->route('vehicles.maintenances.index', $vehicleId);
        
        $maintenance->update($request->all());

        return redirect()->route('vehicles.maintenances.index', $vehicleId);
    }

    public function destroy($vehicleId, $maintenanceId)
    {
        $maintenance = $this->getMaintenanceById($maintenanceId);
        
        if (!$maintenance)
            return redirect()->route('vehicles.maintenances.index', $vehicleId);

        $maintenance->delete();

        return redirect()->route('vehicles.maintenances.index', $vehicleId);
    }

    public function getMaintenanceById($maintenanceId)
    {
        $user = $this->authUser::user();
       
        $maintenance = $user->maintenances
                            ->where('id', $maintenanceId)
                            ->first();

        if (!isset($maintenance->user_id) OR ($maintenance->user_id !== $user->id))
            return false;

        return $maintenance;
    }

    public function getVehicleById($vehicleId)
    {
        $user = $this->authUser::user();
       
        $vehicle = $user->vehicles
                            ->where('id', $vehicleId)
                            ->first();

        if (!isset($vehicle->user_id) OR ($vehicle->user_id !== $user->id))
            return false;

        return $vehicle;
    }
}


