<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    StoreUpdateVehicleRequest
};
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use function GuzzleHttp\Promise\all;

class VehicleController extends Controller
{
    protected $repository, $authUser;

    public function __construct(Vehicle $vehicle, Auth $user)
    {
        $this->repository = $vehicle;
        $this->authUser = $user;
    }

    public function index()
    {
        $user = $this->authUser::user();

        $vehicles = $user->vehicles()->paginate();

        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(StoreUpdateVehicleRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('vehicles.index');
    }

    public function edit($vehicleId)
    {
        $vehicle = $this->getVehicleById($vehicleId);

        if (!$vehicle)
            return redirect()->route('vehicles.index');

        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(StoreUpdateVehicleRequest $request, $vehicleId)
    {
        $vehicle = $this->getVehicleById($vehicleId);

        if (!$vehicle)
            return redirect()->back();

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index');
            
    }

    public function destroy($vehicleId)
    {
        $vehicle = $this->getVehicleById($vehicleId);

        if (!$vehicle)
            return redirect()->back();

        $vehicle->delete();

        return redirect()->route('vehicles.index');
    }

    public function getVehicleById($vehicleId)
    {
        $userId = $this->authUser::id();

        $vehicle = $this->repository
                        ->where('id', $vehicleId)
                        ->where('user_id', $userId)
                        ->first();
        
        if (!$vehicle)
            return false;
        
        return $vehicle;
    }
}
