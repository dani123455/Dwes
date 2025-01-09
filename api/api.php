<?php
$url = " https://v2.jokeapi.dev/";
$response = file_get_contents($url);

if ($response !== false){
    $data = json_decode($response, true);
    print_r($data);
} else {
    echo"No se pudo obtener informacion";
}
?>