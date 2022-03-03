<?php
    session_start();
    $strcon = mysqli_connect('sql207.epizy.com','epiz_29603983','mNbUUWV4PUJKP','epiz_29603983_bazar')
        or die("<h2>Erro ao conectar ao banco de dados</h2>");
    // $strcon = mysqli_connect('localhost','adm.vulcan','admin','bazar')
                        // or die("<h2>Erro ao conectar ao banco de dados</h2>");
    $sql_usuario = "SELECT * FROM usuario WHERE id = ".$_SESSION['id'];
    $sql_produto = "SELECT * FROM produtos WHERE id_produto = ".$_POST['id_prod'];
    $resultado1 = mysqli_query($strcon,$sql_produto)
    or die("<h2>Erro ao tentar cadastrar registro do produto</h2>");
    $resultado2 = mysqli_query($strcon,$sql_usuario) 
        or die("<h2>Erro ao tentar cadastrar registro do usario</h2>");
    while ($registro = mysqli_fetch_array($resultado2)){
        $id_user = $registro['id'];
        $nome_user = $registro['nome'];
    }
    while ($registro = mysqli_fetch_array($resultado1)){
        $id_prod = $registro['id_produto'];
        $nome_prod = $registro['nome_produto'];
    }

    $sql = "INSERT INTO carrinho (nome_produto, nome_usuario, produto_id, usuario_id, quant_produto) VALUES ('$nome_prod', '$nome_user', '$id_prod', '$id_user', 1)";
    if (mysqli_query($strcon, $sql)) {
        echo "New record created successfully";
        header('location: ../../pages/inicio_for_users.php');

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($strcon);
    }
    mysqli_close($strcon);
    
    




    if(!isset($_SESSION['id']))
    {
        header('location: confirma.php');
        exit;
    }
    else{
        ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>404 Error - SB Admin</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <h1 class="display-1">Aguarde um momento</h1>
                                    <p class="lead">Produto sendo adicionado ao carrinho</p>
                                    <p>Access to this resource is denied.</p>
                                    <a href="index.html">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Return to Dashboard
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutError_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
    </body>
</html>
<?php




    }

    ?>