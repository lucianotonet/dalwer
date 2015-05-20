<?php get_header(); ?>

    <!-- **Main** -->
    <div id="main">
    
    <!--Slider-->
    <?php layerslider(1); ?>
    <!--End Slider-->
    
		<!-- **Container** -->
        <div class="container">
        
        
        
        <!-- **Primary Section** -->
        <section id="primary" class="content-full-width">
        
        <?php
			if (have_posts()) :
			   while (have_posts()) :
				  the_post();
				  the_content();
			   endwhile;
			endif;
		?>
        
        </section><!-- **Primary Section** -->      
        
        </div><!-- **Container - End** -->
        
        
	
        
    </div><!-- **Main - End** -->
    
<?php get_footer(); ?>