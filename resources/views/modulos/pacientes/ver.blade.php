@extends('layouts.medico')

@section('head')
<style>

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
	</style>
@endsection

@section('content')

<div class="row pl-3 pr-3">

    <div class="card col-md-12">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="tabs-ver"> 
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab1-show"><span class="	fas fa-address-card mr-2"></span><span class="text-tab">Datos Personales</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab2-show"><span class="	fas fa-briefcase-medical mr-2"></span><span class="text-tab d-none">Afiliación</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab3-show"><span class="fas fa-phone mr-2"></span><span class="text-tab d-none">Contacto</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab4-show"><span class="fas fa-phone-slash mr-2"></span><span class="text-tab d-none">Contacto Emergencia</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab5-show"><span class="fas fa-users mr-2"></span><span class="text-tab d-none">Datos Padres</span></a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-0" style="border:1px solid #dee2e6; border-top: none">
                <div class="tab-pane container active p-4" id="tab1-show"> @include('modulos.pacientes.tabs-show.tab1')</div>
                <div class="tab-pane container fade p-4" id="tab2-show"> @include('modulos.pacientes.tabs-show.tab2')</div>
                <div class="tab-pane container fade p-4" id="tab3-show"> @include('modulos.pacientes.tabs-show.tab3')</div>
                <div class="tab-pane container fade p-4" id="tab4-show"> @include('modulos.pacientes.tabs-show.tab4')</div>
                <div class="tab-pane container fade p-4" id="tab5-show"> @include('modulos.pacientes.tabs-show.tab5')</div>
            </div>

        </div>
        <div class="row pb-4 pl-4">
           <a href="{{ route('modulos.pacientes.listado') }}" class="btn bg-morado text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a>
        </div>

    </div>
</div>

@endsection

@section('script')
<script>
  $("#li-pacientes").addClass("active");
  $(".mat-input").focus(function(){
    $(this).parent().addClass("is-active is-completed");
  });

  $(".mat-input").focusout(function(){
    if($(this).val() === "")
      $(this).parent().removeClass("is-completed");
      $(this).parent().removeClass("is-active");
    })

    $("#tabs-ver .nav-item").click(function(){
        $("#tabs-ver .nav-item .nav-link .text-tab").addClass('d-none');
        $(this).children('.nav-link').children('.text-tab').removeClass('d-none')
    });

</script>

@endsection