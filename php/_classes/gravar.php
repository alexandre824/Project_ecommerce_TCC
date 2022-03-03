<?php
//Criamos uma função que recebe um texto como parâmetro.

class Gravar{
	public function emails($email, $nome, $informacao, $conversa){
	//Variável arquivo armazena o nome e extensão do arquivo.
	$arquivo = "emails.txt";
	
	$texto = "Nome: $nome \n Email para resposta: $email \n Informações adicionais: $informacao \n Assunto: Entrando em contato \n <_____Campo_____> \n $conversa \n \n";

	//Variável $fp armazena a conexão com o arquivo e o tipo de ação.
	$fp = fopen($arquivo, "a+");

	//Escreve no arquivo aberto.
	fwrite($fp, $texto);
	
	//Fecha o arquivo.
	fclose($fp);

}
}



?>