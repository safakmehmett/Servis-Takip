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
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card gradient-blackberry">
                        <div class="card-content">
                            <div class="card-body pt-2 pb-0">
                                <div class="media">
                                    <div class="media-body white text-left">
                                        <h3 class="font-large-1 mb-0"><?php echo $allforms; ?></h3>
                                        <span>Servis Formu</span>
                                    </div>
                                    <div class="media-right white text-right">
                                        <i class="icon-pie-chart font-large-1"></i>
                                    </div>
                                </div>
                            </div>
                            <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card gradient-ibiza-sunset">
                        <div class="card-content">
                            <div class="card-body pt-2 pb-0">
                                <div class="media">
                                    <div class="media-body white text-left">
                                        <h3 class="font-large-1 mb-0"><?php echo $openforms; ?></h3>
                                        <span>Bekleyen Servis Formu</span>
                                    </div>
                                    <div class="media-right white text-right">
                                        <i class="icon-bulb font-large-1"></i>
                                    </div>
                                </div>
                            </div>
                            <div id="Widget-line-chart1" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card gradient-green-tea">
                        <div class="card-content">
                            <div class="card-body pt-2 pb-0">
                                <div class="media">
                                    <div class="media-body white text-left">
                                        <h3 class="font-large-1 mb-0"><?php echo $workingforms; ?></h3>
                                        <span>Çalışılan Servis Formu</span>
                                    </div>
                                    <div class="media-right white text-right">
                                        <i class="icon-wrench font-large-1"></i>
                                    </div>
                                </div>
                            </div>
                            <div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card gradient-pomegranate">
                        <div class="card-content">
                            <div class="card-body pt-2 pb-0">
                                <div class="media">
                                    <div class="media-body white text-left">
                                        <h3 class="font-large-1 mb-0"><?php echo $readyforms; ?></h3>
                                        <span>Hazır Servis Formu</span>
                                    </div>
                                    <div class="media-right white text-right">
                                        <i class="ft-box font-large-1"></i>
                                    </div>
                                </div>
                            </div>
                            <div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row match-height">
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Kullanıcı Listesi</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
							<?php foreach ($tecmaninfo as $tecmaninfo) { ?>
                                <div class="media mb-1">
                                    <div class="media-body">
                                        <h4 class="font-medium-1 mt-1 mb-0"><?php echo $tecmaninfo->name; ?> <?php echo $tecmaninfo->surname; ?></h4>
                                        <p class="text-muted font-small-3"><?php echo $tecmaninfo->username; ?></p>
                                    </div>
                                    <div class="mt-1">
                                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                            <input type="checkbox" class="custom-control-input" checked id="customcheckbox1">
                                            <label class="custom-control-label" for="customcheckbox1"></label>
                                        </div>

                                    </div>
                                </div>
							<?php } ?>
								<br />
                                <div class="action-buttons mt-2 text-center">
                                    <a href="<?php echo base_url('panel/adduser'); ?>" class="btn btn-raised gradient-blackberry py-2 px-4 white mr-2">Yeni Ekle</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
  <div class="col-xl-8 col-lg-12 col-12">
    <div class="card">
      <div class="card-header pb-2">
        <h4 class="card-title">Form Listesi (Son 6 Kayıt)</h4>
      </div>
      <div class="card-content">
        <table class="table table-responsive-sm text-center">
          <thead>
            <tr>
              <th>Form No</th>
              <th>İşlem Tarihi</th>
              <th>Durumu</th>
              <th>İşlem</th>
            </tr>
          </thead>
          <tbody>
		  <?php foreach (array_slice($serviceinfo, -6 , 6) as $serviceinfo) { ?>
            <tr>              
              <td><?php echo $serviceinfo->inquire; ?></td>
              <td><?php echo $serviceinfo->date; ?></td>
              <td>
				<?php echo $serviceinfo->status; ?>
              </td>
              <td>
				<a href="<?php echo base_url('panel/service/'); echo ''.$serviceinfo->id.'' ?>" class="info p-0" data-original-title="" title="Servis İşlemi">
					<i class="icon-wrench font-medium-3 mr-2"></i>
				</a>
				<a onclick="if (!confirm('<?php echo $serviceinfo->inquire; ?> Numaralı Servis Formu Silinecektir.\n Emin Misiniz ?')) return false;" href="<?php echo base_url('panel/deleteform/'); echo ''.$serviceinfo->id.'' ?>" class="danger p-0" data-original-title="Formu Sil" title="Formu Sil">
					<i class="ft-x font-medium-3 mr-2"></i>
				</a>
				<a href="<?php echo base_url('panel/printform/'); echo ''.$serviceinfo->id.'' ?>" target="_blank" class="blue-grey p-0" data-original-title="" title="Servis Formu Yazdır">
					<i class="ft-printer font-medium-3 mr-2"></i>
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
    </div>
