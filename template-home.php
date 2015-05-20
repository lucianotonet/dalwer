<?php
/*
	Template Name: Home
*/

get_header(); ?>

<!-- **Main** -->

<div id="main"> 
    
    <!--Slider-->
    <?php
		if( get_option('homepage_slider_id') != '' && function_exists( layerslider( get_option('homepage_slider_id') ) )){
			layerslider( get_option('homepage_slider_id') ); 
		}
	?>
    <!--End Slider--> 
    
    <!-- **Container** -->
    <div class="container"> 
        
        <!-- **Primary Section** -->
        <section id="primary" class="content-full-width">
             
            <div class="border-title"> <h2> Conheça nossos planos e faça já seu consórcio! <span> </span> </h2> </div>
            
            <!-- **Product Carousel Wrapper** -->
            <div class="product-carousel-wrapper gallery">
                <ul class="product-carousel products">
                    <li>
                        <div class="product-thumb">
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-automoveis' ) ) ?>" title="">
                                
                                <img src="<?php bloginfo( 'template_url' ); ?>/images/homepage/carro_340x220.jpg" alt="" title="">                
                            </a>
                            <div class="product-overlay">
                                <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-automoveis' ) ) ?>" title=""> <span class="icon-search"> </span> </a>
                            </div>
                        </div> 
                        <h1> Automóveis </h1>
                        <p>Escolha o prazo e a prestação que mais combina com seu bolso, e pague apenas METADE DA PARCELA...</p>   
                        <div class="details">  
                            <span class="price">a partir de<br /><strong>R$ 174,00</strong><br />mensais</span>
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-automoveis' ) ) ?>" title="" class="button small red"> Veja mais </a>
                        </div>
                    </li>
                    
                    
                    <li>
                        <div class="product-thumb">
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-imoveis' ) ) ?>" title="">
                                <img src="<?php bloginfo( 'template_url' ); ?>/images/homepage/casa_340x220.jpg" alt="" title="">                
                            </a>
                            <div class="product-overlay">
                                <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-imoveis' ) ) ?>" title=""> <span class="icon-search"> </span> </a>
                            </div>
                        </div> 
                        <h1> Imóveis </h1>
                        <p>A aquisição da casa própria já deixou de ser somente um sonho...</p>
                        <div class="details">  
                            <span class="price">a partir de<br /><strong>R$ 203,33</strong><br />mensais</span>
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-imoveis' ) ) ?>" title="" class="button small red"> Veja mais </a>
                        </div>
                    </li>
                    
                    <li>
                        <div class="product-thumb">
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-motos' ) ) ?>" title="">
                                <img src="<?php bloginfo( 'template_url' ); ?>/images/homepage/moto_340x220.jpg" alt="" title="">                
                            </a>
                            <div class="product-overlay">
                                <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-motos' ) ) ?>" title=""> <span class="icon-search"> </span> </a>
                            </div>
                        </div> 
                        <h1> Motos </h1>
                        <p>Além de poder escolher a marca, o modelo e onde quer comprar, você pode pagar em até 60 vezes...</p> 
                        <div class="details">  
                            <span class="price">a partir de<br /><strong>R$ 118,00</strong><br />mensais</span>
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-motos' ) ) ?>" title="" class="button small red"> Veja mais </a>
                        </div>
                    </li>
                    
                    <li>
                        <div class="product-thumb">
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-caminhoes' ) ) ?>" title="">
                                
                                <img src="<?php bloginfo( 'template_url' ); ?>/images/homepage/caminhao_340x220.jpg" alt="" title="">                
                            </a>
                            <div class="product-overlay">
                                <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-caminhoes' ) ) ?>" title=""> <span class="icon-search"> </span> </a>
                            </div>
                        </div> 
                        <h1> Caminhões </h1>
                        <p>Simplesmente as melhores opções do mercado para a aquisição do seu caminhão novo ou usado.</p>   
                        <div class="details">  
                            <span class="price">a partir de<br /><strong>R$ 406,00</strong><br />mensais</span>
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-caminhoes' ) ) ?>" title="" class="button small red"> Veja mais </a>
                        </div>
                    </li>
                    
                    <li class="last">
                        <div class="product-thumb">
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-servicos' ) ) ?>" title="">
                                <img src="<?php bloginfo( 'template_url' ); ?>/images/homepage/servico_340x220.jpg" alt="" title="">                
                            </a>
                            <div class="product-overlay">
                                <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-servicos' ) ) ?>" title=""> <span class="icon-search"> </span> </a>
                            </div>
                        </div> 
                        <h1> Serviços </h1>
                        <p>Viajar, estudar, festa de formatura, casamento... Tudo isso e muito mais de uma forma fácil e econômica.</p> 
                        <div class="details">  
                            <span class="price">a partir de<br /><strong>R$ 130,00</strong><br />mensais</span>
                            <a href="<?php echo get_permalink( get_page_by_path( 'consorcio-de-servicos' ) ) ?>" title="" class="button small red"> Veja mais </a>
                        </div>
                    </li>
                    
                </ul>
                <div class="carousel-arrows">
                	<a href="#" title="" class="product-prev-arrow"> <span class="icon-chevron-left"> </span> </a>
                    <a href="#" title="" class="product-next-arrow"> <span class="icon-chevron-right"> </span> </a>
                </div>
            </div><!-- **Product Carousel Wrapper - End** -->
            
            <div class="hr-invisible"> </div>
            <div class="clear"> </div>    
                                   
            
            <br />
                 
            <div class="cta">
            	<center>
                    <h1> Planeje a sua contemplação através do lance! </h1>
                    <h5> Isso mesmo! A contemplação do seu consórcio pode ser planejada... </h5>
                    <a href="<?php echo get_permalink( get_page_by_path( 'planeje-a-contemplacao-atraves-do-lance' ) ) ?>" title="" class="button small red block">Clique aqui e saiba mais</a>
                    <div class="clear"> </div>
                </center>
            </div>
        
        	<div class="hr-invisible"> </div>
            
            <div class="column one-third center">
	            <img src="<?php bloginfo( 'template_url' ); ?>/images/callcenter.png" alt="Ligamos para você" title="" width="75"/><br />
                <h4>Ligamos para você</h4>
				<p>Não fique na dúvida! Receba uma ligação de um consultor qualificado, sem nenhum compromisso.</p>
            	
                <a href="<?php echo get_permalink( get_page_by_path( 'solicitar-ligacao' ) ) ?>" title="" class="button small red block">Clique aqui</a>
            </div>
            <div class="column one-third center">
            	<img src="<?php bloginfo( 'template_url' ); ?>/images/vamosatevoce.png" alt="Vamos até você" title="" width="75" /><br />
                <h4>Vamos até você</h4>
                <p>Solicite uma visita! Teremos o maior prazer em apresentar-lhe as vantagens do consórcio em sua própria residência.</p>
                <a href="<?php echo get_permalink( get_page_by_path( 'solicitar-visita' ) ) ?>" title="" class="button small red block">Clique aqui</a>
            </div>
            <div class="column one-third center last">
				<img src="<?php bloginfo( 'template_url' ); ?>/images/dalwervantagens.png" alt="Conheça as vantagens" title="" width="75" /><br />
                <h4>Conheça as vantagens!</h4>
                <p>Saiba como funciona o consórcio e entenda porque ele é hoje uma das melhores formas de investimento.</p>
                <a href="<?php echo get_permalink( get_page_by_path( 'vantagens-do-consorcio' ) ) ?>" title="" class="button small red block">Clique aqui</a>
            </div>
                 
           
         
         
            
        </section>
        <!-- **Primary Section** --> 
        
    </div>
    <!-- **Container - End** --> 
    
</div>
<!-- **Main - End** -->

<?php get_footer(); ?>
