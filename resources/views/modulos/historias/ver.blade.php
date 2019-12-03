@extends('layouts.medico')
@section('head')
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
        color:#5eb562; 
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
                <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold">DATOS DE CREACION DE CONSULTA<span onclick="$('#div_fil_1').toggle(); icono($(this))" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>
                <div id="div_fil_1" style="width:95%; margin:0 auto">
                    <!-- FILA 1 -->
                    <div class="row p-0">   
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Nombre Paciente</label>
                            {!! Form::text('title', ucwords(strtolower($paciente->name1.' '.$paciente->name2)), array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>     
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Apellido Paciente</label>
                            {!! Form::text('title', ucwords(strtolower($paciente->surname1.' '.$paciente->surname2)), array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>   
                        <div class="col-lg-2 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Edad</label>
                            {!! Form::text('title', $edad.' años' ?? 0, array('class' => 'mat-input', 'disabled' )) !!}
                            </div>
                        </div>   
                        <div class="col-lg-2 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Fecha historia clinica</label>
                            {!! Form::text('title', $historia->historydate, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
           <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="tabs-ver"> 
                <li class="nav-item">
                    <a class="nav-link active text-center" data-toggle="tab" href="#tab1-form"><span class="text-tab text-center"><span class="fas fa-home mr-1"></span>Antecendentes<br>Medicos</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab2-form"><span class="text-tab text-center">Anamnesis<br>&nbsp;</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab3-form"><span class="text-tab text-center">Agudeza<br>Visual (AV)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab4-form"><span class="text-tab text-center">Funcional<br>Optometria</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab5-form"><span class="text-tab text-center">Motilidad<br>Ocular</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab6-form"><span class="text-tab text-center">Diagnostico<br>&nbsp;</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab7-form"><span class="text-tab text-center">Asignar<br>Ejercicios</span></a>
                </li>
            </ul>

            <form action="{{ route('modulos.historiaclinica.insert') }}" method="POST">
				@method('put')
				@csrf


                <!-- Tab panes -->
                <div class="tab-content p-0" style="border:1px solid #dee2e6; border-top: none">
                    <div class="tab-pane container active p-4" id="tab1-form"> @include('modulos.historias.tabs-show.tab1')</div>
                    <div class="tab-pane container p-4" id="tab2-form">        @include('modulos.historias.tabs-show.tab2')</div>
                    <div class="tab-pane container p-4" id="tab3-form">        @include('modulos.historias.tabs-show.tab3')</div>
                    <div class="tab-pane container p-4" id="tab4-form">        @include('modulos.historias.tabs-show.tab4')</div>
                    <div class="tab-pane container p-4" id="tab5-form">        @include('modulos.historias.tabs-show.tab5')</div>
                    <div class="tab-pane container p-4" id="tab6-form">        @include('modulos.historias.tabs-show.tab6')</div>
                    <div class="tab-pane container p-4" id="tab7-form">        @include('modulos.historias.tabs-show.tab7')</div>
                
                </div>
              
              </div>
              <div class="row pb-4">
                  <div class="col-sm-6 text-left">
                      <a href="{{ route('modulos.pacientes.listado') }}" class="btn bg-morado text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a> 
                  </div>
                <div class="col-sm-6 text-right">
                {!! Form::submit( 'Agregar', ['class' => 'btn bg-morado text-light']) !!} 	
                </div>           
              </div>

            </form>

  

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
</script>
@endsection