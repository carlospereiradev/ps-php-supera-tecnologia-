@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="accordion">
    <div class="alert alert-info" style="display: none">
        Manutenções previstas para os próximos 7 dias
    </div>
    
    <table id="tabela" class="table table-striped table-hover" style="display: none">
        
        <thead>
            <tr>
                <th>Veiculo</th>
                <th>Serviço</th>
                <th>Data</th>
            </tr>
        </thead>

    </table>
    
</div>
<div id="alerta" class="alert alert-warning">
    Sem manutenções previstas para os próximos 7 dias
</div>
@stop

@section('js')
    <script>
        const url = '{{ url('api/manutencoes/'.$userUuid) }}';

        const resultado = fetch(url)
            .then(response => response.json())
            .then((response) => {
                const data = response.data

                const tabela = document.getElementById('tabela');
                const tbody = document.createElement('tbody');
                
                if (data.length > 0){
                   document.getElementById('tabela').style.display = '';
                   document.getElementById('alerta').style.display = 'none';
                   document.querySelector('.alert-info').style.display = '';
                   console.log(data);
                }

                data.forEach(function (item) {
                    tbody.appendChild(criarLinha(item));
                });

                tabela.appendChild(tbody);
            });  
    
        function criarLinha(item)
        {
            const tr = document.createElement('tr');
            
            Object.keys(item).forEach((key) => {
                const td = document.createElement('td');
                
                if (key != 'servico'){
                    td.innerHTML = item[key];
                }else{
                    const ul = document.createElement('ul');
                    
                    item[key].forEach((service) => {
                        const li = document.createElement('li');

                        li.innerHTML = service;
                        ul.appendChild(li);
                        
                    });

                    td.appendChild(ul);
                }

                tr.appendChild(td);
            });

            return tr;
        }
    </script>
@stop
