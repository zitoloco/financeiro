<?php
/**
 * ClienteController
 *
 * @package RPuglielliMVC
 */
class ReceberController extends MainController
{

	/**
	 * $login_required
	 *
	 * Se a página precisa de login
	 *
	 * @access public
	 */
	public $login_required = true;

	/**
	 * $permission_required
	 *
	 * Permissão necessária
	 *
	 * @access public
	 */
	public $permission_required = 'user-register';

	/**
	 * Carrega a página "/views/user-register/index.php"
	 */
    public function index() {
		// Page title
		$this->title = 'Contas a Receber';
		
		// Verifica se o usuário está logado
		if ( ! $this->logged_in ) {
		
			// Se não; garante o logout
			$this->logout();
			
			// Redireciona para a página de login
			$this->goto_login();
			
			// Garante que o script não vai passar daqui
			return;
		
		}
		
		// Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required, $this->userdata['user_permissions'])) {
		
			// Exibe uma mensagem
			echo 'Você não tem permissões para acessar essa página.';
			
			// Finaliza aqui
			return;
		}
	
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
		// Carrega o modelo para este view
        $modelo = $this->load_model('receber/receber-model');
				
		/** Carrega os arquivos do view **/
		
		// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
		// /views/user-register/index.php
        require ABSPATH . '/views/receber/receber-lista.php';
		
		// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
	public function cad() {
		// Page title
		$this->title = 'Conta a Receber';
		
		// Verifica se o usuário está logado
		if ( ! $this->logged_in ) {
		
			// Se não; garante o logout
			$this->logout();
			
			// Redireciona para a página de login
			$this->goto_login();
			
			// Garante que o script não vai passar daqui
			return;
		
		}
		
		// Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required, $this->userdata['user_permissions'])) {
		
			// Exibe uma mensagem
			echo 'Você não tem permissões para acessar essa página.';
			
			// Finaliza aqui
			return;
		}
	
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
		// Carrega o modelo para este view
        $modelo = $this->load_model('receber/receber-model');
				
		/** Carrega os arquivos do view **/
		
		// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
		// /views/user-register/index.php
        require ABSPATH . '/views/receber/receber-cad.php';
		
		// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	
} // class home