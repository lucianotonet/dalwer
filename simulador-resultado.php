<!--Se simulado-->
<?php
//SESSION START
if (!session_id()) {
	session_set_cookie_params(0);
	session_start();
}

//SE POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	//NOME
	if(isset($_POST['nome']) && strlen($_POST['nome'])>0) {
			$cliente_nome = explode(' ',$_POST['nome']);
			
			$_SESSION['cliente_nome'] = ucfirst($cliente_nome[0]);
			
			$cliente_nome[0] = '';
			
			$cliente_sobrenome = "";
			if(isset($cliente_nome[1])) {
				$cliente_sobrenome = ucfirst(trim(implode(' ',$cliente_nome)));
				$_SESSION['cliente_sobrenome'] = $cliente_sobrenome;
			}
			
	}
	
	
	//EMAIL
	if(isset($_POST['email']) && $_POST['email'] != ''){
		$cliente_email 	= trim($_POST['email']);
		$_SESSION['cliente_email'] = $cliente_email;
		
		$enviar_email = true;		
	}else{
		$enviar_email = false;
	}
	
	//TEL
	if(isset($_POST['tel']) && $_POST['tel'] != ''){
		$cliente_tel 	= trim($_POST['tel']);
		
		$cliente_tel	=  preg_replace("/[^0-9]/","", $cliente_tel);
		$cliente_tel	= "(".substr($cliente_tel, 0, 2).") ".substr($cliente_tel, 2, 4)."-".substr($cliente_tel,6);
						
		$_SESSION['cliente_tel'] = $cliente_tel;
	}
	
	
	$cliente_nome 		= isset($_SESSION['cliente_nome']) ? $_SESSION['cliente_nome'] : "";
	$cliente_sobrenome 	= isset($_SESSION['cliente_sobrenome']) ? " ".ucfirst($_SESSION['cliente_sobrenome']) : "" ;
	$cliente_email		= isset($_SESSION['cliente_email']) ? $_SESSION['cliente_email'] : "";
	$cliente_tel		= isset($_SESSION['cliente_tel']) ? $_SESSION['cliente_tel'] : "";
	
	$consorcio_tipo		= $_POST['tipo'];
	$consorcio_id		= $_POST['consorcio_id'];
	$args = array(
		'tipo'	 	=> $consorcio_tipo,
		'p'			=> $consorcio_id,
		'post_type' => 'consorcio',
	);
	$query = new WP_Query( $args );
	
	while ( $query->have_posts() ) : $query->the_post(); 
		$valor 	= get_post_meta( $post->ID, '_valor_consorcio', true );				
?>
	<div class="column one-column border">	
        <div class="border-title">         
            <h1 class="valor"> R$ <?php echo $valor; ?> <span> </span> </h1>
        </div>
        <h4>Resultado da simulação</h4>
<style>
	.valor{
        font-size:32px;
    }
</style>              
        <table width="100%" border="0" cellspacing="10px" cellpadding="10px">
            <tr>
                <th scope="col">Prazo</th>
                <th scope="col">Parcela</th>
                <?php
					$meiaparcela 	= get_post_meta( $post->ID, '_meia_parcela_consorcio_1', true ); 
					if($meiaparcela){
						$meia = true;
				?>
                <th scope="col">1/2 Parcela</th>
                <?php }else{
						$meia = false;
					  }
				?>
                <th scope="col"></th>
            </tr>
            <?php
				$planos = 6;
				for($i = 1; $i <= $planos; $i++){
					$prazo			= get_post_meta( $post->ID, '_prazo_consorcio_'.$i, true );
					$parcela 		= get_post_meta( $post->ID, '_parcela_consorcio_'.$i, true );
					$meiaparcela 	= get_post_meta( $post->ID, '_meia_parcela_consorcio_'.$i, true );
					$info	 		= get_post_meta( $post->ID, '_info_consorcio_'.$i, true );
					
					if ($prazo){
						?>
						<tr>
							<td><strong><?php echo $prazo; ?> X</strong></td>
							<td><strong>R$ <?php echo $parcela;  ?></strong></td>
                            <?php if($meia){ ?>
								<td><strong style="font-size:1.5em;">R$ <?php echo $meiaparcela; ?></strong></td>
                            <?php } ?>
							<td><a href="<?php echo get_permalink( get_page_by_path( 'solicitar-consorcio' ) ) ?>&id=<?php echo $post->ID; ?>&tipo=<?php echo $tipo ?>" title="" class="button small red"> Solicitar </a></td>
						</tr>
						<?php
					}
				}
			?>
        </table>
        <br />
</div>
<div class="hr-invisible"></div>            
		<?php 		
				endwhile;	
				wp_reset_postdata();

	//ENVIA NOTIFICAÇÃO
	if($enviar_email){
		$para 	 = "contato@dalwer.com.br";
		$assunto = "Simulação realizada no site";
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= "From: Dalwer Investimentos (SITE) <contato@dalwer.com.br>" . "\r\n";
		$headers .= "Cc: tonetlds@gmail.com" . "\r\n"; 
		$corpo	  = "";
		
		$corpo .= '<p>Olá. O visitante "'.$cliente_nome.'" acabou de realizar uma simulação no site.</p>';
		$corpo .= '<p><b>Nome completo: </b>'.$cliente_nome.$cliente_sobrenome.'</p>';
		$corpo .= '<p><b>E-mail: </b>'.$cliente_email.'</p><br />';
		$corpo .= '<p>O primeiro valor simulado foi de <strong>R$ '.$valor.'</strong> na página <strong>'.get_the_title().'</strong></p>';
		$corpo .= '<p>Este visitante agora agora tornou-se um <em>lead</em> (cliente potencial). Não esqueça de salva-lo em sua lista de emails de clientes que realizaram uma simulação, se este email não pareçer falso.</p>';
		$corpo .= '<p>OBS: Você <strong>não</strong> será notificado de todas as simulações realizadas durante o acesso de "'.$cliente_nome.'", somente da primeira, onde é necessário informar nome e email.</p>';	
		
		
		//Envia o email
		wp_mail($para,$assunto,$corpo,$headers);
		//print_r($corpo);
	}

}

 ?>