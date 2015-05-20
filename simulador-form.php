<!-- Simulador -->
<?php
	if (!session_id()) {
			session_set_cookie_params(0);
			session_start();
		}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		
		if(isset($_POST['nome']) && strlen($_POST['nome'])>0) {
				$cliente_nome = explode(' ',$_POST['nome']);
				
				$_SESSION['cliente_nome'] = ucfirst($cliente_nome[0]);
				
				$cliente_nome[0] = '';
					
				if(isset($cliente_nome[1])) {
					$cliente_sobrenome = ucfirst(trim(implode(' ',$cliente_nome)));
				}
				
		}
		
		
			
			if(isset($_POST['email']) && $_POST['email'] != ''){
				$cliente_email 	= trim($_POST['email']);
				$_SESSION['cliente_email'] = $cliente_email;
			}
			
			if(isset($_POST['tel']) && $_POST['tel'] != ''){
				$cliente_tel 	= trim($_POST['tel']);
				
				$cliente_tel	=  preg_replace("/[^0-9]/","", $cliente_tel);
				$cliente_tel	= "(".substr($cliente_tel, 0, 2).") ".substr($cliente_tel, 2, 4)."-".substr($cliente_tel,6);
								
				$_SESSION['cliente_tel'] = $cliente_tel;
			}
	}
	
	
	$cliente_nome 		= isset($_SESSION['cliente_nome']) ? $_SESSION['cliente_nome'] : "";
	$cliente_sobrenome 	= isset($_SESSION['cliente_sobrenome']) ? " ".ucfirst($_SESSION['cliente_sobrenome']) : "" ;
	$cliente_email		= isset($_SESSION['cliente_email']) ? $_SESSION['cliente_email'] : "";
	$cliente_tel		= isset($_SESSION['cliente_tel']) ? $_SESSION['cliente_tel'] : "";
	
	if(!isset($_SESSION['cliente_nome'])  ||  !isset($_SESSION['cliente_email'])){
?>
    <div class="border-title">         
        <h3> Faça uma simulação! <span> </span> </h3>
    </div> 
    <h5> Selecione o valor do crédito desejado e confira as opções de prazos e parcelas sem juros. </h5>
<?php
	}else{
?>
	<div class="border-title">         
        <h3> Faça outra simulação! <span> </span> </h3>
    </div> 
    <h5> <strong><?php echo ucfirst($_SESSION['cliente_nome']) ?></strong>, sinta-se à vontade para realizar outra simulação.</h5>
<?php
	}
?>
<div class="message"></div>
<form action="<?php //echo get_page_link(); ?>" method="post" id="simulador">
    <div>
        Valor:<br>
        <select name="consorcio_id">
        
        <?php 
			global $tipo;
            $args = array(
                'post_type' => 'consorcio',
                'tipo' 		=> $tipo,
				'orderby'	=> 'meta_value_num',
				//'orderby'	=> 'meta_value',
				'meta_key'  => '_valor_consorcio',
				'order'		=> 'ASC',
				'posts_per_page'	=> 50
            );
            $query = new WP_Query( $args );
            
            while ( $query->have_posts() ) : $query->the_post(); 
            
                $valor = get_post_meta( $post->ID, '_valor_consorcio', true ); 	?>
                
                <option value="<?php echo $post->ID; ?>">R$ <?php echo $valor; ?></option>
                
            <?php
                endwhile;	
                wp_reset_postdata();
            ?>
        
        </select>
    </div>
    
    <?php
		if(!isset($_SESSION['cliente_nome']) ||  !isset($_SESSION['cliente_email'])){
	?>
        <div class="column one-column">
            Seu Nome:<br>
            <input name="nome" type="text" placeholder="Seu nome" value="<?php echo $cliente_nome.$cliente_sobrenome; ?>" required>
        </div>
        
        <div class="column one-column">
            Email:<br>
            <input name="email" type="email" placeholder="Seu email" value="<?php echo $cliente_email; ?>" required class="column one-half">
        </div>
        
        <!--<div class="column one-column">
            Telefone:<br>
            <input name="tel" type="text" placeholder="Telefone"  value="<?php echo $cliente_tel; ?>">
        </div>   -->
    <?php
		}
    ?>                
    
    <div class="column one-column">
        <input name="submit" type="submit" value="Simular">
        <img src="<?php bloginfo('template_url'); ?>/images/loader.gif" class="loader" /> 
        
        <input name="tipo" type="hidden" value="<?php echo $tipo ?>">
    </div>
    
    <div class="clear"></div>          
</form>

<!-- Simulador end -->
<style>
.loader{
    display: none;
 	float:right;
    margin:20px 20px 0 0;
}
.message{
    display:none;
}
</style>
<script type="text/javascript">
// jQuery(document).ready(function(e) {
//	 
//	jQuery('.message').prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false,social_tools: false});
//	 
//	jQuery('#simulador').submit(function(event){
//    	event.preventDefault();
//		var dados = jQuery("#simulador").serialize();
//		
//		jQuery('.loader').css({display:"block"});
//		
//		
//		
//		jQuery.prettyPhoto.open('<?php bloginfo("template_url"); ?>/simulador.php?ajax=true&'+dados,'Titulo','Descricao');
//		
//		jQuery('.loader').css({display:"none"});
//		
//		jQuery.ajax({
//			url: '<?php bloginfo("template_url"); ?>/simulador.php',
//			data: dados,
//			type: 'POST',
//			success: function(msg) {
//				//jQuery('#solicitar, .message').slideUp('slow',function(){	
//					
//					jQuery('.message').html(msg);
//					var content	= jQuery('.message');
//					
//												
//					//jQuery('.message').html(msg).slideDown('slow');
//				//});
//				//alert(msg);
//			},
//			beforeSend: function(){
//			jQuery('.loader').css({display:"block"});
//			},
//			complete: function(){
//			jQuery('.loader').css({display:"none"});
//			}
//		});
//		
//	  });
//});
</script>