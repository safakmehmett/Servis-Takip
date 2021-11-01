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
                            Yeni Servis Kaydı
                            <a href="<?php echo base_url('panel/forms'); ?>" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar" style="float: right;"><i class="icon-wrench"></i> Servis Formları</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"></h4>
                                <p class="mb-0">
                                    Yeni servis kaydı gerçekleştirebilmek için lütfen aşağıdaki bilgileri eksiksiz doldurunuz.
                                </p>
                            </div>
                            <div class="card-content">
                                <div class="px-3">
                                    <?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');	?>
                                    <form class="form" action="<?php echo base_url('panel/addnewform'); ?>" method="post">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Müşteri Bilgileri</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput1">Ad</label>
                                                        <input type="text" id="serviceinput1" class="form-control" name="name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput2">Soyad</label>
                                                        <input type="text" id="serviceinput2" class="form-control" name="surname" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput3">E-mail</label>
                                                        <input type="email" id="serviceinput3" class="form-control" name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput4">Telefon</label>
                                                        <input type="tel" id="serviceinput4" class="form-control" name="phone" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput5">Tc Kimlik No</label>
                                                        <input type="text" id="serviceinput6" class="form-control" name="identity" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Bu alan sadece Numara Desteklemektedir" minlength="10" maxlength="20">
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="form-section"><i class="ft-file-text"></i> Fatura Bilgileri</h4>
                                            <div class="row">
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput7">Firma Ünvanı</label>
                                                        <input type="text" id="serviceinput7" class="form-control" name="companyname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput8">Vergi Dairesi</label>
                                                        <input type="text" id="serviceinput8" class="form-control" name="taxadmin">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput8">Vergi No</label>
                                                        <input type="text" id="serviceinput8" class="form-control" name="taxnumber" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Bu alan sadece Numara Desteklemektedir" minlength="10" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput9">Adres</label>
                                                        <input type="text" id="serviceinput9" class="form-control" name="address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput10">İl</label>
                                                        <input type="phone" id="serviceinput10" class="form-control" name="district">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput11">İlçe</label>
                                                        <input type="phone" id="serviceinput11" class="form-control" name="province">
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="ft-box"></i> Arızalı Ürün Bilgileri</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput12">Ürün Cinsi</label>
                                                        <select id="serviceinput13" name="productype" class="form-control">
                                                            <option value="" selected="" disabled="">Lütfen Seçiniz</option>
															<?php foreach ($producttinfo as $producttinfo) { ?>
                                                            <option value="<?php echo $producttinfo->product_type; ?>"><?php echo $producttinfo->product_type; ?></option>
															<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput13">Marka</label>
                                                        <select id="serviceinput13" name="brand" class="form-control">
                                                            <option value="" selected="" disabled="">Lütfen Seçiniz</option>
															<?php foreach ($brandsinfo as $brandsinfo) { ?>
                                                            <option value="<?php echo $brandsinfo->brandname; ?>"><?php echo $brandsinfo->brandname; ?></option>
															<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput14">Model</label>
                                                        <input type="text" id="serviceinput14" class="form-control" name="model">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput15">Seri No</label>
                                                        <input type="text" id="serviceinput15" class="form-control" name="serial">
                                                    </div>
                                                </div>												
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput16">Garantili Mi ?</label>
                                                        <select id="serviceinput16" name="warranty" class="form-control">
                                                            <option value="none" selected="" disabled="">Lütfen Seçiniz</option>
                                                            <option value="Evet">Evet</option>
                                                            <option value="Hayır">Hayır</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput17">Garanti Bitiş Tarihi ?</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="date" id="serviceinput17" class="form-control" name="warrantyend">
                                                            <div class="form-control-position">
                                                                <i class="ft-message-square"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput18">Biliniyor ise problem oluşma tarihi ?</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="date" id="serviceinput18" class="form-control" name="problemdate">
                                                            <div class="form-control-position">
                                                                <i class="ft-message-square"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput19">Problem Tanımı</label>
                                                        <textarea type="text-area" id="serviceinput19" class="form-control" name="problem"></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput20">Teslim Alan Teknisyen</label>
                                                        <input type="text" id="serviceinput20" class="form-control" name="deliveryofficer" readonly="readonly" value="<?php echo $techmaninfo->name; ?> <?php echo $techmaninfo->surname; ?>">
                                                    </div>
                                                </div>	
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput21">Teknisyen Yorumu</label>
                                                        <textarea type="text-area" id="serviceinput21" class="form-control" name="comment"></textarea>
                                                    </div>
                                                </div>												
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput22">Cihaz ile birlikte teslim alınan aksesuarlar</label>
                                                        <textarea type="text-area" id="serviceinput22" class="form-control" name="accessories"></textarea>
                                                    </div>
                                                </div>
											</div>
											
											<input type="text" style="display:none" name="readonly" value="<?php echo $publicsettings->requestprefix; ?>">

                                            <div class="form-actions">
                                                <a href="<?php echo base_url('panel/forms'); ?>">
                                                    <button type="button" class="btn btn-raised btn-raised btn-warning mr-1">
                                                        <i class="ft-x"></i> İptal
                                                    </button>
                                                </a>
                                                <button type="Submit" value="Submit" class="btn btn-raised btn-raised btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Kaydet
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