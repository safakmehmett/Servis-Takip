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
						Kullanıcı Listesi
					<a href="<?php echo base_url('panel/adduser'); ?>" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar" style="float: right;"><i class="ft-user-plus"></i> Kullanıcı Ekle</a>	
					</div>                    
                </div>
            </div>
            <section id="extended">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card"> 
							<div class="card-header">	
							<?php echo $this->session->flashdata('addusersuccess'); ?>							
							</div>
                            <div class="card-content">
                                <div class="card-body table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Adı</th>
                                                <th>Soyadı</th>
                                                <th>Kullanıcı Adı</th>
                                                <th>Email</th>
												<th>Telefon</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $counter=1; foreach ($userinfo as $userinfo) { ?>
												<tr>
													<td><?php echo $counter++ ?></td>
													<td><?php echo $userinfo->name; ?></td>
													<td><?php echo $userinfo->surname; ?></td>
													<td><?php echo $userinfo->username; ?></td>
													<td><?php echo $userinfo->mail; ?></td>
													<td><?php echo $userinfo->phone; ?></td>
													<td>
														<a href="<?php echo base_url('panel/edituser/'); echo ''.$userinfo->id.'' ?>" class="info p-0" data-original-title="" title="Kullanıcı Bilgileri">
															<i class="ft-user font-medium-3 mr-2"></i>
														</a>
														<a href="<?php echo base_url('panel/edituser/'); echo ''.$userinfo->id.'' ?>" class="success p-0" data-original-title="" title="Kullanıcı Düzenleme">
															<i class="ft-edit-2 font-medium-3 mr-2"></i>
														</a>
														<a onclick="if (!confirm('<?php echo $userinfo->username; ?> Kullanıcısı silinecektir.\n Emin Misiniz ?')) return false;" href="<?php echo base_url('panel/deleteuser/'); echo ''.$userinfo->id.'' ?>" class="danger p-0" data-original-title="Kullanıcı Silme" title="Kullanıcı Silme">
															<i class="ft-x font-medium-3 mr-2"></i>
														</a>
													</td>
												</tr> 
											<?php } ?>											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>				
            </section>
		</div>
	</div>
</div>


<?php echo $this->session->flashdata('editusersuccess'); ?>
<?php echo $this->session->flashdata('adusersuccess'); ?>
<?php echo $this->session->flashdata('deleteusersuccess'); ?>
<?php echo $this->session->flashdata('deleteerror'); ?>
<script>
function editusersuccess() {
toastr.success('<?php echo $userinfo->username; ?> Kullanıcısı güncellenmiştir.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}		
function adusersuccess() {
toastr.success('<?php echo $userinfo->username; ?> Kullanıcısı Oluşturulmuştur.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}	
function deletesuccess() {
toastr.success('Kullanıcı Silinmiştir.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}
function deleteerror() {
toastr.error('Kullanıcı Silinmemiştir.', 'HATA !', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}		
</script>