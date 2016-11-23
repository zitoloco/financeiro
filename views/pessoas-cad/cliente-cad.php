<?php if ( ! defined('ABSPATH')) exit; ?>

<?php
// Carrega todos os métodos do modelo
$modelo->validate_register_form();
$modelo->get_register_form( chk_array( $parametros, 1 ) );
$modelo->del_cliente( $parametros );
?>

  
 <?php if( !empty( $modelo->form_msg_del ) ){ echo $modelo->form_msg_del; } ?>
            
 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            	<?php echo $modelo->form_msg;?>
                <div class="card">
                    <div class="header">
                        <h4 class="title"><b>Cadastro de Cliente</b></h4>
                        <hr>
                    </div>
                    <div class="content">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Cod.</label>
                                        <input type="text" class="form-control border-input" readonly placeholder="Código" id="cod_cli" name="cod_cli" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cod_cli') ); ?>">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control border-input" placeholder="Nome" id="cli_nome" name="cli_nome" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_nome') ); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Fantasia</label>
                                        <input type="text" class="form-control border-input" placeholder="Nome fantasia" id="cli_fantasia" name="cli_fantasia" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_fantasia') ); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CNPJ</label>
                                        <input type="text" class="form-control border-input" placeholder="CNPJ" id="cli_cnpj" name="cli_cnpj" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_cnpj') ); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>IE</label>
                                        <input type="text" class="form-control border-input" placeholder="Inscrição estadual" id="cli_inscricao" name="cli_inscricao" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_inscricao') ); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ramo de Ativ.</label>
                                        <input type="text" class="form-control border-input" placeholder="Ramo de atividade" id="cli_ramoatividade" name="cli_ramoatividade" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_ramoatividade') ); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-4">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="text" class="form-control border-input" placeholder="CEP" id="cli_cep" name="cli_cep" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_cep') ); ?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control border-input" placeholder="Endereço" id="cli_endereco" name="cli_endereco" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_endereco') ); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nº</label>
                                        <input type="text" class="form-control border-input" placeholder="Número" id="cli_numero" name="cli_numero" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_numero') ); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control border-input" placeholder="Bairro" id="cli_bairro" name="cli_bairro" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_bairro') ); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                	<div class="form-group">
                                        <label>Cidade</label>
                                        <select type="text" id="cod_cid" name="cod_cid" required class="form-control">
                                            <?php 
                                            // Lista os usuários
                                            $lista = $modelo->get_cidade_list(); 
                                            ?>
                                            <option value="">- Selecione -</option>
                                            <?php foreach ($lista as $fetch_userdata): ?>
                                            <option value="<?php 
                                                echo $fetch_userdata['cod_cid'];?>"<?php
                                                if(chk_array( $modelo->form_data, 'cod_cid') ==  $fetch_userdata['cod_cid']) 
                                                echo "selected"; ?>><?php 
                                                echo $fetch_userdata['cid_nome']; ?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                               		</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control border-input" placeholder="E-mail" id="cli_email" name="cli_email" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_email') ); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea rows="5" class="form-control border-input" placeholder="Observações ref. ao cliente" id="cli_obs" name="cli_obs" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                            	<hr>
                            	<a href="<?php echo HOME_URI . '/cliente/';?>" class="btn btn-default btn-fill">Voltar</a>
                                <button  type="submit" value="Gravar" class="btn btn-info btn-fill">Gravar</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>