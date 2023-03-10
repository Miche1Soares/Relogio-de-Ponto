<?php

    if(isset($_GET['acao'])){

        date_default_timezone_set('America/Sao_Paulo');  

        $sql = Mysql::conectar()->prepare("SELECT * FROM tb_users INNER JOIN tb_horas ON id_user = id_user_horas AND id_user = ?");
        $sql->execute(array($_SESSION['id']));
        $dados = $sql->fetchAll();

        $teste = true;

        foreach ($dados as $key => $value)
        {

            if(date('d/m/Y') == $value['data'])
            {
                $teste = false;
                break;
            }

        }

        if($teste)
        {
            $sql = Mysql::conectar()->prepare("INSERT INTO tb_horas (`id_user_horas`, `data`, `entrada`, `s_almoco`, `r_almoco`, `saida`) VALUES (?, ?, ?, '--', '--', '--')");
            $sql->execute(array($_SESSION['id'], date('d/m/Y'), date('H:i')));
        }
        else
        {
            $sql = Mysql::conectar()->prepare("SELECT s_almoco, r_almoco, saida FROM `tb_horas` WHERE data = ? AND id_user_horas = ?");
            $sql->execute(array(date('d/m/Y'), $_SESSION['id']));
            $get_dados = $sql->fetchAll();

            

            if($get_dados[0]['s_almoco'] == '--')
            {
                $sql = Mysql::conectar()->prepare("UPDATE tb_horas SET s_almoco = ? WHERE data = ? AND id_user_horas = ?");
                $sql->execute(array(date('H:i'),date('d/m/Y'), $_SESSION['id']));
            }
            elseif($get_dados[0]['r_almoco'] == '--')
            {
                $sql = Mysql::conectar()->prepare("UPDATE tb_horas SET r_almoco = ? WHERE data = ? AND id_user_horas = ?");
                $sql->execute(array(date('H:i'),date('d/m/Y'), $_SESSION['id']));
            }
            elseif($get_dados[0]['saida'] == '--')
            {
                $sql = Mysql::conectar()->prepare("UPDATE tb_horas SET saida = ? WHERE data = ? AND id_user_horas = ?");
                $sql->execute(array(date('H:i'),date('d/m/Y'), $_SESSION['id']));
            }

        }


        echo '
        
        <div class="ponto-confirmado">
            <div class="box-ponto-confirmado">
                <div class="box-ponto-confirmado-conteudo">
                    <h1>Ponto registrado:</h1>
                    <p>'.$_SESSION['nome'].' - '.date('d/m/Y').' ??s '.date('H:i').'</p>
                    <a href="?desconnect"><span>CONTINUAR</span></a>
                </div>
            </div>
        </div>
        
        ';

        
    }


?>

<?php

    if(isset($_GET['desconnect'])){
        Painel::loggout();
    }

?>

<header class="header-user">
    <div class="header-user-content">
        <p>Usu??rio: <?php echo $_SESSION['nome'];?></p>
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
        <p>Sa??da Almo??o:</p>
        <p>Retorno Almo??o:</p>
        <p>Sa??da:</p>
    </div>
    <div class="clear"></div>

    <div class="conteudo-linhas">

        <?php

            $sql = Mysql::conectar()->prepare("SELECT * FROM tb_horas WHERE id_user_horas = ?");

            $sql->execute(array($_SESSION['id']));

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
