<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | GoVista App</title>
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">
    <script src="TemplateData/UnityProgress.js"></script>
    <script src="Build/UnityLoader.js"></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer", "Build/GoVista.json", {onProgress: UnityProgress});
	    
		function SetData()//este se llama desde el juego en el momento que inicia, es importante que se envien todos estos metodos ya que el juego espera por esta cantidad de respuestas desde la web
		{   
			gameInstance.SendMessage('MinigameHUD','SetUserName','Juan Yo');
			gameInstance.SendMessage('MinigameHUD','SetId', 1234);
			gameInstance.SendMessage('MinigameHUD','SetIdHis', 4567);
			gameInstance.SendMessage('MinigameHUD','SetDuration', 1);
			gameInstance.SendMessage('MinigameHUD','SetSize', 8);
			gameInstance.SendMessage('MinigameHUD','SetLeft', 'Ok');
			gameInstance.SendMessage('MinigameHUD','SetRight', 'Ok');
			gameInstance.SendMessage('MinigameHUD','SetAge', 25);
			gameInstance.SendMessage('MinigameHUD','SetStatus', 'Ac');
			gameInstance.SendMessage('MinigameHUD','SetReturnUrl', 'http://localhost/');//url a la cual volver cuando se termine el juego o el jugador se salga por el menu de pause
			gameInstance.SendMessage('MinigameHUD','SetSnellenValues', '-');//en caso de que se quieran sobreescribir los valores de la tabla de snellen, si no dejar asi
			gameInstance.SendMessage('MinigameHUD','SetPlayDistance', 0);//en caso de que se quiera cambiar la distancia de juego por defecto, actualmente 1m, si no dejar asi
			gameInstance.SendMessage('MinigameHUD','SetCoins', 20);//monedas ganadas por el jugador, acciones acertadas
			gameInstance.SendMessage('MinigameHUD','SetStars', 5);//estrellas ganadas por el jugador, juegos completados exitosamente 
		}   
		
		function SaveData(id, id_history, duration, Failure, Progress, status_game, coins, stars)//metodo llamado por el juego para guardar los datos
		{
			window.alert(id + " " + id_history + " " + duration + " " + Failure + " " + Progress + " " + status_game + " " + coins + " " + stars)
		}
		
		function ForceSave() {//intento de que al jugador cerrar el navegador primero guarde los datos de juego, no estoy seguro de si esta funcionando correctamten igual es opcional
			gameInstance.SendMessage('MinigameHUD','ForceSave');
		}
		
		window.onbeforeunload = function() {//funciona con el metodo de arriba
			ForceSave();
			return "asd";
		}
    </script>
  </head>
  <body>
    <div class="webgl-content">
      <div id="gameContainer" style="width: 960px; height: 600px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">GoVista App</div>
      </div>
    </div>
  </body>
</html>
