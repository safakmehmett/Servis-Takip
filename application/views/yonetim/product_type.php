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
						Ürün Tipleri
					<button class="btn btn-raised gradient-crystal-clear white shadow-big-navbar" style="float: right;" data-toggle="modal" data-target="#addptype"><i class="ft-plus"></i> Ürün Tipi Ekle</button>	
					</div>                    
                </div>
            </div>
            <section id="extended">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card"> 
							<div class="card-header">	
							<?php echo $this->session->flashdata('addptypesuccess'); ?>							
							</div>
                            <div class="card-content">
                                <div class="card-body table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ürün Tipi</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $counter=1; foreach ($ptypeinfo as $ptypeinfo) { ?>
												<tr>
													<td><?php echo $counter++ ?></td>
													<td><?php echo $ptypeinfo->product_type; ?></td>
													<td>
														<a href="<?php echo base_url('panel/eproduct_type/'); echo ''.$ptypeinfo->id.'' ?>" class="success p-0" data-original-title="" title="Ürün Tipi Düzenleme">
															<i class="ft-edit-2 font-medium-3 mr-2"></i>
														</a>
														<a onclick="if (!confirm('<?php echo $ptypeinfo->product_type; ?> Ürün Tipi silinecektir.\n Emin Misiniz ?')) return false;" href="<?php echo base_url('panel/deleteptype/'); echo ''.$ptypeinfo->id.'' ?>" class="danger p-0" data-original-title="Ürün Tipi Silme" title="Ürün Tipi Silme">
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

<?php echo $this->session->flashdata('edittypesuccess'); ?>
<?php echo $this->session->flashdata('adtypesuccess'); ?>
<?php echo $this->session->flashdata('deletetypesuccess'); ?>


<div class="modal fade text-left" id="addptype" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35">Ürün Tipi Ekleme</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('panel/addptype') ?>" method="post">
                <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                        <label for="brand">Ürün Tipi</label>
                        <input name="product_type" type="text" class="form-control" id="ptype" placeholder="Ürün Tipini Yazınız" required>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn" data-dismiss="modal" value="Pencereyi Kapat">
                    <input type="submit" class="btn btn-outline-danger btn" value="Ürün Tipi Oluştur" id="passwordchange">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
function edittypesuccess() {
toastr.success('<?php echo $ptypeinfo->product_type; ?> Ürün Tipi güncellenmiştir.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}		
function adtypesuccess() {
toastr.success('<?php echo $ptypeinfo->product_type; ?> Ürün Tipi Oluşturulmuştur.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}	
function deletetypesuccess() {
toastr.success('Ürün Tipi Silinmiştir.', 'Başarılı', {
      "showMethod": "slideDown",
      "hideMethod": "slideUp",
      timeOut: 3500
    });
}	

</script>
