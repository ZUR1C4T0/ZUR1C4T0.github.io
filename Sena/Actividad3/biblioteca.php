<?php
    
function operaciones($num1, $num2, $oper){
    $R = 'Resultado: ';
    /* Función switch que comprueba el operador para
       realizar la operación correspondiente */
    switch ($oper) {
        case 'suma':
            return $R . $num1 + $num2;
            break;
        case 'resta':
            return $R . $num1 - $num2;
            break;
        case 'multip':
            return $R . $num1 * $num2;
            break;
        case 'divicion':
            /* Si el divisor no es 0 realiza la operación,
               en caso contrario retorna un mesaje de error */
            return ($num2!=0)?$R.$num1/$num2:'Error: Imposible dividir por 0';
            break;
        default:
            return $num1 + $num2;
            break;
    }
}

/* Bloque de código con propositos de depuración */
// $_POST = array(
//     'num1' => '10',
//     'num2' => '0',
//     'oper' => 'divicion',
//     'calc' => '',
// );

/* Condicional que ejecuta la función cuando
   se presiona el boton de enviar (submit) */
if (isset($_POST['calc'])) {
    $n1 = $_POST['num1'];
    $n2 = $_POST['num2'];
    $op = $_POST['oper'];
    $respuesta = operaciones($n1, $n2, $op);
    $color = 'alert-success';
    
    if($respuesta === 'Error: Imposible dividir por 0'){
        $color = 'alert-danger';
    }
}