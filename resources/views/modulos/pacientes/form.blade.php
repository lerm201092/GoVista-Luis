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
                    <a class="nav-link active" data-toggle="tab" href="#tab1-form"><span class="	fas fa-address-card mr-2"></span><span class="text-tab">Datos Personales</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab2-form"><span class="	fas fa-briefcase-medical mr-2"></span><span class="text-tab d-none">Afiliación</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab3-form"><span class="fas fa-phone mr-2"></span><span class="text-tab d-none">Contacto</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab4-form"><span class="fas fa-phone-slash mr-2"></span><span class="text-tab d-none">Contacto Emergencia</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab5-form"><span class="fas fa-users mr-2"></span><span class="text-tab d-none">Datos Padres</span></a>
                </li>
            </ul>

            <form action="{{ route('modulos.pacientes.update', $paciente->id) }}" method="POST">
				@method('put')
				@csrf
                <!-- Tab panes -->
                <div class="tab-content p-0" style="border:1px solid #dee2e6; border-top: none">
                <div class="tab-pane container active p-4" id="tab1-form"> @include('modulos.pacientes.tabs-form.tab1')</div>
                <div class="tab-pane container fade p-4" id="tab2-form"> @include('modulos.pacientes.tabs-form.tab2')</div>
                <div class="tab-pane container fade p-4" id="tab3-form"> @include('modulos.pacientes.tabs-form.tab3')</div>
                <div class="tab-pane container fade p-4" id="tab4-form"> @include('modulos.pacientes.tabs-form.tab4')</div>
                <div class="tab-pane container fade p-4" id="tab5-form"> @include('modulos.pacientes.tabs-form.tab5')</div>
              </div>
              
              </div>
              <div class="row pb-4">
                  <div class="col-sm-6 text-left">
                      <a href="{{ route('modulos.pacientes.listado') }}" class="btn bg-morado text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a> 
                  </div>
                <div class="col-sm-6 text-right">
                {!! Form::submit( 'Actualizar', ['class' => 'btn bg-morado text-light']) !!} 	
                </div>           
              </div>
            </form>

  

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

    function onchange_dpto(dpto_cmb){
		var sel_dpto      = dpto_cmb.attr("id");
		var dpto_zona     = dpto_cmb.val();
		var sel_municipio = dpto_cmb.attr("munid_cmb"), sel_municipio = $("#"+sel_municipio);

		sel_municipio.html("");
		sel_municipio.append("<option value='0'>- Escoja un municipio -</option>");
		$.ajax({
			type: 'GET',
			url: "{!!URL::to('/Areas/municipios')!!}",
			data: {'dpto_zona': dpto_zona},
			success: function (data) {
				$.each(data, function (i, json) {
					sel_municipio.append("<option value='"+json.id+"'>"+json.nomarea+"</option>");
				});                      
			}
		});
    }
</script>

@endsection