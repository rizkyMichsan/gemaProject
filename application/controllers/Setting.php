<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

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

		$data['bread_child'] = "Profil Unit Kerja";
		$data['bread_parent'] = "Setting";
		//$data['bread_child'] = "";
		$data['template'] = "setting";
		$data['icon'] = "aperture";
		$data['konfig'] = $this->Mhome->where_row('identitas', ['id_identitas' => '1']);
		$this->_renderTemplate('pages/header', $data);
		$this->_renderTemplate('pages/topbar', $data);
		$this->_renderTemplate('pages/menu', $data);
		$this->_renderTemplate('serambi/setting', $data);
		$this->load->view('pages/form/Fkonfigurasi', $data);
		$this->_renderTemplate('pages/footer');
	}
	public function kategori()
	{

		$data['bread_child'] = "Kategori";
		$data['list'] = $this->Mhome->getKategori();
		$data['bread_parent'] = "Setting";
		//$data['bread_child'] = "";
		$data['template'] = "setting";
		$data['icon'] = "aperture";

		$this->_renderTemplate('pages/header', $data);
		$this->_renderTemplate('pages/topbar', $data);
		$this->_renderTemplate('pages/menu', $data);
		$this->_renderTemplate('serambi/kategori', $data);
		$this->load->view('pages/form/Fkategori');
		$this->_renderTemplate('pages/footer');
	}

	//add kategori 
	function addKategori()
	{
		$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $this->input->post('id', true)));
		$a = $this->input->post('a', true);
		$data = array(
			'keterangan' => $a
		);
		if ($id == 0) {
			$hasil = $this->Mhome->add('kategori', $data);
		} else {
			$ida = array(
				'id_kategori' => $id
			);
			$hasil = $this->Mhome->update('kategori', $ida, $data);
		}
		echo json_encode($hasil);
	}
	function deleteKategori($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			$us = array(
				'id_kategori' => $id
			);
			$data	=	$this->Mhome->delete($us, 'kategori');


			echo json_encode("oke");
		} else {
			redirect('page/error');
		}
	}
	function getKategori($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			$us = array(
				'id_kategori' => $id
			);
			$data	=	$this->Mhome->whereAsc('kategori', $us, 'id_kategori');
			if ($data != null) {

				for ($i = 0; $i < count($data); $i++) {
					$data[$i]['id_kategori'] = str_replace(array('+', '/', '='), array('-', 'RiFs', '_'), $this->encryption->encrypt($data[$i]['id_kategori']));
				}
			}

			echo json_encode($data);
		} else {
			redirect('page/error');
		}
	}

	public function user()
	{

		$data['bread_child'] = "Manajemen User";
		$data['bread_parent'] = "Setting";
		//$data['bread_child'] = "";
		$data['template'] = "setting";
		$data['icon'] = "aperture";
		$data['list'] = $this->Mhome->Ruser2();
		$this->_renderTemplate('pages/header', $data);
		$this->_renderTemplate('pages/topbar', $data);
		$this->_renderTemplate('pages/menu', $data);
		$this->load->view('pages/form/Fregister');
		$this->_renderTemplate('serambi/user', $data);
		$this->_renderTemplate('pages/footer');
	}
	function deleteUser($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			$us = array(
				'id' => $id
			);
			$data	=	$this->ion_auth->deluser($id);


			echo json_encode("oke");
		} else {
			redirect('page/error');
		}
	}
	function getUser($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			$us = array(
				'id' => $id
			);
			$data	=	$this->Mhome->whereAsc('ic_users', $us, 'id');
			if ($data != null) {

				for ($i = 0; $i < count($data); $i++) {
					$data[$i]['id'] = str_replace(array('+', '/', '='), array('-', 'RiFs', '_'), $this->encryption->encrypt($data[$i]['id']));
				}
			}

			echo json_encode($data);
		} else {
			redirect('page/error');
		}
	}
	function ddoo_upload($filename)
	{
		$config['upload_path'] = 'assets/assets/images/';
		$config['allowed_types'] = 'jpeg||jpg||png||ico';
		$config['max_size'] = '1024'; //1 MB
		$config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
		$config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
		$config['detect_mime'] = TRUE; //Anti SQL Injection
		$config['mod_mime_fix'] = TRUE; //Anti Triggering

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($filename)) {
			$error = array('error' => $this->upload->display_errors());
			return false;
			// $this->load->view('upload_form', $error);
		} else {
			$data = array('upload_data' => $this->upload->data());
			return true;
			//$this->load->view('upload_success', $data);
		}
	}
	function konfig()
	{
		$temp1 = $this->input->post('j_fav', true);
		$temp2 = $this->input->post('k_log', true);
		$hit1 = $this->input->post('l', true);
		$hit2 = $this->input->post('m', true);
		if ($temp1 != $hit1) {
			$fav = str_replace(" ", "_", $_FILES['j']['name']);
			$this->ddoo_upload('j');
		} else {
			$fav = $hit1;
		}
		if ($temp2 != $hit2) {
			$log = str_replace(" ", "_", $_FILES['k']['name']);
			$this->ddoo_upload('k');
		} else {
			$log = $hit2;
		}

		$data1 = array(
			'nama_website' => $this->input->post('a', TRUE),
			'email' => $this->input->post('b', TRUE),
			'url' => $this->input->post('c', TRUE),
			'facebook' => $this->input->post('i', TRUE),
			'no_telp' => $this->input->post('d', TRUE),
			'meta_deskripsi' => $this->input->post('e', TRUE),
			'meta_keyword' => $this->input->post('f', TRUE),
			'verification' => $this->input->post('g', TRUE),
			'versi' => $this->input->post('h', TRUE),
			'favicon' => $fav,
			'logo' => $log
		);
		$this->Mhome->update('identitas', ['id_identitas' => '1'], $data1);
		redirect('setting');
	}
}
