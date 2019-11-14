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
            color:#12b8cd!important; 
        }

        .cl-morado{
            color:#9c27b0; 
        }

        .cl-morado-light{
            color:#a088a4!important; 
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
				<form action="{{ route('modulos.citas.insert') }}" method="POST">
					@method('put')
					@csrf

					<div class="row  px-4"> 
						<div class="col-xl-6">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label">Paciente</label>
								{!! Form::text('paciente', '' , array('class' => 'mat-input', 'required' => 'required' , 'disabled', 'style'=>'width:80%;' )) !!}
                                {!! Form::hidden('id_patient', '', ['class' => 'form-control']) !!}
                                <a style="font-size: 18px; float:right; cursor:pointer; " class="cl-azul" title="Buscar Paciente" onclick="modal()"><span class="fa fa-search mr-1"></span></a>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label">Medico</label>
								{{ Form::text('medico', $medico['nombre'], array('class' => 'mat-input', 'required' => 'required', 'disabled')) }}
							</div>
						</div>
						<div class="col-xl-6 pt-4">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label">Motivo de consulta</label>
								{!! Form::textarea('title', '', array('class' => 'mat-input', 'required' => 'required', 'rows' => 3, 'cols' => 54, 'style' => 'resize:none' )) !!}
							</div>
						</div>                
						<div class="col-xl-6 pt-4">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label">Descripción de consulta </label>
								{!! Form::textarea('body', '', array('class' => 'mat-input', 'required' => 'required', 'rows' => 3, 'cols' => 54, 'style' => 'resize:none' )) !!}
							</div>
						</div>                

						<div class="col-xl-6 pt-4">
							<div class="mat-div is-completed">
								<label for="first-name" class="mat-label mb-0">Fecha/Hora Cita inicial </label>
								<div class="form-group mb-0">
									<div class="input-group date form_datetime border-0" data-date="2019-11-01T08:00:07Z" data-date-format="dd-mm-yyyy  HH:ii" data-link-field="dtp_input1">
										<input class="form-control border-0" size="16" type="text" value="" readonly style="background: transparent" name="start">
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
								{{ Form::select('state', $json_estado, '', array('class' => 'mat-input p-1', 'required' => 'required')) }}
							</div>
						</div> 
					</div>
					<br><br>
					<div class="row pt-4">
						<div class="col-12 text-right">
							<a href="{{ route('modulos.citas.listado') }}" class="btn bg-rojo text-light "><span class="fas fa-caret-left mr-2"></span>Regresar</a>
							{!! Form::button( '<span class="fas fa-check mr-2"></span> Crear', ['class' => 'btn bg-azul text-light ', 'type'=>'submit']) !!} 	
						</div>				
					</div>	

                    {!! Form::hidden('created_user', Auth::user()->username, ['class' => 'form-control']) !!}
                    {!! Form::hidden('nombrePaciente', '', ['class' => 'form-control']) !!}
                    {!! Form::hidden('id_empresa', $id_empresa, ['class' => 'form-control']) !!}
                    {!! Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']) !!}	
                    {!! Form::hidden('id_medico', $medico['id'], ['class' => 'form-control']) !!}	
				</form>	
			</div>     
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de la cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Buscar Paciente</label>
                            {{ Form::text('textBuscar', '' , array('class' => 'mat-input', 'required' => 'required', 'style'=>'width:80%;')) }}
                            <a style="font-size: 18px; float:right; cursor:pointer" title="Buscar Paciente" onclick="buscarPacientes()"><span class="fa fa-search mr-1 cl-azul"></span></a>
                    </div>
                </div>
            </div> 
            <div class="row mt-3">
                <div class="col-12 ">
                    <p class="col-12 text-center bg-light p-2 m-0 cl-morado-light font-weight-bold mt-3 border">Listado de pacientes</p>
                    <table class="col-12 table-bordered" id="tbl_pacientes">                        
                        <thead class="bg-light cl-morado-light border">
                            <th class="pl-2">Nombre Paciente</th>
                            <th class="pl-2">Documento</th>
                            <th class="pl-2">Sel.</th>
                        </thead>
                        <tbody>
                            <tr><td colspan="3" class="pl-2">No hay registros</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>          
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

    function modal(){
        $("#exampleModal").modal("show");
    }

    function buscarPacientes(){
        var filtro = $("input[name=textBuscar]").val();
        $.get("{{ asset('/modulos/pacientes/buscar_json')}}", {keyword: filtro})
        .done(function (data) {                   
            var n = data["pacientes"]["data"].length;
            var json = data["pacientes"]["data"];
            if( n > 0 ){ $("#tbl_pacientes tbody").html(""); }
            for(var i = 0; i<n; i++){
                var id = json[i].id;
                $("#tbl_pacientes tbody").append("<tr>    <td class='pl-2' tipo='nomPaciente' id='" + id  +"'>" + MaysPrimera(json[i].name1) + " " + MaysPrimera(json[i].surname1)  + "</td>  <td class='pl-2' tipo='docPaciente' id='" + id + "'> ( "+json[i].tipodoc +" ) " + json[i].numdoc + " </td>  <td class='text-center'> <span tipo='check_paciente' id='"+id+"' class='fas fa-check cl-verde'></span></td>    </tr>")
            }

            $("span[tipo=check_paciente]").click(function(){
                var id_td = $(this).attr("id");
                var texto = $("td[tipo=docPaciente][id="+id_td+"]").text() + " - " + $("td[tipo=nomPaciente][id="+id_td+"]").text();
                $("input[name=nombrePaciente]").val($("td[tipo=nomPaciente][id="+id_td+"]").text());
                $("input[name=paciente]").val(texto);
                $("input[name=id_patient]").val(id_td);
                $("#exampleModal").modal("hide");
            });
        });
    }

    function MaysPrimera(string){
            string = string.toLowerCase();
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
</script>

@endsection