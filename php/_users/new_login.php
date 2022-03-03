<?php
require_once '../_classes/usuario.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
    
<head>
	<title>Bazar Pocotom :: Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/newlogin.css">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../../img/_logo.png"  class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="email" name="email" class="form-control input_user" value="" placeholder="email">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="senha" class="form-control input_pass" value="" placeholder="Senha">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Lembre de mim</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit" name="enviar" class="btn login_btn" value="ACESSAR">
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Você não tem uma conta ainda? <a href="cadastrar_cliente.php" class="ml-2">Cadastre-se</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="../../html/recuperar_senha.html">Esqueceu a senha?</a>
					</div>
				</div>
			</div>
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
        $u->conectar('epiz_29603983_bazar','sql207.epizy.com','epiz_29603983','mNbUUWV4PUJKP');
		// $u->conectar('bazar','localhost','adm.vulcan','admin');
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
</body>
</html>
