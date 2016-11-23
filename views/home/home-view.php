<?php if ( ! defined('ABSPATH')) exit; ?>

<script>
	//swal("Dashboard atualizada!", "As estatísticas do (( Oil Smart )) foram atualizadas com sucesso!", "success")
</script>

<?php $hora_atual = date("H:i");?>


			<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-3 col-sm-6">
	                        <div class="card">
	                            <div class="content">
	                                <div class="row">
	                                    <div class="col-xs-5">
	                                        <div class="icon-big icon-warning text-center">
	                                            <i class="ti-check-box"></i>
	                                        </div>
	                                    </div>
	                                    <div class="col-xs-7">
	                                        <div class="numbers">
	                                            <p>Ordens hoje</p>
	                                            12
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
								<div class="card-footer">
									<hr />
									<div class="stats">
										<i class="ti-reload"></i> Atualizado <?php echo $hora_atual; ?>
									</div>
								</div>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-sm-6">
	                        <div class="card">
	                            <div class="content">
	                                <div class="row">
	                                    <div class="col-xs-5">
	                                        <div class="icon-big icon-success text-center">
	                                            <i class="ti-wallet"></i>
	                                        </div>
	                                    </div>
	                                    <div class="col-xs-7">
	                                        <div class="numbers">
	                                            <p>Valor hoje</p>
	                                            $549,34
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
								<div class="card-footer">
									<hr />
									<div class="stats">
										<i class="ti-reload"></i> Atualizado <?php echo $hora_atual; ?>
									</div>
								</div>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-sm-6">
	                        <div class="card">
	                            <div class="content">
	                                <div class="row">
	                                    <div class="col-xs-5">
	                                        <div class="icon-big icon-danger text-center">
	                                            <i class="ti-pulse"></i>
	                                        </div>
	                                    </div>
	                                    <div class="col-xs-7">
	                                        <div class="numbers">
	                                            <p>Erros</p>
	                                            2
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
								<div class="card-footer">
									<hr />
									<div class="stats">
										<i class="ti-reload"></i> Atualizado <?php echo $hora_atual; ?>
									</div>
								</div>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-sm-6">
	                        <div class="card">
	                            <div class="content">
	                                <div class="row">
	                                    <div class="col-xs-5">
	                                        <div class="icon-big icon-info text-center">
	                                            <i class="ti-email"></i>
	                                        </div>
	                                    </div>
	                                    <div class="col-xs-7">
	                                        <div class="numbers">
	                                            <p>Envios totais</p>
	                                            250
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
								<div class="card-footer">
									<hr />
									<div class="stats">
										<i class="ti-reload"></i> Atualizado <?php echo $hora_atual; ?>
									</div>
								</div>
	                        </div>
	                    </div>
	                </div>
					<div class="row">
						<div class="col-lg-4 col-sm-6">
							<div class="card">
								<div class="content">
									<div class="row">
										<div class="col-xs-7">
											<div class="numbers pull-left">
												$34,657
											</div>
										</div>
										<div class="col-xs-5">
											<div class="pull-right">
												<span class="label label-success">
		 											+18%
												</span>
											</div>
										</div>
									</div>
									<h6 class="big-title">total de ganhos <span class="text-muted">nos últimos</span> seis <span class="text-muted">meses</span></h6>
		                            <div id="chartTotalEarnings"></div>
								</div>
								<div class="card-footer">
									<hr>
									<div class="footer-title">Estatísticas financeiras</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="card">
								<div class="content">
									<div class="row">
										<div class="col-xs-7">
											<div class="numbers pull-left">
												169
											</div>
										</div>
										<div class="col-xs-5">
											<div class="pull-right">
												<span class="label label-danger">
		 											-14%
												</span>
											</div>
										</div>
									</div>
									<h6 class="big-title">total de trocas <span class="text-muted">nos últimos</span> 7 dias</h6>
		                            <div id="chartTotalSubscriptions"></div>
								</div>
								<div class="card-footer">
									<hr>
									<div class="footer-title">Ver todas as trocas</div>
									<div class="pull-right">
										<button class="btn btn-default btn-fill btn-icon btn-sm">
											<i class="ti-plus"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="card">
								<div class="content">
									<div class="row">
										<div class="col-xs-7">
											<div class="numbers pull-left">
												8,960
											</div>
										</div>
										<div class="col-xs-5">
											<div class="pull-right">
												<span class="label label-warning">
		 											~51%
												</span>
											</div>
										</div>
									</div>
									<h6 class="big-title">total de trocas <span class="text-muted">nos últimos</span> 6 anos</h6>
		                            <div id="chartTotalDownloads" ></div>
								</div>
								<div class="card-footer">
									<hr>
									<div class="footer-title">ver mais detalhes</div>
									<div class="pull-right">
										<button class="btn btn-alert btn-fill btn-icon btn-sm">
											<i class="ti-info"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="card card-circle-chart" data-background="color" data-color="blue">
								<div class="header text-center">
	                                <h5 class="title">Dashboard</h5>
	                                <p class="description">Metal mensal de trocas</p>
	                            </div>
								<div class="content">
									<div id="chartDashboard" class="chart-circle" data-percent="70">70%</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="card card-circle-chart" data-background="color" data-color="green">
								<div class="header text-center">
	                                <h5 class="title">Ordens</h5>
	                                <p class="description">Finalizadas</p>
	                            </div>
								<div class="content">
									<div id="chartOrders" class="chart-circle" data-percent="34">34%</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="card card-circle-chart" data-background="color" data-color="orange">
								<div class="header text-center">
	                                <h5 class="title">Novos Clientes</h5>
	                                <p class="description">Comp. mês passado</p>
	                            </div>
								<div class="content">
									<div id="chartNewVisitors" class="chart-circle" data-percent="62">62%</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="card card-circle-chart" data-background="color" data-color="brown">
								<div class="header text-center">
	                                <h5 class="title">Novas Trocas</h5>
	                                <p class="description">Comp. mês passado</p>
	                            </div>
								<div class="content">
									<div id="chartSubscriptions" class="chart-circle" data-percent="10">10%</div>
								</div>
							</div>
						</div>
					</div>
                </div>
	        </div>