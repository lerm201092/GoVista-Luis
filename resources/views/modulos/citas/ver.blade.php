@extends( Session::get('roluser') ==  3 ? 'layouts.medico' : 'layouts.paciente')

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
        ul#tabs-ver  .nav-item .active{
  font-weight:600;
  color: #9c27b0!important;
}
	</style>
@endsection

@section('content')

<div class="row pl-3 pr-3">

    <div class="card col-md-12">
        <div class="card-body px-4">
			<p style="color :#869099; font-weight:600; font-size: 19px;">Información de Cita</h4>
			<div class="row border border-left-0 border-right-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Documento</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2">{{ "( ".$cita->tipodoc." ) ".$cita->numdoc }}</p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Paciente</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2">{{ $cita->name1." ".$cita->surname1 }}</p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Motivo de consulta</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2">{{ $cita->title }}</p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Descricion de la consulta</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2">{{ $cita->body }}</p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Medico</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2">{{ $cita->numdoc }}</p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Fecha/Hora de la cita</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2">{{ $cita->start }}</p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Teléfono</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2">{{ $cita->phone }}</p></div>
			</div>


			<div class="row py-4">
				<a href="{{ route('modulos.citas.listado') }}" class="btn bg-morado text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a>
			</div>
        </div>
     

    </div>
</div>

@endsection

@section('script')
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

</script>

@endsection