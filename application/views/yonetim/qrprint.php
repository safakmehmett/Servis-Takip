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
<body onload="printform();"></body>

<div class="qrprint">
<pre>
<img src="<? echo base_url() ?>uploads/<?php echo $qrcompanydata->logo; ?>" alt="<?php echo $qrcompanydata->companyname; ?>" title="<?php echo $qrcompanydata->companyname; ?>" style="width:20em">
<img src="https://chart.apis.google.com/chart?cht=qr&chs=250x250&chl=<?php echo base_url() ?>formsorgu/<?php echo $qrforminfo->md5; ?>" alt="" style="">
</pre>
</div>


<script>
function printform() {
 window.print();
}
</script>