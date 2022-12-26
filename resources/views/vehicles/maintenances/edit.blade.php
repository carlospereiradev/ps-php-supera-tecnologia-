@extends('adminlte::page')

@section('title', 'Editar Manutenção')

@section('content_header')
<div style="display:grid;grid-template-columns: 1fr auto auto;gap:5px">
    <h1>Editar Manutenção</h1>
    <a class="btn btn-info" href="{{ route('vehicles.maintenances.index', $vehicle->id) }}" title="Voltar"><i class="fa fa-arrow-left" style="font-size: 1.5rem"></i></a>
</div>
@stop

@section('content')

    @include('includes.alerts')

    

    <form action="{{ route('vehicles.maintenances.update', [$vehicle->id, $maintenance->id]) }}" method="post">
        
        @method('PUT')

        @include('vehicles.maintenances._partials.form')
        
        <input class="btn btn-primary" type="submit" value="Atualizar">
    </form>
@stop
