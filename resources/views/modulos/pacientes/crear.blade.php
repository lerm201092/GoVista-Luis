@extends('layouts.medico')
@section('head')
    <link href="{{ asset('css/PacientesCrear.css') }}" rel="stylesheet">
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
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="tabs-ver"> 
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab1-form"><span class="fas fa-address-card mr-2"></span><span class="text-tab">Datos Personales</span></a>
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

            <form action="{{ route('modulos.pacientes.insert') }}" method="POST">
				@method('put')
				@csrf
                
                {!! Form::hidden('created_user', Auth::user()->username, ['class' => 'form-control']) !!}
                {!! Form::hidden('id_empresa', $id_empresa, ['class' => 'form-control']) !!}
                {!! Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']) !!}	

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
                {!! Form::submit( 'Agregar', ['class' => 'btn bg-morado text-light']) !!} 	
                </div>           
              </div>

            </form>

  

    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('js/PacientesCrear.js') }}" defer></script>
@endsection