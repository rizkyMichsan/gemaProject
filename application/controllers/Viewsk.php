<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewsk extends CI_Controller  {

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

	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		
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
		if($this->session->userdata('login') == TRUE){
			$this->load->model('Mhome');
			$this->load->model('Masuk');
			
			$data['template'] = "Ksurat";
			$tanggal1  	 = substr($this->session->userdata('last'),0,10);
			$data['jam'] = substr($this->session->userdata('last'), 11,5);
			$data['tgl'] = tgl_in($tanggal1);
			$data['JNR']	=	$this->Mhome->notRead(5);
			//$data['bread_child'] = "";

			
				//pagination settings
	        $config['base_url'] = site_url('msurat/index');
	        $config['total_rows'] = $this->db->count_all('disposisi');
	        $config['per_page'] = "10";
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	        $data["total"]=$config["total_rows"];
	        //$config["num_links"] = floor($choice);

	        //config for bootstrap pagination class integration
	        $config['full_tag_open'] = '<ul class="pagination">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = false;
	        $config['last_link'] = false;
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['prev_link'] = '&laquo';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_link'] = '&raquo';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active" style="display:none;"><a href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li style="display:none;">';
	        $config['num_tag_close'] = '</li>';

	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data['lastPage'] = $data['page'] + $config['per_page'];
	        //call the model function to get the department data
	        $data['deptlist'] = $this->Masuk->Rsurat($config["per_page"], $data['page']);           

	        $data['pagination'] = $this->pagination->create_links();

			$this->_renderTemplate('pages/header', $data);
			$this->_renderTemplate('pages/menu', $data);
			$this->_renderTemplate('pages/form/Fksurat', $data);
			$this->_renderTemplate('serambi/isi_sk', $data);
			$this->_renderTemplate('pages/footer', $data);
		}
		else{
			$data['process_page']= "login/process_login";
			$this->_renderTemplate('serambi/login', $data);
		}
	}
}