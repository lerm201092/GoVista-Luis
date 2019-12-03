@extends( Session::get('roluser') ==  3 ? 'layouts.medico' : 'layouts.paciente')

@section('head')
<link href="/vendor/chartist/chartist.min.css" rel="stylesheet" />
<script type="text/javascript" src="/vendor/chartist/chartist.min.js"></script>
<link href="/css/summary.css" rel="stylesheet" />
@endsection

@section('content')
    <!-- Inicio - Fila -->
    <div class="row pl-4 pr-4">
        <!-- Caja 1 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-verde align-middle">
                                <span class="far fa-calendar-alt "></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Citas Activas</p>
                                <p class="valores-cajas">{{ $CitasActivas }}</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div>  
        <!-- Caja 2 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-amarillo">
                                <span class="fas fa-user-friends"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">@if(Auth::user()->roluser == 3) Total Pacientes @else Citas Realizadas @endif</p>
                                <p class="valores-cajas">@if(Auth::user()->roluser == 3) {{ $TotalPacientes }} @else {{ $CitasRealizadas }} @endif</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div>  

        <!-- Caja 3 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-rojo">
                                <span class="fas fa-user-friends"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">@if(Auth::user()->roluser == 3) Pacientes Activos @else Citas Inactivas @endif</p>
                                <p class="valores-cajas">@if(Auth::user()->roluser == 3) {{ $PacientesActivos }} @else {{ $CitasInactivas }} @endif</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div>  

        <!-- Caja 4 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-azul">
                                <span class="fas fa-user-friends"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">@if(Auth::user()->roluser == 3) Pacientes Inactivos @else Total Citas @endif</p>
                                <p class="valores-cajas">@if(Auth::user()->roluser == 3) {{ $PacientesInactivos }} @else {{ $TotalCitas }} @endif</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div>  
        <!-- Caja 5 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-verde">
                                <span class="fa fa-gamepad"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Ejercicios Asignados</p>
                                <p class="valores-cajas">{{ $EjerciciosAsignados }}</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div> 

        <!-- Caja 6 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-amarillo">
                                <span class="fa fa-gamepad"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Ejercicios Activos</p>
                                <p class="valores-cajas">{{ $EjerciciosActivos }}</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div> 

        <!-- Caja 7 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-rojo">
                                <span class="fa fa-gamepad"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Ejercicios Incumplidos</p>
                                <p class="valores-cajas">{{ $EjerciciosIncumplidos }}</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div> 

        <!-- Caja 8 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-azul">
                                <span class="fa fa-gamepad"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Ejercicios Realizados</p>
                                <p class="valores-cajas">{{ $EjerciciosRealizados }}</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div> 
    </div>
    <!-- Fin - Fila -->
    <div class="row pl-4 pr-4">
    @if(Session::get('roluser') ==  3) 
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body pb-4 pt-4 pl-3 pr-3">
                    <p style="color: gray;" class="col-12 text-center">Graficos estadisticos - Pacientes-Citas</p>
                    <div id="my-chart" style="width:100%;" ></div>
                </div>
            </div>
        </div>        
        <?php $col = 6; ?>
    @else
        <?php $col = 12; ?>
    @endif
        <div class="col-lg-<?=($col)?> mb-4">
            <div class="card">
                <div class="card-body pb-4 pt-4 pl-3 pr-3">
                    <p style="color: gray;" class="col-12 text-center">Graficos estadisticos - Ejercicios</p>
                    <div id="my-chart2" style="width:100%; "></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $("#li-resumen").addClass("active");
    /* Ahora podemos especificar múltiples configuraciones de respuesta que anularán las configuraciones básicas según el orden y si las consultas de medios coinciden. En este ejemplo, estamos cambiando la visibilidad de puntos y líneas, así como también usamos diferentes interpolaciones de etiquetas por razones de espacio. */
    var responsiveOptions = [
        ['screen and (min-width: 641px) and (max-width: 1024px)', {
            showPoint: false,
            axisX: {
            labelInterpolationFnc: function(value) {
                return '' + value;
            }
            }
        }],
        ['screen and (max-width: 640px)', {
            showLine: false,
            axisX: {
            labelInterpolationFnc: function(value) {
                return '' + value;
            }
            }
        }]
    ];

    /* Establezca algunas opciones básicas (la configuración anulará la configuración predeterminada en Chartist.js * ver configuración predeterminada *). Estamos agregando una función básica de interpolación de etiquetas para las etiquetas xAxis. */
    var options = {
        axisX: {
            labelInterpolationFnc: function(value) {
            return '' + value;
            }
        },
        height: 300
    };

    
    @if(Session::get('roluser') ==  3)
        /* Agregar una serie de datos básica con seis etiquetas y valores */
        var data = {
        labels: [' Total pacientes', 'Pacientes activos', 'Pacientes inactivos', 'Citas activas'],
        series: [
            {
            data: [ {{ $TotalPacientes }}, {{ $PacientesActivos }}, {{ $PacientesInactivos }}, {{ $CitasActivas}} ]
            }
        ]
        };

        /* Inicializar el gráfico con la configuración anterior */
        new Chartist.Line('#my-chart', data, options, responsiveOptions);
    @endif
    
    var data2 = {
        labels: [' Ejercicios Asignados', 'Ejercicios activos', 'Ejercicios incumplidos', 'Ejercicios realizados'],
        series: [
            {
            data: [ {{ $EjerciciosAsignados }}, {{ $EjerciciosActivos }}, {{ $EjerciciosIncumplidos }}, {{ $EjerciciosRealizados }} ]
            }
        ]
    };
    new Chartist.Line('#my-chart2', data2, options, responsiveOptions);
</script>
@endsection