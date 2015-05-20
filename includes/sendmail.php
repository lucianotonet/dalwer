<!DOCTYPE HTML>
<html>
<head>
<meta charset="iso-8859-1">
<title></title>
</head>

<body>
<?php
 $nome 		= $_POST['nome'];
 $email 	= $_POST['email'];
 $telefone 	= $_POST['tel']; 
 $msg 		= $_POST['mensagem'];
 
 $para = "contato@dalwer.com.br";
 $assunto = "Mensagem do site";
 
 $corpo = '<p><b>Nome: </b>'.$nome.'</p>';
 $corpo .= '<p><b>E-mail: </b>'.$contato.'</p>';
 $corpo .= '<p><b>Telefone: </b>'.$telefone.'</p>';
 $corpo .= '<p><b>Cidade: </b>'.$cidade.' - '.$uf.'</p>';
 $corpo .= '<p><b>Mensagem: </b>'.$msg.'</p>';


//para o envio em formato HTML
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

//endereço do remitente
$headers .= "From: Site <contato@conffiare.com.br>" . "\r\n";

if(substr_count($contato,"@") == 1){
//endereço de resposta, se queremos que seja diferente a do remitente
$headers .= "Reply-To: ".$contato."\r\n";
}

//endereços que receberão uma copia 
$headers .= "Cc: tonetlds@gmail.com" . "\r\n"; 
//endereços que receberão uma copia oculta
$headers .= "Bcc: tonetlds@gmail.com" . "\r\n";
$email = mail($para,$assunto,$corpo,$headers);
if($email)
{
	$enviado = 'true';
}
else
{
	$enviado = 'false';
}
?>
Enviado com sucesso!
	<script>
    	//window.location = "<?php echo $backto; ?>/?enviado=<?php echo $enviado; ?>";
    </script>
</body>
</html>