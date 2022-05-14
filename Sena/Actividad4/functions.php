<?php
function reservar($r, $c)// Función para cambiar a estado Reservado
{
    global $escenario;
    if ($escenario[$r][$c] == 'L') {
        $escenario[$r][$c] = 'R';
    } else {
        error();
    }
}

function comprar($r, $c)// Función para cambiar a estado Vendido
{
    global $escenario;
    if ($escenario[$r][$c] != 'V') {
        $escenario[$r][$c] = 'V';
    } else {
        error();
    }
}

function liberar($r, $c)// Función para cambiar a estado Libre
{
    global $escenario;
    if ($escenario[$r][$c] == 'R') {
        $escenario[$r][$c] = 'L';
    } else {
        error();
    }
}

function error()// Función que imprime una alerta con un mensaje de error
{
    echo "<script> alert('La acción que desea realizar es invalida') </script>";
}

function recoveryData($_post)// Función que recupera los datos del Textarea
{
    global $escenario;
    $escenario = explode('/', $_post['data']);
    foreach ($escenario as $key => $value) {
        $escenario[$key] = explode('-', $value);
    }
}