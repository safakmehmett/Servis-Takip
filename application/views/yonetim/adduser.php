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
							Yeni Kullanıcı Kaydı
						<a href="<?php echo base_url('panel/users'); ?>" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar" style="float: right;"><i class="ft-users"></i> Kullanıcı Listesi</a>
						</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"></h4>
                                <p class="mb-0">
                                    Yeni Kullanıcı kaydı gerçekleştirebilmek için lütfen aşağıdaki bilgileri eksiksiz doldurunuz.
                                </p>
                            </div>
                            <div class="card-content">
                                <div class="px-3">
									<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');	?>
                                    <form class="form" action="<?php echo base_url('panel/adduser'); ?>" method="post">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Kişisel Bilgileri</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Ad</label>
                                                        <input type="text" id="projectinput1" class="form-control" name="name" required >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Soyad</label>
                                                        <input type="text" id="projectinput2" class="form-control" name="surname" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput3">E-mail</label>
                                                        <input type="email" id="projectinput3" class="form-control" name="mail" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput4">Telefon</label>
                                                        <input type="phone" id="projectinput4" class="form-control" name="phone" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="form-section"><i class="ft-file-text"></i> Giriş Bilgileri</h4>
                                            <div class="form-group">
                                                <label for="companyName">Kullanıcı Adı</label>
                                                <input type="text" id="companyName" class="form-control" name="username" required>
                                            </div>
											<div class="form-group">
                                                <label for="companyName">Şifre</label>
                                                <input type="text" id="companyName" class="form-control" name="password" required>
                                            </div>                                            

                                        <div class="form-actions">
											<a href="<?php echo base_url('panel/users'); ?>">
												<button type="button" class="btn btn-raised btn-raised btn-warning mr-1">
													<i class="ft-x"></i> İptal
												</button>
											</a>
												<button type="Submit" value="Submit" class="btn btn-raised btn-raised btn-primary">
													<i class="fa fa-check-square-o"></i> Kaydet
												</button>											
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