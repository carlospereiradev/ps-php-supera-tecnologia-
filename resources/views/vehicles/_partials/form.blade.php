@csrf

<div class="mb-3">
    <label for="brand" class="form-label">Marca</label>
    <input class="form-control" type="text" id="brand" name="brand" value="{{ $vehicle->brand ?? old('brand') }}" placeholder="Honda">
</div>
<div class="mb-3">
    <label for="model" class="form-label">Modelo</label>
    <input class="form-control" type="text" id="model" name="model" value="{{ $vehicle->model ?? old('model')}}" placeholder="Civic">
</div>
<div class="mb-3">
    <label for="version" class="form-label">Versão/Motor</label>
    <input class="form-control" type="text" id="version" name="version" value="{{ $vehicle->version ??  old('version')}}" placeholder="LXR 2.0">
</div>
<div class="mb-3">
    <label for="plate" class="form-label">Placa</label>
    <input class="form-control" type="text" id="plate" name="plate" value="{{ $vehicle->plate ?? old('plate') }}" placeholder="DER2T81">
</div>