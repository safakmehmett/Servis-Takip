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
                           "<?php echo $forminfo->inquire; ?>" Numaralı Servis Formu Bilgileri
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
                                    <?php echo $forminfo->inquire; ?> Servis Formu bilgileri aşağıdadır.
                                </p>
                            </div>
                            <div class="card-content">
                                <div class="px-3">
                                    <?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');	?>
                                    <form class="form" action="<?php echo base_url('panel/updateform/'); echo ''.$forminfo->id.'' ?>" method="post">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Müşteri Bilgileri</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput1">Ad</label>
                                                        <input type="text" id="serviceinput1" class="form-control" name="name" value="<?php echo $forminfo->name; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput2">Soyad</label>
                                                        <input type="text" id="serviceinput2" class="form-control" name="surname" value="<?php echo $forminfo->surname; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput3">E-mail</label>
                                                        <input type="email" id="serviceinput3" class="form-control" name="email" value="<?php echo $forminfo->email; ?>"required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput4">Telefon</label>
                                                        <input type="tel" id="serviceinput4" class="form-control" name="phone" value="<?php echo $forminfo->phone; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput5">Tc Kimlik No</label>
                                                        <input type="text" id="serviceinput6" class="form-control" name="identity" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Bu alan sadece Numara Desteklemektedir" minlength="10" maxlength="20" value="<?php echo $forminfo->identity; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="form-section"><i class="ft-file-text"></i> Fatura Bilgileri</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput7">Vergi Dairesi</label>
                                                        <input type="text" id="serviceinput7" class="form-control" name="taxadmin" value="<?php echo $forminfo->taxadmin; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput8">Vergi No</label>
                                                        <input type="text" id="serviceinput8" class="form-control" name="taxnumber" data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Bu alan sadece Numara Desteklemektedir" minlength="10" maxlength="20" value="<?php echo $forminfo->taxnumber; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput9">Adres</label>
                                                        <input type="text" id="serviceinput9" class="form-control" name="address" value="<?php echo $forminfo->address; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput10">İl</label>
                                                        <input type="phone" id="serviceinput10" class="form-control" name="district" value="<?php echo $forminfo->district; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput11">İlçe</label>
                                                        <input type="phone" id="serviceinput11" class="form-control" name="province" value="<?php echo $forminfo->province; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="ft-box"></i> Arızalı Ürün Bilgileri</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput12">Ürün Cinsi</label>                                                        
                                                        <select id="serviceinput12" name="productype" class="form-control">
                                                            <option value="<?php echo $forminfo->productype; ?>" selected="" style="font-weight:bold;background-color:#156988"><?php echo $forminfo->productype; ?></option>
															<?php foreach ($ptinfo as $ptinfo) { ?>
                                                            <option value="<?php echo $ptinfo->product_type; ?>"><?php echo $ptinfo->product_type; ?></option>
															<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput13">Marka</label>
                                                        <select id="serviceinput13" name="brand" class="form-control">
                                                            <option value="<?php echo $forminfo->brand; ?>" selected="" style="font-weight:bold;background-color:#156988"><?php echo $forminfo->model; ?></option>
															<?php foreach ($brinfo as $brinfo) { ?>
                                                            <option value="<?php echo $brinfo->brandname; ?>"><?php echo $brinfo->brandname; ?></option>
															<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput14">Model</label>
                                                        <input type="text" id="serviceinput14" class="form-control" name="model" value="<?php echo $forminfo->model; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput15">Seri No</label>
                                                        <input type="text" id="serviceinput15" class="form-control" name="model" value="<?php echo $forminfo->serial; ?>">
                                                    </div>
                                                </div>												
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput16">Garantili Mi ?</label>
                                                        <select id="serviceinput16" name="warranty" class="form-control">
                                                            <option value="<?php echo $forminfo->warranty; ?>" selected="" style="font-weight:bold;background-color:#156988"><?php echo $forminfo->warranty; ?></option>
                                                            <option value="Evet">Evet</option>
                                                            <option value="Hayır">Hayır</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput17">Garanti Bitiş Tarihi ?</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="date" id="serviceinput17" class="form-control" name="warrantyend" value="<?php echo $forminfo->warrantyend; ?>">
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
                                                            <input type="date" id="serviceinput18" class="form-control" name="problemdate" value="<?php echo $forminfo->problemdate; ?>">
                                                            <div class="form-control-position">
                                                                <i class="ft-message-square"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput19">Problem Tanımı</label>
                                                        <textarea type="text-area" id="serviceinput19" class="form-control" name="problem" value="<?php echo $forminfo->problem; ?>"><?php echo $forminfo->problem; ?></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput20">Teslim Alan Teknisyen</label>
														<select id="serviceinput20" name="deliveryofficer" class="form-control">
                                                            <option value="<?php echo $forminfo->deliveryofficer; ?>" selected="" style="font-weight:bold;background-color:#156988"><?php echo $forminfo->deliveryofficer; ?></option>
                                                            <?php foreach ($techminfo as $techminfo) { ?>
                                                            <option value="<?php echo $techminfo->name; ?> <?php echo $techminfo->surname; ?>"><?php echo $techminfo->name; ?> <?php echo $techminfo->surname; ?></option>
															<?php } ?>
                                                        </select>                                                        
                                                    </div>
                                                </div>	
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput21">Teknisyen Yorumu</label>
                                                        <textarea type="text-area" id="serviceinput21" class="form-control" name="comment" value="<?php echo $forminfo->comment; ?>"><?php echo $forminfo->comment; ?></textarea>
                                                    </div>
                                                </div>												
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput22">Cihaz ile birlikte teslim alınan aksesuarlar</label>
                                                        <textarea type="text-area" id="serviceinput22" class="form-control" name="accessories" value="<?php echo $forminfo->accessories; ?>"><?php echo $forminfo->accessories; ?></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="serviceinput23">Servis Sorgu No</label>
														<input type="text" id="serviceinput23" class="form-control" name="inquire" value="<?php echo $forminfo->inquire; ?>">                                                        
                                                    </div>
                                                </div>
											</div>
											
											

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