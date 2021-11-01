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
<div class="content-wrapper">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <img src="<? echo base_url() ?>uploads/<?php echo $GetCompany->logo; ?>" alt="<?php echo $GetCompany->companyname; ?>" title="<?php echo $GetCompany->companyname; ?>" style="max-width:300px;margin-top:2em" class="logo">
                            <img src="https://chart.apis.google.com/chart?cht=qr&chs=250x250&chl=<? echo base_url() ?>formsorgu/<?php echo $GetForm->md5; ?>" alt="Servis Durumunu Kontrol Edebilirsiniz" style="width:150px;float: right" class="qrcode">
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard table-responsive">
                            <div class="alert bg-info alert-icon-right alert-dismissible mb-2" role="alert">
                                <strong><?php echo $GetForm->inquire; ?></strong> Formuna bağlı cihazınızın servis detay bilgileri aşağıda yer almaktadır.
                            </div>
                            <div class="row" style="margin-top:2em">
                                <div class="col-md-6 col-sm-12">
                                    <p class="lead">Cihaz Sahibinin :</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Adı - Soyadı :</strong></td>
                                                    <td class="text-right"><?php echo $GetForm->name; ?> <?php echo $GetForm->surname; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>e-Posta Adresi :</strong></td>
                                                    <td class="text-right"><?php echo $GetForm->email; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Telefonu :</strong></td>
                                                    <td class="text-right"><?php echo $GetForm->phone; ?></td>
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
                                                    <td><strong>Cinsi :</strong></td>
                                                    <td class="text-right"><?php echo $GetForm->productype; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Marka :</strong></td>
                                                    <td class="text-right"><?php echo $GetForm->brand; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Model :</strong></td>
                                                    <td class="text-right"><?php echo $GetForm->model; ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="table-responsive col-sm-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Problem</th>
                                                <th class="text-center">Teslim Alan Teknisyen Yorumu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo $GetForm->problem; ?> <br /><?php echo $GetForm->problemdate; ?></td>
                                                <td class="text-center"><?php echo $GetForm->comment; ?> </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row" style="margin-top:2em">
                                <div class="col-md-6 col-sm-12">
                                    <p class="lead">Cihazın Son Durumu </p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Tarih :</strong></td>
                                                    <td class="text-right"><? if (empty($GetForm->statusdate)) { echo $GetForm->date;} else {echo $GetForm->statusdate; }?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Açıklama :</strong></td>
                                                    <td class="text-right"><? if (empty($GetForm->statuscomment)) { echo $GetForm->problem;} else {echo $GetForm->statuscomment; }?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Durumu :</strong></td>
                                                    <td class="text-right"><?php echo $GetForm->status; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <p class="lead">Cihazın İşlem Geçmişi </p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <?php foreach ($GetServiceForm as $GetServiceForm){ ?>
                                                <tr>
                                                    <td><strong>Tarih :</strong> <?php echo $GetServiceForm->date; ?></td>
                                                    <td><strong>Açıklama :</strong> <?php echo $GetServiceForm->comment; ?></td>
                                                </tr>
                                                <? } ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br />
                                <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                    <h4 class="alert-heading mb-2">Uyarı !</h4>
                                    <p>Yukarıda yer alan içerik <b>bilgilendirme</b> amaçlıdır. Uyuşmazlık durumlarında <?php echo $GetCompany->companyname; ?> <b>firma kayıtları esas alınacaktır.</b></p>
                                    <p class="mb-0">Tarafımıza iletilen cihazların servis işlemi sonrası yada servis işleminin iptali sonrasına müteakip <b>10 Gün</b> içerisinde teslim alınmamış cihazlar <?php echo $GetCompany->companyname; ?> firmasının <b>sorumluluğunda olmayacaktır</b>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <br />
</div>

<style>
@media (max-width: 574px) {
	.content-wrapper {
		padding: 1px !important;
		overflow: hidden;
	}
	.logo {
		margin: auto;
	}
}
</style>