@csrf

<div class="mb-3">
    <label for="description" class="form-label">Veículo selecionado:</label>
    <input class="form-control" type="text" value="{{ $vehicle->brand . ' - ' .$vehicle->model . ' | Placa: ' . $vehicle->plate}}"disabled readonly>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Serviço a ser feito</label>
    <textarea class="form-control" rows="5" id="description" name="description" required placeholder="Um serviço por linha">{{ $maintenance->description_formatted ?? old('description') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label" for="scheduled_to">Agendar para o dia: </label>
    <input style="max-width: 150px" class="form-control" type="date" name="scheduled_to" id="scheduled_to" value="{{ $maintenance->scheduled_to ?? old('scheduled_to') }}">
</div>