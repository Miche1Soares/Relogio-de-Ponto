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
<body>

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

    <hr>
    <p>21/01/2023</p>
    <p>07:59</p>
    <p>12:03</p>
    <p>13:01</p>
    <p>17:57</p>

    <hr>
    <p>22/01/2023</p>
    <p>08:02</p>
    <p>12:00</p>
    <p>13:05</p>
    <p>18:03</p>

    </div>
        <div class="clear"></div>
    </div>


</body>
</html>