<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->model('Martikel');
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
		$data['artikel'] = $this->Martikel->Rartikel();
		//$data1['detail'] = $this->Martikel->detartikel();
		
			
			$this->_renderTemplate('main-web/menu', $data);
			$this->_renderTemplate('main-web/berita', $data);
			$this->_renderTemplate('main-web/content', $data);
			$this->_renderTemplate('main-web/fmodal', $data);
			$this->_renderTemplate('main-web/footer', $data);
	}

	public function all_art()
	{
		$data= $this->Martikel->Rartikel();
		echo json_encode($data);
	}

	function get_art(){

        $id =  $this->input->get('id');
		$data	=	$this->Martikel->get_art($id);
        echo json_encode($data);
    }
}
