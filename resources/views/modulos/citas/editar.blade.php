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

        ul#tabs-ver .nav-item .nav-link{
          font-weight:400;
          color: #aba8a8!important;
		}
		
		.card-body p{
			font-size:14px;
        }
        
        textarea{
            border: none!important;
        }
        ul#tabs-ver  .nav-item .active{
  font-weight:600;
  color: #9c27b0!important;
}

	</style>

<link href="{{ asset('/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
@endsection

@section('content')

<div class="row pl-3 pr-3">

    <div class="card col-md-12">
        <div class="card-body px-4">
			<p style="color :#869099; font-weight:600; font-size: 19px; border-bottom: 1px solid #d5d5d5; padding-bottom:10px; margin-bottom: 35px;">Editar cita</h4>     
			<div class="container">       
				<form action="{{ route('modulos.citas.update', $cita->id) }}" method="POST">
					@method('put')
					@csrf

					<div class="row  px-4"> 
						<div class="col-xl-6">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label">Paciente</label>
								{{ Form::text('paciente', "".$cita->tipodoc.". ".$cita->numdoc." - ".$cita->name1." ".$cita->surname1 , array('class' => 'mat-input', 'required' => 'required', 'style'=>'width:80%; cursor:pointer!important;', 'disabled' )) }}
								<a class="text-dark" style="font-size: 18px; float:right" title="Buscar Paciente"><span class="fas fa-lock mr-1"></span> <span class="fa fa-search mr-1"></span></a>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label">Medico</label>
								{{ Form::text('paciente', $cita->name , array('class' => 'mat-input', 'required' => 'required', 'disabled', 'style'=>'width:80%;')) }}
								<a class="text-dark" style="font-size: 18px; float:right" title="Buscar Paciente"><span class="fas fa-lock mr-1"></span></a>
							</div>
						</div>
						<div class="col-xl-6 pt-4">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label">Motivo de consulta</label>
								{!! Form::textarea('title', ucwords(strtolower($cita->title)), array('class' => 'mat-input', 'required' => 'required', 'rows' => 3, 'cols' => 54, 'style' => 'resize:none' ))!!}
							</div>
						</div>                
						<div class="col-xl-6 pt-4">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label">Descripción de consulta </label>
								{!! Form::textarea('body', ucwords(strtolower($cita->body)), array('class' => 'mat-input', 'required' => 'required', 'rows' => 3, 'cols' => 54, 'style' => 'resize:none' ))!!}
							</div>
						</div>                

						<div class="col-xl-6 pt-4">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label mb-0">Fecha/Hora Cita inicial </label>
								<div class="form-group mb-0">
									<div class="input-group date form_datetime border-0" data-date="2019-11-01T08:00:07Z" data-date-format="dd-mm-yyyy  HH:ii" data-link-field="dtp_input1">
										<input class="form-control border-0" size="16" type="text" value="{{ $fecha }}" readonly style="background: transparent" name="start">
										<div class="input-group-prepend mb-0 p-2">
												<span class="input-group-addon"><span class="glyphicon glyphicon-remove fas fa-times cl-rojo"></span></span>									
										</div>
										<div class="input-group-prepend mb-0 p-2">
												<span class="input-group-addon"><span class="glyphicon glyphicon-th far fa-calendar-alt cl-verde"></span></span>									
										</div>							
									</div>
								</div>
							</div>
						</div>  

						<div class="col-xl-6 pt-4">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label">Estado</label>
								{{ Form::select('state', $json_estado, $cita->state, array('class' => 'mat-input p-1', 'required' => 'required')) }}
							</div>
						</div> 
					</div>
					<br><br>
					<div class="row pt-4">
						<div class="col-12 text-right">
							<a href="{{ route('modulos.citas.listado') }}" class="btn bg-rojo text-light "><span class="fas fa-caret-left mr-2"></span>Regresar</a>
							{!! Form::button( '<span class="fas fa-check"></span> Actualizar', ['class' => 'btn bg-verde text-light ', 'type'=>'submit']) !!} 	
						</div>				
					</div>		
				</form>	
			</div>     
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
<script type="text/javascript" src="{{ asset('/vendor/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('/vendor/datetimepicker/js/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>
<script>
  $("#li-citas").addClass("active");
  $(".mat-input").focus(function(){
    $(this).parent().addClass("is-active is-completed");
  });

  $(".mat-input").focusout(function(){
    if($(this).val() === "")
      $(this).parent().removeClass("is-completed");
      $(this).parent().removeClass("is-active");
    })

    $('.form_datetime').datetimepicker({
		language: 'es',
        weekStart: 1,
        todayBtn:  1,
		    autoclose: 1,
		    todayHighlight: 1,
		    startView: 2,
		    forceParse: 0,
        showMeridian: 1
    });

</script>

@endsection