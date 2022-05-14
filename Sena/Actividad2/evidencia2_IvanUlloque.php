<?php
// Declaración del arreglo con la informacion de las personas
$personas = array(
    array("nombre"=>"juan", "color"=>"azul"),
    array("nombre"=>"pedro", "color"=>"morado"),
    array("nombre"=>"ana", "color"=>"rosado"),
    array("nombre"=>"jose", "color"=>"rojo"),
    array("nombre"=>"maria", "color"=>"lima"),
    array("nombre"=>"andres", "color"=>"amarillo"),
    array("nombre"=>"clara", "color"=>"negro"),
    array("nombre"=>"diana", "color"=>"gris"),
    array("nombre"=>"karen", "color"=>"rosado"),
    array("nombre"=>"fabian", "color"=>"azul")
);

// Declaración del arreglo que almacena los significados de los colores 
$significados = [
    "amarillo" => "el buen humor y la alegria",
    "rosado"   => "el amor y la inosencia",
    "rojo"     => "energía y pasión",
    "azul"     => "tanquilidad y calma",
    "verde"    => "crecimiento y la fertilidad",
    "blanco"   => "pureza y bondad"
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de Arregos</title>
    <!-- Implementación de bootstrap para dar estilos a la tabla -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- *** DESARROLLADOR: Ivan Ulloque Atencia *** -->
    <!-- ***  PROGRAMA: Desarrollo Web con PHP  *** -->
    <!-- ***   EVIDENCIA #2: Uso de Arreglos   *** -->

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <table class="table table-bordered table-hover">

                    <!-- Encabezado de la tabla estático -->
                    <thead class="table-dark">
                        <tr>
                            <th>NOMBRE</th>
                            <th>COLOR FAVORITO</th>
                            <th>SIGNIFICADO DEL COLOR</th>
                        </tr>
                    </thead>

                    <tbody class="table-secondary text-capitalize">

                        <!-- Cuerpo de la tabla genrado dinamicamente con una función ForEach -->
                        <?php foreach ($personas as $dato) : ?>
                            <tr>
                                <td>
                                    <?php echo $dato['nombre'] ?>
                                </td>
                                <td>
                                    <?php echo $dato['color'] ?>
                                </td>
                                <td>
                                    <?php
                                        if (array_key_exists($dato['color'], $significados)) {
                                            echo $significados[$dato['color'] ];
                                        }
                                        else {
                                            echo "<p class='text-danger'>no se encuentra el significado</p>";
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <!-- Cierre del ciclo que genera las filas de la tabla -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>