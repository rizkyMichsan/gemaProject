<?php
class Masuk extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->db  = $this->load->database('default', TRUE);
	}
	function Rsurat()
	{
		$sql = 'select * from disposisi order by agenda_id desc ';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function Rsterdispo($limit, $start)
	{
		$sid = $this->session->userdata('user_id');
		$sql = "select * from disposisi d, disposisi_tugas dt where d.agenda_id=dt.agenda_id and dt.staf_id='$sid' order by d.agenda_id desc  ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function Rsterdispo2()
	{
		$sid = $this->session->userdata('user_id');
		$sql = "select * from disposisi d, disposisi_tugas dt where d.agenda_id=dt.agenda_id and dt.staf_id='$sid' order by d.agenda_tgl_terima desc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function getDispo($conds)
	{
		$this->db->where('agenda_id', $conds);
		$query = $this->db->get("disposisi");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	function Rcari()
	{
		$keyword = $this->input->post('cari');;

		$arr_keyword = explode(" ", $keyword);
		$banyak_kata = count($arr_keyword) - 1;

		$searchquery = "select * from disposisi where ";
		for ($x = 0; $x <= $banyak_kata; $x++) {
			$q = isset($arr_keyword[$x]);

			$searchquery .= "agenda_tentang like '%$arr_keyword[$x]%' OR agenda_no like '%$arr_keyword[$x]%' OR agenda_dari like '%$arr_keyword[$x]%'  ";
			if ($x < $banyak_kata) {
				$searchquery .= " OR ";
			}
		}
		$searchquery .= "order by agenda_tgl_terima desc ";
		$query = $this->db->query($searchquery);
		return $query->result();
	}

	function RcariLimit()
	{
		$sid = $this->session->userdata('user_id');
		$keyword = $this->input->post('cari');;

		$arr_keyword = explode(" ", $keyword);
		$banyak_kata = count($arr_keyword) - 1;

		$searchquery = "select * from disposisi d, disposisi_tugas dt where (d.agenda_id=dt.agenda_id and dt.staf_id='$sid') and (";
		for ($x = 0; $x <= $banyak_kata; $x++) {
			$q = isset($arr_keyword[$x]);

			$searchquery .= "d.agenda_tentang like '%$arr_keyword[$x]%' OR d.agenda_no like '%$arr_keyword[$x]%' OR d.agenda_dari like '%$arr_keyword[$x]%'  )";
			if ($x < $banyak_kata) {
				$searchquery .= " OR ";
			}
		}
		$searchquery .= "order by d.agenda_tgl_terima desc ";
		$query = $this->db->query($searchquery);
		return $query->result();
	}


	function Rdistu($aid)
	{
		$query = $this->db->query("SELECT * FROM disposisi_tugas WHERE  agenda_id = '$aid' ");

		return $query;
	}
	function Rdistuis($aid)
	{
		$query = $this->db->query("SELECT * FROM disposisi_tugas_isi WHERE  agenda_id = '$aid' ");
		return $query;
	}
	function Rlaporan($aid)
	{
		$query = $this->db->query("SELECT * FROM laporan WHERE  agenda_id = '$aid' ");
		return $query;
	}
	function laporanKosong()
	{
		$query = $this->db->query("SELECT * FROM laporan WHERE  laporan <> '' ");
		return $query;
	}

	function lastId()
	{
		$this->db->order_by('agenda_id', 'desc');
		$this->db->limit(1);
		$getData = $this->db->get('disposisi');

		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function Isurat($data)
	{
		$this->db->insert('disposisi', $data);
	}
	function Ical($data)
	{

		$this->db->insert('ic_events', $data);
	}
	function get_cal($id)
	{
		$query = $this->db->query("SELECT * FROM ic_events  where did='$id'");

		return $query->result_array();
	}
	function Ulaporan($id)
	{
		$nameF = str_replace(" ", "_", $_FILES['file']['name']);
		$config['upload_path']   = 'assets/upload/laporan/';
		$config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|rar|zip';
		$config['file_name'] = $nameF;
		$config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
		$config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
		$config['detect_mime'] = TRUE; //Anti SQL Injection
		$config['mod_mime_fix'] = TRUE; //Anti Triggering
		$config['max_size'] = 102400; //100 MB 
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			var_dump($nameF);
		} else {
			$data = array(
				'laporan' 	=> $nameF
			);

			$this->db->where('agenda_id', $id);
			$this->db->update('laporan', $data);
		}
		$data2 = array(
			'status' 	=> $this->input->post('status')
		);
		$this->db->where('agenda_id', $id);
		$this->db->update('disposisi', $data2);
	}
	function Usurat($id)
	{
		$Ano = $this->input->post('Nagenda');
		$Nsurat = $this->input->post('Nsurat');
		$Isurat = $this->input->post('Isurat');
		$dari = $this->input->post('dari');
		$kategori = $this->input->post('kategori');
		$tingkat = $this->input->post('tingkat');
		$filing = $this->input->post('filing');
		$ringSurat = $this->input->post('Ringsurat');
		if ($filing != "") {
			$nameF = $filing;
		} else {
			$nameF = time() . "_" . str_replace(".", "_", $Ano) . ".pdf";
			$config['upload_path']   = 'assets/upload/surat_masuk/';
			$config['allowed_types'] = 'pdf';
			$config['file_name'] = $nameF;
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
			}
		}
		$data = array(
			'agenda_no_surat' 	=> $Nsurat,
			'agenda_tentang' 	=> $Isurat,
			'agenda_dari' 		=> $dari,
			'agenda_file'		=> $nameF,
			'kategori' 			=> $kategori,
			'tingkat_surat' 	=> $tingkat,
			'ringkasan_surat'	=> $ringSurat
		);

		$this->db->where('agenda_id', $id);
		$this->db->update('disposisi', $data);
	}
	function Dsurat()
	{
		$id = $this->input->post('id');
		$this->db->where('agenda_id', $id);
		$this->db->delete('laporan');
		$file_name = $this->input->post('file');
		$this->db->where('agenda_id', $id);
		unlink("./assets/upload/surat_masuk/" . $file_name);
		return $this->db->delete('disposisi');
	}
	function Ddt()
	{
		$id = $this->input->post('id');
		$this->db->where('agenda_id', $id);
		return $this->db->delete('disposisi_tugas');
	}
	function Ddti()
	{
		$id = $this->input->post('id');
		$this->db->where('agenda_id', $id);
		return $this->db->delete('disposisi_tugas_isi');
	}
	function read($aid, $sid)
	{
		$data = array(
			'read' 		=> "0"
		);
		$this->db->where('agenda_id', $aid);
		$this->db->where('staf_id', $sid);
		return $this->db->update('disposisi_tugas', $data);
	}
	function Rstaf($id)
	{
		$query = $this->db->query("SELECT * FROM ic_users  where id='$id'");

		return $query->result_array();
	}
	function Idispo()
	{
		date_default_timezone_set("Asia/Bangkok");
		$aid = $id = $this->encryption->decrypt(str_replace(array('-', 'RiFs', '_'), array('+', '/', '='), $this->input->post('aid', true)));
		$target = $this->input->post('catatan', true);

		$staf = $this->input->post('staf', true);
		$j_staf = count($staf);
		$isi = $this->input->post('tugas', true);
		$j_isi = count($isi);
		$now		= gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);


		$this->db->where('agenda_id', $aid);
		$this->db->delete('disposisi_tugas');
		for ($i = 0; $i < $j_staf; $i++) {
			$data = array(
				'agenda_id' 		=> $aid,
				'staf_id' 	=> $staf[$i],
				'read' => "1",
				'time' 	=> $now
			);
			$this->db->insert('disposisi_tugas', $data);
		}
		$this->db->where('agenda_id', $aid);
		$this->db->delete('disposisi_tugas_isi');
		$this->db->where('agenda_id', $aid);
		$this->db->delete('laporan');
		$ida = 0;
		for ($j = 0; $j < $j_isi; $j++) {
			if ($isi[$j] == '22') {
				$ket = $this->input->post('lain');
			} else {
				$ket = "";
			}

			$data2 = array(
				'agenda_id' 		=> $aid,
				'isi_id' 	=> $isi[$j],
				'ket'		=> $ket
			);
			$this->db->insert('disposisi_tugas_isi', $data2);
			if ($isi[$j] > '1' and $isi[$j] < '13') {

				$data3 = array(
					'agenda_id' 		=> $aid
				);
				if ($ida > 0) {
					continue;
				} else {
					$this->db->insert('laporan', $data3);
					$ida = 1;
				}
			}
		}
		$this->db->where('agenda_id', $aid);
		$this->db->update('disposisi', array('target' => $target, 'status' => '0'));
	}
	function Tahun()
	{
		$getData = $this->db->query("SELECT YEAR(agenda_tgl_terima) as tahun FROM disposisi Group by  tahun order by tahun desc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function Bulan($thn)
	{
		$getData = $this->db->query("SELECT MONTH(agenda_tgl_terima) as bulan FROM disposisi where YEAR(agenda_tgl_terima) = '$thn' Group by  bulan order by bulan asc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function isi($bln, $thn)
	{
		$getData = $this->db->query("SELECT count(agenda_id) as jum FROM disposisi where MONTH(agenda_tgl_terima) = '$bln' and YEAR(agenda_tgl_terima) = '$thn'  ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function TahunLimit()
	{
		$sid = $this->session->userdata('user_id');
		$getData = $this->db->query("SELECT YEAR(d.agenda_tgl_terima) as tahun FROM disposisi d, disposisi_tugas dt where d.agenda_id=dt.agenda_id and dt.staf_id='$sid' Group by  tahun order by tahun desc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function BulanLimit($thn)
	{
		$sid = $this->session->userdata('user_id');
		$getData = $this->db->query("SELECT MONTH(d.agenda_tgl_terima) as bulan FROM disposisi d, disposisi_tugas dt where d.agenda_id=dt.agenda_id and dt.staf_id='$sid' and YEAR(d.agenda_tgl_terima) = '$thn' Group by  bulan order by bulan asc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function isiLimit($bln, $thn)
	{
		$sid = $this->session->userdata('user_id');
		$getData = $this->db->query("SELECT count(d.agenda_id) as jum FROM disposisi d, disposisi_tugas dt where d.agenda_id=dt.agenda_id and dt.staf_id='$sid' and MONTH(d.agenda_tgl_terima) = '$bln' and YEAR(d.agenda_tgl_terima) = '$thn'  ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function SmMonth($bln, $thn)
	{
		$sql = "SELECT * from disposisi where MONTH(agenda_tgl_terima) = '$bln' and YEAR(agenda_tgl_terima) = '$thn' order by agenda_id desc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function SmMonthLimit($bln, $thn)
	{
		$sid = $this->session->userdata('user_id');
		$sql = "SELECT * from disposisi d, disposisi_tugas dt where d.agenda_id=dt.agenda_id and dt.staf_id='$sid' and MONTH(d.agenda_tgl_terima) = '$bln' and YEAR(d.agenda_tgl_terima) = '$thn' order by d.agenda_id desc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function CountBulan($thn)
	{
		$query = $this->db->query("SELECT count('agenda_id') as jumlah, month(`agenda_tgl_terima`) as bulan FROM `disposisi` where year(agenda_tgl_terima)='$thn' group by month(`agenda_tgl_terima`)");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	function CountBulanDis($thn)
	{
		$sid = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT count('d.agenda_id') as jumlah, month(d.agenda_tgl_terima) as bulan FROM disposisi d, disposisi_tugas dt where d.agenda_id=dt.agenda_id and dt.staf_id='$sid' and year(d.agenda_tgl_terima)='$thn' group by month(d.agenda_tgl_terima)");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	function CountBulanKeluar($thn)
	{
		$query = $this->db->query("SELECT count('id_memo') as jumlah FROM `memo` where year(tanggal)='$thn' group by month(`tanggal`)");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function userCom($company)
	{

		// if no id was passed use the current users id
		$this->db->limit(1);
		$this->db->where('company', $company);
		$query = $this->db->get("ic_users");
		return $query->row();
	}
	function getAlamat($status)
	{
		$sql = "SELECT * FROM alamat where status='$status'";
		$query = $this->db->query($sql);
		//var_dump($sql);
		return $query->result();
	}
	function getFile($id)
	{
		$this->db->select("agenda_file");
		$this->db->where("agenda_id", $id);
		$query = $this->db->get("disposisi");
		return $query->row();
	}
}
