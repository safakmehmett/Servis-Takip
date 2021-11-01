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
                        Genel Ayarlar

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="bordered-layout-colored-controls"></h4>                            
                        </div>
                        <div class="card-body">
                            <div class="px-3">														
							<?php echo $this->session->flashdata('update'); ?>
							<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');	?>							
                                <form class="form form-horizontal form-bordered" action="<?php echo base_url('panel/settingsupdate/1'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="settinginput1">Firma Adı</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="settinginput1" class="form-control border-primary" placeholder="" value="<?php echo $settingsinfo->companyname; ?>" name="companyname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="settinginput2">Adres</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="settinginput2" class="form-control border-primary" placeholder="" value="<?php echo $settingsinfo->address; ?>" name="address">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="settinginput3">e-Posta</label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="settinginput3" class="form-control border-primary" placeholder="" value="<?php echo $settingsinfo->email; ?>" name="email">
                                                    </div>
                                                </div>
                                            </div>                                           
                                        </div>
										<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="settinginput4">Telefon</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="settinginput4" class="form-control border-primary" placeholder="" value="<?php echo $settingsinfo->phone; ?>" name="phone">
                                                    </div>
                                                </div>
                                            </div>                                           
                                        </div>
										<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="settinginput5">Fax</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="settinginput5" class="form-control border-primary" placeholder="" value="<?php echo $settingsinfo->fax; ?>" name="fax">
                                                    </div>
                                                </div>
                                            </div>                                           
                                        </div>
										<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="file">Logo</label>
                                                    <div class="col-md-9">
                                                        <input type="file" id="file" name="logo"><span class="file-custom"></span>
                                                    </div>
                                                </div>
                                            </div>
											<div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="logo">Logo Görseli</label>
                                                    <div class="col-md-9">
                                                        <img src="<? echo base_url() ?>uploads/<?php echo $settingsinfo->logo; ?>" style="width:50%">
                                                    </div>
                                                </div>
                                            </div>   											
                                        </div>
										<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="settinginput6">Servis Sorgu Öneki</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="settinginput6" class="form-control border-primary" placeholder="" value="<?php echo $settingsinfo->requestprefix; ?>" name="requestprefix">
                                                    </div>
                                                </div>
                                            </div>									
                                        </div>
										<div class="row">
											<div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="settinginput6">Servis Şartları</label>
                                                    <div class="col-md-9">
                                                        <textarea type="text-area" id="settinginput6" class="form-control border-primary" name="serviceterms" rows="9" cols="33"><?php echo $settingsinfo->serviceterms; ?></textarea>
                                                    </div>
                                                </div>
                                            </div> 
										</div>
                                        
                                    </div>
                                    <div class="form-actions right">
                                        <a href="<?php echo base_url('panel/dashboard'); ?>">
											<button type="button" class="btn btn-raised btn-raised btn-warning mr-1">
												<i class="ft-x"></i> İptal
											</button>
										</a>
                                        <button type="Submit" value="Submit" class="btn btn-raised btn-raised btn-primary">
											<i class="fa fa-check-square-o"></i> Güncelle
										</button>
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



<?php echo $this->session->flashdata('updatesuccess'); ?>
<?php echo $this->session->flashdata('updatefailed'); ?>
<script>
function updatesuccess() {
toastr.success('Firma Bilgileri Güncellendi.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}	
function updatefailed() {
toastr.warning('Firma Bilgileri güncellenemedi.', 'UYARI !', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}			

</script>