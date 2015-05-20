    <!-- **Footer** -->
    <footer id="footer">
    	<div class="container">
        
			<div class="column one-third"> 
                <aside class="widget">
                	<h4 class="widgettitle"> Informações </h4>
                	<?php	$args = array(
                                'menu' 				=> 'Footer Menu',
                                'theme_location' 	=> '',
                                'container' 		=> false,
                                'menu_class' 		=> false,
                                'echo' 				=> true,
                                'menu_id' 			=> false,
                                'before' 			=> '',
                                'after' 			=> '',
                                'link_before' 		=> '',
                                'link_after' 		=> '',
                                'depth' 			=> 1,
                                'walker' 			=> '',
                            );	
							
							wp_nav_menu( $args ); 		
					?> 
                </aside>
			</div>
            
            <div class="column one-third"> 
                <aside class="widget">
                    <h4 class="widgettitle"> Corretor autorizado </h4>
                    <img src="<?php bloginfo( 'template_url' ); ?>/images/logo_hsconsorcio.png" width="80%"/>
                    <!--<img src="http://www.hsconsorcios.com.br/img/logo_hsconsorcio.gif" />--><br />
                    <p><em>uma empresa do grupo Herval</em></p>
                </aside>   
			</div>
        
        
        	<!--<div class="column one-fourth">
                <aside class="widget tweetbox"> 
                    <h3 class="widgettitle"> <a href="#" title=""> Twitter Feeds </a> </h3>
                    <div class="tweets"> </div>
                </aside>   
            </div>  -->
            
            <div class="column one-third last">
            	<aside class="widget">
                    <h4 class="widgettitle"> Contatos </h4>
                	<p> Av. Osvaldo Aranha, 599<br />Bento Gonçalves-RS</p>
                    <p> <span class="icon-phone"> </span> (54) 3451-6770 <br />
                    	<span class="icon-mobile-phone"> </span> (54) 9901-3691 <br />
                    	<span class="icon-envelope-alt"> </span> <a href="mailto:contato@dalwer.com.br"> contato@dalwer.com.br </a> </p>
                    
                </aside>	
            </div>
            
        </div>
        
        <div class="copyright">        	
        	<div class="container">
                <span> Copyright &copy; <?php echo date('Y'); ?> Dalwer Investimentos - Corretor autorizado HS Consórcios. Todos os direitos reservados </span>
                <span class="pull-right">Desenvolvido por <a href="http://lucianotonet.com" title="Luciano Tonet - Desenvolvimento Web" target="_blank"><em>L. Tonet</em> </a></span>       	
            </div>
        </div>
    </footer><!-- **Footer - End** -->
	
</div><!-- **Wrapper - End** -->


<?php if ( !is_user_logged_in() ) { ?>

    <script>
     //   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
     //   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
     //   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
     //   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    //   ga('create', 'UA-41916047-1', 'dalwer.com.br');
    //   ga('send', 'pageview');
    </script>


    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-41916047-1']);
        _gaq.push(['_trackPageview']);
        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; 

        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';

        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>


    <!-- Google Tag Manager -->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-KRC8H9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KRC8H9');
    </script>
    <!-- End Google Tag Manager -->




<?php } ?> 

<?php
    wp_footer();
?>
</body>
</html>