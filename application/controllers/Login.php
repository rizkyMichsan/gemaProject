<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller  {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Mlog');
		$this->load->helper('cookie');
		$this->load->library(array('ion_auth', 'form_validation'));
		
	}
	private function _renderTemplate($view = null, $data = [])
	{ 
	 if (ENVIRONMENT === 'production') {
		//load body
		$this->load->view($view . '-min', $data);
  
	   } else {
		//load body
		$this->load->view($view, $data);
	  }
	}
	public function index()
	{
		if($this->ion_auth->logged_in())
         {
			redirect('dashboard/index');
         }
			$this->_renderTemplate('serambi/login');
		
	
	}
	
	function ganti_pass(){
		$this->load->model('Mhome');
		$this->Mhome->Upassword($this->session->userdata('staf_id'));
		redirect("dashboard");
	}
	function ganti_email(){
		$this->load->model('Mhome');
		$this->Mhome->Uemail($this->session->userdata('user_id'));
		
		redirect("dashboard");
	}
	function ganti_avatar($gambar){
		$this->load->model('Mhome');
		$this->Mhome->Uavatar($this->session->userdata('user_id'),$gambar);
		//var_dump($this->session->userdata());
		//echo $gambar;
		redirect("dashboard");
	}

}