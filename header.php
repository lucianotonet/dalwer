<!doctype html>

<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="isie ie7 oldie no-js"> <![endif]-->

<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="isie ie8 oldie no-js"> <![endif]-->

<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="isie ie9 no-js"> <![endif]-->

<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	

	<title>

		<?php

			global $page, $paged;

			wp_title( '|', true, 'right' );

		

			// Add the blog name.

			bloginfo( 'name' );

		

			// Add the blog description for the home/front page.

			$site_description = get_bloginfo( 'description', 'display' );

			if ( $site_description && ( is_home() || is_front_page() ) )

				echo " | $site_description";

		

			// Add a page number if necessary:

			if ( $paged >= 2 || $page >= 2 )

				echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

		?>

	</title>

	

	<meta name="description" content="">

	<meta name="author" content="">

    

    <!--[if lt IE 9]>

        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->

    

    <!-- **Favicon** -->

    <link href="<?php echo get_option( 'favicon' ); ?>" rel="shortcut icon" type="image/x-icon" />

    

    <!-- **CSS - stylesheets** -->

    <link id="default-css" href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" media="all" />

    <link id="shortcodes-css" href="<?php bloginfo( 'template_url' ); ?>/shortcodes.css" rel="stylesheet" media="all" />    

    <link id="skin-css" href="<?php bloginfo( 'template_url' ); ?>/skins/<?php echo get_option('color_scheme', 'red'); ?>/style.css" rel="stylesheet" media="all" />    

    

    <!-- **Additional - stylesheets** -->

    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css" media="screen" />  

    <!--<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/layerslider.css" type="text/css">-->

    <!--[if lt IE 9]>

        <script src="js/html5.js"></script>

    <![endif]-->

    <link href="<?php bloginfo( 'template_url' ); ?>/responsive.css" rel="stylesheet" media="all" />    

    

    <!-- **Font Awesome** -->

    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/font-awesome.min.css">

    <!--[if IE 7]>

    <link rel="stylesheet" href="css/font-awesome-ie7.min.css">

    <![endif]-->

    

    <!-- **Google - Fonts** -->

    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>



<?php wp_head(); ?>   

</head>



<body class="<?php echo get_option('layout_scheme', 'fullwidth'); ?> no-customize-support">



<!-- **Wrapper** -->

<div class="wrapper">



	<!-- **Header** -->

	<header id="header">

   

    	<!-- **Top Bar** -->

    	<div id="top-bar" class="<?php if(get_option('header_topbar_enabled') == "false") echo "hidden"; ?>">

                

        	<div class="container">

            	<div class="contact">

            	<?php if(get_option('header_topbar_phone') != "") { ?>

            			<span class="phone"><?php echo get_option('header_topbar_phone'); ?></span>

                <?php } ?>

                <?php if(get_option('header_topbar_email') != "") { ?>

            			<a href="mailto:<?php echo get_option('header_topbar_email'); ?>" target="_blank" title="" class="email"> <?php echo get_option('header_topbar_email'); ?> </a>

                <?php } ?>

                </div>

                

                

                <div class="social-icons">

                	

                </div>

                

                

                

            </div>

        </div><!-- **Top Bar - End** -->

        

        <div class="container">

		

		

        	<!-- **Logo** -->

            <div id="logo">

				

				<a href="<?php echo home_url(); ?>">

					<?php	if ( get_option('header_normal_logo') ) { ?>

					

								<?php	

										if ( get_option('header_mobile_logo_check') == "true" && get_option('header_mobile_logo') != ""){

											$logo = get_option('header_mobile_logo');

										}else{

											$logo = get_option('header_normal_logo');

										}

								?>

					

								<span class="logo_normal" style="background: url('<?php echo get_option('header_normal_logo') ?>') left center transparent no-repeat; background-size: contain;"></span>

								<img class="logo_mobile" style="margin:0 auto;" src="<?php echo $logo; ?>" />

								

					<?php	} else { ?>

					

								<h2><?php bloginfo( 'name' ); ?></h2>

								

					<?php	} ?>				

				</a>

				

            </div><!-- **Logo - End** -->

			

            

            <!-- **Navigation** -->

            <nav id="main-menu">

					<?php	$menuargs = array(

                                'menu' 				=> 'header_menu',

                                'theme_location' 	=> '',

                                'container' 		=> false,

                                'menu_class' 		=> false,

                                'echo' 				=> true,

                                'menu_id' 			=> false,

                                'before' 			=> '',

                                'after' 			=> '<span></span>',

                                'link_before' 		=> '',

                                'link_after' 		=> '',

                                'depth' 			=> 0,

                                'walker' 			=> '',

                            );	

							

							wp_nav_menu( $menuargs ); 		

					?> 

            </nav><!-- **Navigation - End** -->      

        </div>

    	

    </header><!-- **Header - End** -->