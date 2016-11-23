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
                        <h4 class="title"><b>Configurações do Sistema</b></h4>
                        <hr>
                    </div>
                    <div class="content">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-sm-7 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Email ADM</label>
                                        <input type="text" class="form-control border-input" placeholder="Nome" id="cli_nome" name="cli_nome" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_nome') ); ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Último envio</label>
                                        <input type="text" class="form-control border-input" placeholder="Nome" id="cli_nome" name="cli_nome" value="<?php 
            								echo htmlentities( chk_array( $modelo->form_data, 'cli_nome') ); ?>" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Mensagem pré vencimento?</label>
                                        <label class="radio">
                                            <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="optionsRadios2" value="">
                                            Sim
                                        </label>
                                        <label class="radio checked">
                                            <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="optionsRadios2" value="" checked="">
                                            Não
                                        </label>
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
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Mensagem no dia do vencimento</label>
                                        <label class="radio">
                                            <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="optionsRadios2" value="">
                                            Sim
                                        </label>
                                        <label class="radio checked">
                                            <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="optionsRadios2" value="" checked="">
                                            Não
                                        </label>
                                        <select type="text" id="cod_cid" name="cod_cid" required class="form-control">
                                            <?php 
                                            // Lista os usuários
                                            $lista = $modelo->get_cidade_list(); 
                                            ?>
                                            <option value="">- Selecione a mensagem -</option>
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
                            	<div class="form-group">
                                    <div class="col-sm-5 col-sm-offset-1">
                                        <label>Mensagem após vencimento?</label>
                                        <label class="radio">
                                            <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="optionsRadios2" value="">
                                            Sim
                                        </label>
                                        <label class="radio checked">
                                            <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="optionsRadios2" value="" checked="">
                                            Não
                                        </label>
                                        <select type="text" id="cod_cid" name="cod_cid" required class="form-control">
                                            <?php 
                                            // Lista os usuários
                                            $lista = $modelo->get_cidade_list(); 
                                            ?>
                                            <option value="">- Selecione a mensagem -</option>
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
                            <div class="text-center">
                            	<hr>
                            	<a href="<?php echo HOME_URI . '/';?>" class="btn btn-default btn-fill">Voltar</a>
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

<script src="<?php echo HOME_URI;?>/views/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
<script src="<?php echo HOME_URI;?>/views/assets/js/bootstrap-checkbox-radio-switch-tags.js"></script>