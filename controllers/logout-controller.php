<?php
/**
 * LogoutController - Controller de exemplo
 *
 * @package RP
 * @since 0.1
 */
class LogoutController extends MainController
{

	/**
	 * Carrega a página "/views/login/index.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Logout';
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
		// Logout não tem Model
		
		/** Carrega os arquivos do view **/
		
		// /views/_includes/header.php
        //require ABSPATH . '/views/_includes/header.php';
		
		// /views/home/login-view.php
        require ABSPATH . '/views/logout/logout.php';
		
		// /views/_includes/footer.php
        //require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
} // class LoginController