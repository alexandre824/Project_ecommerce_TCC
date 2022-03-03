<?php
require_once '../php/_classes/usuario.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Bazar pocotom :: endereço</title>
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
<!-- Inicio formulario -->
<main class="flex-fill">

<div class="container">

<div class=" justify-content-between flex-wrap border rounded-top pt-4 px-3">

                    <div class="mb-4 mx-2 flex-even">
                        <input type="radio" class="btn-check" name="endereco" autocomplete="off" id="pag1">
                        <label class="btn btn-outline-success p-4 h-100 w-100" for="pag1">
                            <h3>
                                <b class="text-dark">Endereço de envio</b>
                            </h3>
                            <hr>
                            <form action="../php/_users/cadastro_enderecos.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" id="txtNome"  name="txtNome" class="form-control" placeholder=" " autofocus="">
                                    <label for="txtNome" class="text-black-50">Nome da pessoa</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtRua" name="txtRua" class="form-control" placeholder=" ">
                                    <label for="txtRua" class="text-black-50">Rua</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtBairro" name="txtBairro" class="form-control" placeholder=" ">
                                    <label for="txtBairro" class="text-black-50">Bairro</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtNumero" name="txtNumero" class="form-control" placeholder=" ">
                                    <label for="txtNumero" class="text-black-50">Numero</label>
                                </div>
                                                               
                                
                                <div class="form-floating">
                                    <select id="selUF" name="selUF" class="form-select">
                                        <option value="1" selected="">Selecione o Estado</option>
                                        <option value="2">AC</option>
                                        <option value="3">AL</option>
                                        <option value="4">AP</option>
                                        <option value="5">AM</option>
                                        <option value="6">BA</option>
                                        <option value="7">CE</option>
                                        <option value="8">ES</option>
                                        <option value="9">GO</option>
                                        <option value="10">MA</option>
                                        <option value="11">MT</option>
                                        <option value="12">MS</option>
                                        <option value="13">MG</option>
                                        <option value="14">PA</option>
                                        <option value="15">PB</option>
                                        <option value="16">PR</option>
                                        <option value="17">PE</option>
                                        <option value="18">PI</option>
                                        <option value="19">RJ</option>
                                        <option value="20">RN</option>
                                        <option value="21">RS</option>
                                        <option value="22">RO</option>
                                        <option value="23">RR</option>
                                        <option value="24">SC</option>
                                        <option value="25">SP</option>
                                        <option value="26">SE</option>
                                        <option value="27">TO</option>
                                        <option value="28">DF</option>

                                    </select>
                                    <label for="selUF" class="text-black-50">Estado</label>
                                </div>
                                <br>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtCidade" name="txtCidade" class="form-control" placeholder=" ">
                                    <label for="txtCidade" class="text-black-50">Cidade</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtCEP" name="txtCEP" class="form-control" placeholder=" ">
                                    <label for="txtCEP" class="text-black-50">CEP</label>
                                </div>
                                <div class="text-end border border-top-0 rounded-bottom p-4 pb-0">
                    <a href="carrinho.php" class="btn btn-outline-primary btn-lg mb-4">
                        Voltar aos Itens
                    </a>
                    <button type="submit" name="acao" class="btn btn-danger btn-lg ms-2 mb-4">Continuar</button>
                </div>
                            </form>

                        </label>
                    </div>

                    

                </div>
                
<!-- Fim formulario -->


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

