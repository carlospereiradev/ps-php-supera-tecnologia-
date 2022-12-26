@extends('adminlte::page')

@section('title', 'Adicionar Manutenção')

@section('content_header')
<div style="display:grid;grid-template-columns: 1fr auto auto;gap:5px">
    <h1>Adicionar Manutenção</h1>
    <a class="btn btn-info" href="{{ route('vehicles.index') }}" title="Voltar"><i class="fa fa-arrow-left" style="font-size: 1.5rem"></i></a>
</div>
@stop

@section('content')

    @include('includes.alerts')

    <form action="{{ route('vehicles.maintenances.store', $vehicle->id) }}" method="post">
        
        @include('vehicles.maintenances._partials.form')

        <input class="btn btn-primary" type="submit" value="Adicionar">
    </form>
@stop
