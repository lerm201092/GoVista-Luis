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
                    <div class="row ml-0 mr-0 mb-4">
                        <div class="col-12 pl-0">
                            <p style="color :#869099; font-weight:600; font-size: 19px;">Listado De Pacientes</p>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('modulos.pacientes.crear') }}" class="btn btn-success" style="border-radius:50%" title="Crear Nuevo Paciente"><span class="fa fa-plus"></span></a>
                        </div>

                        <div class="col-md-8 text-right">
                            {!! Form::open(['method' => 'GET', 'url' => '/modulos/pacientes/bf_buscar', 'class' => 'navbar-form navbar-right'])  !!}                            
                                <a onclick="filtro_estado('T')" class="btn bg-amarillo text-light" title="Crear Nuevo Paciente"><span class="fa fa-filter mr-2"></span>Todos</a>
                                <a onclick="filtro_estado('A')" class="btn bg-azul text-light" title="Crear Nuevo Paciente"><span class="fa fa-filter mr-2"></span>Activos</a>
                                <a onclick="filtro_estado('I')" class="btn bg-rojo text-light mr-3" title="Crear Nuevo Paciente"><span class="fa fa-filter mr-2"></span>Inactivos</a>
                                <input required type="text" id="buscar" name="buscar" class="txt" placeholder="Buscar Paciente ..." value="{{ $texto ? $texto : ''}}">
                                <button class="ml-2 btn bg-morado text-light mb-2" style="border-radius:50%" title="Buscar Paciente"><span class="fa fa-search"></span></button>
                            {!! Form::close() !!}
                        </div>
                    </div>


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
                                                {!! Form::open(['method' => 'GET', 'url' => '/modulos/pacientes/bf_ver', 'class' => 'navbar-form navbar-right'])  !!}
                                                <input type="hidden" id="PacienteId" name="PacienteId" value="{{ $item->id }}" />                                            
                                                <button style="background:transparent; border:none;" class="cl-azul" title="Ver información del paciente"><i class="fa fa-eye"></i></button>
                                                {!! Form::close() !!}
                                            </span>
                                            <span style="float:left">
                                                {!! Form::open(['method' => 'GET', 'url' => '/modulos/pacientes/bf_editar', 'class' => 'navbar-form navbar-right'])  !!}
                                                <input type="hidden" id="PacienteId" name="PacienteId" value="{{ $item->id }}" />                                            
                                                <button style="background:transparent; border:none;" class="cl-morado" title="Editar información del paciente"><i class="fas fa-pencil-alt"></i></button>
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