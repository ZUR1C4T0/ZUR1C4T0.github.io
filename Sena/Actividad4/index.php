<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de Formularios para Transferencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ***      DESARROLLADOR: Ivan Ulloque Atencia      *** -->
    <!-- ***       PROGRAMA: Desarrollo Web con PHP       *** -->
    <!-- ***EVIDENCIA #4: Uso de Formularios para Transferencia*** -->

    <?php
    include('./functions.php');
    include('./data.php') ?>
    <style>
        th,
        td {
            width: 30px;
            height: 30px;
            padding: 0 !important;
        }

        .V {
            background-color: var(--bs-danger) !important;
            cursor: pointer;
        }

        .R {
            background-color: var(--bs-warning) !important;
            cursor: pointer;
        }

        .L {
            background-color: var(--bs-info) !important;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row mt-5">
            <div class="col-auto mx-auto">
                <table class="table table-bordered table-hover text-center">
                    <legend>ESCENARIO</legend>
                    <thead class="table-secondary">
                        <tr>
                            <th>X</td>
                            <th>A</td>
                            <th>B</td>
                            <th>C</td>
                            <th>D</td>
                            <th>E</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ciclo foreach que imprime los datos en la tabla -->
                        <?php foreach ($escenario as $key => $value) : ?>
                            <tr>
                                <th class="table-secondary"><?= $key + 1 ?></th>
                                <td class="<?= $value[0] ?>"><?= $value[0] ?></td>
                                <td class="<?= $value[1] ?>"><?= $value[1] ?></td>
                                <td class="<?= $value[2] ?>"><?= $value[2] ?></td>
                                <td class="<?= $value[3] ?>"><?= $value[3] ?></td>
                                <td class="<?= $value[4] ?>"><?= $value[4] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-6 mx-auto">
                <!-- Formulario que envia los datos -->
                <form method="POST">
                    <div class="row mb-3">
                        <div class="col">
                            <select class="form-select" name="row" required>
                                <option value="">Fila</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" name="col" required>
                                <option value="">Asiento</option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="action" id="reservar" value="reservar">
                                <label class="form-check-label" for="reservar">
                                    Reservar
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="action" id="comprar" value="comprar" required>
                                <label class="form-check-label" for="comprar">
                                    Comprar
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="action" id="liberar" value="liberar">
                                <label class="form-check-label" for="liberar">
                                    Liberar
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success w-100" name="enviar">Enviar</button>
                        </div>
                        <div class="col">
                            <button type="reset" class="btn btn-danger w-100">Borar</button>
                        </div>
                    </div>
                    <!-- Textarea oculto que almacena los datos en formato String -->
                    <textarea cols="71" rows="3" name="data" hidden>
                    <?php
                    $data = '';
                    foreach ($escenario as $i => $fila) {
                        ($i < 4) ? $data .= implode('-', $fila) . '/'
                            : $data .= implode('-', $fila);
                    }
                    echo $data;
                    ?>
                    </textarea>
                </form>
            </div>
        </div>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="./js/index.js"></script>
</body>

</html>