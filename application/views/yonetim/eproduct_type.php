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
                        "<?php echo $ptypeinfo->product_type; ?>" Ürün Tipi Bilgileri
                        <a href="<?php echo base_url('panel/product_type'); ?>" class="btn btn-raised gradient-crystal-clear white shadow-big-navbar" style="float: right;"><i class="ft-box"></i> Ürün Tipi Listesi</a>
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
                                <form class="form form-horizontal form-bordered" action="<?php echo base_url('panel/updateptype/'); echo ''.$ptypeinfo->id.'' ?>" method="post">
                                    <div class="form-body">
                                        <h4 class="form-section">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Ürün Tipi</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="userinput1" class="form-control border-primary" placeholder="<?php echo $ptypeinfo->product_type; ?>" value="<?php echo $ptypeinfo->product_type; ?>" name="product_type">
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>


                                    </div>
                                    <div class="form-actions right">
                                        <a href="<?php echo base_url('panel/product_type'); ?>">
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