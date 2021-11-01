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
<?php echo $this->session->flashdata('rsuccess'); ?>
<!-- <body onload="printform();"></body> -->
<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-header">
                        Servis Formu Yazdır		
						<div style="float: right">
                        <a href="javascript:window.print()" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar"><i class="ft-printer"></i> Formu Yazdır</a> &nbsp;&nbsp;&nbsp;						
						<a href="<?php echo base_url('panel/forms'); ?>" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar"><i class="icon-wrench"></i> Servis Formları</a>
						</div>
					</div>
                </div>
				<?php echo $this->session->flashdata('asuccess'); ?>	
            </div>	
			<div class="printarea">		
            <section class="invoice-template">			
                <div class="card">
                    <div class="card-content p-3">
                        <div id="invoice-template" class="card-body">
                            <div id="invoice-company-details" class="row">
                                <div class="col-md-6 col-sm-12 text-center text-md-left">
                                    <div class="media">
                                        <img src="<? echo base_url() ?>uploads/<?php echo $getcompanydata->logo; ?>" alt="<?php echo $getcompanydata->companyname; ?>" title="<?php echo $getcompanydata->companyname; ?>" style="width:80%">
                                    </div>
                                </div>
								<div class="col-md-3">
								<img src="https://chart.apis.google.com/chart?cht=qr&chs=250x250&chl=<?php echo base_url() ?>formsorgu/<?php echo $getforminfo->md5; ?>" alt="Servis Durumunu Kontrol Edebilirsiniz" style="width:150px;position:fixed;">
								</div>
                                <div class="col-md-3 col-sm-12 text-center text-md-right">
                                    <h2>Servis Formu</h2>									
                                    <p class="pb-3"><?php echo $getforminfo->inquire; ?></p>
                                </div>
                            </div>
                            <div id="invoice-customer-details" class="row pt-2">
                                <div class="col-sm-12 text-left">
                                </div>
                                <div class="col-md-6 col-sm-12  text-center text-md-left">
                                    <ul class="px-0 list-unstyled">
                                        <li class="text-bold-800"><?php echo $getcompanydata->companyname; ?></li>
                                        <li><?php echo $getcompanydata->address; ?></li>
                                        <li><span class="text-muted">Telefon : </span><?php echo $getcompanydata->phone; ?></li>
                                        <li><span class="text-muted">Mail : </span><?php echo $getcompanydata->email; ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-sm-12 text-right text-md-right">
                                    <p><span class="text-muted">Form Tarihi :</span> <?php echo $getforminfo->date; ?></p>
									<p><span class="text-muted">Form Numarası :</span> <?php echo $getforminfo->inquire; ?></p>
                                </div>
                            </div>
                            <blockquote class="blockquote" style="margin-top:1em">
                                Cihazınız tarafımızda <strong><?php echo $getforminfo->inquire; ?></strong> teknik servis numarası ve bu formda bulunan bilgiler ile kayıt edilmiştir.
                                <br />
                                Cihazın son durumu hakkında bilgi almak için "<strong><?php echo base_url() ?></strong>" adresini kullanabilirsiniz.
                            </blockquote>
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
                                    <p class="lead">Fatura Bilgileri :</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Firma Ünvanı :</td>
                                                    <td class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>Vergi Dairesi :</td>
                                                    <td class="text-right"><?php echo $getforminfo->taxadmin; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Vergi Numarası :</td>
                                                    <td class="text-right"><?php echo $getforminfo->taxnumber; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Adresi :</td>
                                                    <td class="text-right">
                                                        <?php echo $getforminfo->address; ?>
                                                        <br />
                                                        <?php echo $getforminfo->province; ?> / <?php echo $getforminfo->district; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
							<div class="row" style="margin-top:2em">
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
                                                    <td class="text-right"><?php echo $getforminfo->warranty; ?> <?php echo $getforminfo->warrantyend; ?></td>
                                                </tr>
												<tr>
                                                    <td>Teslim Alınan Aksesuarlar :</td>
                                                    <td class="text-right"><?php echo $getforminfo->accessories; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <p class="lead">Sorun Bilgileri :</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>İletilen Sorun Oluşma Tarihi:</td>
                                                    <td class="text-right"><?php echo $getforminfo->problemdate; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sorun :</td>
                                                    <td class="text-right"><?php echo $getforminfo->problem; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Teslim Alan Yorumu :</td>
                                                    <td class="text-right"><?php echo $getforminfo->comment; ?></td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
							<blockquote class="blockquote" style="margin-top:2em">
                                <div class="col-md-12 col-sm-12">
                                <h6>Şartlar &amp; Koşullar</h6>
                                <p><?php echo $getcompanydata->serviceterms; ?></p>
                                </div>                                    
                            </blockquote>
							<div id="invoice-items-details" class="pt-2">
							  <div class="row">
								<div class="table-responsive col-sm-12">
								  <table class="table">
									<thead>
									  <tr>
										<th class="text-center">Teslim Eden</th>
										<th class="text-center">Teslim Alan</th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
										<td class="text-center"><?php echo $getforminfo->name; ?> <?php echo $getforminfo->surname; ?></td>
										<td class="text-center"><?php echo $getforminfo->deliveryofficer; ?> </td>
									  </tr>
									  <tr>
										<td class="text-center">
											<textarea id="story" name="story"rows="5" cols="33" class="text-center">İmza</textarea>
										</td>
										<td class="text-center">
											<textarea id="story" name="story"rows="5" cols="33" class="text-center">İmza</textarea>
										</td>
									  </tr>
									  <tr>
										<td class="text-center"></td>
										<td class="text-center"></td>
									  </tr>
									</tbody>
								  </table>
								</div>
							  </div>
							</div>							
                            						
                        </div>
                    </div>
                </div>			
            </section>
			</form>
			</div>			
			<div style="margin:auto;padding-bottom:3em">
				<div class="row">
					<div class="col-md-4 col-sm-12 text-center">
						<a href="<?php echo ('/panel/SendMailProcess/'); echo ''.$getforminfo->md5.'' ?>">
							<button type="button" class="btn btn-primary btn-raised my-1">
								<i class="fa fa-paper-plane-o"></i> Formu e-Posta İle Gönder
							</button>
						</a>
					</div>
					<div class="col-md-4 col-sm-12 text-center">
						<button type="button" class="btn btn-primary btn-raised my-1" onclick="window.print()">
							<i class="ft-printer"></i> Formu Yazdır
						</button>
					</div>
					<div class="col-md-4 col-sm-12 text-center">
						<button type="button" class="btn btn-primary btn-raised my-1" onclick="if (!confirm('Çok Yakında :)')) return false;">
							<i class="fa fa-paper-plane-o"></i> Bilgileri SMS ile gönder
						</button>
					</div>
				</div>
			</div>
			<br />
        </div>
    </div>


<script>
function success() {
toastr.success('<?php echo $getforminfo->inquire; ?> Numaralı servis formu başarıyla <?php echo $getforminfo->email; ?> adresine gönderilmiştir.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}
</script>

<style type="text/css">
@media print
{
* { float: none !important; }
body * { visibility: hidden; }
.app-sidebar { visibility: hidden; }
.printarea * { visibility: visible; }
.card-body {margin-top:-13.5em}
.break { page-break-before: always; }
html, body { height:100%; margin: 0 !important; padding: 0 !important; overflow: hidden; }
}
</style>
<script>
function printform() {
 window.print();
}
</script>