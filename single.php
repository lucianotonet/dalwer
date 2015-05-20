<?php get_header(); ?>
    
    <!-- **Main** -->
    <div id="main">
    
    	<!-- **Breadcrumb** -->
    	<section class="breadcrumb-section">
        	<div class="container">
            	<div class="breadcrumb">
                    <a href="index.html"> Home </a> 
                    <span class="icon-chevron-right"> </span>
                    <h1> Blog Single </h1>
                </div>
                <div class="main-phone-no">
                	<p> 1 (800) 567 8765 <br> <a href="#" title=""> name@somemail.com </a> </p>
                </div>
            </div>
        </section><!-- **Breadcrumb** -->
    
        <!-- **Container** -->
        <div class="container">
        
            <!-- **Primary Section** -->
            <section id="primary">     
            
                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div class="blog-single-entry">
                    <!-- **Blog Entry** -->

                    <article class="blog-entry">                
                        <div class="entry-title">
                            <h1> <a href="<?php the_permalink(); ?>" title=""> <?php the_title( ); ?> </a> </h1>
                        </div>
                        
                        <div class="entry-metadata">
                            <div class="tags">
                                <span class="icon-tags"> </span>
                                <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?>
                            </div>
                        </div>

                        <div class="entry-thumb-meta">
                            <div class="entry-thumb">
                                <a href="blog-single.html" title="">
                                    <?php 

                                        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                     ?>
                                        <img src="<?php echo $url; ?>" alt="" title="" />
                                   
                                    <!-- <img src="images/post-images/blog-fullwidth1.jpg" alt="" title="" /> --> </a>
                            </div>
                            <div class="entry-meta"> 
                                <div class="date">
                                    <span class="icon-calendar"> </span>
                                    <p> <?php echo get_the_date(); ?> </p>
                                </div>
                                <!-- <a href="blog-single.html" title="" class="comments"> <span class="icon-comments"> </span> 16 </a> -->
                                <span class="rounded-bend"> </span>
                            </div>
                        </div>
                        
                        <div class="entry-details">                        
                            
                            
                            <div class="entry-body">
                            <?php           
                                the_content();
                            ?>
                            </div>
                        </div>                    
                    </article><!-- **Blog Entry - End** -->
                    <div class="hr"> </div>
                </div>            

                <?php
                    endwhile;
                ?>
                
                     <!-- **Comment Entries** -->   	
                    <div class="commententries">                         
                        <h3> Comments (16) </h3>
                        
                        <ul class="commentlist">
                            <li> 
                                <article class="comment">
                                    <header class="comment-author">
                                        <img src="images/post-images/comment-author1.jpg" alt="" title="" />                                        
                                    </header>
                                    <section class="comment-details">
                                        <div class="author-name"> <a href="#" title=""> Jerauld Dafonseca </a> </div>
                                        <div class="commentmetadata"> 09 April 2013 </div>
                                        <div class="comment-body">
                                            <p> To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a  </p>
                                        </div>
                                        <div class="reply"> <a href="#" title=""> Reply </a> </div>
                                    </section>   
                                </article>
                                
                                <ul class="children">
                                    <li> 
                                        <article class="comment">
                                            <header class="comment-author">
                                                <img src="images/post-images/comment-author2.jpg" alt="" title="" />                                        
                                            </header>
                                            <section class="comment-details">
                                                <div class="author-name"> <a href="#" title=""> Jennifer Carol </a> </div>
                                                <div class="commentmetadata"> 09 April 2013 </div>
                                                <div class="comment-body">
                                                    <p> To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man wpleasure. </p>
                                                </div>
                                                <div class="reply"> <a href="#" title=""> Reply </a> </div>
                                            </section>  
                                        </article> 
                                    </li>        
                                </ul>
                                          
                            </li>  
                            <li> 
                                <article class="comment">
                                    <header class="comment-author">
                                        <img src="images/post-images/comment-author3.jpg" alt="" title="" />                                        
                                    </header>
                                    <section class="comment-details">
                                        <div class="author-name"> <a href="#" title=""> Melissa Pamela </a> </div>
                                        <div class="commentmetadata"> 09 April 2013 </div>
                                        <div class="comment-body">
                                            <p> To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a  </p>
                                        </div>
                                        <div class="reply"> <a href="#" title=""> Reply </a> </div>
                                    </section> 
                                </article>                                      
                            </li>        
                        </ul>    
                        
                        
                    <!-- **Respond Form** -->                      
                    <div id="respond"> 
                        <h3> Post a comment </h3>
                        <div class="message"></div>
                        <form action="http://wedesignthemes.com/html/delicate/php/sendmail.php" method="get">
                            <p class="column one-half">
                                <label> Your Name <span> (required) </span> </label>
                                <input name="name" type="text" required>
                            </p>
                            
                            <p class="column one-half last">
                                <label> Your Email <span> (required) </span> </label>
                                <input name="name" type="email" required>
                            </p>
                            
                            <p class="clear">
                                <label> Your Message <span> (required) </span> </label>
                                <textarea name="comment" cols="5" rows="3" required></textarea>
                            </p>
                            
                            <p>
                                <input name="submit" type="submit" value="Comment">
                            </p>
                        
                        </form>
                    </div><!-- **Respond Form - End** -->    
                         
                </div><!-- **Comment Entries - End** -->  
                
                
            </section><!-- **Primary Section** -->     
            
            <!-- **Secondary Section - End** -->    
            <section id="secondary">
            
                <?php get_sidebar( 'sidebar-blog' ); ?>

                <aside class="widget">
                    <h3 class="widgettitle"> <a href="#" title=""> Recent Posts </a> </h3>
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
            
                <aside class="widget widget_categories">
                    <h3 class="widgettitle"> <a href="#" title=""> Categories </a> </h3>
                    <ul>
                        <li> <a href="#" title=""> Business <span> 16 </span> </a> </li>
                        <li> <a href="#" title=""> Typography <span> 5 </span> </a> </li>
                        <li> <a href="#" title=""> Branding <span> 11 </span> </a> </li>
                        <li> <a href="#" title=""> Online Marketing <span> 20 </span> </a> </li>
                        <li> <a href="#" title=""> Woo Commerce <span> 7 </span> </a> </li>        
                        <li> <a href="#" title=""> Wordpress <span> 3 </span> </a> </li>
                    </ul>
                </aside>  
                
                <aside class="widget">
                    <h3 class="widgettitle"> <a href="#" title=""> Archives </a> </h3>
                    <ul>
                        <li> <a href="#" title=""> April 2013 </a> </li>
                        <li> <a href="#" title=""> March 2013 </a> </li>
                        <li> <a href="#" title=""> February 2013 </a> </li>
                        <li> <a href="#" title=""> January 2013 </a> </li>
                    </ul>
                </aside> 
                
                <aside class="widget widget_tag_cloud">
                    <h3 class="widgettitle"> <a href="#" title=""> Tags </a> </h3>
                    <div class="tagcloud">
                        <a href="#" title=""> webdesign </a>
                        <a href="#" title=""> html </a>
                        <a href="#" title=""> woo commerce </a>
                        <a href="#" title=""> blog </a>
                        <a href="#" title=""> news </a>
                        <a href="#" title=""> photography </a>
                        <a href="#" title=""> tech </a>
                        <a href="#" title=""> creative </a>
                        <a href="#" title=""> photoshop </a>
                        <a href="#" title=""> responsive </a>
                    </div>
                </aside> 
                
                <aside class="widget">
                    <h3 class="widgettitle"> <a href="#" title=""> Text Widget </a> </h3>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sollicitudin interdum eros at petesque. Onec dictum rhoncus sapien aliquet tempor. Cras cursus nisi sed dui <a href="#" title=""> scelerisque posuere.</a> Maecenas tempus tempor leo sed mollis. Praesent blandit odio eget nunc faucibus fringilla.  </p>
                </aside>  
                 
            </section><!-- **Secondary Section -End** -->    
            
        </div><!-- **Container - End** -->
    </div><!-- **Main - End** -->
<?php get_footer(); ?>