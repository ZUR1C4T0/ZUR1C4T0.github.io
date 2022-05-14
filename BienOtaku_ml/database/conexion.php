<?php
    $dbs = ('mysql:host=localhost;dbname=bienotaku');
    $user = 'root';
    $pass = '';

    try {
        $conexion = new PDO($dbs, $user, $pass);

    } catch (PDOException $e) {
        print "¡Error!: ".$e->getMessage()."<br>";
        die();
    }