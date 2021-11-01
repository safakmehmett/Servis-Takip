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
<section id="login">
  <div class="container-fluid">
    <div class="row full-height-vh m-0">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card">
          <div class="card-content">
            <div class="card-body login-img">
              <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                  <img src="<? echo base_url(); ?>Assets/img/gallery/login.png" alt="" class="img-fluid mt-5" width="400" height="230">
                </div>
                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                  <h4 class="mb-2 card-title">Kullanıcı Girişi</h4>
                  <p class="card-text mb-3">
                    Hoş Geldiniz, lütfen bilgilerinizi giriniz.
                  </p>
					<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');	?>
					<?php echo $this->session->flashdata('loginerror'); ?>
					<form action="<?php echo base_url('/yonetim/login'); ?>" method="post">
					<input type="text" class="form-control mb-3" placeholder="Kullanıcı Adı" name="username" required />
					<input type="password" class="form-control mb-1" placeholder="Şifre" name="password" required />
					<div class="d-flex justify-content-between mt-2">
						<div class="remember-me">
						<div class="custom-control custom-checkbox custom-control-inline mb-3">
							<input type="checkbox" id="customCheckboxInline1" name="customCheckboxInline1" class="custom-control-input" />
							<label class="custom-control-label" for="customCheckboxInline1">
							Beni Hatırla
							</label>
						</div>
						</div>
						<div class="forgot-password-option">
						<a href="#" class="text-decoration-none text-primary">
							Şifrenizi mi unuttunuz ?
						</a>
						</div>
					</div>
					<div class="d-flex justify-content-between mt-2"></div>
					<div class="fg-actions d-flex justify-content-between">
						<div class="login-btn"></div>
						<div class="recover-pass">
							<button class="btn btn-outline-primary">
									Giriş »
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