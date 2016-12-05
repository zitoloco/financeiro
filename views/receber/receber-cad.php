<?php if ( ! defined('ABSPATH')) exit; ?>

<?php
    // Carrega todos os métodos do modelo
    $modelo->validate_register_form();
    $modelo->get_register_form( chk_array( $parametros, 1 ) );
    $modelo->del_receber( $parametros );
?>

<?php if( !empty( $modelo->form_msg_del ) ){ echo $modelo->form_msg_del; } ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php echo $modelo->form_msg;?>
                <div class="card">
                    <!-- Header -->
                    <div class="header">
                        <h4 class="title"><b>Cadastro de Fornecedor</b></h4>
                        <hr>
                    </div>
                    <!-- End Header -->
                    <!-- Content -->
                    <div class="content">
                        <form method="post" action="">


                            <div class="text-center">
                                <hr>
                                <input type="text" id="id" name="id" value="<?php echo htmlentities( chk_array( $modelo->form_data, 'idPessoa') ); ?>" hidden>
                                <button  type="submit" value="Gravar" class="btn btn-info btn-fill">Gravar</button>&nbsp;
                                <a href="<?php echo HOME_URI . '/receber/';?>" class="btn btn-default btn-fill">Voltar</a>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    </div>
</div>


