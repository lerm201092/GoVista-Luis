@extends( Session::get('roluser') ==  3 ? 'layouts.medico' : 'layouts.paciente')

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

  .ocultar-movil{
      display: table-cell;
  }

  /* Smartphones (landscape) */
@media only screen 
and (max-width : 864px) {

    .ocultar-movil{
      display: none;
  }
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
                        <!-- PRIMER TAB -->
                        <div class="tab-pane active p-4" id="tab1">
                            <table id="tbl-pacientes" class="table">
                                <thead class="text-primary">
                                    <th class="ocultar-movil">Código de cita</th>
                                    <th class="ocultar-movil">Fecha de cita</th>
                                    <th class="ocultar-movil">Medico</th>
                                    <th>Observación</th>
                                    <th>Sesiones</th>
                                    <th>Realizadas</th>
                                    <th>Duración (Minutos)</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @if(count($historias)>0)
                                        @foreach($historias as $item)
                                            <tr class="{{ ($item->state == 'AC')? 'activeItem' : 'inactiveItem' }}">
                                                <td class="ocultar-movil">{{$item->id_appointment}}</td>   
                                                <td class="ocultar-movil">{{$item->historydate}}</td>                                                  
                                                <td class="ocultar-movil">{{ucwords(mb_strtolower($item->name))}}</td> 
                                                <td>{{$item->observation}}</td> 
                                                <td>{{$item->session}}</td>       
                                                <td>{{$item->session_ok ?? 0}}</td> 
                                                <td>{{$item->duration}}</td>  
                                                <td>
                                                    <span style="float:left">
                                                        {!! Form::open(['method' => 'GET', 'url' => '/modulos/ejercicios/bf_play', 'class' => 'navbar-form navbar-right'])  !!}
                                                            <input type="hidden" id="id" name="id" value="{{ Crypt::encrypt($item->id) }}" />                                            
                                                            <button style="background:transparent; border:none;" class="cl-verde" title="Ver información del paciente"><i class="fas fa-play"></i></button>
                                                        {!! Form::close() !!}
                                                    </span>                                                
                                                </td>                                      
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="@if(Auth::user()->roluser == 3) 5 @else 4 @endif">No se encontraron registros</td>
                                        </tr>                     
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    <div class="row">
                        <div class="col-12 text-right pt-4">
                            <div class=""> {!! $historias->appends(['search' => Request::get('buscar')])->render() !!} </div>
                        </div>
                    </div>
                </div>
                <!-- FIN DEL CARD BODY -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#li-ejercicios").addClass("active");
    </script>
@endsection