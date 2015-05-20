<?php 
/*
Template Name: Dados Usuário
*/


get_header(); ?>


<!-- **Main** -->
    <div id="main">

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
			
            <div class="column one-fifth">
            </div>
            
            <!--Form solicitar-->
            <div  id="form-solicitar" class="column three-fifth">
        
        <?php
		$params = array( 'apikey'    => '886140ffb59bcda5593826afca22b71f78bd1150',
							'listID' => '1');	
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//NOME
			if(isset($_POST['nome']) && strlen($_POST['nome'])>0) {
				$nomes = explode(' ',$_POST['nome']);
				if(isset($nomes[0])) {
					$params['first_name'] = ucfirst($nomes[0]);
					$_SESSION['cliente_nome'] = $params['first_name'];
					$nomes[0] = '';
				}
				if(isset($nomes[1])) {
					$params['last_name'] = ucfirst(trim(implode(' ',$nomes)));
				}
				
			}
			
			//EMAIL
			if(isset($_POST['email']) && strlen($_POST['email'])>0) {
				$params['email'] = strtolower($_POST['email']);
				$_SESSION['cliente_email'] = $params['email'];
			};
			
			//TELEFONE
			if(isset($_POST['tel']) && strlen($_POST['tel'])>0) {
				$params['cellphone'] = '55-'.preg_replace("/[^0-9]/","", $_POST['tel']);
				$_SESSION['cliente_tel'] = $_POST['tel'];
			};
			
			//print_r($params);
			
			if(strlen($params['email'])>0){
				//Confere email no E-Goi
				
				$params['subscriber'] = strtolower($params['email']);	
				
				phpinfo();
				//require_once get_bloginfo().'/Egoi/Factory.php';
				//$client = EgoiApiFactory::getApi(Protocol::XmlRpc);				
				$client = new SoapClient('http://api.e-goi.com/v2/soap.php?wsdl');
						
				$result = $client->subscriberData($params);
				if(isset($result['ERROR']) && $result['ERROR'] == 'SUBSCRIBER_NOT_FOUND'){
					//adiciona subscriber
					unset($params['subscriber']);
					$params['status'] = '1';
					$result = $client->addSubscriber($params);
				}else{
					//atualiza subscriber
					
					$result = $client->editSubscriber($params);
					
				}
				
				//print_r($result);
				
				$cliente_nome 	= $result['FIRST_NAME']." ".$result['LAST_NAME'];
				$cliente_email 	= $result['EMAIL'];
				$cliente_tel	= $result['CELLPHONE']; ;

				$_SESSION['cliente_nome'] = $cliente_nome;
				$_SESSION['cliente_email'] = $cliente_email;
				$_SESSION['cliente_tel'] = $_POST['tel'];
			}
		}else{
		
			if(isset($_GET['forgetme'])){
				unset($_SESSION['cliente_nome']);
				unset($_SESSION['cliente_email']);
				unset($_SESSION['cliente_tel']);
			}
		
		}
			$cliente_nome 	= isset($_SESSION['cliente_nome']) ? ucfirst($_SESSION['cliente_nome']) : "" ;
			$cliente_email 	= isset($_SESSION['cliente_email']) ? $_SESSION['cliente_email'] : "" ;
			$cliente_tel	= isset($_SESSION['cliente_tel']) ? $_SESSION['cliente_tel'] : "" ;
			
		?>
        
       
            
            <div class="border-title"> <h2> Dados do usuário <span> </span> </h2> </div>
                <div class="message">
                	<p>Confira se seus dados estão corretos e atualize se necessário.</p>
                </div>
                <form method="post" id="solicitar" >
                    <p class="">                        
                        Seu nome:
                        <input name="nome" id="nome" type="text" placeholder="Seu nome completo" value="<?php echo $cliente_nome; ?>" >
                    </p>
                    
                    <p class="column one-half">
                        Seu Email:
                        <input name="email" id="email" type="email" placeholder="Seu email" value="<?php echo $cliente_email; ?>">
                    </p>
                    
                    <p class="column one-half last">
                        Seu Telefone:
                        <input name="tel" id="tel" type="text" placeholder="(XX) XXXX-XXXX" value="<?php echo $cliente_tel; ?>">
                    </p>
                    
                    
                    
                    <p>
                    <?php
						if(isset($_SESSION['cliente_nome'])){
					?>
                    	<!--<a href="?forgetme=true" class="close_session" >Me esqueça!</a>-->
                    <?php
						}
					?>
                    	<input name="submit" type="submit" value="Salvar">
                    	
                    </p>            
                </form>
                 
            </div>
            <!--end Form solicitar-->  
            
            <div class="column one-fifth last">
            </div>

    	</section>
    </div>
</div>


<?php 
		
get_footer(); ?>