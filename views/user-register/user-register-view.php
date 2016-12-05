<?php if ( ! defined('ABSPATH')) exit; ?>


<?php
// Carrega todos os métodos do modelo
$modelo->validate_register_form();
$modelo->get_register_form( chk_array( $parametros, 1 ) );
$modelo->del_user( $parametros );
?>

    
    
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">                

                    <div class="card">
                        <div class="content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                               	<h4 class="title" align="center"><b>Lista de Usuários</b> 
                    				<a href="<?php echo HOME_URI ?>/user-register/cad/" class="btn btn-info btn-fill btn-icon pull-right"><span class="ti-plus"></span></a>
                    			</h4>
                            </div>
                            <div class="content table-full-width">
                            	<?php 
									// Lista os usuários
									$lista = $modelo->get_user_list(); 
							    ?>
                                <table id="datatables" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <th data-field="id">ID</th>
                                        <th data-field="name" data-sortable="true">Usuário</th>
                                        <th data-field="salary" data-sortable="true">Nome</th>
                                        <th data-field="country" data-sortable="true">Permissões</th>
                                        <th data-field="actions">Ações</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lista as $fetch_userdata): ?>
                                          <tr>
                        
                                                <td> <?php echo $fetch_userdata['user_id'] ?> </td>
                                                <td> <?php echo $fetch_userdata['user'] ?> </td>
                                                <td> <?php echo $fetch_userdata['name'] ?> </td>
                                                <td> <?php echo implode( ',', unserialize( $fetch_userdata['user_permissions'] ) ) ?> </td>
                                                <td>
                                                    <a href="<?php echo HOME_URI ?>/user-register/cad/edit/<?php echo $fetch_userdata['user_id'] ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></a>
                                                    <a href="<?php echo HOME_URI ?>/user-register/cad/del/<?php echo $fetch_userdata['user_id'] ?>" class="btn btn-simple btn-danger btn-icon remove"><i class="ti-close"></i></a>
                                                </td>
                                
                                          </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
    

	<script src="<?php echo HOME_URI;?>/views/assets/js/jquery-1.10.2.js" type="text/javascript"></script>