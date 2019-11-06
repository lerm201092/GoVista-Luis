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
@endsection

@section('content')

<div class="row pl-3 pr-3">

    <div class="card col-md-12">
        <div class="card-body px-4">
			<p style="color :#869099; font-weight:600; font-size: 19px; border-bottom: 1px solid #d5d5d5; padding-bottom:10px; margin-bottom: 35px;">Editar cita</h4>
            
            <div class="row">            
                <div class="col-xl-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Paciente</label>
                        {{ Form::text('paciente', "".$cita->tipodoc.". ".$cita->numdoc." - ".$cita->name1." ".$cita->surname1 , array('class' => 'mat-input', 'required' => 'required', 'style'=>'width:80%', 'disabled' => 'disabled')) }}
                        <a href="#" class="cl-morado" style="font-size: 18px; float:right" title="Buscar Paciente"><span class="fa fa-search"></span></a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Medico</label>
                        {{ Form::text('paciente', $cita->name , array('class' => 'mat-input', 'required' => 'required')) }}
                    </div>
                </div>
                <div class="col-xl-6 pt-4">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Motivo de consulta</label>
                        {!! Form::textarea('keterangan', ucwords(strtolower($cita->title)), array('class' => 'mat-input', 'rows' => 3, 'cols' => 54, 'style' => 'resize:none' ))!!}
                    </div>
                </div>                
                <div class="col-xl-6 pt-4">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Descripción de consulta </label>
                        {!! Form::textarea('keterangan', ucwords(strtolower($cita->body)), array('class' => 'mat-input', 'rows' => 3, 'cols' => 54, 'style' => 'resize:none' ))!!}
                    </div>
                </div>                

                <div class="col-xl-6 pt-4">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Paciente</label>
                        {{ Form::date('birthdate', $cita->start, array('class' => 'mat-input')) }}
                    </div>
                </div>                
            </div>

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