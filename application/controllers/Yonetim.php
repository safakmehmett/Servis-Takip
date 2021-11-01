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
defined('BASEPATH') OR exit('No direct script access allowed');

class Yonetim extends CI_Controller {
	
	public function logout()
	{
		$this->session->unset_userdata('check');
		//$this->session->sess_destroy();
		redirect('yonetim');
	}

	public function index()
	{
		$this->load->view('_Layouts/header');		
		$this->load->view('yonetim/login');
	}
		
	public function login()
	{
		$this->load->library('form_validation');		
			$this->form_validation->set_rules('username','Kullanıcı Adınız','required');
			$this->form_validation->set_rules('password','Şifreniz','required');
			$this->form_validation->set_message('required','Lütfen %s\'ı boş bırakmayınız.');			
			
		if($this->form_validation->run())
		{			
			$username = $this->input->post('username');
			$password = $this->input->post('password');			
			
			$this->load->model('AdLoginModel');			
			$useresult = $this->AdLoginModel->UserSearch($username,md5($password));		
			if($useresult)
			{
				$this->session->set_userdata('check',true);
				$this->session->set_userdata('username',$username);			
				$this->session->set_userdata('loaduser',$result);
				redirect('panel/dashboard');			
			}
			else
			{
				$this->session->set_flashdata('loginerror','<div class="alert alert-danger" role="alert"> Kullanıcı Adınız yada Şifreniz hatalıdır.<br /> Kontrol ederek tekrar deneyiniz. </div>');
				redirect('yonetim');
			}
		}
		else 
		{	
			$this->load->view('_Layouts/header');		
			$this->load->view('yonetim/login');
		}
	}
	
	
}