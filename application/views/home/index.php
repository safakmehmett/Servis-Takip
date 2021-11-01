<?php
/**
 ********************************************************************************
 * 
 * @package	Servis
 * @author	Şafak Mehmet İLHAN
 * @copyright	Copyright (c) 2020 - 2021, Şafak Mehmet İLHAN (https://www.google.com/search?q=%22%C5%9Fafak+mehmet+ilhan%22)
 * @license	https://www.gnu.org/licenses/licenses.html#GPL	GNU General Public License V3
 * @link	https://github.com/safakmehmett
 * @since	Version 1.0.0
 * @filesource
 * 
 ********************************************************************************
 */
?> 
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>	
	<body data-col="1-column" class=" 1-column  blank-page">
		<div class="wrapper">
			<div class="main-panel">			
				<div class="main-content">
					<div class="content-wrapper">					
						<section id="login">
						  <div class="container-fluid">
							<div class="row full-height-vh m-0">
								<div class="col-12 d-flex align-items-center justify-content-center">
									<div class="card">
										<div class="card-content">
											<div class="card-body login-img">
												<div class="row m-0">
													<div class="col-lg-12 col-md-12 bg-white px-4 pt-3">
														<h4 class="mb-2 card-title">Servis Sorgulama</h4>
														<p class="card-text mb-3">
															Serviste olan cihazınızın durumunu sorgulamak için lütfen aşağıdaki bilgileri doldurunuz.
														</p>
														<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');	?>
														<?php echo $this->session->flashdata('dumberor'); ?>
														<form action="<?php echo base_url('servis/durum'); ?>" method="post">
															<div class="input-group input-group-lg">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="phone"><i class="fa fa-mobile" style="font-size:1.5em;width:0.7em"></i></span>
																</div>
															  <input type="text" name="phone" class="form-control" placeholder="Telefon Numaranız" aria-label="phone" aria-describedby="phone" required>
															</div>
															<div class="input-group input-group-lg">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="servicenumber"><i class="fa fa-barcode fa-1x"></i></span>
																</div>
															  <input type="text" name="servicenumber" class="form-control" placeholder="Teknik Servis Numaranız" aria-label="servicenumber" aria-describedby="servicenumber" required>
															</div>							
															<div class="d-flex justify-content-between mt-2"></div>
															<div class="fg-actions d-flex justify-content-between">
																<div class="login-btn"></div>
																<div class="recover-pass">
																	<button class="btn btn-outline-primary">
																		Sorgula »
																	</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						  </div>
						</section>
					</div>
				</div>
			</div>
		</div>