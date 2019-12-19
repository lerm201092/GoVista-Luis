@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Acceso al sistema') }}</div>

                <div class="card-body">
                    <div class="col-12 text-center mb-4">
                        <img src="{{ asset('img/logo-200-53.png') }}" alt="Imagen de logo" srcset="" style="max-width: 200px;">
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {!! Form::hidden('roluser', null, array('class' => 'mat-input')) !!}
                        <div class="form-group row mt-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Usuario:</label>

                            <div class="col-md-6">
                                <input onblur="username_onblur()" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="email" autofocus >

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="companies" class="col-md-4 col-form-label text-md-right">Empresa</label>

                            <div class="col-md-6">
                                <select id="companies" class="form-control @error('password') is-invalid @enderror" name="companies" required>
                                    <option value="">- Escoja una opción -</option>
                                </select>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-4 offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Iniciar sesion') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('/vendor/sweetalert/sweetalert.js') }}"></script>
    <script type="text/javascript">

        cargando( 'on' );

        function username_onblur() {
            var txtUserName = $("#username").val();
            var op="";
            if (txtUserName.length > 0) {
                $("#companies").html("<option value=''>- Escoja una opción -</option>");
                $.get("{{ asset('/userEmpresa_Login')}}", {id: txtUserName})
                .done(function (data) {   
                    console.log(data);                
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id_empresa + '" rol="' + data[i].roluser + '">' + MaysPrimera(data[i].nombre) + '</option>';
                    }
                    $("#companies").append(op);
                    $("#companies").on("change", function(){
                        
                        var rol = $("#companies option:selected" ).attr('rol');
                        $("input[name=roluser]").val(rol);
                        
                        
                    });
                });
            }

        }


        function MaysPrimera(string){
            string = string.toLowerCase();
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function cargando( status ){
            if(status == "on"){            
                let timerInterval
                Swal.fire({
                html: '<span>Cargando, espere un momento ...</span>',
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    Swal.getContent().querySelector('b')
                        .textContent = Swal.getTimerLeft()
                    }, 100)
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
                Swal.close();
            }
        }

    </script>
@endsection