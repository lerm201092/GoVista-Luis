@extends( Session::get('roluser') ==  3 ? 'layouts.medico' : 'layouts.paciente')

@section('head')

<style>
#tbl-pacientes thead th{
color:#9c27b0;
padding: 2px 5px 2px;
font-size: 15px;   
 border: none;
}
#tbl-pacientes tbody tr td{
color: gray;
padding: 4px 5px 4px;
font-size: 14px;
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

ul.pagination{
float:right;
}

.alert-success{
color: #468847!important;
background-color: #dff0d8!important;
border-color: #d6e9c6!important;
}   
ul#tabs-ver .nav-item .nav-link{
            font-weight:400;
            color: #aba8a8!important;
          }
          ul#tabs-ver  .nav-item .active{
    font-weight:600;
    color: #9c27b0!important;
  }

  .ocultar-movil{
      display: table-cell;
  }

  /* Smartphones (landscape) */
@media only screen 
and (max-width : 864px) {

    .ocultar-movil{
      display: none;
  }
}


</style>
    <link rel="stylesheet" href="{{ asset('exercises/exercise_'.$exercise.'/TemplateData/style.css') }}">
    <script src="{{ asset('exercises/exercise_'.$exercise.'/TemplateData/UnityProgress.js') }}"></script>
    <script src="{{ asset('exercises/exercise_'.$exercise.'/Build/UnityLoader.js') }}"></script>
    <script>
        var gameInstance = UnityLoader.instantiate("gameContainer", "{{ asset('exercises/exercise_'.$exercise.'/Build/exercise-'.$exercise.'.json') }}");
        document.addEventListener("DOMContentLoaded", function(event) {
            var li = document.getElementById("li-ejercicios");
            li.className += " active";
        });
    </script>
         <script>

function SetData() {
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetUserName',".'"'.$username .'")' !!};
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetId',". $exercise  .')' !!};
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetIdHis',". $id_his  .')' !!};
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetDuration',".  $duracion .')' !!};
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetSize', ". $size   .')' !!};
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetLeft', ".'"'.$eyel.'")' !!};
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetRight', ".'"'. $eyer .'")' !!};
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetAge', ". $edad .')' !!};
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetStatus', ".'"'. $status .'")' !!};
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetReturnUrl',".'"'. url('/modulos/ejercicios/listado') .'")' !!};//url a la cual volver cuando se termine el juego o el jugador se salga por el menu de pause
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetSnellenValues',".'"'. '-' .'")' !!};//en caso de que se quieran sobreescribir los valores de la tabla de snellen, si no dejar asi
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetPlayDistance',". '0'.')' !!};//en caso de que se quiera cambiar la distancia de juego por defecto, actualmente 1m, si no dejar asi
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetCoins', ". $coins .')' !!};//monedas ganadas por el jugador, acciones acertadas
    {!! "gameInstance.SendMessage('MinigameHUD', 'SetStars', ". $starts .')' !!};//estrellas ganadas por el jugador, juegos completados exitosamente
}

var isAjaxState = false;
function SaveData(id, id_history, duration, Failure, Progress, status_game, coins, stars)//metodo llamado por el juego para guardar los datos
{

    alert("HOLA MUNDO");
       $.ajax({url: "{!!URL::to('/saveExerciceId')!!}",
    async: false,
    type: 'GET',
    timeout: 60000,
    data: {
        id: {{ $id }},
        duration: duration,
        status: status_game,
        coins: coins,
        stars: stars,
        failure: Failure,
        progress: Progress
    },              			
        success: function(result, status, xhr){					 
             if (status == "success") { 
                 isAjaxState = true; }
    },
        error: function(result, status, xhr){  				 
            console.clear();
            console.log(result);
            console.log(xhr);
             isAjaxState = false;
    }
    });
    
}

function ForceSave() { 
    // Intento de que al jugador cerrar el navegador primero guarde los datos de juego, no estoy seguro de si esta funcionando correctamten igual es opcional
    if (!isAjaxState) {
    gameInstance.SendMessage('MinigameHUD','ForceSave');
    }
}

window.onbeforeunload = function() { 
    // Funciona con el metodo de arriba		    
    if (!isAjaxState) {
    ForceSave();
    }
    return "asd";
}
</script>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">                    
                    <div class="container">
                        <p style="color :#869099; font-weight:600; font-size: 19px;">Ejercicio N° {{ $exercise }}</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="panel-body text-canteer">
                                    <div id="gameContainer" style="width:100%; height: auto;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-4 pl-4">
                            <a href="{{ route('modulos.ejercicios.listado') }}" class="btn bg-morado text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')


    <script>
        function respuesta(id, duration, status) {			
            $.get("{!!URL::to('/saveExerciceId')!!}", {
                id: id,
                duration: duration,
                status: status
            }, function (data) {
                $("#get-container").html(
                    "<div class='alert alert-success'><span><b> Info - </b></span>" + data[0].observation + " - Sesión Terminada</div>"
                );
            });		
        }
    </script>
@endsection

