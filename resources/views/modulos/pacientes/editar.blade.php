@extends('layouts.medico')

@section('head')
  <link href="{{ asset('css/PacientesEditar.css') }}" rel="stylesheet">
  <style>  
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

.swal2-container.swal2-backdrop-show {
    background: rgba(0,0,0,.79)!important;
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
                    <a class="nav-link active" data-toggle="tab" href="#tab1-form"><span class="fas fa-address-card mr-2"></span><span class="text-tab">Datos Personales</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab2-form"><span class="fas fa-briefcase-medical mr-2"></span><span class="text-tab d-none">Afiliación</span></a>
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

            <form action="{{ route('modulos.pacientes.update', $paciente->id) }}" method="POST" id="formulario">
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
                {!! Form::submit( 'Actualizar', ['class' => 'btn bg-morado text-light', 'onclick' => 'cargando(1)']) !!} 	
                </div>           
              </div>
            </form>
         </div>
</div>

@endsection

@section('script')
  <script src="{{ asset('js/PacientesEditar.js') }}" defer></script>
  <script type="text/javascript">
      var form = document.getElementById('formulario')[0];
      alert("hola");
form.addEventListener("submit", function (event) {
    alert("hola");
  // Cada vez que el usuario intenta enviar los datos, verificamos
  // si el campo de correo es válido.
  if (!email.validity.valid) {
    
    // Si el campo no es válido, mostramos un mensaje de error.
    error.innerHTML = "¡Yo esperaba una dirección de correo, cariño!";
    error.className = "error active";
    // Y prevenimos que el formulario sea enviado, cancelando el evento
    event.preventDefault();
  }
}, function(event){alert("hola");});
        function cargando( status ){            
            if(status == 1){     
                console.log("Cargando Encendido ...");
                let timerInterval
                Swal.fire({                
                html: `<p><span style="font-size:30px" class="cl-rojo font-weight-bold">GO</span><span style="font-size:22px" class="cl-azul font-weight-bold">Vista</span><br></p><p style="font-size:14px; color: grey; font-weight: 600">Cargando información, espere un momento ...</p>`,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.timer
                ) {
                    console.log('I was closed by the timer') // eslint-disable-line
                }
                })
            }else{
                console.log("Cargando Apagado ...");
                Swal.close();
            }
        }
    </script>
@endsection