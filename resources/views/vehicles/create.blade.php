@extends('adminlte::page')

@section('title', 'Adicionar Veículo')

@section('content_header')
    <h1>Adicionar Veículo</h1>
@stop

@section('content')
    
    @include('includes.alerts')

    <form action="{{ route('vehicles.store') }}" method="post">
        
        @include('vehicles._partials.form')
        <input class="btn btn-primary" type="submit" value="Adicionar">
        
    </form>
@stop
