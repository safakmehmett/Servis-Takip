<?php
/**********************************************************************************
 * 
 * @package	Servis
 * @author	Şafak Mehmet İLHAN
 * @copyright	Copyright (c) 2020 - 2021, Şafak Mehmet İLHAN (https://www.google.com/search?q=%22%C5%9Fafak+mehmet+ilhan%22)
 * @license	https://www.gnu.org/licenses/licenses.html#GPL	GNU General Public License V3
 * @link	https://github.com/safakmehmett
 * @since	Version 1.0.0
 * @filesource
 * 
**********************************************************************************/
?> 
<?php

class ServiceModel extends CI_Model {
	
	function InquireSearch($phone,$servicenumber)
	{
		$result= $this->db->select('*')
		->from('products')
		->where('phone',$phone)
		->where('inquire',$servicenumber)
		->get()
		->row();
		if(count($result)!=1)
		{
			return false;
		}
		else
		{
			return $result;
		}
	}	
	function FormMd5Search ($id){
		$result=$this->db->select('*')->from('products')->where('md5',$id)->get()->row();
		return $result;
	}
	function FormServiceSearch ($id){
			$result=$this->db->select('*')->from('transactionlog')->where('productid',$id)->get()->result();
			return $result;
			
	}
	function PhoneServiceSearch ($id){
			$result=$this->db->select('*')->from('products')->where('productid',$id)->get()->result();
			return $result;
			
	}
	
}


?>