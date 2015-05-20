<?php
	//session_start();
	print_r($_SESSION);
	if( isset( $_SESSION['cliente_nome'] ) ){
		unset( $_SESSION['cliente_nome'] );	
	};
	if( isset( $_SESSION['cliente_email'] ) ){
		unset( $_SESSION['cliente_email'] );	
	};
	if( isset( $_SESSION['cliente_fone'] ) ){
		unset( $_SESSION['cliente_fone'] );	
	};
	print_r($_SESSION);
?>
<script>
//window.history.back(-1);
</script>