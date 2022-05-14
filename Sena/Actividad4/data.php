<?php
/* Variable que almacena los datos de los asientos del escenario */
$escenario = array(
    array('V', 'L', 'L', 'R', 'V'),
    array('L', 'R', 'V', 'L', 'L'),
    array('V', 'L', 'L', 'R', 'L'),
    array('L', 'R', 'V', 'L', 'V'),
    array('R', 'V', 'L', 'L', 'L'),
);

// $_POST = Array ( 'row' => '2', 'col' => '1', 'action' => 'reservar', 'enviar' => '', 'data' => 'R-V-V-V-R/L-V-L-L-L/L-V-R-R-R/V-V-V-V-V/L-R-R-R-R/');

if (isset($_POST['enviar'])) {
    recoveryData($_POST);
    switch ($_POST['action']) {
        case 'reservar':
            $msg = reservar($_POST['row']-1, $_POST['col']-1);
            break;
        case 'comprar':
            $msg = comprar($_POST['row'] - 1, $_POST['col'] - 1);
            break;
        case 'liberar':
            $msg = liberar($_POST['row'] - 1, $_POST['col'] - 1);
            break;
        default:
            # code...
            break;
    }
}
