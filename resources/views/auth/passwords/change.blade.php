@extends( Session::get('roluser') ==  3 ? 'layouts.medico' : 'layouts.paciente')
@section('head')
    <style>
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

        .alert-danger {
            color: #a94442!important;
            background-color: #f2dede!important;
            border-color: #ebccd1!important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        <div class="card-header">
                            <span class="titlePage">Cambiar Contraseña:</span>
                        </div>
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}    
                                </div>
                            @endif

                                {{ csrf_field() }}					
                                <div class="form-group row">
                                    <label for="current-password" class="col-md-4 col-form-label text-md-right">Contraseña Actual</label>
                                    <div class="col-md-6">
                                        <input id="current-password" type="password" class="form-control" name="current-password" data-toggle="password" required />
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current-password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>							

                                <div class="form-group row">
                                    <label for="new-password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>
                                    <div class="col-md-6">
                                        <input id="new-password" type="password" onkeyup="confirmarClave()" class="form-control confirm-pass" name="new-password" data-toggle="password" required />
                                        @if ($errors->has('new-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('new-password') }}</strong>
                                            </span>	
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="new-password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Nueva Contraseña</label>
                                    <div class="col-md-6">
                                        <input id="new-password-confirm" type="password" onkeyup="confirmarClave()" class="form-control confirm-pass" name="new-password-confirm" data-toggle="password" required />
                                        @if ($errors->has('new-password-confirm'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('new-password-confirm') }}</strong>
                                            </span>
                                        @endif
                                        <span id="igual-pass"></span>
                                    </div>
                                </div>	

                                <!-- Alert message -->								
                                @if(Session::has('flash_message'))
                                    <div class="alert alert-danger">
                                        <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error:&nbsp;</strong>{{ Session::get('flash_message') }}
                                    </div>
                                @endif					
                            
                            </div>
                            <div class="card-footer text-right">
                                <button id="btn-actualizar" type="submit" disabled class="btn bg-morado text-light">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>                    

                </div>
            </div>
        </div>
    </div>	
    <!-- Alert message -->	
    <script type="text/javascript">



        window.setTimeout(function() {
            $(".alert").slideToggle(500, function (){
                $(this).remove(); 
            });
        }, 5000);

        function confirmarClave(){
            var input1 = document.getElementById("new-password");           
            var input2 = document.getElementById("new-password-confirm");
            if(input1.value.length >= 4){
                if(input1.value == input2.value){
                    $("#btn-actualizar").removeAttr("disabled");
                }else{
                    $("#btn-actualizar").attr("disabled", "disabled");
                }
            }else{
                $("#btn-actualizar").attr("disabled", "disabled");
            }
        }
    </script>
@endsection
