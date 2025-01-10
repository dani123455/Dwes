<?php
$url = "https://www.swapi.tech/api/people/1";
$response = file_get_contents($url);

if ($response !== false) {
    $data = json_decode($response, true);
    $person = $data['result']['properties'];

    echo "<table border='1' style='width: 70%; margin: 20px auto; text-align: left;'>";
    echo "<thead>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='padding: 10px;'>Clave</th>";
    echo "<th style='padding: 10px;'>Valor</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($person as $key => $value) {
        echo "<tr>";
        echo "<td style='padding: 10px;'>$key</td>";
        echo "<td style='padding: 10px;'>$value</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No se pudo obtener información</p>";
}
?>
