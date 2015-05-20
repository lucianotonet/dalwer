<?php 
/*
Template Name: Funcionamento
*/

get_header(); ?>

    <!-- **Main** -->
    <div id="main">

    <?php
		if (have_posts()) :
			   while (have_posts()) :
				  the_post();
	?>
    
    <section class="breadcrumb-section">
        <div class="container">
            <div class="breadcrumb">
            	<h1> Funcionamento </h1>
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
        
        <!-- **Side Navigation** -->
        	<div class="column one-third">
            	<div class="side-nav-container">
					<?php	$args = array(
                                    'menu' 				=> 'Side Menu',
                                    'theme_location' 	=> '',
                                    'container' 		=> '',
                                    'menu_class' 		=> '',
                                    'echo' 				=> true,
                                    'menu_id' 			=> false,
                                    'before' 			=> '',
                                    'after' 			=> '',
                                    'link_before' 		=> '<span class="icon-chevron-right"> </span> ',
                                    'link_after' 		=> '',
                                    'depth' 			=> 1,
                                    'walker' 			=> '',
                                );	
                                
                                wp_nav_menu( $args ); 		
                        ?> 
                 </div>           	
            </div><!-- **Side Navigation End** -->
            
            <!-- **Main Content** -->
            <div class="column two-third last">               
            	       
            	<div>
                	<div class="border-title"> <h2> <?php the_title(); ?> <span> </span> </h2> </div>
						<?php
								  the_content();
							   endwhile;
							endif;
						?>
                </div>           	
            </div> <!-- **Main Content End** -->  
        
        

        </section><!-- **Primary Section** -->      
        
        </div><!-- **Container - End** -->
        
        
	
        
    </div><!-- **Main - End** -->
    
    
<?php get_footer(); ?>