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
                        <h4 class="title"><b>Cadastro de Conta a Receber</b></h4>
                        <hr>
                    </div>
                    <!-- End Header -->
                    <!-- Content -->
                    <div class="content">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Data Lançamento *</label>
                                        <input type="text" class="form-control border-input datepicker" placeholder="99/99/9999" id="dataCriacao" name="dataCriacao" value="<?php
                                        echo htmlentities( converteData(chk_array( $modelo->form_data, 'dataCriacao')) ); ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Data de Vencimento *</label>
                                        <input type="text" class="form-control border-input datepicker" placeholder="99/99/9999" id="dataVencimento" name="dataVencimento" value="<?php
                                        echo htmlentities( converteData(chk_array( $modelo->form_data, 'dataVencimento')) ); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Cliente *</label>
                                        <input type="text" class="form-control border-input" placeholder="Nome" id="nome" name="nome" value="<?php
                                        echo htmlentities( chk_array( $modelo->form_data, 'nome') ); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Valor *</label>
                                        <input type="text" class="form-control border-input" placeholder="99,99" id="valor" name="valor" value="<?php
                                        echo htmlentities( chk_array( $modelo->form_data, 'valor') ); ?>" required align="right">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Valor Pago</label>
                                        <input type="text" class="form-control border-input" placeholder="99,99" id="valorPago" name="valorPago" value="<?php
                                        echo htmlentities( chk_array( $modelo->form_data, 'nome') ); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Historico</label>
                                        <textarea class="form-control border-input" placeholder="Aqui sera exibido o historico do titulo." rows="3" name="historico" id="historico"><?php
                                            echo htmlentities( chk_array( $modelo->form_data, 'historico') ); ?></textarea>
                                    </div>
                                </div>
                            </div>
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

<script>
    $(document).ready(function(){
        // Init DatetimePicker
        demo.initFormExtendedDatetimepickers();
        // Masks
        $("#dataCriacao").mask('00/00/0000');
        $("#dataVencimento").mask('00/00/0000');
        $("#valor").mask("000.000.000,00", {reverse: true});
    });
</script>