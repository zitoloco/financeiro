<?php 
/**
 * Classe para registros de clientes
 *
 */

class ClienteModel
{

	/**
	 * $form_data
	 *
	 * Os dados do formulário de envio.
	 *
	 */	
	public $form_data;

	/**
	 * $form_msg
	 *
	 * As mensagens de feedback para o usuário.
	 *
	 */	
	public $form_msg;

	/**
	 * $db
	 *
	 * O objeto da conexão PDO
	 *
	 */
	public $db;

	/**
	 * Construtor
	 * 
	 * Carrega  o DB.
	 *
	 */
	public function __construct( $db = false ) {
		$this->db = $db;
	}

	/**
	 * Valida o formulário de envio
	 * 
	 * Este método pode inserir ou atualizar dados dependendo do campo de
	 * usuário.
	 */
	public function validate_register_form () {
	
		// Configura os dados do formulário
		$this->form_data = array();
		
		// Verifica se algo foi postado
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty ( $_POST ) ) {
		
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value ) {
			
				// Configura os dados do post para a propriedade $form_data
				$this->form_data[$key] = $value;
			
			}
		
		} else {
		
			// Termina se nada foi enviado
			return;
			
		}
		
		// Verifica se a propriedade $form_data foi preenchida
		if( empty( $this->form_data ) ) {
			
			echo 'preenchido';
			return;
		}
		
		// Verifica se o cliente existe
		$db_check_cli = $this->db->query (
			'SELECT * FROM `cliente` WHERE `cod_cli` = ?', 
			array( 
				chk_array( $this->form_data, 'cod_cli')		
			) 
		);
		
		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_cli ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Não foi possível realizar a consulta. </b></span>
							   </div>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_cliente = $db_check_cli->fetch();
		
		// Configura o ID do cliente
		$cliente_id = $fetch_cliente['cod_cli'];
		
		// Se o ID do usuário não estiver vazio, atualiza os dados
		if ( ! empty( $cliente_id ) ) {

			$query = $this->db->update('cliente', 'cod_cli', $cliente_id, array(
				'cod_cid' => chk_array( $this->form_data, 'cod_cid'), 
				'cli_nome' => chk_array( $this->form_data, 'cli_nome'),
				'cli_fantasia' => chk_array( $this->form_data, 'cli_fantasia'), 
				'cli_ramoatividade' => chk_array( $this->form_data, 'cli_ramoatividade'),
				'cli_cnpj' => chk_array( $this->form_data, 'cli_cnpj'), 
				'cli_inscricao' => chk_array( $this->form_data, 'cli_inscricao'),
				'cli_endereco' => chk_array( $this->form_data, 'cli_endereco'),
				'cli_cep' => chk_array( $this->form_data, 'cli_cep'),
				'cli_bairro' => chk_array( $this->form_data, 'cli_bairro'),
				'cli_numero' => chk_array( $this->form_data, 'cli_numero'),
				'cli_email' => chk_array( $this->form_data, 'cli_email'),
			));
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
										<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
										<span><b> Não foi possível realizar a consulta no banco de dados. </b></span>
								   </div>';
				
				// Termina
				return;
			} else {
				$this->form_msg = '<script>
								   		swal("Dados alterados com sucesso!", "", "success")
								   </script>';
				
				// Termina
				return;
			}
		// Se o ID do cliente estiver vazio, insere os dados
		} else {
		
			// Executa a inserção 
			$query = $this->db->insert('cliente', array(
				'cod_cid' => chk_array( $this->form_data, 'cod_cid'), 
				'cli_nome' => chk_array( $this->form_data, 'cli_nome'), 
				'cli_fantasia' => chk_array( $this->form_data, 'cli_fantasia'),
				'cli_ramoatividade' => chk_array( $this->form_data, 'cli_ramoatividade'),
				'cli_cnpj' => chk_array( $this->form_data, 'cli_cnpj'), 
				'cli_inscricao' => chk_array( $this->form_data, 'cli_inscricao'),
				'cli_endereco' => chk_array( $this->form_data, 'cli_endereco'),
				'cli_cep' => chk_array( $this->form_data, 'cli_cep'),
				'cli_bairro' => chk_array( $this->form_data, 'cli_bairro'),
				'cli_numero' => chk_array( $this->form_data, 'cli_numero'),
				'cli_email' => chk_array( $this->form_data, 'cli_email'),
			));
			
			// Verifica se a inserção está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
										<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
										<span><b> Erro ao inserir as informações no banco de dados. </b></span>
								   </div>';
				
				// Termina
				return;
			} else {
				
				// Faz a consulta para obter o valor
				$consulta_ult_cli = $this->db->query(
					'select * from cliente order by cod_cli desc limit 1'
				);
				
				// Obtém os dados
				$ultimo_cliente = $consulta_ult_cli->fetch();
				
				// Configura os dados do formulário
				$this->form_data = $ultimo_cliente;
				$this->form_msg = '<script>
								   		swal("Cliente cadastrado com sucesso!", "", "success")
								   </script>';
				
				// Termina
				return;
			}
		}
	} // validação_formulario
	
	/**
	 ** Busca dados do formulário
	 **/
	public function get_register_form ( $cliente_id = false ) {
	
		// O ID de usuário que vamos pesquisar
		$s_cliente_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $cliente_id ) ) {
			$s_cliente_id = (int)$cliente_id;
		}
		
		// Verifica se existe um ID de cliente
		if ( empty( $s_cliente_id ) ) {
			return;
		}
		
		// Verifica na base de dados
		$query = $this->db->query('SELECT * FROM `cliente` WHERE `cod_cli` = ?', array( $s_cliente_id ));
		
		// Verifica a consulta
		if ( ! $query ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Cliente não existe. </b></span>
							   </div>';
			return;
		}
		
		// Obtém os dados da consulta
		$fetch_userdata = $query->fetch();
		
		// Verifica se os dados da consulta estão vazios
		if ( empty( $fetch_userdata ) ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Cliente não existe. </b></span>
							   </div>';
			return;
		}
		
		// Configura os dados do formulário
		foreach ( $fetch_userdata as $key => $value ) {
			$this->form_data[$key] = $value;
		}
	}
	//Busca_dados_do_formulário
	
	/**
	 ** Apaga clientes
	 **/
	public function del_cliente ( $parametros = array() ) {

		// O ID do usuário
		$cliente_id = null;
		
		// Verifica se existe o parâmetro "del" na URL
		if ( chk_array( $parametros, 0 ) == 'del' ) {
			
			$this->form_msg_del = '<div class="row" id="cadastrar">
									  <div class="col-md-12 col-sm-12 col-xs-12">
										<div class="x_panel">
										  <div class="x_title">
											<h2>Exclusão de Cliente</h2>
											<ul class="nav navbar-right panel_toolbox">
											  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											  </li>
											  <li class="dropdown">
											  &nbsp;&nbsp;&nbsp;
											  </li>
											  <li><a class="close-link"><i class="fa fa-close"></i></a>
											  </li>
											</ul>
											<div class="clearfix"></div>
										  </div>
											<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="center">
											  <p class="alert">Tem certeza que deseja apagar o registro?</p>
											  <a href="' . $_SERVER['REQUEST_URI'] . '/confirma" class="btn btn-success">Sim</a> 
											  <a href="' . HOME_URI . '/cliente" class="btn btn-primary">Não</a>
											</div>
										</div>
									 </div>
								  </div>';
			
			// Verifica se o valor do parâmetro é um número
			if ( 
				is_numeric( chk_array( $parametros, 1 ) )
				&& chk_array( $parametros, 2 ) == 'confirma' 
			) {
				// Configura o ID do cliente a ser apagado
				$cliente_id = chk_array( $parametros, 1 );
			}
		}
		
		// Verifica se o ID não está vazio
		if ( !empty( $cliente_id ) ) {
		
			// O ID precisa ser inteiro
			$cliente_id = (int)$cliente_id;
			
			// Deleta o cliente
			$query = $this->db->delete('cliente', 'cod_cli', $cliente_id);
			
			// Redireciona para a página de registros
			echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/cliente/">';
			echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/cliente/";</script>';
			return;
		}
	} 
	// deleta_clientes
	
	/**
	 ** Lista cidades
	 **/
	public function get_cliente_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `cliente` ORDER BY cod_cli');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do usuário
		return $query->fetchAll();
	} 
	// lista_clientes
	
	/**
	 ** Lista cidades
	 **/
	public function get_cidade_list() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `cidade` ORDER BY cid_nome');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do usuário
		return $query->fetchAll();
	} 
	// lista_clientes
}