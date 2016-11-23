<?php if ( ! defined('ABSPATH')) exit; ?>

<?php

	// Se não; garante o logout
	$this->logout();
	
	// Redireciona para a página de login
	$this->goto_login();
	
	// Garante que o script não vai passar daqui
	return;

?>