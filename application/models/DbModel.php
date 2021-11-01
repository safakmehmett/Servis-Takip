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

class DbModel extends CI_Model {
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}	
	function CountForms(){
		$result=$this->db->count_all("products");
		return $result;		
	}
	function CountOpenForms(){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->like('Status', 'Teslim Alındı');
		return $this->db->count_all_results();
		
	}
	function CountWorkingForms(){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->like('Status', 'Kontrol Ediliyor');
		$this->db->or_like('Status', 'Parça Onayı Bekleniyor');		
		$this->db->or_like('Status', 'Parça Bekleniyor');
		$this->db->or_like('Status', 'Parça Değişimi Yapılıyor');
		$this->db->or_like('Status', 'Servis İşleminde');
		$this->db->or_like('Status', 'Test Ediliyor');		
		return $this->db->count_all_results();
		
	}
	function CountReadyForms(){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->like('Status', 'Teslime Hazır');
		return $this->db->count_all_results();
		
	}
}
?>