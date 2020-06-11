<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ksurat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->database();
		$this->load->model('Mhome');
		$this->load->model('Mkeluar');
		$this->load->library('email');
		$this->load->library(array('ion_auth', 'form_validation'));
		//if (!$this->ion_auth->logged_in()) {
		//redirect('login');
		//}

	}
	public function index()
	{
		$data['bread_parent'] = "Surat Keluar";
		//$data['bread_child'] = "";
		$data['icon'] = "navigation-2";
		$data['template'] = "Ksurat";
		$data['list'] =  $this->Mkeluar->Rsurat();
		$data['kategori'] = $this->Mhome->getKategori();
		$this->_renderTemplate('pages/header');
		$this->_renderTemplate('pages/topbar');
		$this->_renderTemplate('pages/menu');
		$this->_renderTemplate('serambi/surat_keluar', $data);
		$this->load->view('pages/form/Fksurat');
		$this->_renderTemplate('pages/footer', $data);
	}

	public function addSurat()
	{
		$this->load->model('Mkeluar');
		$Ano = $this->input->post('Nsurat', true);
		$tempTsur = explode("/", $this->input->post('Tsurat', true));
		$Tsurat = $tempTsur[2] . "-" . $tempTsur[1] . "-" . $tempTsur[0];
		$Isurat = $this->input->post('Isurat', true);
		$jenis = $this->input->post('jenis', true);
		$file1_input = $this->input->post('file1_input', true);
		$file_hidden = $this->input->post('file_hidden', true);
		$id = $this->input->post('id', true);
		//edit
		if ($id != '0') {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			if ($file1_input != $file_hidden) {
				if ($file1_input != '') {
					$nameF = time() . "_" . str_replace(".", "_", $Ano) . ".pdf";
					$name = str_replace("/", "", $nameF);
					$isian = array(
						'no_memo' 		=> $Ano,
						'kategori'		=> $jenis,
						'judul' => $Isurat,
						'tanggal' 	=> $Tsurat,
						'file' 	=> $name,
						'id_staf' 		=> 32
						//'id_staf' 		=> $this->session->userdata('user_id')
					);
					$config['upload_path']   = 'assets/upload/surat_keluar/';
					$config['allowed_types'] = 'pdf';
					$config['file_name'] = $name;
					$config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
					$config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
					$config['detect_mime'] = TRUE; //Anti SQL Injection
					$config['mod_mime_fix'] = TRUE; //Anti Triggering
					$config['max_size'] = 102400; //100 MB 
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('file')) {
						$error = array('error' => $this->upload->display_errors());
						//var_dump($error);
					} else {

						$this->Mhome->update('memo', ['id_memo' => $id], $isian);
					}
					echo "edit file";
				} else {
					$isian = array(
						'no_memo' 		=> $Ano,
						'kategori'		=> $jenis,
						'judul' => $Isurat,
						'tanggal' 	=> $Tsurat,
						'id_staf' 		=> 32
						//'id_staf' 		=> $this->session->userdata('user_id')
					);
					$this->Mhome->update('memo', ['id_memo' => $id], $isian);
					echo "edit non file";
				}
			} else {
				$isian = array(
					'no_memo' 		=> $Ano,
					'kategori'		=> $jenis,
					'judul' => $Isurat,
					'tanggal' 	=> $Tsurat,
					'id_staf' 		=> 32
					//'id_staf' 		=> $this->session->userdata('user_id')
				);
				$this->Mhome->update('memo', ['id_memo' => $id], $isian);
				echo "edit non file2";
			}
		} else {
			//add
			$nameF = time() . "_" . str_replace(".", "_", $Ano) . ".pdf";
			$name = str_replace("/", "", $nameF);
			$isian = array(
				'no_memo' 		=> $Ano,
				'kategori'		=> $jenis,
				'judul' => $Isurat,
				'tanggal' 	=> $Tsurat,
				'file' 	=> $name,
				'id_staf' 		=> 32
				//'id_staf' 		=> $this->session->userdata('user_id')
			);
			$config['upload_path']   = 'assets/upload/surat_keluar/';
			$config['allowed_types'] = 'pdf';
			$config['file_name'] = $name;
			$config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
			$config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
			$config['detect_mime'] = TRUE; //Anti SQL Injection
			$config['mod_mime_fix'] = TRUE; //Anti Triggering
			$config['max_size'] = 102400; //100 MB 
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {

				$this->Mkeluar->Isurat($isian);
			}

			echo "add";
		}


		//var_dump($isian);
		//echo $this->input->post('Nagenda');
		redirect("Ksurat");
	}
	function delete($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			$us = array(
				'id_memo' => $id
			);
			$data	=	$this->Mhome->delete($us, 'memo');


			echo json_encode("oke");
		} else {
			redirect('page/error');
		}
	}
	function getData($id)
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			$id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $id));
			$us = array(
				'id_memo' => $id
			);
			$data	=	$this->Mhome->whereAsc('memo', $us, 'id_memo');
			if ($data != null) {

				for ($i = 0; $i < count($data); $i++) {
					$data[$i]['id_memo'] = str_replace(array('+', '/', '='), array('-', 'RiFs', '_'), $this->encryption->encrypt($data[$i]['id_memo']));
				}
			}

			echo json_encode($data);
		} else {
			redirect('page/error');
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
}
