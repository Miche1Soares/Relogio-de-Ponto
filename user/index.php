<?php include('../config.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo("<meta http-equiv='refresh' content='10'>"); ?>
    <title>Controle de Horas</title>

    <link rel="stylesheet" href="../static/style.css">
  
</head>



<?php

if(isset($_GET['acao'])){

    date_default_timezone_set('America/Sao_Paulo');  

    $sql = Mysql::conectar()->prepare("SELECT * FROM tb_horas");

    $sql->execute();

    $dados = $sql->fetchAll();

    $newData = true;

    foreach ($dados as $key => $value)
    {

        if(date('d/m/Y') == $value['data'])
        {
            $newData = false;
            break;
        }

    }

    if($newData)
    {
        $sql = Mysql::conectar()->prepare("INSERT INTO tb_horas (`id_user_horas`,`data`, `entrada`, `s_almoco`, `r_almoco`, `saida`) VALUES ('1', ?, ?, '--', '--', '--')");
        $sql->execute(array(date('d/m/Y'), date('H:i')));
    }
    else
    {
        $sql = Mysql::conectar()->prepare("SELECT s_almoco, r_almoco, saida FROM `tb_horas` WHERE data = ?");
        $sql->execute(array(date('d/m/Y')));
        $get_dados = $sql->fetchAll();

        

        if($get_dados[0]['s_almoco'] == '--')
        {
            $sql = Mysql::conectar()->prepare("UPDATE tb_horas SET s_almoco = ? WHERE data = ?");
            $sql->execute(array(date('H:i'),date('d/m/Y')));
        }
        elseif($get_dados[0]['r_almoco'] == '--')
        {
            $sql = Mysql::conectar()->prepare("UPDATE tb_horas SET r_almoco = ? WHERE data = ?");
            $sql->execute(array(date('H:i'),date('d/m/Y')));
        }
        elseif($get_dados[0]['saida'] == '--')
        {
            $sql = Mysql::conectar()->prepare("UPDATE tb_horas SET saida = ? WHERE data = ?");
            $sql->execute(array(date('H:i'),date('d/m/Y')));
        }

    }


    header('location: '.INCLUDE_PATH_USER);
    
}


?>

<header class="header-user">
    <div class="header-user-content">
        <p>Usuário: Michel Soares</p>
        <a class="a-logout" href="?desconnect">
            <p><strong>Sair</strong></p>
        </a>
    </div>
</header>

<a class="a-ponto" href="?acao">
    <div class="ponto">
        <div class="texto">Bater Ponto</div>
        <div class="horario">
            <?php
                date_default_timezone_set('America/Sao_Paulo');
                echo date('H:i');
            ?>
        </div>
    </div>
</a>


<div class="conteudo">
    <div class="titulo">
        <p>Data:</p>
        <p>Entrada:</p>
        <p>Saída Almoço:</p>
        <p>Retorno Almoço:</p>
        <p>Saída:</p>
    </div>
    <div class="clear"></div>
    <div class="conteudo-linhas">

        <?php

            $sql = Mysql::conectar()->prepare("SELECT * FROM tb_horas");

            $sql->execute();

            $info = $sql->fetchAll();

            foreach ($info as $key => $value) {
            
                echo '<hr>';
                echo '<p>'. $value['data'] .'</p>';
                echo '<p>'. $value['entrada'] .'</p>';
                echo '<p>'. $value['s_almoco'] .'</p>';
                echo '<p>'. $value['r_almoco'] .'</p>';
                echo '<p>'. $value['saida'] .'</p>';

            }
        
        ?>


    </div>
    <div class="clear"></div>
</div>



