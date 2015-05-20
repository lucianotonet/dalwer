<?php
/* 
 * Acera Theme Options - Theme Starter Pack by Jan Simecek
 * 
 * All you need to do is include this file into your functions.php template file,
 * then go into acera-options/options/acera_options.php and set up your theme options
 */

include_once 'acera-options/options-init.php';


// Habilita menus
/*if (function_exists('add_theme_support')) {
    add_theme_support('menu1');
    add_theme_support('menu2');
}*/
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'header_menu' => 'Header menu',
			'footer_menu' => 'Menu do rodapé',
			'side_menu'   => 'Menu Lateral',
		)
	);	
}


// Login LOGO
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            width: 326px; /*326px;*/
			height: 120px; /*67px;*/
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/login-logo.png);
            background-size: 274px 120px;
            background-position: top center;
            background-repeat: no-repeat;
            text-indent: -9999px;
            outline: 0;
            overflow: hidden;
            padding-bottom: 20px;
            display: block;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


// Register scripts
function lt_init_scripts(){
	
	//register scripts
	if(!is_admin()){
		
		// register scripts
		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js');	
		wp_register_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', 'jquery' );
		wp_register_script('jquery-mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', 'jquery');
		wp_register_script('jquery-prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', 'jquery');
		wp_register_script('jquery-caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.0-packed.js', 'jquery');
		wp_register_script('jquery-tweet', get_template_directory_uri() . '/js/jquery.tweet.js', 'jquery');
		wp_register_script('googlemap_api', 'http://maps.google.com/maps/api/js?sensor=false' );
		wp_register_script('jquery-gmap', get_template_directory_uri() . '/js/gmap3.min.js', 'jquery' );
		wp_register_script('jquery-tabs', get_template_directory_uri() . '/js/jquery.tabs.min.js' );
		wp_register_script('jquery-custom', get_template_directory_uri() . '/js/custom.js', 'jquery', '1.0' );
	}
}
add_action('init', 'lt_init_scripts');

// Load  footer scripts 
function lt_add_footer_js(){
	
	wp_enqueue_script('modernizr');
	// wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui');
	wp_enqueue_script('jquery-tabs');
	wp_enqueue_script('jquery-mobilemenu');
	wp_enqueue_script('jquery-prettyphoto');
	wp_enqueue_script('jquery-caroufredsel');
	wp_enqueue_script('jquery-tweet');
	wp_enqueue_script('googlemap_api');
	wp_enqueue_script('jquery-gmap');
	wp_enqueue_script('jquery-custom');
}
add_action('wp_footer', 'lt_add_footer_js');


// Shortcodes
function btn_function($atts, $text = null) {
	extract(shortcode_atts(array(
		'size' 	=> 'small',
		'color' => 'green',
		'link'	=> 'javascript: return false;'
	), $atts));

   return '<a href="'.$link.'" class="button '.$size.' '.$color.'"> '.$text.' </a>';
}
function register_shortcodes(){
   add_shortcode('btn', 'btn_function');
}
add_action('init', 'register_shortcodes');
?>
<?php
// POST TYPE - Cartas Contempladas
function custom_post_contemplado() {
  $labels = array(
    'name' => 'Contemplados',
    'singular_name' => 'Contemplado',
    'add_new' => 'Adicionar novo',
    'add_new_item' => 'Adicionar nova carta contemplada',
    'edit_item' => 'Editar consórcio',
    'new_item' => 'Novo consórcio contemplado',
    'all_items' => 'Todos contemplados',
    'view_item' => 'Ver contemplado',
    'search_items' => 'Buscar contemplado',
    'not_found' =>  'Nenhum consórcio contemplado',
    'not_found_in_trash' => 'Nadaencontrado na lixeira', 
    'parent_item_colon' => '',
    'menu_name' => 'Contemplados'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'contemplado' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 35,
    //'supports' => array( 'title' )
  ); 

  register_post_type( 'contemplado', $args );
  
	remove_post_type_support( 'contemplado', 'title' );
	remove_post_type_support( 'contemplado', 'editor' );
	remove_post_type_support( 'contemplado', 'author' );
	remove_post_type_support( 'contemplado', 'thumbnail' );
	remove_post_type_support( 'contemplado', 'excerpt' );
	remove_post_type_support( 'contemplado', 'trackbacks' );
	remove_post_type_support( 'contemplado', 'comments' );
	remove_post_type_support( 'contemplado', 'revisions' );
	remove_post_type_support( 'contemplado', 'page-attributes' );
	
}
add_action( 'init', 'custom_post_contemplado' );
?>
<?php
	add_action( 'add_meta_boxes', 'contemplado_add_meta_box' ); 
	function contemplado_add_meta_box() {
		add_meta_box(
			'contemplado_metaboxid',
			'Detalhes do Consórcio',
			'contemplado_inner_meta_box',
			'contemplado'
		);
	}
	 
	function contemplado_inner_meta_box( $consorcio ) {
		?>
			<div style="float:left; margin-left:50px;">
            	
                <p>
				  <label for="tipo_contemplado">Tipo:</label>
				  <br />
				  <input type="text" name="tipo_contemplado" id="tipo_contemplado" value="<?php echo get_post_meta( $consorcio->ID, '_tipo_contemplado', true ); ?>" tabindex="1" required/>				  
				</p>
            </div>
                
            <div style="float:left; margin-left:50px;">
				<p>
				  <label for="valor_contemplado">Valor:</label>
				  <br />
				  R$<input type="text" name="valor_contemplado" id="valor_contemplado" value="<?php echo get_post_meta( $consorcio->ID, '_valor_contemplado', true ); ?>" tabindex="2" required/>				  
				</p>
            </div>
                
            <div style="float:left; margin-left:50px;">
                <p>
				  <label for="entrada_contemplado">Entrada:</label>
				  <br />
				  R$<input type="text" name="entrada_contemplado" id="entrada_contemplado" value="<?php echo get_post_meta( $consorcio->ID, '_entrada_contemplado', true ); ?>" tabindex="3" required/>				  
				</p>
			</div>
                
            <div style="float:left; margin-left:50px;">
				<p>
				  <label for="parcelas_contemplado">Parcelas:</label>
				  <br />
				  <input type="text" name="parcelas_contemplado" id="parcelas_contemplado" value="<?php echo get_post_meta( $consorcio->ID, '_parcelas_contemplado', true ); ?>"  tabindex="4"/>X
				</p>
			</div>
            
            <div style="float:left; margin-left:50px;">
				<p>
				  <label for="valor_parcelas_contemplado">Valor das parcelas:</label>
				  <br />
				  R$<input type="text" name="valor_parcelas_contemplado" id="valor_parcelas_contemplado" value="<?php echo get_post_meta( $consorcio->ID, '_valor_parcelas_contemplado', true ); ?>"  tabindex="5"/>
				</p>
			</div>
			
			<div class="clear"></div>
			<script>
				
			</script>
		<?php
	}
?>
<?php
	
	//Salvar
	add_action( 'save_post', 'contemplado_save_post', 10, 2 );
	 
	function contemplado_save_post( $contemplado_id, $contemplado ) {
	 
	   // Verificar se os dados foram enviados, neste caso se a metabox existe, garantindo-nos que estamos a guardar valores da página de filmes.
	   if ( ! $_POST['valor_contemplado'] ) return;
	   
	 
	   // Fazer a saneação dos inputs e guardá-los
	   update_post_meta( $contemplado_id, '_tipo_contemplado', strip_tags( $_POST['tipo_contemplado'] ) );
	   update_post_meta( $contemplado_id, '_valor_contemplado', strip_tags( $_POST['valor_contemplado'] ) );
	   update_post_meta( $contemplado_id, '_entrada_contemplado', strip_tags( $_POST['entrada_contemplado'] ) );
	   update_post_meta( $contemplado_id, '_parcelas_contemplado', strip_tags( $_POST['parcelas_contemplado'] ) );	 
	   update_post_meta( $contemplado_id, '_valor_parcelas_contemplado', strip_tags( $_POST['valor_parcelas_contemplado'] ) );	   
	   	  
	   return true;
	 
	}

?>
<?php

	//Muda o TÍTULO do post
	add_filter('title_save_pre', 'my_event_save_title');
	
	function my_event_save_title($title_to_ignore) {
		if ($_POST['post_type'] == 'contemplado') {
			
			 //$date = date('m-d-y',strtotime($_POST['_date']));
			  $my_post_title = strip_tags( $_POST['tipo_contemplado'] ) . ' - ' . strip_tags( $_POST['valor_contemplado'] ) ;
			  return $my_post_title;
		}else{
				return $title_to_ignore;
		};
	}
	
	//Muda o NOME (slug) do post
	add_filter('name_save_pre', 'my_event_save_name');
	
	function my_event_save_name($name_to_ignore) {
		if ($_POST['post_type'] == 'contemplado') {
			
			  //$date = date('m-d-y',strtotime($_POST['_date']));
			  $my_post_name = "D".urlencode($_POST["post_ID"]) ;
			  return $my_post_name;
		}else{
				return $name_to_ignore;
		};
	}
?>
<?php
	// POST TYPE Consórcio
function custom_post_consorcio() {
  $labels = array(
    'name' => 'Consórcios',
    'singular_name' => 'Consórcio',
    'add_new' => 'Adicionar Novo',
    'add_new_item' => 'Adicionar Novo Consórcio',
    'edit_item' => 'Editar Consórcio',
    'new_item' => 'Novo Consórcio',
    'all_items' => 'Todos Consórcios',
    'view_item' => 'Ver Consórcio',
    'search_items' => 'Buscar Consórcio',
    'not_found' =>  'Nenhum Consórcio',
    'not_found_in_trash' => 'Nada encontrado na lixeira', 
    'parent_item_colon' => '',
    'menu_name' => 'Consórcios'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'consorcio' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 30,
    //'supports' => array( 'title' )
  ); 

  register_post_type( 'consorcio', $args );
  
	remove_post_type_support( 'consorcio', 'title' );
	remove_post_type_support( 'consorcio', 'editor' );
	remove_post_type_support( 'consorcio', 'author' );
	remove_post_type_support( 'consorcio', 'thumbnail' );
	remove_post_type_support( 'consorcio', 'excerpt' );
	remove_post_type_support( 'consorcio', 'trackbacks' );
	remove_post_type_support( 'consorcio', 'comments' );
	remove_post_type_support( 'consorcio', 'revisions' );
	remove_post_type_support( 'consorcio', 'page-attributes' );
	
}
add_action( 'init', 'custom_post_consorcio' );
?>
<?php
add_action( 'add_meta_boxes', 'consorcio_add_meta_box' ); 
	function consorcio_add_meta_box() {
		add_meta_box(
			'consorcio_metaboxid',
			'Detalhes do Consórcio',
			'consorcio_inner_meta_box',
			'consorcio'
		);
	}
	 
	function consorcio_inner_meta_box( $consorcio ) {
		?>
			<div style="float:left; margin-left:50px;">            	
            </div><br />

                
            <div style="margin-left:50px;">
				<p>
				  <label for="valor_consorcio"><strong>Valor:</strong></label>
				  <br />
				  <span style="float:left;position:absolute;margin:16px;font-family: sans-serif; font-size: 16px;font-weight:bold;">R$</span><input type="text" name="valor_consorcio" id="valor_consorcio" value="<?php echo get_post_meta( $consorcio->ID, '_valor_consorcio', true ); ?>" style="padding:10px 10px 10px 40px;font-family: sans-serif; font-size: 22px;font-weight:bold;" required/>				  
				</p>
            </div>
            <br />
            
            <hr />
            <br />

<table width="400" border="0" cellspacing="0px" cellpadding="10px" style="margin-left:40px;">
    <tr>
        <td>
        <strong>Prazo</strong><br />
        <input type="text" name="prazo_consorcio_1" id="prazo_consorcio_1" value="<?php echo get_post_meta( $consorcio->ID, '_prazo_consorcio_1', true ); ?>" size="3" /></td>
        <td>
        <strong>Parcela</strong><br />
        <input type="text" name="parcela_consorcio_1" id="parcela_consorcio_1" value="<?php echo get_post_meta( $consorcio->ID, '_parcela_consorcio_1', true ); ?>" /></td>
        <td>
        <strong>1/2 Parcela</strong><br />
        <input type="text" name="meia_parcela_consorcio_1" id="meia_parcela_consorcio_1" value="<?php echo get_post_meta( $consorcio->ID, '_meia_parcela_consorcio_1', true ); ?>" /></td>
    </tr>    
    <tr>
    	<td colspan="3">
        <textarea style="width:100%;" placeholder="Taxas e observações" id="info_consorcio_1" name="info_consorcio_1"><?php echo get_post_meta( $consorcio->ID, '_info_consorcio_1', true ); ?></textarea>
       	<br />
        </td>
    </tr>
</table>

<hr />
<br />

<table width="400" border="0" cellspacing="0px" cellpadding="10px" style="margin-left:40px;">
   <tr>
        <td>
        <strong>Prazo</strong><br />
        <input type="text" name="prazo_consorcio_2" id="prazo_consorcio_2" value="<?php echo get_post_meta( $consorcio->ID, '_prazo_consorcio_2', true ); ?>" size="3" /></td>
        <td>
        <strong>Parcela</strong><br />
        <input type="text" name="parcela_consorcio_2" id="parcela_consorcio_2" value="<?php echo get_post_meta( $consorcio->ID, '_parcela_consorcio_2', true ); ?>" /></td>
        <td>
        <strong>1/2 Parcela</strong><br />
        <input type="text" name="meia_parcela_consorcio_2" id="meia_parcela_consorcio_2" value="<?php echo get_post_meta( $consorcio->ID, '_meia_parcela_consorcio_2', true ); ?>" /></td>
    </tr>
 	<tr>
    	<td colspan="3">
        <textarea style="width:100%;" placeholder="Taxas e observações" id="info_consorcio_2" name="info_consorcio_2"><?php echo get_post_meta( $consorcio->ID, '_info_consorcio_2', true ); ?></textarea>
       	<br />
        </td>
    </tr>
</table>

<hr />
<br />

<table width="400" border="0" cellspacing="0px" cellpadding="10px" style="margin-left:40px;">
   <tr>
        <td>
        <strong>Prazo</strong><br />
        <input type="text" name="prazo_consorcio_3" id="prazo_consorcio_3" value="<?php echo get_post_meta( $consorcio->ID, '_prazo_consorcio_3', true ); ?>" size="3" /></td>
        <td>
        <strong>Parcela</strong><br />
        <input type="text" name="parcela_consorcio_3" id="parcela_consorcio_3" value="<?php echo get_post_meta( $consorcio->ID, '_parcela_consorcio_3', true ); ?>" /></td>
        <td>
        <strong>1/2 Parcela</strong><br />
        <input type="text" name="meia_parcela_consorcio_3" id="meia_parcela_consorcio_3" value="<?php echo get_post_meta( $consorcio->ID, '_meia_parcela_consorcio_3', true ); ?>" /></td>
    </tr>
 	<tr>
    	<td colspan="3">
        <textarea style="width:100%;" placeholder="Taxas e observações" id="info_consorcio_3" name="info_consorcio_3"><?php echo get_post_meta( $consorcio->ID, '_info_consorcio_3', true ); ?></textarea>
       	<br />
        </td>
    </tr>
</table>

<hr />
<br />

<table width="400" border="0" cellspacing="0px" cellpadding="10px" style="margin-left:40px;">
   <tr>
        <td>
        <strong>Prazo</strong><br />
        <input type="text" name="prazo_consorcio_4" id="prazo_consorcio_4" value="<?php echo get_post_meta( $consorcio->ID, '_prazo_consorcio_4', true ); ?>" size="3" /></td>
        <td>
        <strong>Parcela</strong><br />
        <input type="text" name="parcela_consorcio_4" id="parcela_consorcio_4" value="<?php echo get_post_meta( $consorcio->ID, '_parcela_consorcio_4', true ); ?>" /></td>
        <td>
        <strong>1/2 Parcela</strong><br />
        <input type="text" name="meia_parcela_consorcio_4" id="meia_parcela_consorcio_4" value="<?php echo get_post_meta( $consorcio->ID, '_meia_parcela_consorcio_4', true ); ?>" /></td>
    </tr>
 	<tr>
    	<td colspan="3">
        <textarea style="width:100%;" placeholder="Taxas e observações" id="info_consorcio_4" name="info_consorcio_4"><?php echo get_post_meta( $consorcio->ID, '_info_consorcio_4', true ); ?></textarea>
       	<br />
        </td>
    </tr>
</table>

<hr />
<br />

<table width="400" border="0" cellspacing="0px" cellpadding="10px" style="margin-left:40px;">
   <tr>
        <td>
        <strong>Prazo</strong><br />
        <input type="text" name="prazo_consorcio_5" id="prazo_consorcio_5" value="<?php echo get_post_meta( $consorcio->ID, '_prazo_consorcio_5', true ); ?>" size="3" /></td>
        <td>
        <strong>Parcela</strong><br />
        <input type="text" name="parcela_consorcio_5" id="parcela_consorcio_5" value="<?php echo get_post_meta( $consorcio->ID, '_parcela_consorcio_5', true ); ?>" /></td>
        <td>
        <strong>1/2 Parcela</strong><br />
        <input type="text" name="meia_parcela_consorcio_5" id="meia_parcela_consorcio_5" value="<?php echo get_post_meta( $consorcio->ID, '_meia_parcela_consorcio_5', true ); ?>" /></td>
    </tr>
 	<tr>
    	<td colspan="3">
        <textarea style="width:100%;" placeholder="Taxas e observações" id="info_consorcio_5" name="info_consorcio_5"><?php echo get_post_meta( $consorcio->ID, '_info_consorcio_5', true ); ?></textarea>
       	<br />
        </td>
    </tr>
</table>

<hr />
<br />

			<div class="clear"></div>
			<script>
				jQuery(window).ready(function(e) {
					jQuery('.enable_opt').click(function(e) {
						if(jQuery(this).is(':checked')){
							jQuery(this).parent().parent().children('td').find('input').attr('readonly','readonly');
							//console.log(jQuery(this).parent().parent().children('td').find('input').attr('readonly','readonly'));
						}else{
							jQuery(this).parent().parent().children('td').find('input').removeAttr('readonly');
						}
                    });
                });
			</script>
		<?php
	}
?>
<?php
	//Salvar Consórcio
	add_action( 'save_post', 'consorcio_save_post', 10, 2 );
	 
	function consorcio_save_post( $consorcio_id, $consorcio ) {
	 
	   // Verificar se os dados foram enviados, neste caso se a metabox existe, garantindo-nos que estamos a guardar valores da página de consórcios.
	   if ( ! $_POST['valor_consorcio'] ) return;
	   
	 
	   // Fazer a saneação dos inputs e guardá-los
	   update_post_meta( $consorcio_id, '_valor_consorcio', strip_tags( $_POST['valor_consorcio'] ) );
	   update_post_meta( $consorcio_id, '_prazo_consorcio_1', strip_tags( $_POST['prazo_consorcio_1'] ) );
	   update_post_meta( $consorcio_id, '_prazo_consorcio_2', strip_tags( $_POST['prazo_consorcio_2'] ) );
	   update_post_meta( $consorcio_id, '_prazo_consorcio_3', strip_tags( $_POST['prazo_consorcio_3'] ) );
	   update_post_meta( $consorcio_id, '_prazo_consorcio_4', strip_tags( $_POST['prazo_consorcio_4'] ) );
	   update_post_meta( $consorcio_id, '_prazo_consorcio_5', strip_tags( $_POST['prazo_consorcio_5'] ) );
	   update_post_meta( $consorcio_id, '_parcela_consorcio_1', strip_tags( $_POST['parcela_consorcio_1'] ) );
	   update_post_meta( $consorcio_id, '_parcela_consorcio_2', strip_tags( $_POST['parcela_consorcio_2'] ) );
	   update_post_meta( $consorcio_id, '_parcela_consorcio_3', strip_tags( $_POST['parcela_consorcio_3'] ) );
	   update_post_meta( $consorcio_id, '_parcela_consorcio_4', strip_tags( $_POST['parcela_consorcio_4'] ) );
	   update_post_meta( $consorcio_id, '_parcela_consorcio_5', strip_tags( $_POST['parcela_consorcio_5'] ) );
	   update_post_meta( $consorcio_id, '_meia_parcela_consorcio_1', strip_tags( $_POST['meia_parcela_consorcio_1'] ) );	 
	   update_post_meta( $consorcio_id, '_meia_parcela_consorcio_2', strip_tags( $_POST['meia_parcela_consorcio_2'] ) );
	   update_post_meta( $consorcio_id, '_meia_parcela_consorcio_3', strip_tags( $_POST['meia_parcela_consorcio_3'] ) );
	   update_post_meta( $consorcio_id, '_meia_parcela_consorcio_4', strip_tags( $_POST['meia_parcela_consorcio_4'] ) );
	   update_post_meta( $consorcio_id, '_meia_parcela_consorcio_5', strip_tags( $_POST['meia_parcela_consorcio_5'] ) );	    
	   update_post_meta( $consorcio_id, '_info_consorcio_1', $_POST['info_consorcio_1']);	 
	   update_post_meta( $consorcio_id, '_info_consorcio_2', $_POST['info_consorcio_2']);
	   update_post_meta( $consorcio_id, '_info_consorcio_3', $_POST['info_consorcio_3']);
	   update_post_meta( $consorcio_id, '_info_consorcio_4', $_POST['info_consorcio_4']);
	   update_post_meta( $consorcio_id, '_info_consorcio_5', $_POST['info_consorcio_5']);	 

	   	  
	   return true;
	 
	}
?>
<?php
	
	//Muda o TÍTULO do consórcio
	add_filter('title_save_pre', 'consorcio_save_title');

	function consorcio_save_title($title_to_ignore) {

		
		if ($_POST['post_type'] == 'consorcio') {
			  $my_post_title = strip_tags( $_POST['valor_consorcio'] ) ;
			  return $my_post_title;
		}else{
			  return $title_to_ignore;
		};
	}
	
	//Muda o NOME (slug) do post
	add_filter('name_save_pre', 'consorcio_save_name');
	
	function consorcio_save_name($name_to_ignore) {
		if ($_POST['post_type'] == 'consorcio') {
			  $my_post_name = "D".urlencode($_POST["post_ID"]) ;
			  return $my_post_name;
		}else{
				return $name_to_ignore;
		};
	}
?>
<?php
// Register Custom Taxonomy
function consorcio_taxonomy()  {
	$labels = array(
		'name'                       => 'Tipos',
		'singular_name'              => 'Tipo',
		'menu_name'                  => 'Tipos',
		'all_items'                  => 'Todos Tipos',
		'parent_item'                => 'Tipo pai',
		'parent_item_colon'          => 'Tipo pai:',
		'new_item_name'              => 'Nome do novo tipo:',
		'add_new_item'               => 'Adicionar novo tipo',
		'edit_item'                  => 'Aditar Tipo',
		'update_item'                => 'Atualizar Tipo',
		'separate_items_with_commas' => 'Separe os tipos por vírgula',
		'search_items'               => 'Buscar tipos',
		'add_or_remove_items'        => 'Adicionar ou remover tipos',
		'choose_from_most_used'      => 'Escolher entre os mais usados',
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'tipo',
	);

	register_taxonomy( 'tipo', 'consorcio', $args );
}

// Hook into the 'init' action
add_action( 'init', 'consorcio_taxonomy', 0 );
?>
<?php
	/**
	 * 		Thumbnails Support
	 */
	add_theme_support( 'post-thumbnails' );

	
	/**
	 * 		Image Size
	 */
	add_image_size( 'blog-feature', 720, 264, false );


	/**
	 *  	Sidebars
	 */
	$args = array(
		'name' 			=> 'Blog Sidebar',
		'id' 			=> 'blog-sidebar',
		'description' 	=> __( 'Widgets in this area will be shown on the right-hand side.' ),
	    'class'         => '',
		'before_widget' => '<aside id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>'
	);
	register_sidebar($args);


?>