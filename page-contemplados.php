<?php 
/*
Template Name: Cartas Contempladas
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
        
        
        
        <!-- **Primary Section** -->
        <section id="primary" class="content-full-width">
        
		<div class="border-title"> <h2> A sua grande oportunidade. Aproveite! <span> </span> </h2> </div>
		<p class="center">Confira aqui a relação completa de consórcios contemplados e escolha o seu.</p>
        <p class="center"><i class="icon-warning-sign"></i> <strong>IMPORTANTE:</strong> A tabela abaixo passa por constantes atualizações. Caso queira ser notificado sobre novas oportunidades <a href="<?php echo get_permalink( get_page_by_path( 'solicitar-notificacao' ) ) ?>">clique aqui</a>.</p>
        <br />

<?php query_posts( array( 'post_type' => 'contemplado',  'orderby' => 'date', 'order' => 'DESC' ) );?>

		<table width="100%" border="1" class="modal">
            <tr>
            	<th scope="col">Tipo</th>
                <th scope="col">Crédito</th>
                <th scope="col">Entrada</th>
                <th scope="col">Parcelas</th>
                <th scope="col">&nbsp;</th>
            </tr>
            
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post() ?>

            <tr>
                <td><?php echo get_post_meta( $post->ID, '_tipo_contemplado', true ); ?></td>
                <td><strong>R$ <?php echo get_post_meta( $post->ID, '_valor_contemplado', true ); ?></strong></td>
                <td>R$ <?php echo get_post_meta( $post->ID, '_entrada_contemplado', true ); ?></td>
                <td><?php echo get_post_meta( $post->ID, '_parcelas_contemplado', true ); ?> x R$ <?php echo get_post_meta( $post->ID, '_valor_parcelas_contemplado', true ); ?></td>
                <td><a href="<?php echo get_permalink( get_page_by_path( 'solicitar-consorcio' ) ) ?>&type=contemplado&id=<?php echo $post->ID; ?>" class="button small red"> Solicitar </a></td>
            </tr>
	

	<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>

		</table>


		<div class="clear"></div>			
            
            <div class="content-full-width">
            	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post() ?>
					<?php the_content(); ?>
                <?php endwhile; endif; ?>	
            	<!--<div class="border-title"> <h2> Vantagens <span> </span> </h2> </div>
	            <p>Todas as cotas de consórcio disponíveis nesta página <strong>já estão contempladas</strong>, portanto você pode adquirir imediatamente o seu veículo, imóvel, moto, caminhão ou serviço, ou seja, o que quiser, onde e como quiser, e não precisa esperar até contemplação do mesmo, além de escapar das taxas e prazos aplicados pelas linhas de financiamento.</p><br />
				<div class="border-title"> <h2> Como funciona <span> </span> </h2> </div>
                <p>Transferimos o crédito da cota à você, que passará a ter a sua disposição o valor do crédito e assumirá as parcelas a vencer do plano. O negócio realizado será amparado por contrato de compra e venda entre as partes envolvidas, contendo claramente todos os detalhes do negócio realizado. O pagamento da entrada será efetivado no momento da assinatura do termo de cessão e transferência da cota, ou no momento da outorga de poderes sobre a cota ao comprador mediante instrumento de procuração pública e específica, isto depois do comprador checar todas as informações junto a administradora.</p><br />
<p>Não fique com dúvidas! Entre em contato ou solicite uma visita. Nós vamos até você.</p>-->
            </div> 
            
        	<div class="clear"></div>
        </section><!-- **Primary Section** -->      
        
        </div><!-- **Container - End** -->
   </div><!-- **Main - End** -->
    
    
<!--Form solicitar-->
<div style="display:none;" id="form-solicitar">
<div class="border-title"> <h2> Solicitar consórcio contemplado <span> </span> </h2> </div>
    <div class="message"></div>
    <form method="post" id="solicitar">
        <p class="">
        	<?php
			$cliente_nome = isset($_SESSION['cliente_nome']) ? $_SESSION['cliente_nome'] : "" ;
			?>
            Nome:
            <input name="name" type="text" placeholder="Seu nome" value="<?php echo ucfirst($cliente_nome); ?>" >
        </p>
        
        <p class="column one-half">
            Email:
            <input name="email" type="email" placeholder="Seu email" >
        </p>
        
        <p class="column one-half last">
            Telefone:
            <input name="tel" type="text" placeholder="Telefone" >
        </p>
        
        <p class="clear">
            Mensagem:
            <textarea name="comment" placeholder="Mensagem" cols="5" rows="3" required></textarea>
        </p>
        
        <p>
        	<center>
	            <input name="submit" type="submit" value="Solicitar">
            </center>
        </p>            
    </form>
     <script type="text/javascript">
	 jQuery(document).ready(function(e) {
       
   
      jQuery('#solicitar').submit(function(event){
		  event.preventDefault();
		  alert();
         // jQuery.ajax({
//              url: '<?php bloginfo("template_url"); ?>/teste.html',
//              success: function(data) {
//                //jQuery('.message').html(data);
//                alert(data);
//              },
//              beforeSend: function(){
//                jQuery('.loader').css({display:"block"});
//              },
//              complete: function(){
//                jQuery('.loader').css({display:"none"});
//              }
//        });
      });
	});
	</script>
</div>
<!--end Form solicitar-->    
    
    
<?php get_footer(); ?>