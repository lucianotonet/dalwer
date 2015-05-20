<?php 
/*
Template Name: Contato
*/


get_header(); ?>


<?php
	if (have_posts()) :
	   while (have_posts()) :
		  the_post();
?>		  
	
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
        
        <!-- **Primary Section** -->
        <section id="primary" class="content-full-width">   
        
        	<div class="column two-third">            
                <h3> Envie sua mensagem </h3>
                
                <!-- form contato -->
                <div class="message"></div>
                <form action="sendmail.php" method="post" id="contact-form">
                    <p class="column one-third">
                    	Nome:
                        <input name="nome" type="text" placeholder="Seu nome" value="<?php echo $cliente_nome.$cliente_sobrenome; ?>" required>
                    </p>
                    
                    <p class="column one-third">
                    	Email:
                        <input name="email" type="email" placeholder="Seu email" value="<?php echo $cliente_email; ?>" required>
                    </p>
                    
                    <p class="column one-third last">
                    	Telefone:
                        <input name="tel" type="text" placeholder="Telefone" value="<?php echo $cliente_tel; ?>" >
                    </p>
                    
                    <p class="clear">
                    	Mensagem:
                        <textarea name="mensagem" placeholder="Mensagem" cols="5" rows="3" required></textarea>
                    </p>
                    
                    <p>
                        <input name="submit" type="submit" value="Enviar">
                        <img src="<?php bloginfo('template_url'); ?>/images/loader.gif" class="loader" />   
                    </p>            
                </form>
                <!-- end form contato -->
                
            </div>  
            
            <div class="column one-third last">
            	<h3> Informações de contato </h3>
				
                <div class="contact-details">
                	<p> Av. Osvaldo Aranha, 599<br />Bento Gonçalves - RS</p>
                    <p> <span class="icon-phone"> </span>(54) 3451-6770 </p>
                    <p> <span class="icon-mobile-phone"> </span> (54) 9901-3691 </p>
                    <p> <span class="icon-envelope-alt"> </span> <a href="mailto:contato@dalwer.com.br"> contato@dalwer.com.br </a> </p>
                    <br /> 
                    <h3> Solicite uma visita! </h3>                   
                </div>
            </div>
            

<?php the_content(); ?>


        </section><!-- **Primary Section** -->      
         
        <div class="clear"></div>
        
        <hr />
        
        <h3> Onde estamos </h3>
        <br />
		<br />

        </div><!-- **Container - End** -->
                
        <div class="fullwidth-map">
        <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?q=Dalwer+Investimentos,+Bento+Gon%C3%A7alves&amp;hl=pt&amp;ie=UTF8&amp;sll=-28.262838,-52.444227&amp;sspn=0.342915,0.676346&amp;hq=Dalwer+Investimentos,&amp;hnear=Bento+Gon%C3%A7alves+-+Rio+Grande+do+Sul&amp;t=m&amp;cid=15863521649038624076&amp;ll=-29.157877,-51.521695&amp;spn=0.006558,0.021458&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>
	       <!-- <div id="map"> </div>-->
        </div>
        
         <script type="text/javascript">
                 jQuery(document).ready(function(e) {
                   
               
                 	jQuery('#contact-form').submit(function(event){
						  event.preventDefault();
						  
						
						 var dados = jQuery("#contact-form").serialize();
						 
	                      jQuery.ajax({
	                          url: '<?php bloginfo("template_url"); ?>/sendmail.php',
							  data: dados,
							  type: 'POST',
	                          success: function(msg) {
								jQuery('#contact-form, .message').slideUp('slow',function(){	
									
									jQuery('.message').html(msg).slideDown('slow');
																
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
        
<?php
	   endwhile;
	endif;
?>      
	
        
    </div><!-- **Main - End** -->
<style>
.loader{
    display: none;
 	float:right;
    margin:20px 20px 0 0;
}
.message{
}
</style>    
<?php get_footer(); ?>