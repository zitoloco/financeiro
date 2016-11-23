<?php if ( ! defined('ABSPATH')) exit; ?>

<?php
// Carrega todos os métodos do modelo
$modelo->validate_register_form();
$modelo->get_register_form( chk_array( $parametros, 1 ) );
$modelo->del_user( $parametros );
?>

  <?php echo $modelo->form_msg_del;?>


	
    
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $modelo->form_msg;?>
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><b>Cadastro de Usuário</b></h4>
                            <hr>
                        </div>
                        <div class="content">
                            <form method="post" action="" enctype="multipart/form-data">
                            	<div class="row">
                                	<div class="col-sm-4 col-sm-offset-4">
                                    	<div class="picture-container">
                                        	<div class="picture">
                                                <img src="<?php 
												if( ! empty(chk_array( $modelo->form_data, 'user_photo')) )
												{
													echo HOME_URI.'/views/_uploads/'.chk_array( $modelo->form_data, 'user_photo');
												}
												else
												{
													echo HOME_URI.'/views/_uploads/user.png';
												}
												?>" class="picture-src" id="wizardPicturePreview">
                                                <input type="file" name="noticia_imagem" value="" id="wizard-picture" />
                                            </div>
                                            <h6>Selecione a imagem</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <div class="form-group">
                                            <label><span>(*)</span> Nome</label>
                                            <input type="text" id="user_name" name="user_name" required="required" class="form-control border-input" value="<?php 
                        echo htmlentities( chk_array( $modelo->form_data, 'user_name') );
                    ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <div class="form-group">
                                            <label><span>(*)</span> Usuário</label>
                                            <input type="text" id="user" name="user" required="required" class="form-control border-input" value="<?php
                        echo htmlentities( chk_array( $modelo->form_data, 'user') );
                    ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <div class="form-group">
                                            <label><span>(*)</span> Senha</label>
                                            <input class="form-control border-input" required="required" type="password" id="user_password" name="user_password"  value="<?php
                       							echo htmlentities( chk_array( $modelo->form_data, 'user_password') ); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <div class="form-group">
                                            <label><span>(*)</span> Permissões</label>
                                            <input id="user_permissions" class="form-control border-input" name="user_permissions" required="required" type="text" value="<?php
                    							echo htmlentities( chk_array( $modelo->form_data, 'user_permissions') ); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <hr>
                                    <a href="<?php echo HOME_URI . '/user-register';?>" class="btn btn-default btn-fill">Voltar</a>
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
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
// Prepare the preview for profile picture
$("#wizard-picture").change(function(){
	readURL(this);
});
</script>