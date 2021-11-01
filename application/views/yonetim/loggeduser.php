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
                        "<?php echo $userinfo->username; ?>" Kullanıcısının Bilgileri
                        <a href="<?php echo('/panel/users'); ?>" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar" style="float: right;"><i class="ft-users"></i> Kullanıcı Listesi</a>
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
							<?php echo $this->session->flashdata('addusersuccess'); ?>
							<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');	?>							
                                <form class="form form-horizontal form-bordered" action="<?php echo base_url('panel/userupdate/'); echo ''.$userinfo->id.'' ?>" method="post">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-info"></i> Genel Bilgiler</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Adı</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="userinput1" class="form-control border-primary" placeholder="<?php echo $userinfo->name; ?>" value="<?php echo $userinfo->name; ?>" name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput2">Soyadı</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="userinput2" class="form-control border-primary" placeholder="<?php echo $userinfo->surname; ?>" value="<?php echo $userinfo->surname; ?>" name="surname">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                    <label class="col-md-3 label-control" for="userinput3">Kullanıcı Adı</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="userinput3" class="form-control border-primary" placeholder="<?php echo $userinfo->username; ?>" value="<?php echo $userinfo->username; ?>" name="username">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                    <label class="col-md-3 label-control" for="userinput4">Şifre</label>
                                                    <div class="col-md-9">													
													<button type="button" class="btn btn-outline-info btn-block btn" data-toggle="modal" data-target="#passwd">
													Şifreyi Değiştirmek İçin Tıklayınız
													</button>
													</div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="form-section"><i class="ft-mail"></i> İrtibat bilgileri</h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput5">Email</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control border-primary" type="email" placeholder="<?php echo $userinfo->mail; ?>" value="<?php echo $userinfo->mail; ?>" id="userinput5" name="mail">
                                                    </div>
                                                </div>                                               

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                   <label class="col-md-3 label-control">Telefon</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control border-primary" type="phone" placeholder="<?php echo $userinfo->phone; ?>" value="<?php echo $userinfo->phone; ?>" id="userinput7" name="phone">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <a href="<?php echo base_url('panel/users'); ?>">
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

<div class="modal fade text-left" id="passwd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35">"<?php echo $userinfo->username; ?>"<br />Şifresini Değiştiriyorsunuz</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('panel/updatepassword/'); echo ''.$userinfo->id.'' ?>" method="post">
                <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                        <label for="password">Yeni Şifre</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Yeni Şifreyi Giriniz" required>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn" data-dismiss="modal" value="Pencereyi Kapat">
                    <input type="submit" class="btn btn-outline-danger btn" value="Şifreyi Değiştir" id="passwordchange">
                </div>
            </form>
        </div>
    </div>
</div>	
<?php echo $this->session->flashdata('passwordsuccess'); ?>
<script>
function passwordsuccess() {
toastr.success('<?php echo $userinfo->username; ?> Kullanıcısının Şifresi Değiştirilmiştir.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3000
    });
}	
</script>
