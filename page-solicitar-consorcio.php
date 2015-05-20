<?php 
/*
Template Name: Solicitar Consórcio
*/


get_header(); ?>


<!-- **Main** -->
    <div id="main">

	<section class="breadcrumb-section">
        <div class="container">
            <div class="breadcrumb">
                <h1> <?php the_title(); ?> </h1>
            </div>
           <!-- <div class="main-phone-no">
                <p> 1 (800) 567 8765 <br> <a href="#" title=""> name@somemail.com </a> </p>
            </div>-->
        </div>
    </section>
    
		<!-- **Container** -->
        <div class="container">
        
        <?php
			if (!session_id()) {
				session_set_cookie_params(0);
				session_start();
			}

			$cliente_nome 		= isset($_SESSION['cliente_nome']) ? ucfirst($_SESSION['cliente_nome']) : "" ;
			$cliente_sobrenome 	= isset($_SESSION['cliente_sobrenome']) ? " ".ucfirst($_SESSION['cliente_sobrenome']) : "" ;
			$cliente_email 		= isset($_SESSION['cliente_email']) ? strtolower($_SESSION['cliente_email']) : "" ;
			$cliente_tel		= isset($_SESSION['cliente_tel']) ? $_SESSION['cliente_tel'] : "" ;
			
			//$cliente_tel	= "(".substr($cliente_tel, 0, 2).") ".substr($cliente_tel, 3, 4)."-".substr($cliente_tel,6);
			//print_r($_SESSION);
			
		?>
        
        <!-- **Primary Section** -->
        <section id="primary" class="content-full-width">
			
            <div class="column one-fifth">
            </div>
            
            <!--Form solicitar-->
            <div  id="form-solicitar" class="column three-fifth">
            
            <div class="border-title"> <h2> <?php the_title(); ?> <span> </span> </h2> </div>
                <div class="message">
                	<p>
						<?php
                    	if (have_posts()) :
						   while (have_posts()) :
							  the_post();
							  the_content();
						   endwhile;
						endif;
				 		?>    
                    </p>
                </div>
                <form method="post" id="solicitar">
                    <p class="">                        
                        Seu nome:
                        <input name="nome" id="nome" type="text" placeholder="Seu nome completo" value="<?php echo $cliente_nome.$cliente_sobrenome; ?>" required>
                    </p>
                    
                    <p class="column one-half">
                        Seu Email:
                        <input name="email" id="email" type="email" placeholder="Seu email" value="<?php echo $cliente_email; ?>" required>
                    </p>
                    
                    <p class="column one-half last">
                        Seu Telefone:
                        <input name="tel" id="tel" type="text" placeholder="(XX) XXXX-XXXX" value="<?php echo $cliente_tel; ?>">
                    </p>
                    
                    <p class="clear">
                    	<?php
                    		if(isset($_GET['id'])){
								$consorcio = get_post($_GET['id']); 
								$type = $consorcio->post_type;
								if($type == "contemplado"){
									$oque	= " adquirir a carta contemplada ";
									$tipo	= "para ".get_post_meta( $consorcio->ID, '_tipo_contemplado', true ). " ";
									$valor	= get_post_meta( $consorcio->ID, '_valor_contemplado', true );
								}else{
									$oque	= " fazer o consórcio ";
									if(isset($_GET['tipo'])){
										$term_list = wp_get_post_terms($consorcio->ID, 'tipo', array("fields" => "names"));
										$tipo	= "para ".$term_list[0]." ";
									}else{
										$tipo	= " ";
									}
									$valor	= get_post_meta( $consorcio->ID, '_valor_consorcio', true );
								}
								
								$msg	= "Estou interessado em".$oque . $tipo."de R$ ".$valor." e gostaria que entrassem em contato comigo assim que possível." ;
							}else{
								$msg = "";	
							}
                    	?>
                        Mensagem:
                        <textarea name="mensagem" id="msg" placeholder="Mensagem" cols="5" rows="3" required><?php echo $msg; ?></textarea>
                    </p>
                    
                    <p>
                    	<input name="submit" type="submit" value="Solicitar">
                    	<img src="<?php bloginfo('template_url'); ?>/images/loader.gif" class="loader" />   
                    </p>            
                </form>
                 <script type="text/javascript">
                 jQuery(document).ready(function(e) {
                   
               
                 	jQuery('#solicitar').submit(function(event){
						  event.preventDefault();
						  
						  //var name = jQuery("#nome").val();
						  //var email = jQuery("#email").val();
						  //var tel = jQuery("#tel").val();
	  					  //var msg = jQuery("#msg").text();
						 
						 var dados = jQuery("#solicitar").serialize();
						 
						  var dataString = 'nome='+ name + '&email=' + email + '&tel=' + tel + '&msg=' + msg;
	                      jQuery.ajax({
	                          url: '<?php bloginfo("template_url"); ?>/sendmail.php',
							  data: dados,
							  type: 'POST',
	                          success: function(msg) {
								jQuery('#solicitar, .message').slideUp('slow',function(){	
									
									jQuery('.message').html(msg).slideDown('slow');
																
									//jQuery('.message').html(msg).slideDown('slow');
								});
	                            //alert(msg);
	                          },
	                          beforeSend: function(){
	                            jQuery('.loader').css({display:"block"});
	                          },
	                          complete: function(){
	                            jQuery('.loader').css({display:"none"});
	                          }
	                    });
					  });
                });
                </script>
            </div>
            <!--end Form solicitar-->  
            
            <div class="column one-fifth last">
            </div>

    	</section>
    </div>
</div>

<style>
.loader{
    display: none;
 	float:right;
    margin:20px 20px 0 0;
}
.message{
}
</style>



<!-- Google Code for Simulação Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 984200888;
var google_conversion_language = "pt";
var google_conversion_format = "2";
var google_conversion_color = "99ff99";
var google_conversion_label = "ObsVCLiWlQgQuO2m1QM";
var google_conversion_value = 0;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/984200888/?value=0&amp;label=ObsVCLiWlQgQuO2m1QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<?php get_footer(); ?>