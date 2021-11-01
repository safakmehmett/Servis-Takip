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
<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <section id="basic-form-layouts">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content-header">
                            "<?php echo $getforminfo->inquire; ?>" Formu Servis İşlemi
                            <a href="<?php echo base_url('panel/forms'); ?>" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar" style="float: right;"><i class="icon-wrench"></i> Servis Formları</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="px-3">
									<div><?php echo $this->session->flashdata('success'); ?></div>
                                    <form class="form" action="<?php echo base_url('panel/serviceprocess/'); echo ''.$getforminfo->id.'' ?>" method="post">                                        
										<div class="form-body">
                                            <h4 class="form-section" style="margin-top:1em;"><i class="ft-clipboard"></i> Genel Bilgiler</h4>
                                            <div class="row" style="margin-top:2em">												
                                                <div class="col-md-6 col-sm-12">
                                                    <p class="lead">Cihaz Sahibinin :</p>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Adı - Soyadı :</td>
                                                                    <td class="text-right"><?php echo $getforminfo->name; ?> <?php echo $getforminfo->surname; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>e-Posta Adresi :</td>
                                                                    <td class="text-right"><?php echo $getforminfo->email; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Telefonu :</td>
                                                                    <td class="text-right"><?php echo $getforminfo->phone; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <p class="lead">Cihaz Bilgileri :</p>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Cinsi :</td>
                                                                    <td class="text-right"><?php echo $getforminfo->productype; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Marka :</td>
                                                                    <td class="text-right"><?php echo $getforminfo->brand; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Model :</td>
                                                                    <td class="text-right"><?php echo $getforminfo->model; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Seri No :</td>
                                                                    <td class="text-right"><?php echo $getforminfo->serial; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Garanti :</td>
                                                                    <td class="text-right"><?php echo $getforminfo->warranty; ?><?php if (empty($GetForm->warranty)) { }else{ echo " Garantili. Garanti Bitiş Tarihi : ";}?> <?php echo $getforminfo->warrantyend; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Teslim Alınan Aksesuarlar :</td>
                                                                    <td class="text-right"><?php echo $getforminfo->accessories; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
												<div class="col-md-12 col-sm-12">
													<div class="table-responsive col-sm-12"">
														<table class="table">                                                            
                                                            <thead>
																<tr>
																	<th class="text-center">Problem</th>
																	<th class="text-center">Teslim Alan Teknisyen Yorumu</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="text-center"><?php echo $getforminfo->problem; ?> <br/><?php echo $getforminfo->problemdate; ?></td>
																	<td class="text-center"><?php echo $getforminfo->comment; ?> </td>
																</tr>
																<tr>
																	<td></td>
																	<td></td>
																</tr>
															</tbody>
                                                        </table>
                                                    </div>
												</div>
                                            </div>
											<h4 class="form-section"><i class="ft-rotate-ccw"></i> Servis Geçmişi</h4>
                                            <div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>													
															<?php foreach ($getlastlog as $getlastlog){ ?>
                                                                <tr>
                                                                    <td style="font-weight:bold">Kayıt Tarihi :</td>
                                                                    <td class="text-left"><?php echo $getlastlog->date; ?></td>
																	<td style="font-weight:bold">Açıklama :</td>
                                                                    <td class="text-left"><?php echo $getlastlog->comment; ?></td>
                                                                </tr> 
															<? } ?>														
														
																<tr>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																</tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
												</div>
											</div>
                                            <h4 class="form-section"><i class="icon-wrench"></i> Servis Detayları</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="servicedetail">İşlem Tarihi</label>
                                                        <input type="text" id="servicedetail" class="form-control" name="statusdate" value="<?php echo date('d/m/Y'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="servicedetail">Durumu</label>
														<select id="servicedetail" name="status" class="form-control">
															<option value="<?php echo $getforminfo->status; ?>" selected="" selected="" style="font-weight:bold;background-color:#156988"><?php echo $getforminfo->status; ?></option>
															<option value="Teslim Alındı">Teslim Alındı</option>
															<option value="Kontrol Ediliyor">Kontrol Ediliyor</option>
															<option value="Parça Onayı Bekleniyor">Parça Onayı Bekleniyor</option>
															<option value="Parça Bekleniyor">Parça Bekleniyor</option>
															<option value="Parça Değişimi Yapılıyor">Parça Değişimi Yapılıyor</option>															
															<option value="Servis İşleminde">Servis İşleminde</option>															
															<option value="Test Ediliyor">Test Ediliyor</option>
															<option value="Teslime Hazır">Teslime Hazır</option>

														</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="servicedetail">Açıklama</label>
															<input type="text" id="servicedetail" class="form-control" name="statuscomment" value="" required >
														</div>
                                                    </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="servicedetail">Ücret (İşçilik vb. Parça fiyatları ayrıca toplanacaktır.)</label>
														<input type="text" id="servicedetail" class="form-control" name="price" value="">
                                                    </div>
                                                </div>                 
                                            </div>
                                            <h4 class="form-section" style="margin-top:1em;"><i class="ft-package"></i> Değişen Parça Bilgileri</h4>											
                                            <div class="row">
												<div class="col-md-12">
													
													<div class="table-responsive col-sm-12"">
														<table class="table">                                                            
                                                            <thead>
																<tr>
																	<th class="text-left">#</th>
																	<th class="text-left">Arızalı Parça</th>
																	<th class="text-left">Arızalı Parça Kodu</th>
																	<th class="text-left">Yeni Parça</th>
																	<th class="text-left">Yeni Parça Kodu</th>
																	<th class="text-left">Ücret</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="text-left" style="vertical-align:inherit;">1</td>
																	<td class="text-left">
																		<input type="text" id="piece1" class="form-control" name="oldp_name1" value="<?php echo $getforminfo->oldp_name1; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece1" class="form-control" name="oldp_code1" value="<?php echo $getforminfo->oldp_code1; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece1" class="form-control" name="newp_name1" value="<?php echo $getforminfo->newp_name1; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece1" class="form-control" name="newp_code1" value="<?php echo $getforminfo->newp_code1; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece1" class="form-control" name="newp_price1" value="<?php echo $getforminfo->newp_price1; ?>">
																	</td>
																</tr>
																<tr class="piece" <? if(empty($getforminfo->oldp_name1)) { ?> style="display:none;" <? } ?>>
																	<td class="text-left" style="vertical-align:inherit;">2</td>
																	<td class="text-left">
																		<input type="text" id="piece2" class="form-control" name="oldp_name2" value="<?php echo $getforminfo->oldp_name2; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece2" class="form-control" name="oldp_code2" value="<?php echo $getforminfo->oldp_code2; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece2" class="form-control" name="newp_name2" value="<?php echo $getforminfo->newp_name2; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece2" class="form-control" name="newp_code2" value="<?php echo $getforminfo->newp_code2; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece2" class="form-control" name="newp_price2" value="<?php echo $getforminfo->newp_price2; ?>">
																	</td>
																</tr>
																<tr class="piece" <? if(empty($getforminfo->oldp_name2)) { ?> style="display:none;" <? } ?>>
																	<td class="text-left" style="vertical-align:inherit;">3</td>
																	<td class="text-left">
																		<input type="text" id="piece3" class="form-control" name="oldp_name3" value="<?php echo $getforminfo->oldp_name3; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece3" class="form-control" name="oldp_code3" value="<?php echo $getforminfo->oldp_code3; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece3" class="form-control" name="newp_name3" value="<?php echo $getforminfo->newp_name3; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece3" class="form-control" name="newp_code3" value="<?php echo $getforminfo->newp_code3; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece3" class="form-control" name="newp_price3" value="<?php echo $getforminfo->newp_price3; ?>">
																	</td>
																</tr>
																<tr class="piece" <? if(empty($getforminfo->oldp_name3)) { ?> style="display:none;" <? } ?>>
																	<td class="text-left" style="vertical-align:inherit;">4</td>
																	<td class="text-left">
																		<input type="text" id="piece4" class="form-control" name="oldp_name4" value="<?php echo $getforminfo->oldp_name4; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece4" class="form-control" name="oldp_code4" value="<?php echo $getforminfo->oldp_code4; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece4" class="form-control" name="newp_name4" value="<?php echo $getforminfo->newp_name4; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece4" class="form-control" name="newp_code4" value="<?php echo $getforminfo->newp_code4; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece4" class="form-control" name="newp_price4" value="<?php echo $getforminfo->newp_price4; ?>">
																	</td>
																</tr>
																<tr class="piece" <? if(empty($getforminfo->oldp_name4)) { ?> style="display:none;" <? } ?>>
																	<td class="text-left" style="vertical-align:inherit;">5</td>
																	<td class="text-left">
																		<input type="text" id="piece5" class="form-control" name="oldp_name5" value="<?php echo $getforminfo->oldp_name5; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece5" class="form-control" name="oldp_code5" value="<?php echo $getforminfo->oldp_code5; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece5" class="form-control" name="newp_name5" value="<?php echo $getforminfo->newp_name5; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece5" class="form-control" name="newp_code5" value="<?php echo $getforminfo->newp_code5; ?>">
																	</td>
																	<td class="text-left">
																		<input type="text" id="piece5" class="form-control" name="newp_price5" value="<?php echo $getforminfo->newp_price5; ?>">
																	</td>
																</tr>
																<tr>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td class="text-right">
																		<button class="btn btn-raised btn-primary round btn-min-width mr-1 mb-1" type="button" onClick=$(".piece:hidden:first").show();>Parça Ekle</button>
																	</td>
																	<td>																	
																		<button class="btn btn-raised btn-danger round btn-min-width mr-1 mb-1" type="button" onClick=$(".piece:visible:last").hide();>Parça Kaldır</button>												
																	</td>
																</tr>																
															</tbody>
                                                        </table>
                                                    </div>													
												</div>
                                            </div>
                                            <div class="form-actions right">
                                                <a href="<?php echo base_url('panel/forms'); ?>">
                                                    <button type="button" class="btn btn-raised btn-raised btn-warning mr-1">
                                                        <i class="ft-x"></i> İptal Et
                                                    </button>
                                                </a>
                                                <button type="Submit" value="Submit" class="btn btn-raised btn-raised btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Servis İşlemini Kaydet
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php echo $this->session->flashdata('editsuccess'); ?>
<script>
function editsuccess() {
toastr.success('Servis işlemi gerçekleştirilmiştir.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}		
</script>