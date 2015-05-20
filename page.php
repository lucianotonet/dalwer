<?php get_header(); ?>

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
        
        <?php
				  the_content();
			   endwhile;
			endif;
		?>

        </section><!-- **Primary Section** -->      
        
        </div><!-- **Container - End** -->
        
        
	
        
    </div><!-- **Main - End** -->
    
    
<?php get_footer(); ?>