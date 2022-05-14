<?php
    require_once './database/conexion.php';
    // Petición
    $sql_leer = 'SELECT * FROM animes;';
    $query = $conexion->prepare($sql_leer);
    $query->execute();
    $resultado = $query->fetchAll();

    if($_POST){
        $titulo = $_POST['titulo'];
        $sinopsis = $_POST['sinopsis'];
        $tipo = $_POST['tipo'];
        $estado = $_POST['estado'];
        $cover = $_POST['cover'];
        $año = $_POST['año'];
        $fecha = $_POST['fecha'];
        $sql_agregar = 'INSERT INTO `animes` (anm_title,anm_synopsis,anm_type,anm_status,anm_cover,anm_year,anm_uploadDate) VALUES (?,?,?,?,?,?,?)';
        $sentencia_agregar = $conexion->prepare($sql_agregar);
        $sentencia_agregar->execute(array($titulo, $sinopsis, $tipo, $estado, $cover, $año, $fecha));
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="./admin.php">Admin</a>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#insertar">Agregar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#editar">Editar</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <br>

    <main>
        <section id="insertar" class="bloque">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <form method="POST">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label class="form-label">Título</label>
                                        <input type="text" class="form-control" name="titulo">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Sinopsis</label>
                                        <textarea class="form-control" rows="5" name="sinopsis"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tipo</label>
                                        <select class="form-control" name="tipo">
                                            <option value="Anime">Anime</option>
                                            <option value="Ova">Ova</option>
                                            <option value="Especial">Especial</option>
                                            <option value="Película">Película</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Estado</label>
                                        <select class="form-control" name="estado">
                                            <option value="Finalizado">Finalizado</option>
                                            <option value="Emición">Emición</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Link de la Imagen</label>
                                        <input type="text" class="form-control" name="cover">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Año</label>
                                        <input type="number" class="form-control" name="año" maxlength="4">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Fecha de Subida</label>
                                        <input type="date" class="form-control" name="fecha">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-75 mx-auto">Agregar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section id="editar" class="bloque d-none">
            <div class="container table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark sticky-top">
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Año</th>
                            <th scope="col">Fecha de Emición</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        <?php foreach($resultado as $dato): ?>
                        <tr>
                            <td> <?php echo $dato['anm_title'] ?> </td>
                            <td> <?php echo $dato['anm_synopsis'] ?> </td>
                            <td> <?php echo $dato['anm_type'] ?> </td>
                            <td> <?php echo $dato['anm_status'] ?> </td>
                            <td> <img src="<?php echo $dato['anm_cover'] ?>" width="100px"> </td>
                            <td> <?php echo $dato['anm_year'] ?> </td>
                            <td> <?php echo $dato['anm_uploadDate'] ?> </td>
                            <td class="text-center">
                                <i class="fa-solid fa-pencil me-1"></i> 
                                <i class="fa-solid fa-trash-can ms-1"></i>
                            </td>
                        </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </section>

        <form action="saludar()">
            <button type="submit">saludar</button>
        </form>

    </main>

    <script src="./js/main.js"></script>
</body>

</html>