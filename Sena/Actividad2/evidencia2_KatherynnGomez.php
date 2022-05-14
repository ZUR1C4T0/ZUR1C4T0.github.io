<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $a = [
        ['Nombre' => 'Juan Perez', 'Dirección' => 'Cra. 45 # 45 -56', 'Telefono' => '3456789', 'Fecha de nacimiento' => '23/12/1997', 'color' => 'amarillo'],
        ['Nombre' => 'Pablo Manrique', 'Dirección' => 'Clle. 23 # 12 - 19 Sur', 'Telefono' => '3214567', 'Fecha de nacimiento' => '12/10/1980', 'color' => 'verde'],
        ['Nombre' => 'Nancy Peña', 'Dirección' => 'Av. 34 # 16 - 12', 'Telefono' => '2135423', 'Fecha de nacimiento' => '07/06/2000', 'color' => 'rojo'],
    ];
    $s = [
        'amarillo' => 'Alegría, Riqueza',
        'verde' => 'Esperanza',
        'azul' => 'Tranquilidad',
    ];
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Fecha de nacimiento</th>
                <th>Color favorito</th>
                <th>Significado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($a as $r) : ?>
            <tr>
                <td>
                    <?php echo $r['Nombre']; ?>
                </td>
                <td>
                    <?php echo $r['Dirección']; ?>
                </td>
                <td>
                    <?php echo $r['Telefono']; ?>
                </td>
                <td>
                    <?php echo $r['Fecha de nacimiento']; ?>
                </td>
                <td>
                    <?php echo $r['color']; ?>
                </td>
                <td>
                    <?php
                        if (array_key_exists($r['color'], $s)) {
                            echo $s[$r['color']];
                        } else {
                            echo 'No se conoce el significado';
                        }
                    ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>