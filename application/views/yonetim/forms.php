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
            <div class="row">
                <div class="col-12">
                    <div class="content-header">
						Teknik Servis Form Listesi
					<a href="<?php echo base_url('panel/newform'); ?>" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar" style="float: right;" ><i class="ft-edit"></i> Yeni Servis Kaydı</a>	
					</div>                    
                </div>
            </div>
            <section id="extended">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card"> 
							<div class="card-header">	
							<?php echo $this->session->flashdata('success'); ?>							
							</div>
                            <div class="card-content">
								<div class="card-body card-dashboard table-responsive">
									<table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
												<th>Form Tarihi</th>
                                                <th>Sorgu No</th>                                                
                                                <th>Müşteri</th>
												<th>Telefon</th>
												<th>Teslim Tarihi</th>
												<th>Son İşlem</th>
												<th>Servis İşlemleri</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php foreach ($serviceinfo as $serviceinfo) { ?>
												<tr>
													<td><?php echo $serviceinfo->date; ?></td>
													<td><?php echo $serviceinfo->inquire; ?></td>													
													<td><?php echo $serviceinfo->name; ?> <?php echo $serviceinfo->surname; ?></td>
													<td><?php echo $serviceinfo->phone; ?></td>
													<td><?php echo $serviceinfo->deliverydate; ?></td>
													<td><?php echo $serviceinfo->status; ?></td>
													<td>
														<div class="btn-group mr-1 mb-1">
															<button type="button" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-wrench"></i> Seçiniz</button>
															<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
																<a href="<?php echo base_url('panel/service/'); echo ''.$serviceinfo->id.'' ?>" class="dropdown-item info" title="Servis İşlemi">
																	<i class="icon-wrench font-medium-3 mr-2"></i> Servis İşlemi
																</a>
																<a href="<?php echo base_url('panel/editform/'); echo ''.$serviceinfo->id.'' ?>" class="dropdown-item success" title="Formu Düzenle">
																	<i class="ft-edit-2 font-medium-3 mr-2"></i> Formu Düzenle
																</a>	
																<a href="<?php echo base_url('panel/printform/'); echo ''.$serviceinfo->id.'' ?>" class="dropdown-item blue-grey" title="Servis Formu Yazdır">
																	<i class="ft-printer font-medium-3 mr-2"></i> Servis Formu
																</a>
																<a href="javascript:qropen('<?php echo base_url('panel/qrprint/'); echo ''.$serviceinfo->id.'' ?>','QR Etiket Çıktısı','toolbar=0, location=0, status=0, menubar=0, scrollbar=0, resizable=0, width=500, height=500')" class="blue-grey dropdown-item" data-original-title="" title="QR Kod Yazdır">
																	<i class="fa fa-qrcode font-medium-3 mr-2"></i> QR Kod Yazdır
																</a>
																<div class="dropdown-divider"></div>																
																<a onclick="if (!confirm('<?php echo $serviceinfo->inquire; ?> Numaralı Servis Formu Silinecektir.\n Emin Misiniz ?')) return false;" href="<?php echo base_url('panel/deleteform/'); echo ''.$serviceinfo->id.'' ?>" class="dropdown-item danger" data-original-title="Formu Sil" title="Formu Sil">
																	<i class="ft-x font-medium-3 mr-2"></i> Formu Sil
																</a>
															</div>
														</div>
													</td>													
												</tr>
											<?php } ?>											
                                        </tbody>
										<tfoot>
											<tr>
											  <th>Sorgu No</th>
                                                <th>Form Tarihi</th>
                                                <th>Müşteri</th>
												<th>Telefon</th>
												<th>Teslim Tarihi</th>
												<th>Son İşlem</th>
												<th>Servis İşlemleri</th>
											</tr>
										</tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>					
                </div>				
            </section>
			
		</div>
	</div>

	

	
<br/><br/>


<?php echo $this->session->flashdata('editsuccess'); ?>
<?php echo $this->session->flashdata('adsuccess'); ?>
<?php echo $this->session->flashdata('deletesuccess'); ?>

<div class="modal fade" id="qrprint" tabindex="-1" role="dialog" aria-labelledby="qrprintLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-body printarea" align="center">
		<img src="https://chart.apis.google.com/chart?cht=qr&chs=250x250&chl=<?php echo $serviceinfo->inquire; ?>" alt="" style="">
	</div>
	<div class="modal-footer">
	<button type="button" class="btn btn-primary" onclick="window.print()">Yazdır</button>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
	</div>
	</div>
	</div>
	</div>
<style type="text/css">
@media print
{
body * { visibility: hidden; }
.app-sidebar { visibility: hidden; }
.printarea * { visibility: visible; }
.card-body {margin-top:-13.5em}
}
.break { page-break-before: always; }
</style>
<script>
function getUsers(){
    $.post( "<?php echo base_url('members/listView/'); ?>", function( data ){
        $('#qrprint').html(data);
    });
}
</script>

<script  language="JavaScript">
function qropen(theURL,winName,features) {
  	window.open(theURL,winName,features);
}

// -->
 </script>

<script>
function editsuccess() {
toastr.success('Servis Formu güncellenmiştir.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}		
function adsuccess() {
toastr.success('Servis Formu Oluşturulmuştur.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}	
function deletesuccess() {
toastr.success('Servis Formu Silinmiştir.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}	
</script>


<script>
$('#zero-configuration').DataTable( {
    paging: false
} );
</script>