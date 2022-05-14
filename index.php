<?php
    $lista = null;
    $directorio= opendir('./');
    while ($elemento = readdir($directorio)) {
        if (is_dir('./'.$elemento)) {
            $lista .= "<li><a href='./$elemento' target='_blank'>$elemento/</a></li>";
        }else {
            $lista .= "<li><a href='./$elemento' target='_blank'>$elemento</a></li>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php echo $lista ?>
    </ul>
</body>
</html>