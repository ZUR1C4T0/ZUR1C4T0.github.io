<?php
    require_once './database/conexion.php';
    #Petición para las cards
    $sql_query = 'SELECT anm_title, anm_cover FROM animes ORDER BY anm_uploadDate DESC LIMIT 12;';
    $query = $conexion->prepare($sql_query);
    $query->execute();
    $Datos = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <title>NomiAnime</title>
    <meta name="author" content="ZUR1C4T0">
    <meta name="description" content="Sitio web en desarrollo (no funcional)">
    <meta name="keywords"
        content="bien otaku, anime, ver anime gratis, paginas para ver anime, ver anime online, anime online gratis, anime ver, ver anime online gratis, paginas para ver anime gratis, ver animes online, anime online sub, animeflv, animeyt, jkanime">

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
</head>

<body>

    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
            <div class="container-xxl">
                <h1 class="navbar-brand" id="logo">NomiAnime</h1>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarContent">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mx-auto">
                            <a class="nav-link active" href="./">
                                <i class="fa-solid fa-home"></i> Inicio
                            </a>
                        </li>
                        <li class="nav-item mx-auto">
                            <a class="nav-link" href="">
                                <i class="fa-solid fa-folder-open"></i> Directorio
                            </a>
                        </li>
                        <li class="nav-item mx-auto" hidden>
                            <a class="nav-link" href="">
                                <i class="fa-solid fa-tv"></i> Series
                            </a>
                        </li>
                        <li class="nav-item mx-auto">
                            <a class="nav-link" href="">
                                <i class="fa-solid fa-video"></i> Películas
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <form class="d-flex w-100">
                            <div class="input-group me-3">
                                <input class="form-control" type="search" placeholder="Buscar" />
                                <button class="btn btn-primary py-0" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                        <div class="dropdown">
                            <a href="#" class="d-inline-block dropdown-toggle text-primary text-decoration-none"
                                id="navbarDropdown" data-bs-toggle="dropdown">
                                <img src="./assets/img/person-circle.svg" alt="perfil" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-secondary">
                                <li>
                                    <a class="dopdown-item nav-link link-dark" href="#login" data-bs-toggle="modal">
                                        <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión
                                    </a>
                                </li>
                                <li>
                                    <a class="dopdown-item nav-link link-primary" href="#register"
                                        data-bs-toggle="modal">
                                        <i class="fa-solid fa-pen-to-square"></i> Reigistrarse
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container-xxl my-3">
            <div class="row">
                <div class="col-11 col-lg-10 mx-auto p-2">
                    <h2 class="mb-3 text-primary">
                        <span class="px-3 py-1 bg-light rounded-start rounded-pill">
                            <i class="fa-solid fa-film"></i> Estrenos
                        </span>
                    </h2>

                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3 g-xl-4">

                        <?php foreach($Datos as $dato): ?>
                        <div class="col">
                            <div class="card h-100">
                                <a href="./" class="text-decoration-none link-primary"
                                    title="<?php echo $dato['anm_title'] ?>">
                                    <img src="<?php echo $dato['anm_cover'] ?>" class="card-img-top" alt="...">
                                    <div class="capa"></div>
                                    <div class="card-body">
                                        <p class="m-0 text-capitalize"><strong>
                                                <?php echo $dato['anm_title'] ?>
                                            </strong></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class=" navbar-dark bg-dark bg-gradient">
            <div class="container-xxl">
                <div class="py-3 my-4 border-bottom">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a href="./" class="nav-link link-light">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link link-light">Directorio</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link link-light">Películas</a>
                        </li>
                    </ul>
                </div>
                <p class="text-center text-muted m-0 pb-3">
                    Ningún video se encuentra alojado en nuestro servidor.
                </p>
            </div>
        </div>
    </footer>

    <!-- LOGIN -->
    <div class="modal fade" id="login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light rounded-3">
                <div class="modal-header border-0">
                    <h3 class="text-primary">
                        <i class="fa-solid fa-right-to-bracket"></i> Inicia Sesión
                    </h3>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body border-0">
                    <form class="text-dark">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" placeholder="nombre@correo.com" />
                            <label><i class="fa-solid fa-at"></i> Correo Electrónico</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" placeholder="Contraseña" />
                            <label><i class="fa-solid fa-lock"></i> Contraseña</label>
                        </div>
                        <div class="mb-3" hidden>
                            <input type="checkbox" id="check" class="form-check-input" />
                            <label for="check">Recordarme</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <p class="mb-0">¿No tienes cuenta?</p>
                    <a class="link-info" data-bs-toggle="modal" data-bs-target="#register">Regístrate</a>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN -->

    <!-- REGISTER -->
    <div class="modal fade" id="register">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light rounded-3">
                <div class="modal-header border-0">
                    <h3 class="text-primary">
                        <i class="fa-solid fa-pen-to-square"></i> Regístrate
                    </h3>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body border-0">
                    <form action="" class="text-dark">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Numbre de Usuario" />
                            <label><i class="fa-solid fa-user"></i> Nombre de Usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" placeholder="nombre@correo.com" />
                            <label><i class="fa-solid fa-at"></i> Correo Electrónico</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" placeholder="Contraseña" />
                            <label><i class="fa-solid fa-lock"></i> Contraseña</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" placeholder="Contraseña" />
                            <label><i class="fa-solid fa-lock"></i> Confirmación de la Contraseña</label>
                        </div>
                        <!-- <div class="mb-3" hidden>
                            <input type="checkbox" id="TyC" class="form-check-input" />
                            <label for="TyC">Acépto los TyC</label>
                        </div> -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-regular fa-paper-plane"></i> Enviar
                        </button>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <p class="mb-0">¿Ya tienes cuenta?</p>
                    <a class="link-info" data-bs-toggle="modal" data-bs-target="#login">Inicia sesión</a>
                </div>
            </div>
        </div>
    </div>
    <!-- REGISTER -->

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>