@extends('layouts.medico')
@section('head')

<link href="/vendor/chartist/chartist.min.css" rel="stylesheet" />
<script type="text/javascript" src="/vendor/chartist/chartist.min.js"></script>
    <style>
    #tabs-ver li a.nav-link{
        font-size:13px;

    }
    
.mat-label {
    display: block;
    font-size: 14px;
    font-weight:450!important;
    transform: translateY(25px);
    color: gray;
    transition: all 0.2s;
  }
  
  .mat-input {
    position: relative;
    background: transparent;
    width: 100%;
    border: none;
    outline: none;
    padding: 2px 0;
    font-size: 16px;
    border-bottom: .5px solid #e4e4e4;
  }
  
    
  .mat-div {
    padding: 10px 0 0 0;  
    position: relative;
  }
  
  .mat-div:after, .mat-div:before {
    content: "";
    position: absolute;
    display: block;
    width: 100%;
    height: 2px;
    background-color: #e2e2e2; 
    bottom: 0;
    left: 0;
    transition: all 0.2s;
  }
  
  .mat-div::after {
    background-color: #8E8DBE;
    transform: scaleX(0);
  }
  
  .is-active::after {
    transform: scaleX(1);
  }
  
  .is-active .mat-label {
    color: #8E8DBE;
  }
  
  .is-completed .mat-label {
    font-size: 13px;
    transform: translateY(0);
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
  
    ul#tabs-ver .nav-item .nav-link{
        font-weight:400;
        color: #aba8a8!important;
    }
    ul#tabs-ver  .nav-item .active{
        font-weight:600;
        color: #9c27b0!important;
    }
  
    .alert-danger {
        color: #a94442!important;
        background-color: #f2dede!important;
        border-color: #ebccd1!important;
    }
    textarea{
            border: none!important;
    }

    .cl-verde{
        color:#5eb562!important; 
    }

    .cl-amarillo{
        color:#fc9208; 
    }

    .cl-rojo{
        color:#ec4a47; 
    }

    .cl-azul{
        color:#12b8cd!important; 
    }

    .cl-morado{
        color:#9c27b0; 
    }

    .cl-morado-light{
        color:#a088a4!important; 
    }

    .titulo-row{
        background: #f1f1f1;
        font-size: 14px;
    }

    .mat-input{
        font-size: 14px;
    }

    .card{
    margin-bottom:25px;
}
.iconos-cajas{
    color:white; 
    border-radius:2px;
    -webkit-box-shadow: 0px 1px 15px -7px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 1px 15px -7px rgba(0,0,0,0.75);
    box-shadow: 0px 1px 15px -7px rgba(0,0,0,0.75);
    position:absolute;
    top:-15px;
    padding: 0;
    text-align:center;
    font-size: 24px;
    line-height: 53px;
    width: 56px;
    height: 56px;
}

.titulos-cajas{
    font-size:16px; 
    color: gray;
    margin-bottom:0px;
}

.valores-cajas{
    font-size:22px; 
    font-weight: 600; 
    margin-top:0;
    margin-bottom:2px;
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

.ct-series-a .ct-line, .ct-series-a .ct-point  {
    /* Set the colour of this series line */
    stroke: #9c27b0;
    /* Control the thikness of your lines */
    stroke-width: 5px;
  }
  
  .ct-series-a .ct-point  {
    /* Set the colour of this series line */
    stroke: #9c27b0;
    /* Control the thikness of your lines */
    stroke-width: 10px;
  }

  .p-sub-cuadro{
    padding-right: 2px;
    padding-left: 2px;
    color: gray;
    border-top: .5px solid #e3e3e3;
    width: 90%;
    margin-left: 5%;
    font-size: 10px;
    padding-top: 6px;
    margin-bottom: 9px;
  }

    .category{
        font-size: 12px
    }
    #tbl_fo thead tr{
        border-bottom: 1px solid #e1e1e1;
    }

    #tbl_fo thead tr th {
        color: #5eb562;
        font-size: 12px;
    }

    #tbl_fo tbody tr td {
        font-size: 12px;
    }

    #tbl_av thead tr{
        border-bottom: 1px solid #e1e1e1;
    }

    #tbl_av thead tr th {
        color: #5eb562;
        font-size: 12px;
    }

    #tbl_av tbody tr td {
        font-size: 12px;
    }

    </style>


@endsection 

@section('content')

        @if ($errors->any())
            <div class="row">
                <div class="col-12 px-3">
                    <div class="alert alert-danger">
                        <p><strong>¡Advertencias!</strong></p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

<div class="row pl-3 pr-3">
    <div class="card col-md-12">
        <div class="card-body">
            <!-- LENSOMETRIA -->
            <div class="row border m-0 pb-4 mb-4">
                <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold">INFORMACIÓN DE HISTORIA CLINICA<span onclick="$('#div_fil_1').toggle(); icono($(this))" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>
                <div id="div_fil_1" style="width:95%; margin:0 auto">
                    <!-- FILA 1 -->
                    <div class="row p-0">   
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Identificación</label>
                            {!! Form::text('title', ($historia->tipodoc ?? '').' '.($historia->numdoc ?? ''), array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div> 
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Nombre Paciente</label>
                            {!! Form::text('title', ucwords(strtolower(($historia->name1 ?? '').' '.($historia->name2 ?? ''))), array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>     
                        <div class="col-lg-2 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Apellido Paciente</label>
                            {!! Form::text('title', ucwords(strtolower(($historia->surname1 ?? '').' '.($historia->surname2 ?? ''))), array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>   
                        <div class="col-lg-2 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Edad</label>
                            {!! Form::text('title', $edad.' Años' ?? 0, array('class' => 'mat-input', 'disabled' )) !!}
                            </div>
                        </div>   
                        <div class="col-lg-2 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Fecha Nacimiento</label>
                            {!! Form::text('title', $historia->birthdate ?? 0, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>   
                    </div>
                </div>
            </div>




            <div class="row pt-4">
                <!-- Caja 1 -->
                <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
                    <div class="card">
                        <div class="card-body pb-0 pt-0 pl-1 pr-1">
                            <div class="row">
                                <div class="col-3 pl-2 pr-0">
                                    <span class="iconos-cajas bg-verde">
                                        <span class="fas fa-user-friends"></span>
                                    </span>
                                </div>
                                <div class="col-9 pl-0 pr-2">
                                    <div class="text-right">
                                        <p class="titulos-cajas">Consultas Medicas</p>
                                        <p class="valores-cajas">{{ $historia->cant_citas ?? 0 }}</p>
                                    </div>
                                </div>
                                <p class="p-sub-cuadro"><span class="fas fa-user-friends cl-verde mr-2"></span>Desde {{ $historia->fecha_min ?? '' }} hasta {{ $historia->fecha_max ?? '' }} <span></span></p>
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
                                        <span class="fab fa-font-awesome-flag"></span>
                                    </span>
                                </div>
                                <div class="col-9 pl-0 pr-2">
                                    <div class="text-right">
                                        <p class="titulos-cajas">Activos</p>
                                        <p class="valores-cajas">{{ $historia->ejercicios_ac ?? 0 }}</p>
                                    </div>
                                </div>
                                <p class="p-sub-cuadro"><span class="fab fa-font-awesome-flag cl-amarillo mr-2"></span>Ejercicios programados Activos</p>
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
                                        <span class="fas fa-info-circle"></span>
                                    </span>
                                </div>
                                <div class="col-9 pl-0 pr-2">
                                    <div class="text-right">
                                        <p class="titulos-cajas">Incumplidos</p>
                                        <p class="valores-cajas">{{ $historia->ejercicios_in ?? 0 }}</p>
                                    </div>
                                </div>
                                <p class="p-sub-cuadro"><span class="fas fa-info-circle cl-rojo mr-2"></span>Ejercicios programados Incumplidos</p>
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
                                        <span class="fas fa-check-double"></span>
                                    </span>
                                </div>
                                <div class="col-9 pl-0 pr-2">
                                    <div class="text-right">
                                        <p class="titulos-cajas">Realizados</p>
                                        <p class="valores-cajas">{{ $historia->ejercicios_re ?? 0 }}</p>
                                    </div>
                                </div>
                                <p class="p-sub-cuadro"><span class="fas fa-check-double cl-azul mr-2"></span>Ejercicios programados Realizados</p>
                            </div>                    
                        </div>
                    </div>           
                </div>  
            </div>


            <!-- Inicio -->
            <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="green">
                        <div class="ct-chart" id="VisualAcuityChart"></div>
                    </div>
                    <div class="card-content  p-3">
                        <h5 class="title">Agudeza Visual</h5>
                        <p class="category">Historico de informacion para los cammpos de agudeza visual.</p>
                        <div class="col-md-12">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="agudeza_visual" style="font-size: 12px; color: #5eb562;">Escoja una campo:   </label>
                                    {{ Form::select('agudeza_visual', Config::get('constantes.tipo_agudeza_visual'),'', array('class' => 'mat-input', 'onchange'=>'cambio_av()')) }}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <table id="tbl_av" class="striped tbl-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>HC #</th>
                                                <th>Valor</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">No hay registros, escoja un campo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="orange">
                        <div class="ct-chart" id="IntpupDistChart"></div>
                    </div>
                    <div class="card-content p-3">
                        <h5 class="title">Funcional optometrica</h5>
                        <p class="category">Historico de informacion para los cammpos de agudeza visual.</p>
                        <div class="col-md-12">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="funcional_optometrica" style="font-size: 12px; color: #5eb562;">Escoja una campo:   </label>
                                    {{ Form::select('funcional_optometrica', Config::get('constantes.funcional_optometrica'),'', array('class' => 'mat-input', 'onchange'=>'cambio_fo()')) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table id="tbl_fo" class="striped tbl-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>HC #</th>
                                                <th>Valor</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">No hay registros, escoja un campo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Fin -->





            
              
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
  $("#li-historias").addClass("active");
  $(".mat-input").focus(function(){
    $(this).parent().addClass("is-active is-completed");
  });

  $(".mat-input").focusout(function(){
    if($(this).val() === "")
      $(this).parent().removeClass("is-completed");
      $(this).parent().removeClass("is-active");
    })

    function icono(x){
        if(x.hasClass('fa-folder-minus')){
            x.removeClass('fas fa-folder-minus').addClass('fas fa-folder-open')
        }else{
            x.removeClass('fas fa-folder-open').addClass('fas fa-folder-minus')
        }
    }

    function cambio_av(){
        var campo = $("select[name=agudeza_visual] option:selected");
        campo = campo.val();
        $.ajax({
          type: 'GET',
          url: "{!!URL::to('/modulos/historiaclinica/agudeza_visual')!!}",
          data: {'campo': campo},
          success: function (data) {
              console.log(data);
            console.log(data.length);
            var label = new Array(), html="", datos = new Array();
            for (var i = 0; i < data.length; i++) {
                label.push('HC#'+(i+1)+' ('+data[i].id+')');
                html += "<tr><td>"+(i+1)+' ('+data[i].id+")</td><td>"+data[i][campo]+"</td><td>"+data[i]['historydate']+"</td></tr>";
                datos.push(data[i][campo]);     
            } 
            $("#tbl_av tbody").html(html);
            grafico(label, datos, 'VisualAcuityChart');
          }
      });
    }

    function cambio_fo(){
        var campo = $("select[name=funcional_optometrica] option:selected");
        campo = campo.val();
        $.ajax({
          type: 'GET',
          url: "{!!URL::to('/modulos/historiaclinica/agudeza_visual')!!}",
          data: {'campo': campo},
          success: function (data) {
              console.log(data);
            console.log(data.length);
            var label = new Array(), html="", datos = new Array();
            for (var i = 0; i < data.length; i++) {
                label.push('HC#'+(i+1)+' ('+data[i].id+')');
                html += "<tr><td>"+(i+1)+' ('+data[i].id+")</td><td>"+data[i][campo]+"</td><td>"+data[i]['historydate']+"</td></tr>";
                datos.push(data[i][campo]);     
            } 
            $("#tbl_fo tbody").html(html);
            grafico(label, datos, 'IntpupDistChart');
          }
      });
    }


    function grafico( label, valor, div ){
        var options = {
            axisX: {
                labelInterpolationFnc: function(value) {
                return '' + value;
                }
            },
            height: 300
        };

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

        var data = {
            labels: label,
            series: [{
                data: valor
            }]
        };

        new Chartist.Line('#'+div, data, options, responsiveOptions);
    }


    // fin
</script>
@endsection