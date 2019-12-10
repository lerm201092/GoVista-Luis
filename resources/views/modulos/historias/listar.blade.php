@extends('layouts.medico')

@section('head')
<link href="{{ asset('css/PacientesListar.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (session('mensaje'))
        
        <div class="row">
            <div class="col-12 px-3">
                <div id="divMensaje" class="alert alert-success">
                    <b>Paciente:</b><i> {{ session('nompaciente') }}</i><br>
                    <b>Mensaje:</b><i> {{ session('mensaje') }}</i>
                </div>
            </div>
        </div>
        <script>
            $("#document").ready(function(){
                setTimeout(() => {
                    $("#divMensaje").slideToggle(500);
                }, 8000);                
            });
        </script>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <p style="color :#869099; font-weight:600; font-size: 19px;">Listado De Historias Clinicas</p>
                    <table id="tbl-pacientes" class="table">
                        <thead class="text-primary">
                            <th>ID</th>
                            <th class="d-none d-sm-none d-md-block" style="border-bottom: none;">Fecha/Hora HC</th>
                            <th>Id. Paciente</th>
                            <th>Nombres</th>
                            <th class="d-none d-sm-none d-md-block" style="border-bottom: none;">Apellidos</th>
                            <th>Medico</th>
                            <th>Estado</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if(count($historias)>0)
                                @foreach($historias as $item)
                                    <tr class="{{ ($item->state == 'AC')? 'activeItem' : 'inactiveItem' }}">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->historydate }}</td>
                                        <td>{{ '('.$item->tipodoc.') '.$item->numdoc }}</td>
                                        <td>{{ ucwords(mb_strtolower($item->name1.' '.$item->name2)) }}</td>
                                        <td>{{ ucwords(mb_strtolower($item->surname1.' '.$item->surname2)) }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->state }}</td>
                                        <td>
                                            <span style="float:left">
                                                {!! Form::open(['method' => 'GET', 'url' => '/modulos/historiaclinica/bf_ver', 'class' => 'navbar-form navbar-right'])  !!}
                                                <input type="hidden" id="HistoriaId" name="HistoriaId" value="{{ $item->id }}" />                                            
                                                <button style="background:transparent; border:none;" class="cl-azul" title="Ver información del paciente"><i class="fa fa-eye"></i></button>
                                                {!! Form::close() !!}
                                            </span>
                                            <span style="float:left">
                                                {!! Form::open(['method' => 'GET', 'url' => '/modulos/historiaclinica/bf_dashboard', 'class' => 'navbar-form navbar-right'])  !!}
                                                <input type="hidden" id="HistoriaId" name="HistoriaId" value="{{ $item->id }}" />                                            
                                                <button style="background:transparent; border:none;" class="cl-morado" title="Editar información del paciente"><i class="fab fa-microsoft"></i></button>
                                                {!! Form::close() !!}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No se encontraron registros</td>
                                </tr>                     
                            @endif


                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12 text-right pt-4">
                            <div class=""> {!! $historias->appends(['search' => Request::get('buscar')])->render() !!} </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $("#li-historias").addClass("active");
    </script>
@endsection