<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$data['bread_parent'] = "Dashboard";
		//$data['bread_child'] = "";
		$data['template'] = "dashboard";
		$data['icon'] = "home";
		$data['NNR']	=	$this->Mhome->numUnread();
		$data['JNR']	=	$this->Mhome->notRead(5);
		$this->_renderTemplate('pages/header', $data);
		$this->_renderTemplate('pages/topbar', $data);
		$this->_renderTemplate('pages/menu', $data);
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
		//if($this->session->userdata('login') == TRUE){
		$this->_renderTemplate('serambi/dashboard');
		$this->_renderTemplate('pages/footer');
		/*if ($this->ion_auth->logged_in()) {
			$thn = date('Y');

			$this->load->model('Masuk');

			$data['gudang'] = $this->Mhome->Rgudang();
			$data['distu'] = $this->Mhome->numUndistu();

			$data['disint'] = $this->Mhome->Rinternal();

			if (!$this->ion_auth->is_admin() and !$this->ion_auth->in_group(3)) {
				$rekap	=	$this->Masuk->CountBulanDis($thn);
				$data['cal'] = $this->Mhome->calDis();
			} else {
				$rekap	=	$this->Masuk->CountBulan($thn);
				$data['cal'] = $this->Mhome->cal();
			}

			$j = 0;
			//var_dump($rekap);
			if (isset($rekap)) {
				foreach ($rekap as $d) {

					$stok[] = (float) $d->jumlah;

					$data['st'] = $stok;
					for ($i = $d->bulan; $i <= 12; $i++) {
						if ($i <> $j + 1) {
							$bln[]	=  bulan($i);
						} else {
							$bln[]	=  '';
							break;
						}
					}
					$data['bln'] = $bln;
					$data['thn'] = $thn;
					$j = $d->bulan;
				}
			} else {
				$data['st'] = 0;
				$data['bln'] = 0;
				$data['thn'] = 0;
			}
			$rKeluar	=	$this->Masuk->CountBulanKeluar($thn);
			if (isset($rKeluar)) {
				foreach ($rKeluar as $rk) {

					$stoki[] = (float) $rk->jumlah;
					$data['rk'] = $stoki;
				}
			} else {
				$data['rk'] = 0;
			}
			//var_dump($bln);
			//echo "0.*";
			$rstaf = $this->Mhome->RstafChart();
			if (isset($rstaf)) {
				foreach ($rstaf->result_array() as $s) {
					$nama[] = $s['first_name'] . ' ' . $s['last_name'];
					$cd = $this->Mhome->countDis($s['id']);
					if (isset($cd)) {
						foreach ($cd as $cd) {

							$cdi[] = (float) $cd->jumlah;
							$data['cd'] = $cdi;
						}
					} else {
						$data['cd'] = 0;
					}
				}
			}
			$data['nama'] = $nama;
			//$data['tahun']	=	$this->Masuk->Tahun();

			$data['delete'] = "delGudang";
			//$data['RNR']	=	$this->Mhome->notRead(100);
			// $this->Mhome->notRead();
			$this->_renderTemplate('serambi/dashboard', $data);
			$this->_renderTemplate('pages/form/FconfirmD', $data);
			$this->_renderTemplate('pages/footer', $data);
		} else {

			redirect('login');
		}*/
	}
}
