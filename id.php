<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="static/style_id.css">
  
</head>
<body style="background-color: white;">

    <main class="form-id-main text-center">
        <div class="form-id">
            <form method="post">
                <h1 class="h3 mb-3 fw-normal">Insira seu ID:</h1>
            
                <div class="form-floating mb-4">
                    <input name="id_user" type="number" class="form-control" id="floatingPassword" placeholder="ID..." required>
                    <label for="floatingPassword">ID . . .</label>
                </div>
            
                <button class="w-100 btn btn-lg btn-secondary" name="btn_id" type="submit">Entrar</button>
                <p class="mt-5 mb-3 text-muted">© Michel Soares</p>
            </form>
        </div>
    <main>         

</body>

<?php

    if(isset($_POST['btn_id'])){
        
        $id = $_POST['id_user'];

        $sql = Mysql::conectar()->prepare("SELECT * FROM tb_users WHERE id_user = ?");
        $sql->execute(array($id));

        if($sql->rowCount() == 1){

            $info = $sql->fetch();
            
            echo '
            
            <form method="post">
                <div class="box-confirm-id">
                    <p>Você é '.$info['nome'].'?</p>
                    <a href="?id_confirm='.$id.'" class="btn_id_confirm"><p>SIM</p></a>
                    <a href="?id_not_confirm" class="btn_id_not"><p>NÃO</p></a>
                </div>
            </form>
            
            ';

        }else{
            echo 'Usuário inexistente !!!';
        }

    }



    if(isset($_GET['id_confirm'])){

        $id = $_GET['id_confirm'];

        $sql = Mysql::conectar()->prepare("SELECT * FROM tb_users WHERE id_user = ?");
        $sql->execute(array($id));

        
        $info = $sql->fetch();

        $_SESSION['login'] = true;
        $_SESSION['id'] = $info['id_user'];
        $_SESSION['nome'] = $info['nome'];

        header('location: '.INCLUDE_PATH_USER);
        die();

    }

    if(isset($_GET['id_not_confirm'])){

        header('location: '.INCLUDE_PATH);

    }

?>