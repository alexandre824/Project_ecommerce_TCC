<?php
require_once '../php/_classes/usuario.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Bazar pocotom :: pagamento</title>
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
                    <?php
                    session_start();
                    $strcon = mysqli_connect('sql207.epizy.com','epiz_29603983','mNbUUWV4PUJKP','epiz_29603983_bazar')
                        or die("<h2>Erro ao conectar ao banco de dados</h2>");
                    // $strcon = mysqli_connect('localhost','adm.vulcan','admin','bazar')
                        // or die("<h2>Erro ao conectar ao banco de dados</h2>");
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
<!-- Produtos -->


<main class="flex-fill">
            <div class="container">
                <h1>Selecione a Forma de Pagamento</h1>
                <h3 class="mb-4">
                    Selecione a forma de pagamento e clique em <b>Continuar</b> para prosseguir para <b>concluir o
                        pedido</b>.
                </h3>
                <div class="d-flex justify-content-between flex-wrap border rounded-top pt-4 px-3">

                    <div class="mb-4 mx-2 flex-even">
                        <input type="radio" class="btn-check" name="pagamento" autocomplete="off" id="pag1">
                        <label class="btn btn-outline-success p-4 h-100 w-100" for="pag1">
                            <h3>
                                <b class="text-dark">Cartão de Crédito</b>
                            </h3>
                            <hr>
                            <form action="">
                                <div class="form-floating mb-3">
                                    <input type="text" id="txtNome" class="form-control" placeholder=" " autofocus>
                                    <label for="txtNome" class="text-black-50">Nome Impresso no Cartão</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtNumero" class="form-control" placeholder=" ">
                                    <label for="txtNumero" class="text-black-50">Número do Cartão</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtValidade" class="form-control" placeholder=" ">
                                    <label for="txtValidade" class="text-black-50">Validade (mm/aa)</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtCodigo" class="form-control" placeholder=" ">
                                    <label for="txtCodigo" class="text-black-50">Código de Segurança</label>
                                </div>

                                <div class="form-floating">
                                    <select id="selParcelas" class="form-select">
                                        <option value="1" selected>À vista</option>
                                        <option value="2">2 x sem juros</option>
                                        <option value="3">3 x sem juros</option>
                                        <option value="4">4 x sem juros</option>
                                        <option value="5">5 x sem juros</option>
                                        <option value="6">6 x sem juros</option>
                                    </select>
                                    <label for="selParcelas" class="text-black-50">Parcelamento</label>
                                </div>
                            </form>

                        </label>
                    </div>

                    <div class="mb-4 mx-2 flex-even">
                        <input type="radio" class="btn-check" name="pagamento" autocomplete="off" id="pag2">
                        <label class="btn btn-outline-success p-4 h-100 w-100" for="pag2">
                            <h3>
                                <b class="text-dark">Dinheiro</b>
                            </h3>
                            <hr>
                            <form action="">
                                <h4>Valor da Compra: <b>R$ 63,86</b></h4>
                                <br>
                                <p>
                                    Se precisar de troco, informe no campo abaixo.
                                </p>
                                <div class="form-floating mb-3">
                                    <input type="text" id="txtTroco" class="form-control" placeholder=" ">
                                    <label for="txtTroco" class="text-black-50">Precisa de troco para quanto?</label>
                                </div>
                            </form>

                        </label>
                    </div>

                </div>

                <div class="text-end border border-top-0 rounded-bottom p-4 pb-0">
                    <a href="../php/_users/cadastro_pedido.php" class="btn btn-danger btn-lg ms-2 mb-4">Finalizar</a>
                </div>
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

