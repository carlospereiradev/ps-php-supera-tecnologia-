@extends('adminlte::page')

@section('title', 'Meus Veículos')

@section('content_header')
    <h1>Meus Veículos</h1>
@stop

@section('content')
    @if (count($vehicles) > 0)
        <div class="card">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Versão</th>
                        <th>Placa</th>
                        <th style="width:200px;">Açoes</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->brand }}</td>
                            <td>{{ $vehicle->model }}</td>
                            <td>{{ $vehicle->version }}</td>
                            <td>{{ $vehicle->plate }}</td>
                            <td style="display:flex;">
                                <a class="btn btn-success" style="margin-left:5px" href="{{ route('vehicles.maintenances.index', $vehicle->id) }}" title="Ver manutenções deste veículo">
                                    <i class="fas fa-fw fa-tools" style="font-size: 1.5rem"></i>
                                </a>
                                <a class="btn btn-warning" style="margin-left:5px" href="{{ route('vehicles.edit', $vehicle->id) }}" title="Editar informações deste veículo">
                                    <i class="fas fa-fw fa-edit" style="font-size: 1.5rem"></i>
                                </a>
                                <form style="margin-left:5px" action="{{ route('vehicles.destroy', $vehicle->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" href="" title="Excluir veículo"><i class="fas fa-fw fa-trash" style="font-size: 1.5rem"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $vehicles->links() }}

        </div>
    @else
        <div class="alert alert-warning">
            <p>Não há veículos cadastrados.</p>    
        </div>
    @endif
@stop
