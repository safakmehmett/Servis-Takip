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

class AdLoginModel extends CI_Model {
	
	function UserSearch($username,$password)
	{
		$result= $this->db->select('*')->from('users')->where('username',$username)->where('password',$password)->get()->row();
		if(count($result)!=1)
		{
			return false;
		}
		else
		{
			return $result;
		}
	}	
	function AddUser($data=array())
	{
		$result=$this->db->insert('users' ,$data);
		return $result;
	}	
	function ListUser ()
	{
		$result=$this->db->select('*')->from('users')->get()->result();		
		return $result;
	}
	
	function InfoUser ($id)
	{
		$result=$this->db->select('*')->from('users')->where('id',$id)->get()->row();
		if(count($result)!=1)
		{
			return false;
		}
		else
		{
			return $result;
		}
	}
	
	function InfoLoggedUser ($username)
		{
			$result=$this->db->select('*')->from('users')->where('username',$username)->get()->row();
			if(count($result)!=1)
			{
				return false;
			}
			else
			{
				return $result;
			}
		}
	
	function DeleteUser ($id)
	{
		$result=$this->db->delete('users', array('id'=>$id));		
		return $result;
	}
	
	function UpdateUser ($id,$data)
	{
		$result = $this->db->where('id', $id)->update('users', $data);
		return $result;			
	}
	function PasswordUser ($id,$passwordpas){		
		$result = $this->db->where('id', $id)->update('users', $passwordpas);
		return $result;
	}	
	
	function InfoCompany ()
	{
		$result=$this->db->select('*')->from('settings')->where('id', '1')->get()->row();
		if(count($result)!=1)
		{
			return false;
		}
		else
		{
			return $result;
		}
	}
	
		function updatesettings($id,$data){
			$result = $this->db->where('id', $id)->update('settings', $data);
			return $result;		
		}
	
	function ListBrand ()
	{
		$result=$this->db->select('*')->from('brands')->get()->result();
		return $result;
	}
	function InfoBrand ($id)
	{
		$result=$this->db->select('*')->from('brands')->where('id',$id)->get()->row();
		if(count($result)!=1)
		{
			return false;
		}
		else
		{
			return $result;
		}
	}
		function AddBrand($data=array())
		{
			$result=$this->db->insert('brands' ,$data);
			return $result;
		}
		function DeleteBrand ($id)
		{
			$result=$this->db->delete('brands', array('id'=>$id));		
			return $result;
		}
		
		function UpdateBrand ($id,$data)
		{
			$result = $this->db->where('id', $id)->update('brands', $data);
			return $result;			
		}
	
	function ListPtype ()
	{
		$result=$this->db->select('*')
		->from('productype')
		->get()
		->result();
		
		return $result;
	}
	function InfoPtype ($id)
	{
		$result=$this->db->select('*')->from('productype')->where('id',$id)->get()->row();
		if(count($result)!=1)
		{
			return false;
		}
		else
		{
			return $result;
		}
	}
		function AddPtype($data=array())
		{
			$result=$this->db->insert('productype' ,$data);
			return $result;
		}
		function DeletePtype ($id)
		{
			$result=$this->db->delete('productype', array('id'=>$id));		
			return $result;
		}
		
		function UpdatePtype ($id,$data)
		{
			$result = $this->db->where('id', $id)->update('productype', $data);
			return $result;			
		}
		
	function ListService (){		

		$result=$this->db->select('*')->from('products')->get()->result();		
		return $result;
		
	}
		function AddService($data=array()){
			$result=$this->db->insert('products' ,$data);
			return $result;			
		}
		function InfoService ($id){
			$result=$this->db->select('*')->from('products')->where('id',$id)->get()->row();
			if(count($result)!=1)
			{
				return false;
			}
			else
			{
				return $result;
			}
		}
		function UpdateService ($id,$data)
		{
			$result = $this->db->where('id', $id)->update('products', $data);
			return $result;			
		}
		function DeleteService ($id)
		{
			$result=$this->db->delete('products', array('id'=>$id));		
			return $result;
		}
		function LastServiceLog ($id)
		{
			$result=$this->db->select('*')->from('transactionlog')->where('productid',$id)->get()->result();
			return $result;
			
		}
		function InsertServiceLog ($data=array())
		{
			$result=$this->db->insert('transactionlog' ,$data);
			return $result;		
		}
	
}

?>