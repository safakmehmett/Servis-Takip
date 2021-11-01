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

class Panel extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		{
			$this->letsecurity();
			$this->load->model('AdLoginModel');
		}
	}	
	function letsecurity()
	{
		$logincheck = $this->session->userdata('check');
		if(!isset($logincheck) || $logincheck !=true)
		{
			redirect('yonetim');
		}
	}
	
	public function dashboard()
	{	
		$this->load->model('DbModel');
		$allforms=$this->DbModel->CountForms();
		$dashboarddata['allforms']=$allforms;		
		$openforms=$this->DbModel->CountOpenForms();
		$dashboarddata['openforms']=$openforms;	
		$workingforms=$this->DbModel->CountWorkingForms();
		$dashboarddata['workingforms']=$workingforms;
		$readyforms=$this->DbModel->CountReadyForms();
		$dashboarddata['readyforms']=$readyforms;			
		$serviceinfo=$this->AdLoginModel->ListService();
		$dashboarddata['serviceinfo']=$serviceinfo;
		$tecmaninfo=$this->AdLoginModel->ListUser();
		$dashboarddata['tecmaninfo']=$tecmaninfo;
		$this->load->view('_Layouts/header');
		$this->load->view('_Layouts/menu');
		$this->load->view('yonetim/dashboard', $dashboarddata);
		$this->load->view('_Layouts/footer');
	}
	
	public function forms()
	{
		$servicelistresult=$this->AdLoginModel->ListService();
		$data=new stdClass;
		$data->serviceinfo=$servicelistresult;		
		$this->load->view('_Layouts/header');
		$this->load->view('_Layouts/menu');
		$this->load->view('yonetim/forms' ,$data);
		$this->load->view('_Layouts/footer');
	}
	
	public function newform()
	{
		$settingsinfo=$this->AdLoginModel->InfoCompany($id=1);
		$formdata['publicsettings']=$settingsinfo;
		$username=$this->session->userdata('username');
		$techinfo=$this->AdLoginModel->InfoLoggedUser($username);
		$formdata['techmaninfo']=$techinfo;		
		$brandslistresult=$this->AdLoginModel->ListBrand();
		$formdata['brandsinfo']=$brandslistresult;	
		$producttinforesult=$this->AdLoginModel->ListPType();
		$formdata['producttinfo']=$producttinforesult;		
		$this->load->view('_Layouts/header');
		$this->load->view('_Layouts/menu');
		$this->load->view('yonetim/newform', $formdata );
		$this->load->view('_Layouts/footer');
	}
		public function addnewform()
		{
			$this->load->library('form_validation');			
			$this->form_validation->set_rules('name','İsim Soyisim','required');
			$this->form_validation->set_message('required', '%s boş olamaz');
				if($this->form_validation->run())
				{						
					$inquire=$this->input->post('readonly') .rand(1,9999);
					$data = array(						
						'date'=> date('d/m/Y'),
						'name'=>$this->input->post('name'),
						'surname'=>$this->input->post('surname'),
						'email'=>$this->input->post('email'),
						'phone'=>$this->input->post('phone'),
						'identity'=>$this->input->post('identity'),						
						'taxadmin'=>$this->input->post('taxadmin'),
						'taxnumber'=>$this->input->post('taxnumber'),
						'address'=>$this->input->post('address'),
						'district'=>$this->input->post('district'),
						'province'=>$this->input->post('province'),
						'productype'=>$this->input->post('productype'),
						'brand'=>$this->input->post('brand'),
						'model'=>$this->input->post('model'),
						'serial'=>$this->input->post('serial'),
						'warranty'=>$this->input->post('warranty'),
						'warrantyend'=>$this->input->post('warrantyend'),
						'problem'=>$this->input->post('problem'),
						'problemdate'=>$this->input->post('problemdate'),
						'deliveryofficer'=>$this->input->post('deliveryofficer'),
						'comment'=>$this->input->post('comment'),
						'accessories'=>$this->input->post('accessories'),
						'status'=> 'Teslim Alındı',
						'inquire'=>$inquire,
						'md5'=>md5($inquire)						
					);						
					$serviceaddresult=$this->AdLoginModel->AddService($data);						
					if($serviceaddresult){		
					
						$getproduct=md5($inquire);
						$getcompany=$this->AdLoginModel->InfoCompany($id=1);
						$postdata['GetCompany']=$getcompany;
						$this->load->model('ServiceModel');				
						$getform=$this->ServiceModel->FormMd5Search($getproduct);
						$postdata['GetForm']=$getform;
						$getproductid=$getform->id;
						$getserviceform=$this->ServiceModel->FormServiceSearch($getproductid);
						$postdata['GetServiceForm']=$getserviceform;
						$this->load->library('email');
						$this->email->set_mailtype("html");
						$config['mailtype'] = 'html';
						$from_email = $getcompany->email; 
						$to_email = $this->input->post('email');            
						$this->email->from($from_email, $getcompany->companyname); 
						$this->email->to($to_email);
						$this->email->cc($getcompany->email);
						$this->email->set_header('MIME-Version', '1.0\r\n');
						$this->email->subject($getform->inquire. ' Servis Formu Bildirimi'); 
						$this->email->message($this->load->view('servis/mail_newform',$postdata,true));
						if($this->email->send()){ 
							$this->session->set_flashdata('success','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'. $inquire . '</strong> numaralı servis formu başarıyla oluşturulmuştur. </div>');
							$this->session->set_flashdata('adsuccess', '<body onload="adsuccess();"></body>');
							redirect('panel/forms');						
						}else{
								$this->session->set_flashdata('success','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'. $inquire . '</strong> numaralı servis formu başarıyla oluşturulmuştur. <br /> Servis formu mail gönderimi esnasında hata oluşmuştur. Lütfen servis formu yazdırma ekranından yeniden mail gönderiniz. </div>');
								$this->session->set_flashdata('adsuccess', '<body onload="adsuccess();"></body>');
								redirect('panel/forms');		
						}					
					}
				}
		}
		public function editform($id)
		{
		$forminfo=$this->AdLoginModel->InfoService($id);
		$data['forminfo']=$forminfo;
		$techminfo=$this->AdLoginModel->ListUser();
		$data['techminfo']=$techminfo;
		$brandsgresult=$this->AdLoginModel->ListBrand();
		$data['brinfo']=$brandsgresult;	
		$ptinforesult=$this->AdLoginModel->ListPType();
		$data['ptinfo']=$ptinforesult;		
			$this->load->view('_Layouts/header');
			$this->load->view('_Layouts/menu');
			$this->load->view('yonetim/editform', $data,$id);
			$this->load->view('_Layouts/footer');	
		}
			public function updateform($id){				
				$data = array(
					'name'=>$this->input->post('name'),
					'surname'=>$this->input->post('surname'),
					'email'=>$this->input->post('email'),
					'phone'=>$this->input->post('phone'),
					'identity'=>$this->input->post('identity'),						
					'taxadmin'=>$this->input->post('taxadmin'),
					'taxnumber'=>$this->input->post('taxnumber'),
					'address'=>$this->input->post('address'),
					'district'=>$this->input->post('district'),
					'province'=>$this->input->post('province'),
					'productype'=>$this->input->post('productype'),
					'brand'=>$this->input->post('brand'),
					'model'=>$this->input->post('model'),
					'model'=>$this->input->post('serial'),
					'warranty'=>$this->input->post('warranty'),
					'warrantyend'=>$this->input->post('warrantyend'),
					'problem'=>$this->input->post('problem'),
					'problemdate'=>$this->input->post('problemdate'),
					'deliveryofficer'=>$this->input->post('deliveryofficer'),
					'comment'=>$this->input->post('comment'),
					'accessories'=>$this->input->post('accessories'),
					'inquire'=>$this->input->post('inquire')			
				);
				$result=$this->AdLoginModel->UpdateService($id,$data);
				if ($result) {
					$serviceinfo=$this->AdLoginModel->ListService($id);
					$this->session->set_flashdata('success','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><strong>'. $this->input->post('inquire') . '</strong> Numaralı form güncellenmiştir. </div>');
					$this->session->set_flashdata('editsuccess', '<body onload="editsuccess();"></body>');
					redirect('/panel/forms');	
				}			
			}						
		public function deleteform($id)
		{
			$deleteptype=$this->AdLoginModel->DeleteService($id);
			if($deleteptype){
				$this->session->set_flashdata('success','<div class="alert bg-warning alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Servis Formu Silinmiştir.</div>');
				$this->session->set_flashdata('deletesuccess', '<body onload="deletesuccess();"></body>');
				redirect('/panel/forms');			
			}
		}
		public function printform($id)
		{	
			$getforminfo=$this->AdLoginModel->InfoService($id);
			$printdata['getforminfo']=$getforminfo;
			$getcompanydata=$this->AdLoginModel->InfoCompany($id=1);
			$printdata['getcompanydata']=$getcompanydata;
			$this->load->view('_Layouts/header');
			$this->load->view('_Layouts/menu');
			$this->load->view('yonetim/printform', $printdata);
			$this->load->view('_Layouts/footer');
		}
		public function service($id)
		{
			$getforminfo=$this->AdLoginModel->InfoService($id);
			$servicedata['getforminfo']=$getforminfo;
			$getlastlog=$this->AdLoginModel->LastServiceLog($id);
			$servicedata['getlastlog']=$getlastlog;
			$this->load->view('_Layouts/header');
			$this->load->view('_Layouts/menu');
			$this->load->view('yonetim/service', $servicedata );
			$this->load->view('_Layouts/footer');
		}
			public function serviceprocess($id)
		{
			$servicedetaildata = array(
					'statusdate'=>$this->input->post('statusdate'),
					'status'=>$this->input->post('status'),
					'statuscomment'=>$this->input->post('statuscomment'),
					'price'=>$this->input->post('price'),
					'oldp_name1'=>$this->input->post('oldp_name1'),
					'oldp_code1'=>$this->input->post('oldp_code1'),
					'newp_name1'=>$this->input->post('newp_name1'),
					'newp_code1'=>$this->input->post('newp_code1'),
					'newp_price1'=>$this->input->post('newp_price1'),
					'oldp_name2'=>$this->input->post('oldp_name2'),
					'oldp_code2'=>$this->input->post('oldp_code2'),
					'newp_name2'=>$this->input->post('newp_name2'),
					'newp_code2'=>$this->input->post('newp_code2'),
					'newp_price2'=>$this->input->post('newp_price2'),
					'oldp_name3'=>$this->input->post('oldp_name3'),
					'oldp_code3'=>$this->input->post('oldp_code3'),
					'newp_name3'=>$this->input->post('newp_name3'),
					'newp_code3'=>$this->input->post('newp_code3'),
					'newp_price3'=>$this->input->post('newp_price3'),
					'oldp_name4'=>$this->input->post('oldp_name4'),
					'oldp_code4'=>$this->input->post('oldp_code4'),
					'newp_name4'=>$this->input->post('newp_name4'),
					'newp_code4'=>$this->input->post('newp_code4'),
					'newp_price4'=>$this->input->post('newp_price4'),
					'oldp_name5'=>$this->input->post('oldp_name5'),
					'oldp_code5'=>$this->input->post('oldp_code5'),
					'newp_name5'=>$this->input->post('newp_name5'),
					'newp_code5'=>$this->input->post('newp_code5'),
					'newp_price5'=>$this->input->post('newp_price5')					
				);
				$result=$this->AdLoginModel->UpdateService($id,$data=$servicedetaildata);				
			$servicelogdata = array(
					'productid'=>$id,
					'date'=>$this->input->post('statusdate'),
					'comment'=>$this->input->post('statuscomment'),
					'status'=>$this->input->post('status')			
				);
				$logresult=$this->AdLoginModel->InsertServiceLog($servicelogdata);
				if ($logresult) {
					$serviceinfo=$this->AdLoginModel->ListService($id);
					$this->session->set_flashdata('success','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><strong>'. $getforminfo->id . '</strong> Servis işlemi başarılı. </div>');
					$this->session->set_flashdata('editsuccess', '<body onload="editsuccess();"></body>');
					redirect('/panel/service/'.$id);	
				}
		}
		public function qrprint ($id)
		{
			$qrforminfo=$this->AdLoginModel->InfoService($id);
			$qrprintdata['qrforminfo']=$qrforminfo;
			$qrcompanydata=$this->AdLoginModel->InfoCompany($id=1);
			$qrprintdata['qrcompanydata']=$qrcompanydata;
			$this->load->view('yonetim/qrprint', $qrprintdata);
		}
	
	public function product_type()
	{
		$ptypeinforesult=$this->AdLoginModel->ListPType();
		$data=new stdClass;
		$data->ptypeinfo=$ptypeinforesult;
		$this->load->view('_Layouts/header');
		$this->load->view('_Layouts/menu');
		$this->load->view('yonetim/product_type', $data);
		$this->load->view('_Layouts/footer');
	}
	public function addptype()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('product_type','Ürün Tipi','required');
			$this->form_validation->set_message('required', '%s boş olamaz');
			if($this->form_validation->run())
				{
					$data = array('product_type' => $this->input->post('product_type'));
					$ptypedaddresult=$this->AdLoginModel->AddPtype($data);	
					if($ptypedaddresult){												
							$this->session->set_flashdata('addptypesuccess','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Ürün Tipi başarıyla oluşturulmuştur. </div>');
							$this->session->set_flashdata('adtypesuccess', '<body onload="adtypesuccess();"></body>');
							redirect('panel/product_type');							
					}
				}					
		}
		public function eproduct_type($id){	
		$ptypeinfo=$this->AdLoginModel->InfoPtype($id);
		$data['ptypeinfo']=$ptypeinfo;
			$this->load->view('_Layouts/header');
			$this->load->view('_Layouts/menu');
			$this->load->view('yonetim/eproduct_type', $data,$id);
			$this->load->view('_Layouts/footer');	
		}
			public function updateptype($id){
			$data = array('product_type' => $this->input->post('product_type'));
				$result=$this->AdLoginModel->UpdatePtype($id,$data);
				if ($result) {
					$userinfo=$this->AdLoginModel->ListPtype($id);
					$this->session->set_flashdata('addptypesuccess','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>Ürün Tipi başarıyla güncellenmiştir. </div>');
					$this->session->set_flashdata('edittypesuccess', '<body onload="edittypesuccess();"></body>');
					redirect('/panel/product_type');	
				}		
			}						
		public function deleteptype($id) {
			$deleteptype=$this->AdLoginModel->DeletePtype($id);
			if($deleteptype){
				$this->session->set_flashdata('addptypesuccess','<div class="alert bg-warning alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Ürün Tipi başarıyla silinmiştir.</div>');
				$this->session->set_flashdata('deletetypesuccess', '<body onload="deletetypesuccess();"></body>');
				redirect('/panel/product_type');			
			}
		}
	
	public function brands()
	{	
		$brandlistresult=$this->AdLoginModel->ListBrand();
		$data=new stdClass;
		$data->brandinfo=$brandlistresult;
		$this->load->view('_Layouts/header');
		$this->load->view('_Layouts/menu');
		$this->load->view('yonetim/brands', $data);
		$this->load->view('_Layouts/footer');
	}
		public function addbrand()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('brandname','Marka','required');
			$this->form_validation->set_message('required', '%s boş olamaz');
			if($this->form_validation->run())
				{
					$data = array('brandname' => $this->input->post('brandname'));
					$brandaddresult=$this->AdLoginModel->AddBrand($data);	
					if($brandaddresult){												
							$this->session->set_flashdata('addbrandsuccess','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Marka başarıyla oluşturulmuştur. </div>');
							$this->session->set_flashdata('adbrandsuccess', '<body onload="adbrandsuccess();"></body>');
							redirect('panel/brands');							
					}
				}					
		}
		public function editbrand($id){	
		$brandinfo=$this->AdLoginModel->InfoBrand($id);
		$data['brandinfo']=$brandinfo;
			$this->load->view('_Layouts/header');
			$this->load->view('_Layouts/menu');
			$this->load->view('yonetim/editbrand', $data,$id);
			$this->load->view('_Layouts/footer');	
		}
			public function updatebrand($id){
			$data = array('brandname' => $this->input->post('brandname'));
				$result=$this->AdLoginModel->UpdateBrand($id,$data);
				if ($result) {
					$userinfo=$this->AdLoginModel->ListBrand($id);
					$this->session->set_flashdata('addbrandsuccess','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>Marka başarıyla güncellenmiştir. </div>');
					$this->session->set_flashdata('editbrandsuccess', '<body onload="editbrandsuccess();"></body>');
					redirect('/panel/brands');	
				}		
			}						
		public function deletebrand($id) {
			$deletebrand=$this->AdLoginModel->DeleteBrand($id);
			if($deletebrand){
				$this->session->set_flashdata('addbrandsuccess','<div class="alert bg-warning alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Marka başarıyla silinmiştir.</div>');
				$this->session->set_flashdata('deletebrandsuccess', '<body onload="deletebrandsuccess();"></body>');
				redirect('/panel/brands');			
			}
		}
	
	public function users()
	{				
		$userlistresult=$this->AdLoginModel->ListUser();
		$data=new stdClass;
		$data->userinfo=$userlistresult;
		$this->load->view('_Layouts/header');		
		$this->load->view('_Layouts/menu');
		$this->load->view('yonetim/users', $data);
		$this->load->view('_Layouts/footer');			
	}		
		public function adduser()
		{
			$this->load->view('_Layouts/header');
			$this->load->view('_Layouts/menu');
			$this->load->view('yonetim/adduser');
			$this->load->view('_Layouts/footer');	

			$this->load->library('form_validation');
			$this->form_validation->set_rules('name','Adı','required');
			$this->form_validation->set_rules('surname','Soyadı','required');
			$this->form_validation->set_rules('mail','Mail','required');
			$this->form_validation->set_rules('phone','telefon','required');
			$this->form_validation->set_rules('username','Kullanıcı Adı','required');
			$this->form_validation->set_rules('password','Şifre','required');				
			$this->form_validation->set_message('required', '%s boş olamaz');
				
				if($this->form_validation->run())
				{	
					$name=$this->input->post('name');
					$surname=$this->input->post('surname');
					$mail=$this->input->post('mail');
					$phone=$this->input->post('phone');
					$username=$this->input->post('username');
					$password=$this->input->post('password');			
						
					$data = array('username'=>$username,'password'=>md5($password),'name'=>$name,'surname'=>$surname,'mail'=>$mail,'phone'=>$phone);
						
					$useraddresult=$this->AdLoginModel->AddUser($data);	
						
					if($useraddresult){												
						$this->session->set_flashdata('addusersuccess','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'. $username . '</strong> kullanıcısı başarıyla oluşturulmuştur. </div>');
						$this->session->set_flashdata('editusersuccess', '<body onload="adusersuccess();"></body>');
						redirect('panel/users');
						
					}
					
				}
		}			
		public function deleteuser($id) {
			if ($id==1)
			{
				$this->session->set_flashdata('addusersuccess','<div class="alert bg-danger alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'. $userinfo->username .'</strong> Ana Kullanıcıyı Silemezsiniz.</div>');
				$this->session->set_flashdata('deleteerror', '<body onload="deleteerror();"></body>');
				redirect('/panel/users');	
			}
			else
			{
				$userdelete=$this->AdLoginModel->DeleteUser($id);
				if($userdelete){
					$this->session->set_flashdata('addusersuccess','<div class="alert bg-warning alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'. $userinfo->username .'</strong> Kullanıcı başarıyla silinmiştir.</div>');
					$this->session->set_flashdata('deleteusersuccess', '<body onload="deletesuccess();"></body>');
					redirect('/panel/users');			
				}
			}
		}		
		public function edituser($id) {
		$userinfo=$this->AdLoginModel->InfoUser($id);
		$data['userinfo']=$userinfo;
			$this->load->view('_Layouts/header');
			$this->load->view('_Layouts/menu');
			$this->load->view('yonetim/edituser', $data,$id);
			$this->load->view('_Layouts/footer');	
		}		
			public function userupdate($id) {
				
				$name=$this->input->post('name');
				$surname=$this->input->post('surname');
				$mail=$this->input->post('mail');
				$phone=$this->input->post('phone');
				$username=$this->input->post('username');
				$password=$this->input->post('password');				
				$data = array(
				'username' => $username,				
				'name' => $name,
				'surname' => $surname,
				'mail' => $mail,
				'phone' => $phone				
				);
				$result=$this->AdLoginModel->UpdateUser($id,$data);
				if ($result) {
					$userinfo=$this->AdLoginModel->InfoUser($id);
					$this->session->set_flashdata('addusersuccess','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><strong>'. $userinfo->username . '</strong> kullanıcısı başarıyla güncellenmiştir. </div>');
					$this->session->set_flashdata('editusersuccess', '<body onload="editusersuccess();"></body>');
					redirect('/panel/users');	
				}		
			}			
		public function updateuser($id) {
			$userinfo=$this->AdLoginModel->InfoLoggedUser($id);
			$data['userinfo']=$userinfo;
			$this->load->view('_Layouts/header');
			$this->load->view('_Layouts/menu');
			$this->load->view('yonetim/loggeduser', $data,$id);
			$this->load->view('_Layouts/footer');	
		}
			
		public function updatepassword($id) {			
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('oldpassword', 'Eski Şifre', 'required');
			$this->form_validation->set_rules('newpassword', 'Yeni Şifre', 'required');
			$this->form_validation->set_rules('confpassword', 'Yeni Şifre Tekrar', 'required|matches[newpassword]');		
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if($this->form_validation->run())
			{	
				$oldpassword=$this->input->post('oldpassword');
				$newpassword=$this->input->post('newpassword');
				
				$userinfo=$this->AdLoginModel->InfoUser($id);				
				if($userinfo->password !== md5($oldpassword)) {
		
					$this->session->set_flashdata('addusersuccess','<div class="alert alert-danger" role="alert">'. $userinfo->username . ' Kullanıcı şifresi güncellenememiştir. Eski şifreyi doğru girdiğinizden emin olun. </div>');
					$this->session->set_flashdata('passworderror', '<body onload="passworderror();"></body>');
					redirect('/panel/edituser/'.$id);
					}
					else
					{
						$newpassword = $this->input->post('newpassword');
						$passwordpas = md5($newpassword);
						$this->AdLoginModel->PasswordUser($id, array('password' => $passwordpas));
						
						$userinfo=$this->AdLoginModel->InfoUser($id);															
						$this->session->set_flashdata('addusersuccess','<div class="alert alert-success" role="alert">'. $userinfo->username . ' kullanıcı şifresi başarıyla güncellenmiştir. </div>');
						$this->session->set_flashdata('passwordsuccess', '<body onload="passwordsuccess();"></body>');
						redirect('/panel/edituser/'.$id);
					}							
			
			}
			else
			{
				$this->session->set_flashdata('addusersuccess','<div class="alert alert-danger" role="alert">'. $userinfo->username . ' Kullanıcı şifresi güncellenememiştir. Yeni şifre ve yeni şifre tekrar alanlarını kontrol ederek yeniden deneyin.  </div>');
				$this->session->set_flashdata('passworderror', '<body onload="passworderror();"></body>');
				redirect('/panel/edituser/'.$id);
			}			
		}
	
	public function generalsettings($id=1)
	{
		$settingsinfo=$this->AdLoginModel->InfoCompany($id);
		$data['settingsinfo']=$settingsinfo;
		$this->load->view('_Layouts/header');
		$this->load->view('_Layouts/menu');
		$this->load->view('yonetim/settings', $data);
		$this->load->view('_Layouts/footer');
	}
	
		public function settingsupdate($id) {
			
			if(!empty($_FILES["logo"]["name"])){
				$config["allowed_types"]="jpg|jpeg|png";
				$config["upload_path"] = "uploads";
				$config["file_name"] = uniqid() . $_FILES["logo"]["name"];
				$this->load->library("upload", $config);
				$upload = $this->upload->do_upload("logo"); 
				if ($upload){
					$uploaded_filename = $this->upload->data("file_name");
					$data= array(
						'companyname'=> $this->input->post('companyname'),
						'address'=> $this->input->post('address'),
						'email'=> $this->input->post('email'),
						'phone'=> $this->input->post('phone'),
						'fax'=> $this->input->post('fax'),
						'requestprefix'=> $this->input->post('requestprefix'),
						'serviceterms'=> $this->input->post('serviceterms'),
						'logo'=> $uploaded_filename
					);
					$result=$this->AdLoginModel->updatesettings($id,$data);
					if ($result){
						$userinfo=$this->AdLoginModel->InfoCompany($id);
						$this->session->set_flashdata('update','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>Firma Bilgileri başarıyla güncellenmiştir. </div>');
						$this->session->set_flashdata('updatesuccess', '<body onload="updatesuccess();"></body>');
						redirect('/panel/generalsettings');	
						}
						else
						{
						$userinfo=$this->AdLoginModel->InfoCompany($id);
						$this->session->set_flashdata('update','<div class="alert bg-warning alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>Firma güncellenememiştir. Lütfen Kontrol Ediniz. </div>');
						$this->session->set_flashdata('updatefailed', '<body onload="updatefailed();"></body>');
						redirect('/panel/generalsettings');
						}
					}				
				}
				else
				{
					$data= array(
						'companyname'=> $this->input->post('companyname'),
						'address'=> $this->input->post('address'),
						'email'=> $this->input->post('email'),
						'phone'=> $this->input->post('phone'),
						'fax'=> $this->input->post('fax'),
						'requestprefix'=> $this->input->post('requestprefix'),
						'serviceterms'=> $this->input->post('serviceterms')
					);
					$result=$this->AdLoginModel->updatesettings($id,$data);
					if ($result){
						$userinfo=$this->AdLoginModel->InfoCompany($id);
						$this->session->set_flashdata('update','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>Firma Bilgileri başarıyla güncellenmiştir. </div>');
						$this->session->set_flashdata('updatesuccess', '<body onload="updatesuccess();"></body>');
						redirect('/panel/generalsettings');	
						}
						else
						{
						$userinfo=$this->AdLoginModel->InfoCompany($id);
						$this->session->set_flashdata('update','<div class="alert bg-warning alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>Firma güncellenememiştir. Lütfen Kontrol Ediniz. </div>');
						$this->session->set_flashdata('updatefailed', '<body onload="updatefailed();"></body>');
						redirect('/panel/generalsettings');
						}
				}
		}
		
		public function SendMailProcess($id)
		{
			$getproduct=$id;
			$getcompany=$this->AdLoginModel->InfoCompany($id=1);
			$postdata['GetCompany']=$getcompany;
			$this->load->model('ServiceModel');				
			$getform=$this->ServiceModel->FormMd5Search($getproduct);
			$postdata['GetForm']=$getform;
			$getproductid=$getform->id;
			$getserviceform=$this->ServiceModel->FormServiceSearch($getproductid);
			$postdata['GetServiceForm']=$getserviceform;			
			$this->load->library('email');
			$this->email->set_mailtype("html");
			$config['mailtype'] = 'html';
			$from_email = $getcompany->email; 
			$to_email = $getform->email;            
			$this->email->from($from_email, $getcompany->companyname); 
			$this->email->to($to_email);
			$this->email->cc($getcompany->email);
			$this->email->set_header('MIME-Version', '1.0\r\n');
			//$this->email->set_header('Content-Type', 'text/html; charset=UTF-8');
			$this->email->subject($getform->inquire. ' Servis Formu Bildirimi'); 
			$this->email->message($this->load->view('servis/mail_form',$postdata,true));   
			if($this->email->send()){            
				$this->session->set_flashdata('asuccess','<div class="alert bg-success alert-dismissible mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>'. $getserviceform->md5 . 'Mail başarıyla gönderilmiştir. </div>');
				$this->session->set_flashdata('rsuccess', '<body onload="success();"></body>');
				redirect('/panel/printform/'.$getproductid);	
           }else{ 
            echo "Error";
          }
		}
}