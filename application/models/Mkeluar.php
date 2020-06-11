<?php
class Mkeluar extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->db  = $this->load->database('default', TRUE);
	}
	function Rsurat()
	{
		$sql = 'select * from memo order by tanggal desc  ';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function RsuratLimit($limit, $start)
	{
		$id = $this->session->userdata('user_id');

		$sql = 'select * from memo where pic=' . $id . ' order by tanggal desc  ';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function Rcari()
	{
		$keyword = $this->input->post('cari');;

		$arr_keyword = explode(" ", $keyword);
		$banyak_kata = count($arr_keyword) - 1;

		$searchquery = "select * from memo where ";
		for ($x = 0; $x <= $banyak_kata; $x++) {
			$q = isset($arr_keyword[$x]);

			$searchquery .= "no_memo like '%$arr_keyword[$x]%' OR judul like '%$arr_keyword[$x]%'   ";
			if ($x < $banyak_kata) {
				$searchquery .= " OR ";
			}
		}
		$searchquery .= "order by tanggal desc ";
		$query = $this->db->query($searchquery);
		return $query->result();
	}
	function RcariLimit()
	{
		$id = $this->session->userdata('user_id');
		$keyword = $this->input->post('cari');;

		$arr_keyword = explode(" ", $keyword);
		$banyak_kata = count($arr_keyword) - 1;

		$searchquery = "select * from memo where pic='$id' and ";
		for ($x = 0; $x <= $banyak_kata; $x++) {
			$q = isset($arr_keyword[$x]);

			$searchquery .= "no_memo like '%$arr_keyword[$x]%' OR judul like '%$arr_keyword[$x]%'   ";
			if ($x < $banyak_kata) {
				$searchquery .= " OR ";
			}
		}
		$searchquery .= "order by tanggal desc ";
		$query = $this->db->query($searchquery);
		return $query->result();
	}


	function lastId()
	{
		$this->db->order_by('id_memo', 'desc');
		$this->db->limit(1);
		$getData = $this->db->get('memo');

		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function lastId2()
	{
		$this->db->order_by('id_memo', 'desc');
		$this->db->limit(1);
		$getData = $this->db->get('memo');

		if ($getData->num_rows() > 0) {

			$data = $getData->row();

			return $data;
		} else {

			return null;
		}
	}
	function Isurat($data)
	{




		$this->db->insert('memo', $data);
	}
	function Ikonfirmasi($data)
	{




		$this->db->insert('konfirmasi', $data);
	}

	function Usurat($id)
	{
		$Ano = $this->input->post('Nsurat');
		$jenis = $this->input->post('jenis');
		$pic = $this->input->post('pic');
		$tingkat = $this->input->post('tingkat');
		$Isurat = $this->input->post('Isurat');
		$filing = $this->input->post('filing');
		if ($filing != "") {
			$nameF = $filing;
		} else {
			$nameF = time() . "_" . str_replace(".", "_", $Ano) . ".pdf";
			$config['upload_path']   = 'assets/upload/surat_keluar/';
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
			'no_memo' 		=> $Ano,
			'judul' => $Isurat,
			'pic'	=> $pic,
			'jenis' => $jenis,
			'kategori'		=> $tingkat,
			'file' 	=> $nameF,
			'id_staf' 		=> $this->session->userdata('user_id')
		);

		$this->db->where('id_memo', $id);
		$this->db->update('memo', $data);
		$this->Dkonfirmasi($id);
		$tujuan = $this->input->post('tujuan');
		foreach ($tujuan as $key) {
			$tujuan2 = explode(",", $key);
			# code...
		}
		$lastid = $id;

		foreach ($tujuan2 as $tj) {
			$isian = array(
				'id_memo' 		=> $lastid,
				'tujuan' 	=> $tj
			);
			$this->Ikonfirmasi($isian);
			# code...
		}
	}
	function Dsurat()
	{
		$id = $this->input->post('id');
		$file_name = $this->input->post('file');

		unlink("./assets/upload/surat_keluar/" . $file_name);
		$this->db->where('id_memo', $id);


		return $this->db->delete('memo');
	}
	function Dkonfirmasi($id)
	{
		$this->db->where('id_memo', $id);
		return $this->db->delete('konfirmasi');
	}

	function Tahun()
	{
		$getData = $this->db->query("SELECT YEAR(tanggal) as tahun FROM memo Group by  tahun order by tahun desc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function Bulan($thn)
	{
		$getData = $this->db->query("SELECT MONTH(tanggal) as bulan FROM memo where YEAR(tanggal) = '$thn' Group by  bulan order by bulan asc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function isi($bln, $thn)
	{
		$getData = $this->db->query("SELECT count(id_memo) as jum FROM memo where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'  ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function TahunLimit()
	{
		$id = $this->session->userdata('user_id');
		$getData = $this->db->query("SELECT YEAR(tanggal) as tahun FROM memo where pic='$id' Group by  tahun order by tahun desc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function BulanLimit($thn)
	{
		$id = $this->session->userdata('user_id');
		$getData = $this->db->query("SELECT MONTH(tanggal) as bulan FROM memo where pic='$id' and YEAR(tanggal) = '$thn' Group by  bulan order by bulan asc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function isiLimit($bln, $thn)
	{
		$id = $this->session->userdata('user_id');
		$getData = $this->db->query("SELECT count(id_memo) as jum FROM memo where pic='$id' and MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'  ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function SmMonth($bln, $thn)
	{
		$sql = "SELECT * from memo where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn' order by id_memo desc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function SmMonthLimit($bln, $thn)
	{
		$id = $this->session->userdata('user_id');
		$sql = "SELECT * from memo where pic='$id' and MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn' order by id_memo desc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function Rkonfirmasi($id)
	{
		$getData = $this->db->query("SELECT * FROM konfirmasi where id_memo='$id' order by id asc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function log($id)
	{

		$query = $this->db->query("SELECT * FROM konfirmasi where id_memo='$id' order by id asc ");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	function getMemo($id)
	{

		// if no id was passed use the current users id
		$this->db->limit(1);
		$this->db->where('id_memo', $id);
		$query = $this->db->get("memo");
		return $query->row();
	}

	function update($id, $value, $modul)
	{
		$this->db->where(array("id" => $id));
		$this->db->update("konfirmasi", array($modul => $value));
	}




	// query datatable side server
	var $column_order = array(null, 'no_memo', 'jenis', 'judul', 'tanggal', 'file', 'id_staf', 'pic', 'kategori'); //field yang ada di table user
	var $column_search = array('no_memo', 'judul', 'tanggal', 'pic'); //field yang diizin untuk pencarian 
	var $order = array('tanggal' => 'desc'); // default order 




	private function _get_datatables_query($id)
	{

		$this->db->from('memo');
		if ($id > 0) {
			$this->db->where('pic', $id);
		}


		//var_dump($id);
		$i = 0;

		foreach ($this->column_search as $item) // looping awal
		{
			if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{
				if ($i === 0) // looping awal
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($id)
	{
		$this->_get_datatables_query($id);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($id)
	{
		$this->_get_datatables_query($id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($id)
	{ //var_dump($id);
		if ($id > 0) {
			$this->db->where('pic', $id);
		}
		$this->db->from('memo');

		return $this->db->count_all_results();
	}
}
