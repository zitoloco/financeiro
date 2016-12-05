<?php 
/**
 * Classe para registros de contas a receber.
 *
 */

class ReceberModel
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
		$db_check_forn = $this->db->query (
			'SELECT * FROM `pessoa` WHERE `idPessoa` = ?',
			array( 
				chk_array( $this->form_data, 'id')
			) 
		);
		
		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_forn ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Não foi possível realizar a consulta. </b></span>
							   </div>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_cliente = $db_check_forn->fetch();
		
		// Configura o ID do cliente
		$fornecedor_id = $fetch_cliente['idPessoa'];

		// Array com dados do formulario
        $arrayData = array(
            'nome'           => chk_array( $this->form_data, 'nome'),
            'cpf'            => tracosEPontos( chk_array( $this->form_data, 'cpf') ),
            'cnpj'           => tracosEPontos( chk_array( $this->form_data, 'cnpj') ),
            'rg'             => tracosEPontos( chk_array( $this->form_data, 'rg') ),
            'inscricao'      => tracosEPontos( chk_array( $this->form_data, 'inscricao') ),
            'telefone'       => tracosEPontos( chk_array( $this->form_data, 'telefone') ),
            'celular'        => tracosEPontos( chk_array( $this->form_data, 'celular') ),
            'sexo'           => chk_array( $this->form_data, 'sexo'),
            'dataNascimento' => converteData( chk_array( $this->form_data, 'dataNascimento') ),
            'cep'            => tracosEPontos(chk_array( $this->form_data, 'cep')),
            'logradouro'     => chk_array( $this->form_data, 'logradouro'),
            'numero'         => chk_array( $this->form_data, 'numero'),
            'complemento'    => chk_array( $this->form_data, 'complemento'),
            'bairro'         => chk_array( $this->form_data, 'bairro'),
            'uf'             => chk_array( $this->form_data, 'uf'),
            'cidade'         => tracosEPontos(chk_array( $this->form_data, 'cidade')),
            'tipo'           => 'fornecedor'
        );
		
		// Se o ID do usuário não estiver vazio, atualiza os dados
		if ( ! empty($fornecedor_id) ) {

			$query = $this->db->update('pessoa', 'idPessoa', $fornecedor_id, $arrayData);
			
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
			$query = $this->db->insert('pessoa', $arrayData);
			
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
                    'select idPessoa from pessoa order by idPessoa desc limit 1'
                );

                // Obtém os dados
                $ultimo_reg= $consulta_ult_cli->fetch();

                // Configura os dados do formulário
                $this->form_data = $ultimo_reg[0];
                $this->form_msg = '<script>
								   		swal("Dados inseridos com sucesso!", "", "success")
								   </script>';

                return;
			}
		}
	}
	
	/**
	 ** Busca dados do formulário
	 **/
	public function get_register_form ( $fornecedor_id = false ) {
	
		// O ID de usuário que vamos pesquisar
		$s_fornecedor_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $fornecedor_id ) ) {
            $s_fornecedor_id = (int)$fornecedor_id;
		}
		
		// Verifica se existe um ID de cliente
		if ( empty( $s_fornecedor_id ) ) {
			return;
		}
		
		// Verifica na base de dados
		$query = $this->db->query('SELECT * FROM `pessoa` WHERE `idPessoa` = ? LIMIT 1', array( $s_fornecedor_id ));
		
		// Verifica a consulta
		if ( ! $query ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Fornecedor não existe. </b></span>
							   </div>';
			return;
		}
		
		// Obtém os dados da consulta
		$fetch_data = $query->fetch();
		
		// Verifica se os dados da consulta estão vazios
		if ( empty( $fetch_data ) ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Fornecedor não existe. </b></span>
							   </div>';
			return;
		}
		
		// Configura os dados do formulário
		foreach ( $fetch_data as $key => $value ) {
			$this->form_data[$key] = $value;
		}
	}
	
	/**
	 ** Apaga fornecedor
	 **/
	public function del_fornecedor ( $parametros = array() ) {

		// O ID do usuário
		$fornecedor_id = null;
		
		// Verifica se existe o parâmetro "del" na URL
		if ( chk_array( $parametros, 0 ) == 'del' ) {
			
			$this->form_msg_del = '<script>
                                        swal({
                                            title: "Tem certeza?",
                                            text: "Após a exclusão, você não poderá recuperar o registro.",
                                            type: "warning",
                                            showCancelButton: true,
                                            cancelButtonText: "Cancelar",
                                            confirmButtonColor: "#DD6B55",
                                            confirmButtonText: "Sim, excluir!",
                                            closeOnConfirm: false
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.assign("' . $_SERVER['REQUEST_URI'] . '/confirma");
                                            } else {
                                                window.location.assign("' . HOME_URI . '/cliente/");
                                            }
                                        });
                                   </script>';

			// Verifica se o valor do parâmetro é um número
			if ( 
				is_numeric( chk_array( $parametros, 1 ) )
				&& chk_array( $parametros, 2 ) == 'confirma' 
			) {
				// Configura o ID do cliente a ser apagado
                $fornecedor_id = chk_array( $parametros, 1 );
			}
		}
		
		// Verifica se o ID não está vazio
		if ( !empty( $fornecedor_id ) ) {
		
			// O ID precisa ser inteiro
            $fornecedor_id = (int)$fornecedor_id;
			
			// Deleta o cliente
			$query = $this->db->delete('pessoa', 'idPessoa', $fornecedor_id);
			
			// Redireciona para a página de registros
			echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/fornecedor/">';
			echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/fornecedor/";</script>';
			return;
		}
	}
	
	/**
	 ** Lista clientes
	 **/
	public function getFornecedores() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `pessoa` WHERE tipo = "fornecedor" ORDER BY idPessoa DESC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do usuário
		return $query->fetchAll();
	}
}