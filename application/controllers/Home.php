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

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('_Layouts/header');	
        $this->load->view('home/index');
		
	}
	public function formsorgu($id)
	{
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
		$this->load->view('servis/formsorgu' , $querydata);		
        $this->load->view('_Layouts/footer');		
	}
	public function NothingFound ()
	{
		$this->load->view('_Layouts/header');	
        $this->load->view('home/notfound');
	}
}
