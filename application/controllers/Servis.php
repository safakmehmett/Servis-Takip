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
 *********************************************************************************/
?> 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servis extends CI_Controller {


	public function index()
	{
		$this->load->view('_Layouts/header');		
	
	}
	
	public function durum()
	{		
		$this->load->library('form_validation');		
			$this->form_validation->set_rules('phone','Telefon Numaranız','required');
			$this->form_validation->set_rules('servicenumber','Teknik Servis Numaranız','required');
			$this->form_validation->set_message('required','Lütfen %s\'ı boş bırakmayınız.');				
		if($this->form_validation->run())
		{			
			$phone = $this->input->post('phone');
			$servicenumber = $this->input->post('servicenumber');			
			$this->load->model('ServiceModel');			
			$result = $this->ServiceModel->InquireSearch($phone,$servicenumber);
			if($result==false)
			{
				$this->session->set_flashdata('dumberor','<div class="alert alert-danger" role="alert"> Telefon Numaranız yada Teknik Servis Numaranız hatalıdır.<br /> Kontrol ederek tekrar deneyiniz. </div>');
			
				$this->load->view('_Layouts/header');		
				$this->load->view('home/index');
			}
			else
			{
				$this->session->set_userdata('getformcheck',true);
				$this->session->set_userdata('phone',$phone);
				$this->session->set_userdata('servicenumber',$servicenumber);				
				$this->session->set_userdata('loadform',$result);				
				redirect('cihazdurum/'.md5($servicenumber));
			}
		}
		else 
		{
				$this->load->view('_Layouts/header');		
				$this->load->view('home/index');
		}
		
		
	}
	public function cihazdurum($id)
	{
		$formcheck = $this->session->userdata('getformcheck');
		if(!isset($formcheck) || $formcheck !=true)
		{
			redirect('/');
		}		
		$getproduct=$id;		
		$this->load->model('AdLoginModel');
		$getcompany=$this->AdLoginModel->InfoCompany($id=1);
		$querydata['GetCompany']=$getcompany;
		$this->load->model('ServiceModel');				
		$getform=$this->ServiceModel->FormMd5Search($getproduct);
		$querydata['GetForm']=$getform;
		$getproductid=$getform->id;
		$getserviceform=$this->ServiceModel->FormServiceSearch($getproductid);
		$querydata['GetServiceForm']=$getserviceform;
		$this->load->view('_Layouts/header');		
		$this->load->view('servis/durum', $querydata);
		$this->load->view('_Layouts/footer');
	}	
	public function newquery()
	{
		$this->session->unset_userdata('getformcheck');
		redirect('/');
	}
}
