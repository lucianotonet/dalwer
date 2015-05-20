<?php
define('WP_USE_THEMES', false);
require('../../../wp-blog-header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
//	 $nome 		= $_POST['nome'];
//	 $email 	= $_POST['email'];
//	 $telefone 	= $_POST['tel']; 
//	 $msg 		= $_POST['mensagem'];

	//session_start();
	
	//Email 
	$para 	 = "contato@dalwer.com.br";
	$assunto = "Mensagem do site";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= "From: Dalwer Investimentos (SITE) <contato@dalwer.com.br>" . "\r\n";
	$headers .= "Cc: tonetlds@gmail.com" . "\r\n"; 
	//$headers .= "Bcc: contato@lucianotonet.com" . "\r\n";
	$corpo	  = "";
	
	
	//NOME
	if(isset($_POST['nome']) && strlen($_POST['nome'])>0) {
				$nome = explode(' ',$_POST['nome']);
				$cliente_nome	= ucfirst($nome[0]);
				$_SESSION['cliente_nome'] = $cliente_nome;
				
				$nome[0] = '';
					
				if(isset($nome[1])) {
					$cliente_sobrenome = " ".ucfirst(trim(implode(' ',$nome)));
					$_SESSION['cliente_sobrenome'] = trim($cliente_sobrenome);
				}
				
	}
	
	//EMAIL
	if(isset($_POST['email']) && strlen($_POST['email'])>0) {
		$cliente_email 	= strtolower(trim($_POST['email']));
		$_SESSION['cliente_email'] = $cliente_email;
		
	};
	
	//TELEFONE
	if(isset($_POST['tel']) && strlen($_POST['tel'])>0) {
		$cliente_tel 	= trim($_POST['tel']);		
		$cliente_tel	=  preg_replace("/[^0-9]/","", $cliente_tel);
		$cliente_tel	= "(".substr($cliente_tel, 0, 2).") ".substr($cliente_tel, 2, 4)."-".substr($cliente_tel,6);
						
		$_SESSION['cliente_tel'] = $cliente_tel;
		
		
	};
	
	//ENDEREÇO
	if(isset($_POST['endereco']) && strlen($_POST['endereco'])>0) {
		$endereco	= $_POST['endereco'];
	};
	
	//MENSAGEM
	if(isset($_POST['mensagem']) && strlen($_POST['mensagem'])>0) {
		$msg 		= $_POST['mensagem'];
	};
	

	$cliente_nome 		= isset($cliente_nome)	? $cliente_nome : "";
	$cliente_sobrenome 	= isset($cliente_sobrenome)	? $cliente_sobrenome : "";
	$cliente_email		= isset($cliente_email)	? $cliente_email : "";
	$cliente_tel		= isset($cliente_tel)	? $cliente_tel : "";
	$endereco			= isset($endereco)	? $endereco : "";
	$msg				= isset($msg)	? $msg : "";
	
	
	
	$corpo .= '<p><b>Nome: </b>'.$cliente_nome.$cliente_sobrenome.'</p>';
	$corpo .= '<p><b>E-mail: </b>'.$cliente_email.'</p>';
	$corpo .= '<p><b>Telefone: </b>'.$cliente_tel.'</p>';
	$corpo .= '<p><b>Endereço: </b>'.$endereco.'</p>';
	$corpo .= '<p><b>Mensagem: </b>'.$msg.'</p>';
		
	if(substr_count($cliente_email,"@") == 1){
		$headers .= "Reply-To: ".$cliente_email."\r\n";
	}
	
	
	//Envia o email
	$envia = wp_mail($para,$assunto,$corpo,$headers);
	if($envia)
	{		
		echo "Muito obrigado, ".$cliente_nome."!<br />Analisaremos o seu pedido e em breve entraremos em contato com você.";
	}
	else
	{		
		echo "Oops... <br />Um erro ocorreu. Nâo foi possível enviar o email.<br />Por favor recarregue a página e tente novamente.";
	}

}
?>