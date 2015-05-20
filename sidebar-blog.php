<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Delicate
 * @since Delicate 2.0
 */
?>

		<div class="widget-area" role="complementary">
			<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'blog-sidebar' ) ) : ?>
			TESTE

			<aside class="widget">
                    <h3 class="widgettitle"> <a href="#" title=""> BLOG SIDEBAR??? </a> </h3>
                    <ul class="recent-posts-widget">
                        <li> 
                            <a class="thumb" href="#" title=""> <img src="images/post-images/recent-posts1.jpg" alt="" title=""> </a>
                            <h6> <a href="#" title=""> Lorem ipsum dolor sit amet </a> </h6>
                            <p> Lorem ipsum dolor sit amet, cosect etur adipiscing elit etiam  </p>
                        </li>
                        <li> 
                            <a class="thumb" href="#" title=""> <img src="images/post-images/recent-posts2.jpg" alt="" title=""> </a>
                            <h6> <a href="#" title=""> Lorem ipsum dolor sit amet </a> </h6>
                            <p> Lorem ipsum dolor sit amet, cosect etur adipiscing elit etiam  </p>
                        </li>
                        <li> 
                            <a class="thumb" href="#" title=""> <img src="images/post-images/recent-posts3.jpg" alt="" title=""> </a>
                            <h6> <a href="#" title=""> Lorem ipsum dolor sit amet </a> </h6>
                            <p> Lorem ipsum dolor sit amet, cosect etur adipiscing elit etiam  </p>
                        </li>
                    </ul>
                </aside>   

			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
