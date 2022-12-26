@extends('adminlte::page')

@section('title', 'Minhas Manutenções')

@section('content_header')
    <div style="display:grid;grid-template-columns: 1fr auto auto;gap:5px">
        <h1>Minhas Manutenções</h1>
        <a class="btn btn-success" href="{{ route('vehicles.maintenances.create', $vehicleId) }}" title="adicionar manutenção"><i class="fa fa-fw fa-plus" style="font-size: 1.5rem"></i></a>
        <a class="btn btn-info" href="{{ route('vehicles.index') }}" title="Voltar"><i class="fa fa-arrow-left" style="font-size: 1.5rem"></i></a>
    </div>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach        
        </div>

    @endif
    @if (count($maintenances) > 0)
        <div class="card">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Veículo</th>
                        <th>Serviços Solicitados</th>
                        <th>Agendado para o dia</th>
                        <th style="width:200px;">Açoes</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($maintenances as $maintenance)
                        
                        <tr>
                            <td>
                                {{  $maintenance->vehicle->vehicle_info }}
                            </td>
                            <td>
                                <ul>
                                    @foreach ($maintenance->description as $service)
                                        <li>{{ $service }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $maintenance->formatted_scheduled_to }}</td>
                            
                            <td style="display:flex;">
                                <a class="btn btn-warning" style="margin-left:5px" 
                                    href="{{ route('vehicles.maintenances.edit', [$maintenance->vehicle_id, $maintenance->id]) }}" 
                                    title="Editar informações">
                                    <i class="fas fa-fw fa-edit" style="font-size: 1.5rem"></i>
                                </a>
                                <form style="margin-left:5px" action="{{ route('vehicles.maintenances.destroy', [$maintenance->vehicle_id, $maintenance->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" href="" title="Excluir manutenção"><i class="fas fa-fw fa-trash" style="font-size: 1.5rem"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $maintenances->links() }}

        </div>
    @else
        <div class="alert alert-warning">
            <p>Não há manutenções para este veículo.</p>    
        </div>
    @endif
@stop
