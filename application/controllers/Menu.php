<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller  {

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

	public function index()
	{
		redirect('Menu/isiMenu/80');
		
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
	function isiMenu($id){
		if($this->session->userdata('login') == TRUE){
			$this->load->model('Mhome');
			$this->load->model('Mmenu');
			$data['bread_parent'] = "Tree Menu";
			$data['template'] = "tree";
			$tanggal1  	 = substr($this->session->userdata('last'),0,10);
			$data['jam'] = substr($this->session->userdata('last'), 11,5);
			$data['tgl'] = tgl_in($tanggal1);
			$data['JNR']	=	$this->Mhome->notRead(5);
			$data['NNR']	=	$this->Mhome->numUnread();
			//$data['data_user'] = $this->Mhome->Ruser();
			$data['delete'] = "delmenu";

			$data['mm'] = $this->Mmenu->mainMenu();
			//$data['am'] = $this->Mmenu->Art($id);


			$this->_renderTemplate('pages/header', $data);
			$this->_renderTemplate('pages/menu', $data);
			$this->_renderTemplate('pages/form/Fmenu', $data);
			$this->_renderTemplate('stranas/treeMenu', $data);
			$this->_renderTemplate('pages/form/FconfirmD', $data);
			$this->_renderTemplate('pages/footer', $data);
		}
		else{
			redirect('login');
		}
	}

	function getLogData($id = null){
		$this->load->model('Mmenu');
		if($id == null){
			echo "User tidak tersedia";
		}else{
			$data['logData'] = $this->Mmenu->log($id);
			$data['an'] = $this->Mmenu->artNon();
			$data['id_menu']=$id;
			$this->_renderTemplate('stranas/table_Tree', $data);
		}
	}
	function addData($id = null,$ida = null){
		$this->load->model('Mmenu');
		$this->Mmenu->Uartikel($id,$ida);
		if($id == null){
			echo "User tidak tersedia";
		}else{
			$data['logData'] = $this->Mmenu->log($id);
			$data['an'] = $this->Mmenu->artNon();
			$data['id_menu']=$id;

			$this->_renderTemplate('stranas/table_Tree', $data);
		}
	}
	function minusData($id = null,$ida = null){
		$this->load->model('Mmenu');
		$this->Mmenu->Uartikel(0,$ida);
		if($id == null){
			echo "User tidak tersedia";
		}else{
			$data['logData'] = $this->Mmenu->log($id);
			$data['an'] = $this->Mmenu->artNon();
			$data['id_menu']=$id;
			$this->_renderTemplate('stranas/table_Tree', $data);
		}
	}
	function addMenu(){
		
	    $nama = $this->input->post('nama');
	    $name = $this->input->post('name');
	    $icon = $this->input->post('icon');
	    $link = $this->input->post('link');
	    $status = $this->input->post('status');
	    $parent = $this->input->post('parent');
	    $urut = $this->input->post('urut');
	    
	    
	    // Checking if everything is there
	        if ( $nama  ) 
	        {
		        // Loading model
		        $data = array
		        (
		            
		            'menu_name' => $nama,
		            'menu_name_english' => $name,
		            'icon' => $icon,
		            'link' => $link,
		            'menu_stats' => $status,
		            'list_number' => $urut,
		            'id_parent' => $parent,
		            'id_parent1' => $parent,
		            'menu_status' => 'Y',
		           
		        );
		        //var_dump($data);
		         // Calling model
		        $this->load->model('Mmenu');
		        $this->Mmenu->Imenu($data);

		        redirect("Menu/isiMenu/80");

		        // You can do something else here
		    }
	}
	function uMenu(){
		$id_menu = $this->input->post('id_menu');
	    $nama = $this->input->post('nama');
	    $name = $this->input->post('name');
	    $icon = $this->input->post('icon');
	    $link = $this->input->post('link');
	    $status = $this->input->post('status');
	    $parent = $this->input->post('parent');
	    $urut = $this->input->post('urut');
	    
	    
	    // Checking if everything is there
	        if ( $id_menu  ) 
	        {
		        // Loading model
		        $data = array
		        (
		            
		            'menu_name' => $nama,
		            'menu_name_english' => $name,
		            'icon' => $icon,
		            'link' => $link,
		            'menu_stats' => $status,
		            'list_number' => $urut,
		            'id_parent' => $parent,
		            'id_parent1' => $parent,
		            'menu_status' => 'Y',
		           
		        );
		        //var_dump($data);
		         // Calling model
		        $this->load->model('Mmenu');
		        $this->Mmenu->Umenu($id_menu,$data);

		        redirect("Menu/isiMenu/80");

		        // You can do something else here
		    }
	}
	public function delMenu()
	{
		$id = $this->input->post('id');
		$this->load->model('Mmenu');
		$this->Mmenu->Dmenu($id);
		redirect($_SERVER['HTTP_REFERER']);
	}
	function getMenu(){
		$this->load->model('Mmenu');
		$uid = $this->input->post('func');
		$artData = $this->Mmenu->getMenu($uid);
		$this->output
					 ->set_content_type('application/json')
					 ->set_output(json_encode($artData));
					 
	}
}