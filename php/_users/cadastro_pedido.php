<?php
session_start();
$nomeprodutos = "Produtos: ";
$total = 0;
$usuario_id = $_SESSION['id'];



// $des_produto = $_POST['descricaoP']; -> vai ser consertado em breve

    $strcon = mysqli_connect('sql207.epizy.com','epiz_29603983','mNbUUWV4PUJKP','epiz_29603983_bazar')
        or die("<h2>Erro ao conectar ao banco de dados</h2>");
    // $strcon = mysqli_connect('localhost','adm.vulcan','admin','bazar')
                        // or die("<h2>Erro ao conectar ao banco de dados</h2>");

    $sql = "SELECT produto_id FROM carrinho WHERE usuario_id = ".$_SESSION['id'];
    $resultado = mysqli_query($strcon,$sql) 
        or die("<h2>Erro ao tentar resgatar registros do carrinho</h2>");

        while ($registro = mysqli_fetch_array($resultado)){
            $id_produto = $registro['produto_id'];
            $sql2 = "SELECT nome_produto, preco_produto, descricao_produto FROM produtos WHERE id_produto = ".$id_produto;
            $resultado2 = mysqli_query($strcon,$sql2) 
                or die("<h2>Erro ao tentar resgatar registros do produto</h2>");
            while ($registro = mysqli_fetch_array($resultado2)){
            $nome = $registro['nome_produto'];
            $preco = $registro['preco_produto'];

            $nomeprodutos .= '<br>';
            $nomeprodutos .= $nome;
            $total = $total + $preco;
            };
        };

    $sql = "SELECT id_endereco FROM endereco WHERE usuario_id = ".$_SESSION['id'];
    $resultado = mysqli_query($strcon,$sql) 
        or die("<h2>Erro ao tentar resgatar registros do carrinho</h2>");

        while ($registro = mysqli_fetch_array($resultado)){
                $endereco_id = $registro['id_endereco'];
        };

    $sql = "INSERT INTO pedido (endereco_id, produtos, total, id_usuario) VALUES ('$endereco_id', '$nomeprodutos', '$total','$usuario_id')";
    if (mysqli_query($strcon, $sql)) {
        echo "New record created successfully";
        header('location: ../../pages/fechamento_pedido.php');
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
        <title>enviando dados</title>
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
                                    <p class="lead">Endereço sendo adicionado ao pedido</p>
                                    <!-- <p>Access to this resource is denied.</p> -->
                                    <!-- <a href="index.html">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Return to Dashboard
                                    </a> -->
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
                                <a href="../../html/privacidade.html">Politica de Privacidade</a>
                                &middot;
                                <a href="../../html/termos.html">Termos &amp; Condições</a>
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