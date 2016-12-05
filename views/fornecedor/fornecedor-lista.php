<?php if ( ! defined('ABSPATH')) exit; ?>
    
    <?php
        // Carrega todos os métodos do modelo
        $modelo->validate_register_form();
        $modelo->get_register_form( chk_array( $parametros, 1 ) );
        $modelo->del_fornecedor( $parametros );
	?>
    
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">                

                    <div class="card">
                        <!-- Header -->
                        <div class="content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                                <h4 class="title"><b><i class="ti-clipboard"></i> Lista de Fornecedores</b>
                                    <a href="<?php echo HOME_URI ?>/fornecedor/cad/" class="btn btn-info btn-fill btn-icon pull-right"><span class="ti-plus"></span></a>
                                </h4>
                                <hr>
                            </div>
                            <div class="content table-full-width">
                            	<?php 
									// Lista os usuários
									$lista = $modelo->getFornecedores();
							    ?>
                                <table id="datatables" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                        	<th>Cod.</th>
                                            <th>Nome</th>
                                            <th>Endereço</th>
                                            <th>nº</th>
                                            <th>Ramo</th>
                                            <th class="disabled-sorting">Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        	<th>Cod.</th>
                                            <th>Nome</th>
                                            <th>Endereço</th>
                                            <th>nº</th>
                                            <th>Telefone</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($lista as $fetch_userdata): ?>
                                        <tr>
                                        	<td> <?php echo $fetch_userdata['idPessoa'] ?> </td>
                                            <td> <?php echo $fetch_userdata['nome'] ?> </td>
                                            <td> <?php echo $fetch_userdata['logradouro'] ?> </td>
                                            <td> <?php echo $fetch_userdata['numero'] ?> </td>
                                            <td> <?php echo $fetch_userdata['telefone'] ?> </td>
                                            <td>
                                                <a href="<?php echo HOME_URI ?>/fornecedor/cad/edit/<?php echo $fetch_userdata['idPessoa'] ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></a>
                                                <a href="<?php echo HOME_URI ?>/fornecedor/cad/del/<?php echo $fetch_userdata['idPessoa'] ?>" class="btn btn-simple btn-danger btn-icon remove"><i class="ti-close"></i></a>
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