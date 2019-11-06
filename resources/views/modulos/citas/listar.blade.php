@extends('layouts.medico')

@section('head')
    <style>
        #tbl-pacientes thead th{
            color:#9c27b0;
            padding: 2px 5px 2px;
            font-size: 15px;
        }
        #tbl-pacientes tbody tr td{
            color: gray;
            padding: 4px 5px 4px;
            font-size: 14px;
        }
        .bg-verde{
            background:#5eb562; 
        }

        .bg-amarillo{
            background:#fc9208; 
        }

        .bg-rojo{
            background:#ec4a47; 
        }

        .bg-azul{
            background:#12b8cd; 
        }

        .bg-morado{
            background:#9c27b0; 
        }


        .cl-verde{
            color:#5eb562; 
        }

        .cl-amarillo{
            color:#fc9208; 
        }

        .cl-rojo{
            color:#ec4a47; 
        }

        .cl-azul{
            color:#12b8cd; 
        }

        .cl-morado{
            color:#9c27b0; 
        }

        ul.pagination{
            float:right;
        }

        .alert-success{
            color: #468847!important;
    background-color: #dff0d8!important;
    border-color: #d6e9c6!important;
	}
    </style>
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
                            <p style="color :#869099; font-weight:600; font-size: 19px;">Listado De Citas Registradas</p>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('modulos.pacientes.crear') }}" class="btn btn-success" style="border-radius:50%" title="Crear Nuevo Paciente"><span class="fa fa-plus"></span></a>
                        </div>

                        <div class="col-md-8 text-right">
                            {!! Form::open(['method' => 'GET', 'url' => '/modulos/pacientes/bf_buscar', 'class' => 'navbar-form navbar-right'])  !!}                            
                                <a onclick="filtro_estado('T')" class="btn bg-amarillo text-light" title="Crear Nuevo Paciente"><span class="fa fa-filter mr-2"></span>Todos</a>
                                <a onclick="filtro_estado('A')" class="btn bg-azul text-light" title="Crear Nuevo Paciente"><span class="fa fa-filter mr-2"></span>Activos</a>
                                <a onclick="filtro_estado('I')" class="btn bg-rojo text-light mr-3" title="Crear Nuevo Paciente"><span class="fa fa-filter mr-2"></span>Inactivos</a>
                                <input required type="text" id="buscar" name="buscar" class="txt" placeholder="Buscar Paciente ..." value="">
                                <button class="ml-2 btn bg-morado text-light mb-2" style="border-radius:50%" title="Buscar Paciente"><span class="fa fa-search"></span></button>
                            {!! Form::close() !!}
                        </div>
                    </div>


                    <table id="tbl-pacientes" class="table">
                        <thead class="text-primary">
                            <th>Paciente</th>
                            <th class="d-none d-sm-none d-md-block" style="border-bottom: none;">Medico</th>
                            <th>Fecha Cita</th>
                            <th>Estado</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if(count($citas)>0)
                                @foreach($citas as $item)
                                    <tr class="{{ ($item->state == 'AC')? 'activeItem' : 'inactiveItem' }}">
                                        <td >{{ ucwords(mb_strtolower($item->name1.' '.$item->surname1)) }}</td>
                                        <td>{{ ucwords(mb_strtolower($item->name)) }}</td>
                                        <td>{{ $item->start }}</td>
                                        <td>{{ $item->state }}</td>
                                        <td>
                                            <span style="float:left">
                                                {!! Form::open(['method' => 'GET', 'url' => '/modulos/citas/bf_ver', 'class' => 'navbar-form navbar-right'])  !!}
                                                <input type="hidden" id="CitaId" name="CitaId" value="{{ $item->id }}" />                                            
                                                <button style="background:transparent; border:none;" class="cl-azul" title="Ver información del paciente"><i class="fa fa-eye"></i></button>
                                                {!! Form::close() !!}
                                            </span>
                                            <span style="float:left">
                                                {!! Form::open(['method' => 'GET', 'url' => '/modulos/citas/bf_editar', 'class' => 'navbar-form navbar-right'])  !!}
                                                <input type="hidden" id="CitaId" name="CitaId" value="{{ $item->id }}" />                                            
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
                            <div class=""> {!! $citas->appends(['search' => Request::get('buscar')])->render() !!} </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $("#buscar").focus();
        $("#li-citas").addClass("active");

        function filtro_estado(aux){
            $(".activeItem").removeClass("d-none"); 
	        $(".inactiveItem").removeClass("d-none"); 
            if(aux=="I"){
                $(".activeItem").addClass("d-none"); 
            }else if(aux=="A"){
                $(".inactiveItem").addClass("d-none"); 
            }
        }
    </script>
@endsection