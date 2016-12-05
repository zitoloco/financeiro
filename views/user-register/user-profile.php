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
                        <div class="col-sm-5">
	                        <div class="card">
	                            <div class="header">
	                                <h4 class="title">Membros da Equipe</h4>
	                            </div>
	                            <div class="content">
	                                <ul class="list-unstyled team-members">
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="avatar">
                                                        <img src="<?php echo HOME_URI.'/views/_uploads/user.png'?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    DJ Khaled
                                                    <br />
                                                    <span class="text-muted"><small>Offline</small></span>
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="avatar">
                                                        <img src="<?php echo HOME_URI.'/views/_uploads/user.png'?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    Robison
                                                    <br />
                                                    <span class="text-success"><small>Available</small></span>
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="avatar">
                                                        <img src="<?php echo HOME_URI.'/views/_uploads/user.png'?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    Flume
                                                    <br />
                                                    <span class="text-danger"><small>Busy</small></span>
                                                </div>
                                                <div class="col-xs-3 text-right">
                                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                </div>
                                            </div>
                                        </li>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
                        <div class="col-sm-5">
	                        <div class="card card-user">
	                            <div class="image">
	                                <img src="../../assets/img/background.jpg" alt="..."/>
	                            </div>
	                            <div class="content">
	                                <div class="author">
	                                  <img class="avatar border-white" src="<?php echo HOME_URI.'/views/_uploads/'.$this->userdata['user_photo'];?>" alt="..."/>
	                                  <h4 class="title"><?php echo $this->userdata['name']; ?><br />
	                                     <a href="#"><small>@<?php echo $this->userdata['user']; ?></small></a>
	                                  </h4>
	                                </div>
	                                <p class="description text-center">
	                                    "I like the way you work it <br>
	                                    No diggity <br>
	                                    I wanna bag it up"
	                                </p>
	                            </div>
	                        </div>
                        </div>
	                </div>
	            </div>
	        </div>