<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de Funciones</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- Se incluye el archivo con la función operaciones() -->
    <?php include('./biblioteca.php'); ?>

    <!-- *** DESARROLLADOR: Ivan Ulloque Atencia *** -->
    <!-- ***  PROGRAMA: Desarrollo Web con PHP  *** -->
    <!-- ***   EVIDENCIA #3: Uso de Funciones   *** -->

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-md-10 mx-auto my-3">

                <div class="alert alert-dark" role="alert">
                    <h5 class="alert-heading">Operaciones Aritméticas <br> ¿Como Funciona?</h5>
                    <p>Escriba dos numeros que desee operar, selecione la operación a realizar y presione enviar.</p>
                </div>

                <!-- Formulario que recibe los datos -->
                <form action="./" method="post" autocomplete="off">
                    <div class="d-md-flex">
                        <div class="input-group mb-2 mb-md-0">
                            <input type="number" class="form-control" name="num1" placeholder="Número 1" required
                                autofocus>
                            <input type="number" class="form-control" name="num2" placeholder="Número 2" required>
                        </div>
                        <div class="input-group">
                            <select name="oper" class="form-select">
                                <option value="suma" selected>(+) Sumar</option>
                                <option value="resta">(-) Restar</option>
                                <option value="multip">(x) multiplicar</option>
                                <option value="divicion">(÷) Dividir</option>
                            </select>
                            <button type="submit" class="btn btn-success px-4" name="calc">Enviar</button>
                        </div>
                    </div>
                </form>

                <!-- Consulta si exite una respuesta para imprimirla en la página -->
                <?php if (isset($respuesta)) : ?>
                <div class="alert mt-3 <?= $color ?>" role="alert">
                    <?= "<h5>$respuesta</h5>" ?>
                </div>
                <?php endif ?>

            </div>
        </div>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html