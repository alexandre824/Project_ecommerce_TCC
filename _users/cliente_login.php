<?php
require_once '../_classes/usuario.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../_css/estilologin.css">
</head>
<body id="cliente">
    <div id="corpo_form_login_cliente">
        <dic id="container">
        <h1>Entrar</h1>
        <form method="POST">
            <input name="email" type="email" placeholder="Email"/>
            <input name="senha" type="password" placeholder="Senha"/>
            <input id="boton" type="submit" name="enviar" value="ACESSAR"/>
            <a href="cadastrar_cliente.php">Não tem uma conta?<strong>Cadastre-se!</strong></a> 
        </form>
</div>
    </div>
<?php
if (isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    // Verificar se esta vazio
    if(!empty($email) && !empty($senha))
    {
        $u->conectar('projeto_login','localhost','CEMG','cemgoficial');
        if($u->msgErro == "")#Esta tudo OK
        {
            if ($u->logar($email,$senha))
            {
                ?>
                <div class="msg-sucesso">
                    Login efetuado!
                </div>
                <?php
                header("location: confirma.php");
            }else{
                ?>
                <div class="msg-erro">
                    Email e/ou senha estão incorretos!  
                </div>
                <?php
            }
        }else{
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