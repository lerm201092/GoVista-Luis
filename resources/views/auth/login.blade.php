@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
    <script type="text/javascript">

        function username_onblur() {
            var txtUserName = $("#username").val();
            var op="";
            if (txtUserName.length > 0) {
                $("#companies").html("<option value=''>- Escoja una opción -</option>");
                $.get("{{ asset('/userEmpresa_Login')}}", {id: txtUserName})
                .done(function (data) {                   
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id_empresa + '">' + MaysPrimera(data[i].nombre) + '</option>';
                    }
                    $("#companies").append(op);
                });
            }
        }

        function MaysPrimera(string){
            string = string.toLowerCase();
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

    </script>
@endsection