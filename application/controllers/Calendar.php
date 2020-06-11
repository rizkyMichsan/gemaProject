<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{

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
		$this->load->model('Mhome');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
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
		$data['bread_child'] = "Calendar";
		$data['bread_parent'] = "Calendar";
		//$data['bread_child'] = "";
		$data['template'] = "calendar";
		$data['icon'] = "calendar";
		$this->_renderTemplate('pages/header', $data);
		$this->_renderTemplate('pages/topbar', $data);
		$this->_renderTemplate('pages/menu', $data);
		$this->_renderTemplate('serambi/cal', $data);
		$this->_renderTemplate('pages/footer');
	}
}
