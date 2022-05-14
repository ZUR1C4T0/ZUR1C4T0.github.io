<?php
/*switch ($dato['color']) {
    case 'color_1':
        echo $significados['color_1'];
        break;
    case 'color_2':
        echo $significados['color_2'];
        break;
    case 'color_3':
        echo $significados['color_3'];
        break;
    default:
        echo "no se encuentra el significado";
        break;
}

$signinficados = [
    ["color_1"=>"ssignificado_1"],
    ["color_2"=>"ssignificado_2"],
    ["color_3"=>"ssignificado_3"],
    ["color_4"=>"ssignificado_4"],
];

$personas = [
    ["nombre"=>"name1", "color"=>"fColor1"],
    ["nombre"=>"name2", "color"=>"fColor2"],
    ["nombre"=>"name3", "color"=>"fColor3"],
    ["nombre"=>"name4", "color"=>"fColor4"],
    ["nombre"=>"name5", "color"=>"fColor5"],
];*/

?>

<?php
switch ($dato['color']) {
    case 'amarillo':
        echo $significados['amarillo'];
        break;
    case 'rosado':
        echo $significados['rosado'];
        break;
    case 'rojo':
        echo $significados['rojo'];
        break;
    case 'azul':
        echo $significados['azul'];
        break;
    case 'verde':
        echo $significados['verde'];
        break;
    case 'blanco':
        echo $significados['blanco'];
        break;
    default:
        echo "<p class='text-danger'>no se encuentra el significado</p>";
        break;
}
?>

<?php
    if (array_key_exists($dato['color'], $significados)) {
        echo $significados[$dato['color']];
    } else {
        echo "<p class='text-danger'>no se encuentra el significado</p>";
    }
?>