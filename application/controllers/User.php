<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->library(array('ion_auth', 'form_validation'));
		if (!$this->ion_auth->logged_in()) {
			redirect('login');
		}
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

		$this->load->model('Mhome');
		$this->load->model('Masuk');
		$data['bread_parent'] = "Management User";
		$data['template'] = "register";

		$data['JNR']	=	$this->Mhome->notRead(5);
		$data['NNR']	=	$this->Mhome->numUnread();
		$data['data_user'] = $this->Mhome->Ruser2();
		$data['delete'] = "deluser";
		//$data['bread_child'] = "";
		$this->_renderTemplate('pages/header', $data);
		$this->_renderTemplate('pages/menu', $data);
		$this->_renderTemplate('pages/form/Fregister', $data);
		$this->_renderTemplate('serambi/user', $data);
		$this->_renderTemplate('pages/form/FconfirmD', $data);
		$this->_renderTemplate('pages/footer', $data);
	}

	public function adduser()
	{

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nourut = $this->input->post('no');
		$rool = $this->input->post('role');
		$username = $this->input->post('username');
		$jabatan = $this->input->post('jabatan');
		$pass1 = $this->input->post('pass');
		$pass2 = md5($pass1);
		$nameG = strtolower($username) . time() . ".jpg";
		$config['upload_path'] = 'assets/web/album_photo/personil/';
		$config['log_threshold'] = 1;
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = $nameG;
		$config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
		$config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
		$config['detect_mime'] = TRUE; //Anti SQL Injection
		$config['mod_mime_fix'] = TRUE; //Anti Triggering
		$config['max_size'] = 10240; //100 MB 
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');
		$upload_data = $this->upload->data();
		$file_name = $upload_data['file_name'];
		// Checking if everything is there

		// Loading model
		$data = array(
			'staf_nama' => $nama,
			'staf_email' => $email,
			'jabatan' => $jabatan,
			'urut' => $nourut,
			'role' => $rool,
			'username' => $username,
			'password' => $pass2,
			'foto' => $nameG,
			'avatar' => 'male.png'
		);
		//var_dump($data);
		// Calling model
		$this->load->model('Mhome');
		$this->Mhome->Iuser($data);

		redirect("user");

		// You can do something else here

	}
	public function updateuser()
	{
		$id = $this->input->post('stafid');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nourut = $this->input->post('no');
		$rool = $this->input->post('role');
		$username = $this->input->post('username');
		$jabatan = $this->input->post('jabatan');
		$foto = $this->input->post('fotoin');
		if ($foto != "") {
			$nameG = $foto;
		} else {
			$nameG = strtolower($username) . time() . ".jpg";
			$config['upload_path'] = 'assets/web/album_photo/personil/';
			$config['log_threshold'] = 1;
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = $nameG;
			$config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
			$config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
			$config['detect_mime'] = TRUE; //Anti SQL Injection
			$config['mod_mime_fix'] = TRUE; //Anti Triggering
			$config['max_size'] = 10240; //100 MB 
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			// Checking if everything is there
		}
		// Loading model
		$data = array(
			'staf_nama' => $nama,
			'staf_email' => $email,
			'jabatan' => $jabatan,
			'urut' => $nourut,
			'role' => $rool,
			'foto' => $nameG,
			'avatar' => 'male.png'
		);
		//var_dump($foto);
		// Calling model
		$this->load->model('Mhome');
		$this->Mhome->Uuser($id, $data);

		redirect("user");

		// You can do something else here

	}
	function resetP()
	{
		$this->load->model('Mhome');
		$id = $this->input->post('stafid');
		$this->Mhome->Upassword($id);
		redirect("dashboard");
	}
	public function deluser()
	{
		$id = $this->input->post('id');
		$this->ion_auth->deluser($id);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function restoreData($id)
	{
		$s = $this->ion_auth->restuser($id);
		//var_dump($s);
		redirect($_SERVER['HTTP_REFERER']);
	}
	function getUser()
	{
		$this->load->model('Mhome');
		$uid = $this->input->post('func');
		$artData = $this->Mhome->getUser($uid);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($artData));
	}
}
