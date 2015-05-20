<?php 
/*
Template Name: Simulador Serviços
*/


get_header(); ?>
<?php
	// Tax TIPO
    $tipo = 'servicos';
?>
<!-- **Main** -->

<div id="main">
    <section class="breadcrumb-section">
        <div class="container">
            <div class="breadcrumb">
                <h1>
                    <?php the_title(); ?>
                </h1>
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
        
        
        	<?php
				get_template_part('simulador-resultado');
			?> 
        
            
        <div class="column two-fifth">  
        	<?php
				get_template_part('simulador-form');
			?>   
            <br />
			
            <div  class="hr-invisible"></div>            
            
       
        
        <div class="border-title">
        	<h3>
        	<?php if (isset($_SESSION['cliente_nome'])){
				echo ucfirst($_SESSION['cliente_nome']) . ', muito ';
			}else{
				echo 'Muito ';
			} ?>
            mais vantagens pra você! <span> </span> </h3>
        </div>
            	
        <div class="column one-half"><p class="center">Você sabia que pode planejar a contemplação atravéz do lançe?<br />
    <a href="<?php echo get_permalink( get_page_by_path( 'planeje-a-contemplacao-atraves-do-lance' ) ) ?>" title="" class="button small red"> Veja mais </a></p></div>
        
        <div class="column one-half last"><p class="center">Não está disposto à esperar a contemplação para realizar seu sonho?<br />
    Então confira nossos consórcios contemplados!<br /><a href="<?php echo get_permalink( get_page_by_path( 'consorcios-contemplados' ) ) ?>" title="" class="button small red"> Clique aqui </a></p></div>
                
          
        <hr class="hr"  />  
             
        </div>
        
        	<div class="column three-fifth last"> 
                <div class="border-title">
                    <h3> <?php echo $post->post_title ?> <span> </span> </h3>
                </div>       
             
                <?php echo $post->post_content ?>
            </div>
            
        </section>
        <!-- **Primary Section** --> 
        
    </div>
    <!-- **Container - End** --> 
    
</div>
<!-- **Main - End** -->



<?php get_footer(); ?>