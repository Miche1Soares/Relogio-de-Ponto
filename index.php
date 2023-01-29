<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo("<meta http-equiv='refresh' content='10'>"); ?>
    <title>Controle de Horas</title>

    <link rel="stylesheet" href="static/style.css">
  
</head>
<body>
    
    <?php
    
        $url = isset($_GET['url']) ? $_GET['url'] : 'id';
    
        if(file_exists($url.'.php')){
            include($url.'.php');
        }else{
            include('404.php');
        }

    ?>

</body>
</html>