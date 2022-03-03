<?php
$host = "localhost";
$db   = "bazar";
$user = "adm.vulcan";
$pass = "admin";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="manifest" href="/img/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/img/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- Bootstrap CSS -->
        <link rel="shortcut" href="../img/_logo.png">
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/estilos.css">
        <title>Bazar pocotom</title>
    </head>
    <body>
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
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="../php/_users/cadastrar_cliente.php" class="nav-link text-white">Quero Me Cadastrar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="../php/_users/new_login.php" class="nav-link text-white">Entrar</a>
                                </li>
                                <li class="nav-item">
                                    <span class="badge rounded-pill bg-light text-danger position-absolute ms-4 mt-0"
                                        title="5 produto(s) no carrinho"><small>x</small></span>
                                    <a href="../php/_users/new_login.php" class="nav-link text-white">
                                        <i class="bi-cart" style="font-size:24px;line-height:24px;"></i>
                                    </a>
                                </li>
                            </ul>
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
                            <a href="../html/embreve.html">
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
<!-- Produtos -->

            <?php


                    $strcon = mysqli_connect('sql207.epizy.com','epiz_29603983','mNbUUWV4PUJKP','epiz_29603983_bazar')
                        or die("<h2>Erro ao conectar ao banco de dados</h2>");
                    // $strcon = mysqli_connect('localhost','adm.vulcan','admin','bazar')
                        // or die("<h2>Erro ao conectar ao banco de dados</h2>");
                    $sql = "SELECT id_produto, nome_produto, preco_produto, descricao_produto, imagem_produtos, quant_produto FROM produtos";
                    $resultado = mysqli_query($strcon,$sql) 
                        or die("<h2>Erro ao tentar cadastrar registro</h2>");
                        ?>
 

                <main class="flex-fill">

                    <div class="container">

                        <div class="row g-3">
                            
                        <?php
                        while ($registro = mysqli_fetch_array($resultado)){
                            $nome = $registro['nome_produto'];
                            $preco = $registro['preco_produto'];
                            $descricao = $registro['descricao_produto'];
                            $id_produto = $registro['id_produto'];
                            $quantidade = $registro['quant_produto'];
                            $imagem = $registro['imagem_produtos'];
                            ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">



                        <div class="card text-center bg-light">
                            <!-- <a href="#" class="position-absolute end-0 p-2 text-danger">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a> -->
                            <p class="position-absolute end-0 p-2 text-dange">
            ID: <?php echo $id_produto ?>
    </p>
                          

                            <img src="../img/produtos/<?php echo $imagem ?>.jpg" class="card-img-top">
                            <div class="card-header">
                                R$ <?php echo $preco ?>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $nome ?></h5>
                                <p class="card-text">
                                <?php // echo $descricao ?>
                                </p>
                            </div>
                            <div class="card-footer">
                            <?php 
                            if ($quantidade > 0) {
                                    ?>
                                <a href="carrinho.html" class="btn btn-success mt-2 disabled ">
                                    Adicionar ao Carrinho
                                </a>
                             

                                    <small class="text-danger"><?php echo $quantidade ?> em estoque</small>
                                    <?php
                                }else{
                                    ?>
                                <a href="#" class="btn btn-light disable mt-2">
                                    Adicionar ao Carrinho
                                </a>
                                     <small class="text-dark">
                                        <b>Produto esgotado</b>
                                </small>
                                <?php
                                }
                                ?>
                            </div>

                            </div>
                        </div>
                        <?php }   ?>

                    </div>
  
                </main>


            
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
            </div>



 
            <!-- JavaScript (Opcional) -->
            <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
            <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            
        </body>
    </html>
 