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
	 * Este método pode inserir ou atualizar dados.
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
		
		// Verifica se o registro existe
		$db_check_data = $this->db->query (
			'SELECT * FROM `contas` WHERE `idConta` = ?',
			array( 
				chk_array( $this->form_data, 'id')
			) 
		);
		
		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_data ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Não foi possível realizar a consulta. </b></span>
							   </div>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_data = $db_check_data->fetch();
		
		// Configura o ID da tabela
		$data_id = $fetch_data['idConta'];

		// Array com dados do formulario
        $arrayData = array(
            'idPessoa'        => chk_array( $this->form_data, 'idPessoa'),
            'dataCriacao'     => converteData( chk_array( $this->form_data, 'dataCriacao') ),
            'dataVencimento'  => converteData( chk_array( $this->form_data, 'dataVencimento') ),
            'dataPagamento'   => converteData( chk_array( $this->form_data, 'dataPagamento') ),
            'tipo'            => tracosEPontos( chk_array( $this->form_data, 'tipo') ),
            'historico'       => chk_array( $this->form_data, 'historico'),
            'valor'           => number_format( chk_array( $this->form_data, 'valor') , 2 ,'.',''),
            'valorPago'       => number_format( chk_array( $this->form_data, 'valorPago') , 2 ,'.',''),
            'tipo'            => 'receber'
        );
		
		// Se o ID não estiver vazio, atualiza os dados
		if ( ! empty($data_id) ) {

			$query = $this->db->update('contas', 'idConta', $data_id, $arrayData);
			
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
		// Se o ID estiver vazio, insere os dados
		} else {
		
			// Executa a inserção 
			$query = $this->db->insert('contas', $arrayData);
			
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
                $consulta_ult_reg = $this->db->query(
                    'SELECT idConta FROM contas ORDER BY idConta DESC LIMIT 1'
                );

                // Obtém os dados
                $ultimo_reg= $consulta_ult_reg->fetch();

                // Configura os dados do formulário
                $this->form_data = $ultimo_reg;
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
	public function get_register_form ( $reg_id = false ) {
	
		// O ID de usuário que vamos pesquisar
		$s_reg_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $reg_id ) ) {
            $s_reg_id = (int)$s_reg_id;
		}
		
		// Verifica se existe um ID de cliente
		if ( empty( $s_reg_id ) ) {
			return;
		}
		
		// Verifica na base de dados
		$query = $this->db->query('SELECT * FROM `contas` WHERE `idConta` = ? LIMIT 1', array( $s_reg_id ));
		
		// Verifica a consulta
		if ( ! $query ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Registro não existe. </b></span>
							   </div>';
			return;
		}
		
		// Obtém os dados da consulta
		$fetch_data = $query->fetch();
		
		// Verifica se os dados da consulta estão vazios
		if ( empty( $fetch_data ) ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Registro não existe. </b></span>
							   </div>';
			return;
		}
		
		// Configura os dados do formulário
		foreach ( $fetch_data as $key => $value ) {
			$this->form_data[$key] = $value;
		}
	}
	
	/**
	 ** Apaga Registro
	 **/
	public function del_receber ( $parametros = array() ) {

		// O ID do usuário
		$receber_id = null;
		
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
                                                window.location.assign("' . HOME_URI . '/receber/");
                                            }
                                        });
                                   </script>';

			// Verifica se o valor do parâmetro é um número
			if ( 
				is_numeric( chk_array( $parametros, 1 ) )
				&& chk_array( $parametros, 2 ) == 'confirma' 
			) {
				// Configura o ID do cliente a ser apagado
                $receber_id = chk_array( $parametros, 1 );
			}
		}
		
		// Verifica se o ID não está vazio
		if ( !empty( $receber_id ) ) {
		
			// O ID precisa ser inteiro
            $receber_id = (int)$receber_id;
			
			// Deleta o cliente
			$query = $this->db->delete('receber', 'idConta', $receber_id);
			
			// Redireciona para a página de registros
			echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/receber/">';
			echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/receber/";</script>';
			return;
		}
	}
	
	/**
	 ** Lista contas a receber
	 **/
	public function getReceber() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `contas` WHERE tipo = "receber" ORDER BY idConta DESC');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do usuário
		return $query->fetchAll();
	}
}