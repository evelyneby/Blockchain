<?php
//ConfiguraciÃ³n del algoritmo de encriptaciÃ³n
//Debes cambiar esta cadena, debe ser larga y unica
//nadie mas debe conocerla
$clave  = 'Esta es la clave secreta para poder encriptar y desencriptar un texto';
//Metodo de encriptaciÃ³n
$method = 'aes-256-cbc';



// Puedes generar una diferente usando la funcion $getIV()
// base64_decode-Decodifica los datos en data codificados en base64.
//base 64 es grupo de esquemas de codificación de binario a texto. Representa los datos binarios mediante una cadena ASCII, traduciéndolos en una representación radix-64.
//Un Vector de Inicialización no NULL.
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");


 /*
 Encripta el contenido de la variable, enviada como parametro.
 Encripta la información dada con el método y la clave dados, y devuelve una cadena codificada en bruto o mediante base64.
  */
 $encriptar = function ($valor) use ($method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };
 /*
 Desencripta el texto recibido
 Toma una cadena codificada en bruto o mediante base64 y la desencripta usando un método y una clave.
 */
 $desencriptar = function ($valor) use ($method, $clave, $iv) {
     $encrypted_data = base64_decode($valor);
     return openssl_decrypt($valor, $method, $clave, false, $iv);
 };

  /*
 Genera un valor para IV
 */
$getIV = function () use ($method) {
    
    return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
};


 ?>