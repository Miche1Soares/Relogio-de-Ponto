<?php include('../config.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo("<meta http-equiv='refresh' content='20'>"); ?>
    <title>Controle de Horas</title>

    <link rel="stylesheet" href="../static/style.css">
  
</head>
<body>

    <?php

    if(Painel::logado() == true){
        file_exists('home.php') ? include('home.php') : include('../404.php');
    }else{
        header('location: '.INCLUDE_PATH);
        Painel::loggout();
    }

    ?>

</body>
</html>