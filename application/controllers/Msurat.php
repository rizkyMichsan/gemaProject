<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Msurat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->model('Mhome');
		$this->load->model('Masuk');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	public function index()
	{
		$data['bread_parent'] = "Surat Masuk";
		//$data['bread_child'] = "";
		$data['icon'] = "mail";
		$data['template'] = "surat";
		$data['list'] = $this->Masuk->Rsurat();
		$data['kategori'] = $this->Mhome->getKategori();
		$data['lastId'] = $this->Masuk->lastId();
		$this->_renderTemplate('pages/header', $data);
		$this->_renderTemplate('pages/topbar', $data);
		$this->_renderTemplate('pages/menu', $data);
		$this->_renderTemplate('serambi/surat_masuk', $data);
		$this->load->view('pages/form/Fmsurat');
		$this->load->view('pages/form/Fdisposisi');
		$this->_renderTemplate('pages/footer', $data);
	}

	function getAlamat($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$us = array(
				'status' => $id
			);
			$data	=	$this->Mhome->whereAsc('alamat', $us, 'id_alamat');
			if ($data != null) {

				for ($i = 0; $i < count($data); $i++) {
					$data[$i]['id_alamat'] = "";
				}
			}
			echo json_encode($data);
		} else {
			redirect('page/error');
		}
	}

	function getFile($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			$data	=	$this->Masuk->getFile($id);

			echo json_encode($data);
		} else {
			redirect('page/error');
		}
	}
	function getData($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			$us = array(
				'agenda_id' => $id
			);
			$data	=	$this->Mhome->whereAsc('disposisi', $us, 'agenda_id');
			$data2	=	$this->Mhome->Rdistu($id);
			$data3	=	$this->Mhome->Rdistuis($id);
			$data4	=	$this->Mhome->rKomen($id);
			if ($data != null) {

				for ($i = 0; $i < count($data); $i++) {
					$data[$i]['agenda_id'] = str_replace(array('+', '/', '='), array('-', 'RiFs', '_'), $this->encryption->encrypt($data[$i]['agenda_id']));
				}
			}
			if ($data4 != null) {

				for ($i = 0; $i < count($data4); $i++) {
					$user = $this->ion_auth->user($data4[$i]['user'])->row();
					$data4[$i]['user'] = $user->first_name . ' ' . $user->last_name;
					$data4[$i]['time'] = cek_terakhir($data4[$i]['time']);
					$data4[$i] = array_merge($data4[$i], ['foto' => $user->image]);
				}
			}
			$data = array_merge($data, [$data2], [$data3], [$data4]);
			echo json_encode($data);
		} else {
			redirect('page/error');
		}
	}
	function addSurat()
	{
		$lastId = $this->Masuk->lastId();
		$agendaId = $this->input->post('agendaId', true);
		$agendaId = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $agendaId));
		$Nagenda = $this->input->post('Nagenda', true);
		$Nsurat = $this->input->post('Nsurat', true);
		$tempTter = explode("/", $this->input->post('Tterima', true));
		$Tterima = $tempTter[2] . "-" . $tempTter[1] . "-" . $tempTter[0];
		$tempTsur = explode("/", $this->input->post('Tsurat', true));
		$Tsurat = $tempTsur[2] . "-" . $tempTsur[1] . "-" . $tempTsur[0];
		$dari = $this->input->post('jDari', true);
		$asal = $this->input->post('asal', true) . " - " . $dari;
		if ($asal == "Lainnya - External") {
			$asal = $this->input->post('lain', true) . " - " . $dari;
			$ad = $this->Mhome->add('alamat', ['nama' => $this->input->post('lain', true), 'status' => $dari]);
		}
		$Isurat = $this->input->post('Isurat', true);
		$tingkat = $this->input->post('tingkat', true);
		$kategori = $this->input->post('kategori', true);
		$file1_input = $this->input->post('file1_input', true);
		$file_hidden = $this->input->post('file_hidden', true);
		if ($kategori == 6) {
			$tempS = explode("-", $this->input->post('Tacara', true));
			$start = $this->input->post('kategori', true);
			$waktu = $this->input->post('Tacara', true);
			$lokasi = $this->input->post('lokasi', true);
		} else {
			$waktu = "";
			$lokasi = "";
		}

		//add
		if ($agendaId == 0) {
			$id = 1;
			if ($lastId) {
				foreach ($lastId as $last) {
					$id = $last['agenda_id'] + 1;
				}
			}
			$n = str_replace(".", "_", $Nagenda);
			$nameF = time() . "_" . str_replace("/", "-", $n) . ".pdf";
			$isian = array(
				'agenda_id'			=> $id,
				'agenda_no' 		=> $Nagenda,
				'agenda_tgl_surat' 	=> $Tsurat,
				'agenda_tgl_terima' => $Tterima,
				'agenda_no_surat' 	=> $Nsurat,
				'agenda_tentang' 	=> $Isurat,
				'agenda_dari' 		=> $asal,
				'agenda_ket' 		=> $lokasi,
				'agenda_posisi' 	=> "1",
				'agenda_file'		=> $nameF,
				'waktu_acara' 		=> $waktu,
				'kategori' 			=> $kategori,
				'tingkat_surat' 	=> $tingkat
			);

			$this->Masuk->Isurat($isian);
			$this->ddoo_upload('file', $nameF);
		}
		//edit
		else {
			$id = $agendaId;
			if ($file1_input != $file_hidden) {
				if ($file1_input != '') {
					$n = str_replace(".", "_", $Nagenda);
					$nameF = time() . "_" . str_replace("/", "-", $n) . ".pdf";
					$isian = array(
						'agenda_no' 		=> $Nagenda,
						'agenda_tgl_surat' 	=> $Tsurat,
						'agenda_tgl_terima' => $Tterima,
						'agenda_no_surat' 	=> $Nsurat,
						'agenda_tentang' 	=> $Isurat,
						'agenda_dari' 		=> $asal,
						'agenda_ket' 		=> $lokasi,
						'agenda_posisi' 	=> "1",
						'agenda_file'		=> $nameF,
						'waktu_acara' 		=> $waktu,
						'kategori' 			=> $kategori,
						'tingkat_surat' 	=> $tingkat
					);
					$this->ddoo_upload('file', $nameF);
				} else {
					$isian = array(
						'agenda_no' 		=> $Nagenda,
						'agenda_tgl_surat' 	=> $Tsurat,
						'agenda_tgl_terima' => $Tterima,
						'agenda_no_surat' 	=> $Nsurat,
						'agenda_tentang' 	=> $Isurat,
						'agenda_dari' 		=> $asal,
						'agenda_ket' 		=> $lokasi,
						'agenda_posisi' 	=> "1",
						'waktu_acara' 		=> $waktu,
						'kategori' 			=> $kategori,
						'tingkat_surat' 	=> $tingkat
					);
				}
			} else {
				$isian = array(
					'agenda_no' 		=> $Nagenda,
					'agenda_tgl_surat' 	=> $Tsurat,
					'agenda_tgl_terima' => $Tterima,
					'agenda_no_surat' 	=> $Nsurat,
					'agenda_tentang' 	=> $Isurat,
					'agenda_dari' 		=> $asal,
					'agenda_ket' 		=> $lokasi,
					'agenda_posisi' 	=> "1",
					'waktu_acara' 		=> $waktu,
					'kategori' 			=> $kategori,
					'tingkat_surat' 	=> $tingkat
				);
			}

			$this->Mhome->update('disposisi', ['agenda_id' => $id], $isian);
		}
		redirect("Msurat");
	}
	function delete($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			$us = array(
				'agenda_id' => $id
			);
			$data	=	$this->Mhome->delete($us, 'disposisi');


			echo json_encode("oke");
		} else {
			redirect('page/error');
		}
	}

	function addDisposisi()
	{
		$this->Masuk->Idispo();
		redirect("Msurat");
	}
	function addComment()
	{
		$agendaId = $this->input->post('aid', true);
		$isi = $this->input->post('komentar', true);
		$countfiles = count($_FILES['attach']['name']);
		$files = "";

		for ($i = 0; $i < $countfiles; $i++) {
			if (!empty($_FILES['attach']['name'][$i])) {
				$nameF = str_replace(" ", "_", $_FILES['attach']['name'][$i]);
				$_FILES['f']['name'] =  time() . '_' . $_FILES['attach']['name'][$i];
				$_FILES['f']['type'] = $_FILES['attach']['type'][$i];
				$_FILES['f']['tmp_name'] = $_FILES['attach']['tmp_name'][$i];
				$_FILES['f']['error'] = $_FILES['attach']['error'][$i];
				$_FILES['f']['size'] = $_FILES['attach']['size'][$i];
				// Set preference
				unset($config);
				$config = array();
				$config['upload_path'] = 'assets/upload/surat_masuk/attach/';
				$config['allowed_types'] = '*';
				$config['max_size'] = '500000'; // max_size in kb
				$config['file_name'] = $_FILES['f']['name'];
				$config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
				$config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
				$config['detect_mime'] = TRUE; //Anti SQL Injection
				$config['mod_mime_fix'] = TRUE; //Anti Triggering

				//Load upload library
				$this->load->library('upload');

				// File upload
				$this->upload->initialize($config);
				if ($this->upload->do_upload('f')) {
					$files .= $nameF . ";";
				}
			}
		}
		$data = array(
			'id_user' => 32,
			'agenda_id' => $id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $agendaId)),
			'isi_komentar' => $isi,
			'time' => date("Y-m-d H:i"),
			'file' => $files
		);
		$hasil = $this->Mhome->add('komentar', $data);

		redirect("Msurat");
	}
	function ddoo_upload($filename, $name)
	{

		$config['upload_path'] = 'assets/upload/surat_masuk/';
		$config['allowed_types'] = 'pdf';
		$config['file_name'] = $name;
		$config['max_size'] = '102400'; //1 MB
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
	public function kirimMail($email, $msg, $sb, $url)
	{
		$this->load->library('email');
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.bappenas.go.id',
			'mailtype' => 'html',
			'charset' => 'UTF-8',
			'wordwrap' => TRUE
		);
		//$message = $pesan;
		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->clear();
		$this->email->from('noreply@bappenas.go.id', 'E-office Direktorat Hankam');
		$this->email->to($email);
		$this->email->attach($url);
		$this->email->subject($sb);

		$this->email->message($msg);
		$r = $this->email->send();
		if (!$r) {
			show_error($this->email->print_debugger());
			//var_dump($this->email->send());
			return false;
		} else {
			var_dump($r);
		}
		//redirect('Msurat');
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
}
