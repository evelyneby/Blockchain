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
    <form action="inde.php" method="POST">
        <label for="dato">DATO: </label><input type="text" name="dato" id="dato">
        <input type="submit" name="encriptar" value="encriptar">
        <input type="submit" name="desencriptar" value="desencriptar">
    </form>

    <?php

    $clave = "3v3l7n21042000";

    function encrypt($string, $key)
    {
        $result = '';
        //strlen Devuelve la longitud del string dado.
        for ($i = 0; $i < strlen($string); $i++) {
            // Sustrae un caracter del texto
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }


    function decrypt($string, $key)
    {
        $result = '';
        $string = base64_decode($string);
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }


    if (isset($_POST["encriptar"])) {
        $dato = $_POST["dato"];
        echo $resultado = encrypt($dato, $clave);
    } elseif (isset($_POST["desencriptar"])) {
        $dato = $_POST["dato"];
        echo $resultado = decrypt($dato, $clave);
    }

    ?>
</body>

</html>