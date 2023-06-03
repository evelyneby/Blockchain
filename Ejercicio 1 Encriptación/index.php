<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje para cifrar y descifrar</title>
  </head>
  <body>

  <h1><center> Ejercicio cifrar o descifrar texto </center></h1>
  <br>
  <br>
  <p> Escribe el texto que quieres cifrar o descifrar </p>
    <form action="index.php" method="post">
    <br>  
    <label>Texto: </label><input id="texto" name="texto" type="text">
    <input type="submit" name="encriptar" value="encriptar">
    <input type="submit" name="desencriptar" value="desencriptar">
    </form>


  </body>
</html>



<?php
include "encrip.php";
// Como usar las funciones para encriptar y desencriptar.


if (isset($_POST["encriptar"])) {
  $dato = $_POST['texto'];
  $dato_encriptado = $encriptar($dato);
  $dato_desencriptado = $desencriptar($dato_encriptado);
  echo 'Dato encriptado: '. $dato_encriptado . '<br>';

} elseif (isset($_POST["desencriptar"])) {
  $dato = $_POST['texto'];
  $dato_desencriptado = $desencriptar($dato);
  echo '<br>';
echo 'Dato desencriptado: '. $dato_desencriptado . '<br>';

}



?>
