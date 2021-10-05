<!doctype html>
<html lang="pt-br">
  <head>
      <title>PI Fatec Programação WEB</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS redirect with our offline SASS -->
    <link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/compiler/bootstrap.css">

    <!-- Requiring the file "estilo.scss" -->
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/estilo.css">

    <!-- Requiring the file "font-awesome.css" -->
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-info" id="navbarTeste">

        <div class="container">

            <a class="navbar-brand h1 mb-0" href="#">CEMG</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">
                
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perfil</a>
                    </li>               
                    <li class="nav-item">
                        <a class="nav-link" href="#">Depoimentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre nós</a>
                    </li>

                </ul>
                <?php
                    session_start();
                    $strcon = mysqli_connect('localhost','CEMG','cemgoficial','projeto_login')
                        or die("<h2>Erro ao conectar ao banco de dados</h2>");
                    $sql = "SELECT * FROM usuarios WHERE id_usuario = ".$_SESSION['id_usuario'];
                    $resultado = mysqli_query($strcon,$sql) 
                        or die("<h2>Erro ao tentar cadastrar registro</h2>");
                    while ($registro = mysqli_fetch_array($resultado)){
                        $nome = $registro['nome'];
                        $email = $registro['email'];
                        $admin = $registro['administrador'];
                    }
                    if(!isset($_SESSION['id_usuario']))
                    {
                        header('location: index.php');
                        exit;
                    }
                    else{
                        if($admin == 'sim'){
                            ?>
                            <ul class="navbar-nav ml-auto"> 
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                                Usuario    
                             </a>
                             <div class="dropdown-menu dropdown-menu-right">
                                 <h6 class="dropdown-header">Seus dados</h6>
                                 <p class="dropdown-item" >Nome: <?php echo "$nome";?></p>
                                 <p class="dropdown-item" >Email: <?php echo "$email";?></>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="#">Modo admin</a>
                                 <a class="dropdown-item" href="doLogout.php">Logout</a>
                             </div>
                         </li>
                     </ul>
                     <?php
                        }else{
                    ?>
                    <ul class="navbar-nav ml-auto"> 
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                                Usuario    
                             </a>
                             <div class="dropdown-menu dropdown-menu-right">
                                 <h6 class="dropdown-header">Seus dados</h6>
                                 <a class="dropdown-item" href="#">Nome: <?php echo "$nome";?></a>
                                 <a class="dropdown-item" href="#">Email: <?php echo "$email";?></a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="#" data-toggle="popover" data-placement="right" data-trigger="focus"
                            title="Dúvidas?!" data-content="Você não tem permissão">Modo admin</a>
                                    <a class="dropdown-item" href="doLogout.php">Logout</a>
                             </div>
                         </li>
                     </ul> 
                     <?php
                     }
                    }
                     ?>
                <!--  <ul class="navbar-nav ml-auto"> 
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                                 Login
                             </a>
                             <div class="dropdown-menu">
                                 <h6 class="dropdown-header">O que você é</h6>
                                 <a class="dropdown-item" href="_users/index.php">Cliente</a>
                                 <a class="dropdown-item" href="#">Admin</a>
                                 <div class="dropdown-divider"></div>
                             </div>
                         </li>
                     </ul> -->

                <!---Menu Dropdown Social-->
                <!--
              <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                            Social
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Facebook</a>
                            <a class="dropdown-item" href="#">Twitter</a>
                            <a class="dropdown-item" href="#">Instagram</a>
                        </div>
                    </li>
                </ul>
            -->
                

                <!---Form Buscar-->

                <!---- 
                
                <form class="form-inline">
                    <input class="form-control ml-4 mr-2 mt-2 mt-md-0" type="search" placeholder="Buscar...">
                    <button class="btn btn-dark mt-md-0 mt-3" type="Submit">OK</button>
                </form>

                !--->

            </div>

        </div>

    </nav>

    <div id="carouselSite" class="carousel slide d-md-block d-none" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#carouselSite" data-slide-to="0" class="active"></li>
            <li data-target="#carouselSite" data-slide-to="1"></li>
            <li data-target="#carouselSite" data-slide-to="2"></li>
        </ol>


        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="../imgs/1.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Aumente sua produtividade!</h1>
                    <p class="lead">Com nossa ajuda, você conseguirá produzir mais e gastar menos!</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="../imgs/2.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                        <h1>Desbloqueie novas opções!</h1>
                        <p class="lead">Ajudaremos a você encontrar novos clientes e fornecedores para o seu negócio.</p>
                    </div>
            </div>

            <div class="carousel-item">
                <img src="../imgs/3.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-dark">Esteja conectado!</h1>
                        <p class="lead text-dark">Com nossa vasta rede, podemos alavancar sua rede em instantes.</p>
                    </div>
            </div>    

        </div>

        <a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Anterior</span>
        </a>

        
        <a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Avançar</span>
        </a>

    </div>

    <div class="container">

        <div class="row">
            <div class="col-11 col-md-12 text-center ml-md-0 ml-2 my-5">

                <h1 class="display-3"><i class="fas fa-briefcase text-info" aria-hidden="true"> </i>
                  
                    Conheça nossa empresa!
                </h1>
               <!---Pode colocar subtitulo aqui-->
            </div>
        </div>

        <div class="row mb-5">

            <div class="col-sm-6 col-md-4 mb-3">

                <nav id="navbarVertical" class="navbar navbar-info bg-light">

                    <nav class="nav nav-pills flex-column">

                        <a class="h5 nav-link text-info" href="#item1">Missão, Visão Valores</a>

                        <nav class="nav nav-pills flex-column">
                                <a class="nav-link ml-4 text-info" href="#item1-1">Missão</a>
                                <a class="nav-link ml-4 text-info" href="#item1-2">Visão</a>
                                <a class="nav-link ml-4 text-info" href="#item1-3">Valores</a>
                        </nav>

                        <a class="h5 nav-link my-2 text-info" href="#item2">Titulo2</a>
                        
                        <a class="h5 nav-link my-2 text-info" href="#item3">Titulo3</a>

                        <nav class="nav nav-pills flex-column">
                                <a class="nav-link ml-4 text-info" href="#item3-1">Sub 3-1</a>
                                <a class="nav-link ml-4 text-info" href="#item3-2">Sub 3-2</a>
                        </nav>

                    </nav>

                </nav>

            </div>

            <div class="col-sm-6 col-md-8">

                <div data-spy="scroll" data-target="#navbarVertical" data-offset="0" class="scrollspySite">

                    <h4 id="item1"> Missão, Visão e Valores </h4>
                    <p>.</p>

                    <h5 id="item1-1">Missão</h5>
                    <p>Somos uma empresa com o intuito de alavancar a sua empresa no mercado, modificando o ambiente organizacional do cliente para maximizar a sua renda final. Isso porque o seu objetivo é o nosso objetivo.</p>

                    <h5 id="item1-2"> Visão </h5>
                    <p>Ser reconhecida entre as maiores empresas de consultoria voltadas para a tecnologia, adaptando todo o mercado no avanço tecnológico atual e futuro.</p>
                    
                    <h5 id="item1-3"> Valores </h5>
                    <p>
						<dl>
							<dt>Integridade</dt>
							<dd>
								Procurar esclarecimento e transparência máxima de todos os processos presentes e dos processos planejados para o cliente.
							</dd>
							<dt>Espírito de equipe</dt>
							<dd>
								Tanto entre a nossa equipe quanto com a equipe de nosso cliente procuramos, juntos, um resultado positivo para os problemas e os desafios.
							</dd>
							<dt>Empreendedorismo</dt>
							<dd>
								Buscamos as melhores soluções com otimismo e persistência, dispostos a encarar desafios diante a tecnologia.
							</dd>
							<dt>Resultados extraordinários</dt>
							<dd>
								Conseguir satisfazer o cliente e, simultaneamente, demonstrar o melhor de nossos colaboradores com excelentes resultados.
							</dd>
						</dl>
					</p>

                    <h4 id="item2">Title 2</h4>
                    <p>.</p>

                    <h4 id="item3">Title 3</h4>
                    <p>.</p>

                    
                    <h5 id="item3-1">Sub 3-1</h5>
                    <p>.</p>

                    <h5 id="item3-2">Sub 3-2</h5>
                    <p>!</p>


                </div>
                
            </div>
        </div>


        <!---CARDS-->
        <div class="row justify-content-sm-center">

                <div class="col-sm-6 col-md-4">
                    <div class="card mb-5">
                        <img class="card-img top" src="../imgs/card1.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Subtitle</h6>   
                            <p class="card-text">Descrição</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Item-item</li>
                            <li class="list-group-item">Item-item</li>
                            <li class="list-group-item">Item-item</li>
                        </ul>
                        <div class="card-body">     
                            <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal">
                                Ver mais
                            </a>
                                      
                        </div>
                        <div class="card-footer text-muted">
                            Rodapé
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                        <div class="card mb-5">
                            <img class="card-img top" src="../imgs/card2.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <h6 class="card-subtitle mb-2 text-muted">Subtitle</h6>   
                                <p class="card-text">Descrição</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Item-item</li>
                                <li class="list-group-item">Item-item</li>
                                <li class="list-group-item">Item-item</li>
                            </ul>
                            <div class="card-body">     
                                <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal">
                                    Ver mais
                                </a>
                                          
                            </div>
                            <div class="card-footer text-muted">
                                Rodapé
                            </div>
                        </div>
                </div>

                <div class="col-sm-6 col-md-4">
                        <div class="card mb-5">
                            <img class="card-img top" src="../imgs/card3.jpg">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <h6 class="card-subtitle mb-2 text-muted">Subtitle</h6>   
                                <p class="card-text">Descrição</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Item-item</li>
                                <li class="list-group-item">Item-item</li>
                                <li class="list-group-item">Item-itemx</li>
                            </ul>
                            <div class="card-body">     
                                <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal">
                                    Ver mais
                                </a>
                                     
                            </div>
                            <div class="card-footer text-muted">
                                Rodapé
                            </div>
                        </div>
                </div>

        </div>
    </div>

    <div class="jumbotron jumbotron-fluid bg-dark">

        <div class="container">

            <div class="row">
                <div class="col-12 text-center text-white">
                    <h1 class="display-4"><i class="fa fa-video-camera text-info col-12 col-md-1" aria-hidden="true"></i>
                        Dê uma olhada nos projetos anteriores
                    </h1>

                    <p class="lead mt-4 mt-md-0">
                        Descrição. O curso aborda disciplinas das áreas de informática e gestão, que têm como base a matemática. Dentro de computação, o estudante aprende linguagem de programação, desenvolvimento de softwares e implementação de sistema de banco de dados, entre outros. Já no campo gerencial, estuda administração, contabilidade, finanças, economia, negócios, marketing, gestão de pessoas e gestão da produção 
                    </p>
                    <hr>
                </div>
            </div>

            <div class="row text-white">
                <div class="col-12 text-white">
                    <ul class="nav nav-pills justify-content-center mb-4" id="pills-nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-pills-01" data-toggle="pill" href="#nav-item-01">
                                A Fatec
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-pills-02" data-toggle="pill" href="#nav-item-02">
                                Descrição-2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-pills-03" data-toggle="pill" href="#nav-item-03">
                                Descrição-3
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" id="nav-pills-03" data-toggle="pill" href="#nav-item-04">
                                Descrição-4
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" id="nav-pills-content">
                        <div class="tab-pane fade show active" id="nav-item-01" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" 
                                            src="https://www.youtube.com/embed/SQalAJklRdI">
                                        </iframe>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-4 mt-md-0">
                                    <p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean urna ligula, semper et vehicula scelerisque, tincidunt non dolor. Sed metus turpis, iaculis a finibus ut, ullamcorper placerat elit. In hac habitasse platea dictumst. Donec in lectus tincidunt, gravida ipsum at, scelerisque arcu. Etiam eget metus dignissim, eleifend dui vel, cursus nisi. In aliquet, enim sit amet cursus convallis, sapien risus imperdiet turpis, pretium porta dui risus sagittis dui. Aliquam urna mi, posuere vitae scelerisque ut, interdum sed odio. Aenean leo massa, tincidunt sed volutpat id, viverra vitae neque. Nunc hendrerit felis vitae felis dignissim, vitae pharetra elit commodo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac urna tortor.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-item-02" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" 
                                        src="https://www.youtube.com/embed/SQalAJklRdI">
                                        </iframe>
                                        <!-- <img src="imgs/_PI_1.png" alt=""> -->
                                     </div> 
                                </div>
                                
                                <div class="col-sm-6 mt-4 mt-md-0">
                                    <p>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aplicar os conhecimentos adquiridos no decorrer do curso para a prática dos conceitos de modelagem de processos a partir da criação de uma empresa de consultoria formada pelos alunos.
										<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Este projeto consiste em analisar os processos de uma empresa escolhida pelos membros do grupo por meio do mapeamento de processos, utilizando-se a ferramenta Bizagi. O projeto tem como objetivo a compreensão dos processos organizacionais, onde seja possível identificar oportunidades de melhoria e propor as soluções adequadas para cada caso.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-item-03" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" 
                                            src="https://www.youtube.com/embed/SQalAJklRdI">
                                        </iframe>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 mt-4 mt-md-0">
                                    <p>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aplicar os conhecimentos adquiridos no decorrer do curso para a prática dos conceitos de modelagem (requisitos, banco de dados, funções) e a criação de um protótipo (interface) para um sistema. 
										<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recomenda-se que o sistema a ser modelado esteja relacionado com a empresa modelada no Projeto Interdisciplinar I. Este projeto consiste no planejamento (incluindo estudo de viabilidade e sustentabilidade), na modelagem de utilizando a UML (diagrama de casos de uso, diagrama de classe, diagrama de sequência, diagrama de estado), na modelagem e criação do Banco de Dados e na elaboração do projeto de interface de um sistema.

                                    </p>
                                </div>
                            </div>
                        </div>
						
						<div class="tab-pane fade" id="nav-item-04" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" 
                                            src="https://www.youtube.com/embed/SQalAJklRdI">
                                        </iframe>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 mt-4 mt-md-0">
                                    <p>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Integrar conjuntos de conhecimentos de determinados componentes curriculares no desenvolvimento de projetos práticos e/ou aplicados desenvolvendo um sistema dinâmico baseado em web, dividido em front end (apresentação) e backend ( administração), viabilizando uma interação dinâmica e interativa.
										<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sistemas baseados em web, com o objetivos da melhoria da qualidade, comunicação, interação com seus usuários, estratégias de marketing para aumento da produção do foco do negócio da organização, além disso deve ser observado a segurança da aplicação, uma vez que esta se encontra exposta na rede mundial de computadores. Outro fator a ser observado é o custo financeiro da aplicação. Articulação: Nesta fase se relaciona-se com as disciplinas de humanas, exatas e sociais, possibilitando transitar em ambiente de gestão. 

                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Formulary -->
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-10 text-center my-md-4 mb-4 mt-2 ml-4">
                <h1 class="display-4"><i class="fas fa-envelope text-info col-12 col-md-1" aria-hidden="true"></i>
                    Entre em contato conosco
                </h1>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Seu nome</label>
                            <input type="text" class="form-control" id="inputNome" placeholder="Digite aqui seu nome">
                        </div>
                        <div class="form-group col-sm-6">
                                <label for="inputSobrenome">Seu sobrenome</label>
                                <input type="text" class="form-control" id="inputSobrenome" placeholder="Digite aqui sobrenome">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                                <label for="inputEnd">Seu endereço</label>
                                <input type="text" class="form-control" id="inputEnd" placeholder="Digite aqui seu endereço completo">
    
                        </div>
                    </div>    

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                                <label for="inputCidade">Sua cidade</label>
                                <input type="text" class="form-control" id="inputCidade" placeholder="Digite aqui sua cidade">
                        </div>
                        <div class="form-group col-sm-4">
                                <label for="inputEst">Seu estado</label>
                                <select id="inputEst" class="form-control">
                                    <option selected>Unidades federativas...</option>
                                    <option>AC</option>
                                    <option>AL</option>
                                    <option>AM</option>
                                    <option>AP</option>
                                    <option>BA</option>
                                    <option>CE</option>
                                    <option>DF</option>
                                    <option>ES</option>
                                    <option>GO</option>
                                    <option>MA</option>
                                    <option>MG</option>
                                    <option>MT</option>
                                    <option>MS</option>
                                    <option>PA</option>
                                    <option>PB</option>
                                    <option>PE</option>
                                    <option>PI</option>
                                    <option>PR</option>
                                    <option>RJ</option>
                                    <option>RO</option>
                                    <option>RN</option>
                                    <option>RS</option>
                                    <option>SC</option>
                                    <option>SE</option>
                                    <option>SP</option>
                                    <option>TO</option>
                                </select>
                        </div>
                        <div class="form-group col-sm-2">
                                <label for="inputCEP">Seu CEP</label>
                                <input type="text" class="form-control" id="inputCEP" placeholder="XXXXX-XXX">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox">Desejo receber novidades no e-mail
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">Enviar</button>
                            <a tabindex="0" class="btn btn-secondary ml-2" role="button" data-toggle="popover" data-placement="right" data-trigger="focus"
                            title="Dúvidas?!" data-content="Fale conosco: cemg.oficial@gmail.com">Ajuda</a>
                        </div>
                    </div>

                </div>

            </form>

        </div>

    <!-- Footer-->
    <div class="row justify-content-center">
        <div class="col-sm-12 mb-3"><hr></div>
        <div class="col-sm-4">
            <h3 class="text-center">Idealizadores</h3>
            
            <p class="lead text-center mt-md-3 mt-3">
                Carlos H. Kwiatkowski
            </p>
            <p class="lead text-center mt-md-3 mt-3">
                Eduardo H. Dantas Dias
            </p>
            <p class="lead text-center mt-md-3 mt-3">
                Gustavo S. da Silva
            </p>
            <p class="lead text-center mt-md-3 mt-3">
                Henriky A. de Oliveira
            </p>
            <p class="lead text-center mt-md-3 mt-3">
                Marcos A. R. T. dos Santos
            </p>
                
            </p>
        </div>

        <!---Menu-->

        <!--

        <div class="col-sm-4">
                <h3 class="text-center">Menu</h3>
                <div class="list-group text-center">
                    <a chref="#" class="list-group-item list-group-item-action list-group-item-primary">
                        Perfil
                    </a>
                    <a chref="#" class="list-group-item list-group-item-action list-group-item-primary">
                        Serviços
                    </a>
                    <a chref="#" class="list-group-item list-group-item-action list-group-item-primary">
                        Depoimentos
                    </a>
                    <a chref="#" class="list-group-item list-group-item-action list-group-item-primary">
                        Contatos
                    </a>
                </div>
            </div>

            !-->

            <!--

            <div class="col-sm-4 mt-md-0 mt-4">
                    <h3 class="text-center">Social</h3>
                    <div class="btn-group-vertical btn-block btn-group-lg" role="group">
                        <a class="btn btn-outline-primary" href="#"><i class="fab fa-facebook"></i> Facebook</a>
                        <a class="btn btn-outline-info" href="#"><i class="fab fa-twitter-square"></i> Twitter</a>
                        <a class="btn btn-outline-warning" href="#"><i class="fab fa-instagram"></i> Instagram</a>
                    </div>            
            </div>
                !-->
            
        </div>
    </div>
        <div class="col-12 mt-5 bg-info pb-2">
                <hr>
                <blockquote class="blockquote text-center text-light">
                    <p class="mb-0"><em>"Só se pode alcançar um grande êxito quando nos mantemos fiéis a nós mesmos.."</p>
                    <footer class="blockquote-footer text-white">Nietzsche, <cite tittle="titulo">Friedrich</cite>
					<marquee>
					Copyright &copy; 2020 - by Consultoria Empresarial e Melhoria da Gestão (CEMG)
					</marquee>
					</footer>
                </blockquote>
        </div>
    </div>

    <!--Modal-->
    <div class="modal fade" id="siteModal" tabindex="-1" role="dialog">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Ver mais</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                
                <div class="modal-body"> 
                    <div class="container-fluid">
                        <div class=row>
                            <div class="col-6">
                                <h5>Contrato</h5>
                                <p>Os transportes são limitados pela localidade, atente-se ao plano assinado!</p>
                            </div>       
                            <div class="col-6">
                                    <h5>Ligue para nós:</h5>
                                    <p>(35) 99999-0103</p>                
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="modal-header">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>

            </div>
        </div>

    </div>

    <!-- jQuery,Popper.js, then Bootstrap JS ... all called from our source/-->
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
  </body>
</html>