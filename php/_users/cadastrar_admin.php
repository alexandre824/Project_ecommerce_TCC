<?php
require_once '../_classes/usuario.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrat</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/_css/estilologin.css">
</head>
<body id="admin">
    <div id="corpo_form_cad">
        <div id="container">
        <h1>Cadastrar</h1>
        <form method="POST">
            <input name="nome" type="text" placeholder="Nome Completo" maxlength="40"/>
            <input name="telefone" type="text" placeholder="Telefone" maxlength="30"/>
            <input name="email" type="email" placeholder="Email" maxlength="30"/>
            <input name="senha" type="password" placeholder="Senha" maxlength="15"/>
            <input name="conf_senha" type="password" placeholder="Confirmar Senha"/>
            <input id="boton" type="submit" name="enviar" value="CADASTRAR"/>
            <a href="admin_login.php">Já possui uma conta?<strong>Faça Login!</strong></a> 
        </form>
        </div>
    </div>
<?php
// Verificar se clicou no botão
if (isset($_POST['email']))
{
    $nome = addslashes/*Impedindo invasão de hackers*/($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmar = addslashes($_POST['conf_senha']);
    $admin = addslashes("sim");
    // Verificar se esta vazio
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmar)){
        $u->conectar('projeto_login','localhost','CEMG','cemgoficial');
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