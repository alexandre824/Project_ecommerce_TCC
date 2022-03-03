<?php
$total_preco = 0;
$total_produtos = 0;


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bazar Pocotom :: Carrinho</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/estilos.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <div class="d-flex flex-column wrapper">
        <!-- Cabeçalho -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-success border-bottom shadow-sm mb-3">
            <div class="container">
            <a class="navbar-brand" href="../"><b>Bazar Pocotom</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../html/contato.html">Contato</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link text-white" href="../html/covid.html">Medidas de segurança</a>
                            </li>
                    </ul>
                    <div class="align-self-end">
                    <?php
                    session_start();
                    $strcon = mysqli_connect('sql207.epizy.com','epiz_29603983','mNbUUWV4PUJKP','epiz_29603983_bazar')
                        or die("<h2>Erro ao conectar ao banco de dados</h2>");
                    // $strcon = mysqli_connect('localhost','adm.vulcan','admin','bazar')
                    //     or die("<h2>Erro ao conectar ao banco de dados</h2>");
                    $sql = "SELECT * FROM usuario WHERE id = ".$_SESSION['id'];
                    $resultado = mysqli_query($strcon,$sql) 
                        or die("<h2>Erro ao tentar cadastrar registro</h2>");
                    while ($registro = mysqli_fetch_array($resultado)){
                        $nome = $registro['nome'];
                        $email = $registro['email'];
                        $admin = $registro['ad'];
                    }
                    if(!isset($_SESSION['id']))
                    {
                        header('location: index.php');
                        exit;
                    }
                    else{
                        if ($admin == 1) {
                            ?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <p class="nav-link text-white">Logado como <b><?php echo "$nome";?></b></p>
                                </li>
                                <li class="nav-item">
                                <a href="../php/_users/doLogout.php" class="nav-link text-white">Sair</a>                            </li>
                                <li class="nav-item">
                                    <span class="badge rounded-pill bg-light text-danger position-absolute ms-4 mt-0"
                                        title=""><small></small></span>
                                    <a href="carrinho.php" class="nav-link text-white">
                                        <i class="bi-cart" style="font-size:24px;line-height:24px;"></i>
                                    </a>
                        </li>
                        <li>
                                    <a href="admin" class="nav-link text-white">
                                        <i class="bi bi-code-square" style="font-size:24px;line-height:24px;"></i>
                                    </a>
                                </li>
                            </ul>
                            <?php
                         }else{
                        ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <p class="nav-link text-white">Logado como <b><?php echo "$nome";?></b></p>
                            </li>
                            <li class="nav-item">
                            <a href="../php/_users/doLogout.php" class="nav-link text-white">Sair</a>                            </li>
                            <li class="nav-item">
                                <span class="badge rounded-pill bg-light text-danger position-absolute ms-4 mt-0"
                                    title=""><small></small></span>
                                <a href="carrinho.php" class="nav-link text-white">
                                    <i class="bi-cart" style="font-size:24px;line-height:24px;"></i>
                                </a>
                    </li>

                        </ul>
                        <?php
                     }
                    }
                     ?>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Fim do cabeçalho -->
            <!-- Começo Carrossel -->
            <div class="container">
                <div id="carouselMain" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="../img/slides/slide001.jpg" class="d-none d-md-block w-100" alt="">
                            <!-- <img src="_img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt=""> -->
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="../img/slides/slide002.jpg" class="d-none d-md-block w-100" alt="">
                            <!-- <img src="_img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt=""> -->
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <a href="#">
                                <img src="../img/slides/slide003.jpg" class="d-none d-md-block w-100" alt="">
                                <!-- <img src="_img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt=""> -->
                            </a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <hr class="mt-3">
            </div>
            <!-- Final carrossel -->
                <main>
                    <div class="container-fluid px-4">
                
                        <?php


                    $strcon = mysqli_connect('sql207.epizy.com','epiz_29603983','mNbUUWV4PUJKP','epiz_29603983_bazar')
                        or die("<h2>Erro ao conectar ao banco de dados</h2>");
                    // $strcon = mysqli_connect('localhost','adm.vulcan','admin','bazar')
                        // or die("<h2>Erro ao conectar ao banco de dados</h2>");
                    $sql = "SELECT id_carrinho, produto_id, usuario_id, quant_produto FROM carrinho WHERE usuario_id = ".$_SESSION['id'];
                    $resultado = mysqli_query($strcon,$sql) 
                        or die("<h2>Erro ao tentar resgatar registros do carrinho</h2>");
 
                        ?>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                    Carrinho de compras
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">

                                    <thead>
                                        <tr>
                                            <th>ID produto</th>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th>Descrição</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                        <tr>
                                            <th>ID produto</th>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th>Descrição</th>
                                            <th>Qunatidade</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    <?php
                                                               while ($registro = mysqli_fetch_array($resultado)){
                                                                $id_carrinho = $registro['id_carrinho'];
                                                                $id_produto = $registro['produto_id'];
                                                                $id_usuario = $registro['usuario_id'];
                                                                $quant_produto = $registro['quant_produto'];
                                                         $sql2 = "SELECT nome_produto, preco_produto, descricao_produto FROM produtos WHERE id_produto = ".$id_produto;
                                                        $resultado2 = mysqli_query($strcon,$sql2) 
                                                            or die("<h2>Erro ao tentar resgatar registros do produto</h2>");
                        while ($registro = mysqli_fetch_array($resultado2)){
                            $nome = $registro['nome_produto'];
                            $preco = $registro['preco_produto'];
                            $descricao = $registro['descricao_produto'];

                            $total_preco = $preco + $total_preco;
                            $total_produtos = $quant_produto + $total_produtos;
                            ?>
                            
                                        <tr>
                                            <td><?php echo $id_produto ?></td>
                                            <td><?php echo $nome ?></td>
                                            <td>R$ <?php echo $preco ?></td>
                                            <td>-/-</td>
                                            <td><?php //echo $quantidade 
                                            echo '1' ?></td>
                                        </tr>
                                        <?php
                                }
                            }
                                ?>
                                                                <tr>
                                            <td><b>TOTAL</b></td>
                                            <td></td>
                                            <td>R$ <?php echo $total_preco ?></td>
                                            <td>-/-</td>
                                            <td><?php echo $total_produtos ?> </td>
                                        </tr>

                                    </tbody>

                                </table>
                                <div class="text-end">
                            <h4 class="text-dark mb-3">
                                Valor Total: R$ <?php echo $total_preco ?>
                            </h4>
                            <a href="../" class="btn btn-outline-success btn-lg">
                                Continuar Comprando
                            </a>
                            <a href="preenchimento_endereco.php" class="btn btn-danger btn-lg ms-2 mt-xs-3">Fechar Compra</a>
                        </div>  
                            </div>

                        </div>

                    </div>

                </main>
                
            </div>
        </div>

        <!-- Rodapé -->
<footer class="bor der-top text-muted bg-light">
<div class="container">
    <div class="row py-3">
        <div class="col-12 col-md-4 text-center">
            2021 - Bazar Pocotom Ltda
            <br>
            Rua Virtual Inexistente, 123, Compulândia/PC
            <br>
            CNPJ 99.999.999/0001-99
            <br>
            &copy; Vulcan Consultoria
        </div>
        <div class="col-12 col-md-4 text-center">
            <a href="../html/privacidade.html" class="text-decoration-none text-dark">
                Politica de Privacidade
            </a>
            <br>
            <a href="../html/termos.html" class="text-decoration-none text-dark">
                Termos de Uso
            </a>
            <br>
            <a href="../html/quemsomos.html" class="text-decoration-none text-dark">
                Quem somos
            </a>
            <br>
            <a href="../html/trocas.html" class="text-decoration-none text-dark">
                Trocas e devolução
            </a>
        </div>
        <div class="col-12 col-md-4 text-center">
            <a href="../html/contato.html" class="text-decoration-none text-dark">
                  Contato pelo Site
            </a>
            <br>
            E-mail:
            <a href="mailto:email@dominio.com" class="text-decoration-none text-dark">
                email@dominio.com
            </a>
            <br>
            Telefone:
            <a href="phone:19993967033" class="text-decoration-none text-dark">
                (19) 9 99396-7033
            </a>
        </div>
    </div>
</div>
</footer>
<!-- Fim do Rodapé -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="admin/assets/demo/chart-area-demo.js"></script>
        <script src="admin/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="admin/js/datatables-simple-demo.js"></script>
    </body>
</html>
