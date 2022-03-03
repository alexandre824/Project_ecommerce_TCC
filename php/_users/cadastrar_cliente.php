<?php
require_once '../_classes/usuario.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bazar pocotom :: Cadastro</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cirar Conta</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="nome" type="text" placeholder="Enter your first name" name="nome"/>
                                                        <label for="nome">Nome</label>
                                                    </div>


                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" type="email" placeholder="name@example.com" name="email"/>
                                                <label for="email">Endereço de email</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="senha" type="password" placeholder="Create a senha" name="senha"/>
                                                        <label for="senha">Senha</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="conf_senha" type="password" placeholder="Confirm password" name="conf_senha"/>
                                                        <label for="conf_senha">Confirmar Senha </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telefone" type="text" placeholder="name@example.com" name="telefone"/>
                                                <label for="telefone">Telefone</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" name="enviar" class="btn login_btn" value="Cadastrar">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">Ja possui uma conta? <a href="new_login.php">Faça Login</a></div>
                                    </div>
                                        <div class="small"><a href="../../">Voltar para pagina inicial</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Vulcan Consultoria 2021</div>
                            <div>
                                <a href="../../html/privacidade.html">Politica e Privacidade</a>
                                &middot;
                                <a href="../../html/termos">Termos &amp; Condições</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php
// Verificar se clicou no botão
if (isset($_POST['email']))
{
    /*Impedindo invasão de hackers*/
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmar = addslashes($_POST['conf_senha']);
    $admin = 0;
    // Verificar se esta vazio
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmar)){
        $u->conectar('epiz_29603983_bazar','sql207.epizy.com','epiz_29603983','mNbUUWV4PUJKP');
        // $u->conectar('nome_tabela','localhost','nome_usuario','senha_usuario');
        if($u->msgErro == "")#Esta tudo OK
        {
            if($senha == $confirmar){
                if ($u->cadastrar($nome,$telefone,$email,$senha,$admin))
                {
                    ?>
                    <div class="msg-sucesso">
                        Cadastro com sucesso! Acesse para entrar!
                    </div>
                    <?php
                    header('location: .\index.php');
                }
                else
                {   
                    ?>
                    <div class="msg-sucesso">
                        email já cadastrado
                    </div>
                    <?php
                }
            }else
            {
                ?>
                <div class="msg-erro">
                    Senha e confirmar senha não correspondem!   
                </div>
                <?php
            }
        }else
        {
            echo "Erro: ".$u->msgErro;
        }
    }else{
        ?>
        <div class="msg-erro">
            Preencha todos os campos!   
        </div>
        <?php
    }
}
?>
</body>
</html>