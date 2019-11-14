@extends('layouts.medico')

@section('head')
<style>
#tbl-pacientes thead th{
color:#9c27b0;
padding: 2px 5px 2px;
font-size: 15px;   
 border: none;
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

.cl-morado-light{
            color:#a088a4; 
        }

ul.pagination{
float:right;
}

.alert-success{
color: #468847!important;
background-color: #dff0d8!important;
border-color: #d6e9c6!important;
}   
ul#tabs-ver .nav-item .nav-link{
            font-weight:400;
            color: #aba8a8!important;
          }
          ul#tabs-ver  .nav-item .active{
    font-weight:600;
    color: #9c27b0!important;
  }

</style>

<link href="{{ asset('packages/core/main.css') }}" rel='stylesheet' />
<link href="{{ asset('packages/daygrid/main.css') }}" rel='stylesheet' />
<link href="{{ asset('packages/timegrid/main.css') }}" rel='stylesheet' />


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
                <!-- INICIO CAR-BODY -->
                <div class="card-body">
                    <!-- link de los tabs -->
                    <ul class="nav nav-tabs" role="tablist" id="tabs-ver"> 
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1">
                                <span class="fas fa-address-card mr-2"></span>
                                <span class="text-tab">Listado De Citas Registradas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab2">
                                <span class="fas fa-briefcase-medical mr-2"></span>
                                <span id="open-calendar"></span>
                                <span class="text-tab">Calendario</span>
                            </a>
                        </li>

                    </ul>

                    <!-- contenedor de los tabs -->
                    <div class="tab-content p-0" style="border:1px solid #dee2e6; border-top: none">
                        <!-- PRIMER TAB -->
                        <div class="tab-pane active p-4" id="tab1">
                            <div class="row ml-0 mr-0 mb-4">
                                <div class="col-12 pl-0">
                                    <p style="color :#869099; font-weight:600; font-size: 19px;"></p>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('modulos.citas.crear') }}" class="btn btn-success" style="border-radius:50%" title="Crear Nuevo Paciente">
                                        <span class="fa fa-plus"></span>
                                    </a>
                                </div>
                                <div class="col-md-8 text-right">
                                    {!! Form::open(['method' => 'GET', 'url' => '/modulos/pacientes/bf_buscar', 'class' => 'navbar-form navbar-right'])  !!}                            
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
                                                    <span style="float:left">
                                                        {!! Form::open(['method' => 'GET', 'url' => '/modulos/citas/bf_editar', 'class' => 'navbar-form navbar-right'])  !!}
                                                            <input type="hidden" id="CitaId" name="CitaId" value="{{ $item->id }}" />                                            
                                                            <button style="background:transparent; border:none;" class="cl-verde" title="Iniciar consulta"><i class="fas fa-angle-double-right"></i></button>
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
                        </div>


                        <!-- SEGUNDO TAB -->
                        <div class="tab-pane container active" id="tab2">
                            <div class="container p-2">                                
                                    <div id='calendar' style="width:100%" class="border"></div>                                                 
                            </div>                         
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-right pt-4">
                            <div class=""> {!! $citas->appends(['search' => Request::get('buscar')])->render() !!} </div>
                        </div>
                    </div>
                </div>
                <!-- FIN DEL CARD BODY -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Información de la cita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="mb-0"><span class="cl-morado-light font-weight-bold">Paciente : </span><span id="paciCita"></span></p>
            <p class="mb-0"><span class="cl-morado-light font-weight-bold">Motivo de consulta : </span><span id="motiCita"></span></p>
            <p class="mb-0"><span class="cl-morado-light font-weight-bold">Descripción de consulta : </span><span id="descCita"></span></p>
            <p class="mb-0"><span class="cl-morado-light font-weight-bold">Fecha/hora de la cita : </span><span id="fechaCita"></span></p>
        </div>
        <div class="modal-footer">
            <div  style="width:100%;">
                    <img src="{{ asset('/img/logo-200-53.png') }}" alt="logo" style="height:20px;">

                    <button type="button" class="btn btn-secondary" style="float:right" data-dismiss="modal">Cerrar</button>
            </div>
        
        </div>
        </div>
    </div>
    </div>

@endsection

@section('script')
<script src="{{ asset('packages/core/main.js') }}"></script>
<script src="{{ asset('packages/core/locales-all.js') }}"></script>
<script src="{{ asset('packages/interaction/main.js') }}"></script>
<script src="{{ asset('packages/daygrid/main.js') }}"></script>
<script src="{{ asset('packages/timegrid/main.js') }}"></script>
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



        console.log( "hola mundo ");
        
    var arr = @json($json_citas, JSON_PRETTY_PRINT);      
      

    document.addEventListener('DOMContentLoaded', function() {       
        cargarCalendario();
    });

    function cargarCalendario(){
        console.log("hola");
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
            plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            eventClick: function(info) {
                verCitaCalendario(info)
                info.el.style.borderColor = 'red';
            },
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: arr
            });
            calendar.render();

            $("#tab2").removeClass("active");
        }

        function verCitaCalendario(info){
            var f = new Date(info.event.start);
            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            var jornada = "am", hora, minutos = f.getMinutes();

            if(f.getMinutes()<10){
                minutos = "0"+f.getMinutes();
            }
            if(f.getHours() > 12){
                hora = f.getHours() - 12;
                jornada = "pm";
            }else if(f.getHours() == 0){
                hora = 12;
            }else{
                hora = f.getHours();
            }

            fecha = meses[f.getMonth()]+" "+f.getDate() + "/" + f.getFullYear()+" "+hora+":"+minutos+" "+jornada;
            console.log(fecha);
            $("#paciCita").text(info.event.title);
            $("#motiCita").text(info.event._def.extendedProps.titulo);
            $("#descCita").text(info.event._def.extendedProps.body);
            $("#fechaCita").text(fecha);
            $('#exampleModal').modal("show");
        }


    </script>
@endsection