<?php if ( ! defined('ABSPATH')) exit; ?>

<?php
// Verifica se o usuário está logado
if ( ! $this->logged_in ) {

	// Se não; garante o logout
	$this->logout();
	
	// Redireciona para a página de login
	$this->goto_login();
	
	// Garante que o script não vai passar daqui
	return;

}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo HOME_URI; ?>/views/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo HOME_URI; ?>/views/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>(( Financeiro ))</title>

	<!-- Canonical SEO -->
    <link rel="canonical" href="<?php echo HOME_URI; ?>"/>

	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />    

     <!-- Bootstrap core CSS     -->
    <link href="<?php echo HOME_URI; ?>/views/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo HOME_URI; ?>/views/assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS Custom     -->
    <link href="<?php echo HOME_URI; ?>/views/assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo HOME_URI; ?>/views/assets/css/themify-icons.css" rel="stylesheet">
</head>

<!-- Sweet Alert 2 plugin -->
<script src="<?php echo HOME_URI;?>/views/assets/js/sweetalert2.js"></script>

<body>
	<div class="wrapper">
	    <div class="sidebar" data-background-color="brown" data-active-color="info">
			<div class="logo">
				<a href="<?php echo HOME_URI; ?>" class="simple-text">
					(( Financeiro ))
				</a>
			</div>
			<div class="logo logo-mini">
				<a href="<?php echo HOME_URI; ?>" class="simple-text">
					RP
				</a>
			</div>
	    	<div class="sidebar-wrapper">
				<div class="user">
	                <div class="photo">
	                    <img src="<?php echo HOME_URI.'/views/_uploads/'.$this->userdata['user_photo'];?>" />
	                </div>
	                <div class="info">
	                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
	                        <?php echo $this->userdata['name']; ?>
	                        <b class="caret"></b>
	                    </a>
	                    <div class="collapse" id="collapseExample">
	                        <ul class="nav">
	                            <li><a href="<?php echo HOME_URI ."/user-register/profile/"?>">Meu perfil</a></li>
	                            <li><a href="<?php echo HOME_URI ."/user-register/cad/edit/". $this->userdata['user_id']; ?>">Editar dados</a></li>
	                            <li><a href="<?php echo HOME_URI; ?>/logout/">Sair</a></li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	            <ul class="nav">
	                <li>
	                    <a data-toggle="collapse" href="#dashboardOverview">
	                        <i class="ti-panel"></i>
	                        <p>Dashboards
                                <b class="caret"></b>
                            </p>
	                    </a>
                        <div class="collapse" id="dashboardOverview">
							<ul class="nav">
								<li><a href="">Estatísticas</a></li>
								<li><a href="">Gráficos</a></li>
							</ul>
						</div>
	                </li>
					<li>
						<a data-toggle="collapse" href="#formsExamples">
	                        <i class="ti-pencil-alt"></i>
	                        <p>
								Cadastros
	                           <b class="caret"></b>
	                        </p>
	                    </a>
	                    <div class="collapse" id="formsExamples">
	                        <ul class="nav">
								<li><a href="cliente">Cliente</a></li>
                                <li><a href="fornecedor">Fornecedor</a></li>
	                        </ul>
	                    </div>
	                </li>
	                <li>
						<a data-toggle="collapse" href="#tablesExamples">
	                        <i class="ti-control-play"></i>
	                        <p>
								Lançamentos
	                           <b class="caret"></b>
	                        </p>
	                    </a>
	                    <div class="collapse" id="tablesExamples">
	                        <ul class="nav">
								<li><a href="receber">Contas a Receber</a></li>
								<li><a href="pagar">Contas a Pagar</a></li>
	                        </ul>
	                    </div>
	                </li>
					<li>
	                    <a href="">
	                        <i class="ti-bar-chart-alt"></i>
	                        <p>Relatórios</p>
	                    </a>
	                </li>
					<li>
	                    <a href="configuracoes">
	                        <i class="ti-settings"></i>
	                        <p>Configuração</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-default">
	            <div class="container-fluid">
					<div class="navbar-minimize">
						<button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
					</div>
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar bar1"></span>
	                        <span class="icon-bar bar2"></span>
	                        <span class="icon-bar bar3"></span>
	                    </button>
	                    <a class="navbar-brand" href="<?php echo HOME_URI ?>">

						</a>
	                </div>
	                <div class="collapse navbar-collapse">

						<form class="navbar-form navbar-left navbar-search-form" role="search">
	    					<div class="input-group">
	    						<span class="input-group-addon"><i class="fa fa-search"></i></span>
	    						<input type="text" value="" class="form-control" placeholder="Pesquisar...">
	    					</div>
	    				</form>

	                    <ul class="nav navbar-nav navbar-right">
	                        <li>
	                            <a href="#stats" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
	                                <i class="ti-panel"></i>
									<p>Status</p>
	                            </a>
	                        </li>
	                        <li class="dropdown">
	                            <a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
	                                <i class="ti-bell"></i>
	                                <span class="notification">5</span>
									<p class="hidden-md hidden-lg">
										Notificações
										<b class="caret"></b>
									</p>
	                            </a>
	                            <ul class="dropdown-menu">
	                                <li><a href="#not1">Notificação 1</a></li>
	                                <li><a href="#not2">Notificação 2</a></li>
	                                <li><a href="#not3">Notificação 3</a></li>
	                                <li><a href="#not4">Notificação 4</a></li>
	                                <li><a href="#another">Notificação 5</a></li>
	                            </ul>
	                        </li>
							<li>
	                            <a href="#" class="btn-rotate">
									<i class="ti-settings"></i>
									<p class="hidden-md hidden-lg">
										Settings
									</p>
	                            </a>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </nav>

			<!-- JQuery Core! -->
			<script src="<?php echo HOME_URI;?>/views/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
			<!-- JQuery Mask JS! -->
			<script src="<?php echo HOME_URI;?>/views/assets/js/jquery.mask.min.js"></script>