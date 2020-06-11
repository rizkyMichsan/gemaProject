<?php
class Mhome extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->db  = $this->load->database('default', TRUE);
	}
	function getUser($conds)
	{
		$query = $this->db->query("SELECT iu.id, iu.first_name,iu.last_name,iu.phone,iu.urut, iu.company,iu.email,iu.username,iu.last_login,iug.group_id FROM ic_users iu, ic_users_groups iug  where iu.id=iug.user_id and iu.id='$conds' order by urut asc ");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	function Upassword($id)
	{
		$pas = md5($this->input->post('password'));
		$data = array(
			'password' => $pas
		);
		$this->db->where('staf_id', $id);
		$this->db->update('disposisi_staf', $data);
	}

	function Uemail($id)
	{
		$em = $this->input->post('email');
		$data = array(
			'email' => $em
		);
		$this->db->where('id', $id);
		$this->db->update('ic_users', $data);
	}

	function Uavatar($id, $gambar)
	{
		$data = array(
			'image' => $gambar

		);
		$this->db->where('id', $id);
		$this->db->update('ic_users', $data);
	}

	function Rgudang()
	{
		$query = $this->db->query("SELECT * FROM gudang g, disposisi_staf d where g.id_staf=d.staf_id order by id_gudang DESC");
		return $query;
	}
	function Rfile($id)
	{
		$query = $this->db->query("SELECT * FROM file  where id_gudang='$id' order by id_file");
		return $query;
	}
	function addi()
	{
		$query = $this->db->query("SELECT * 
			FROM phpc_events pe, phpc_occurrences po, phpc_users pu
			WHERE pe.eid = po.eid
			AND pe.owner = pu.uid 
			and pe.eid > '1239'
			order by pe.eid asc");

		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			$id = 1;
			foreach ($data as $dat) :

				$data = array(
					'eid' => $dat['eid'],
					'id'	=> $id,
					'gid' => '-3',
					"title" => $dat['subject'],
					'category' => '17',
					'backgroundColor' => '#2082c4',
					'borderColor' => '#ffffff',
					'textColor' => '#ffffff',
					'description' => $dat['description'],
					'start' => $dat['start_ts'],
					'end' => $dat['end_ts'],
					'url' => '',
					'allDay' => 'false',
					'rendering' => '',
					'overlap' => 'true',
					'recurdays' => '0',
					'recurend' => '0000-00-00',
					'location' => '0',
					'latitude' => '',
					'longitude' => '',
					'username' => $dat['username'],
					'pubDate' => $dat['ctime']
				);
				$this->db->insert('ic_events', $data);
				$id++;
			endforeach;
		} else {

			return null;
		}
	}
	function Igudang()
	{
		$this->db->order_by('id_gudang', 'desc');
		$this->db->limit(1);
		$getData = $this->db->get('gudang');
		$lamp = $_FILES['gudang'];
		if ($lamp !== "") :
			if ($getData->num_rows() > 0) {
				$data = $getData->result_array();
				foreach ($data as $dat) :

					$judul = $this->input->post('judul');
					$jam = gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);
					$id = $this->session->userdata('user_id');
					$idg = $dat['id_gudang'] + 1;
					$data = array(
						'id_gudang' => $idg,
						'judul' 	=> $judul,
						'created' 	=> $jam,
						'id_staf' 	=> $id
					);
					$this->db->insert('gudang', $data);

					if ($lamp) {
						//exit(var_dump($lamp));
						//Do Upload
						$lampiran = $this->Mhome->do_upload($lamp, $idg);
					} else $lampiran = NULL;
				endforeach;
			} else {
				return null;
			}
		endif;
	}
	function Dgudang($id)
	{

		$this->db->where('id_gudang', $id);

		$query = $this->db->query("SELECT * 
			FROM file
			WHERE id_gudang = '$id'");

		if ($query->num_rows() > 0) {
			$data = $query->result_array();
			$id = 1;
			foreach ($data as $dat) :
				unlink("./assets/upload/gudang/" . $dat['nama_file']);
			endforeach;
		}


		$this->db->delete('gudang');
		$this->Dfile($id);
	}
	function Dfile($id)
	{
		$this->db->where('id_gudang', $id);
		$this->db->delete('file');
	}
	function do_upload($file, $id)
	{
		if (!empty($file['name'])) {
			$number_of_files = sizeof($file['tmp_name']);
			for ($i = 0; $i < $number_of_files; $i++) {
				$karakter = array(",", "(", ")", "'");
				$lamp = str_replace($karakter, "", $file['name'][$i]);
				$lamp = date('d_m_Y_h_i_s') . "-" . $lamp;
				$_FILES['gudang']['name'] = $lamp;
				$_FILES['gudang']['type'] = $file['type'][$i];
				$_FILES['gudang']['tmp_name'] = $file['tmp_name'][$i];
				$_FILES['gudang']['error'] = $file['error'][$i];
				$_FILES['gudang']['size'] = $file['size'][$i];

				$uploadPath = 'assets/upload/gudang/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types']    = 'xls|xlsx|doc|docx|ppt|pptx|pdf|rar|zip';
				$config['file_ext_tolower'] = TRUE; //Extensi file di set lowercase
				$config['remove_spaces'] = TRUE; //Remove spasi diganti dengan underscore
				$config['detect_mime'] = TRUE; //Anti SQL Injection
				$config['mod_mime_fix'] = TRUE; //Anti Triggering

				//$config['file_name'] = $file;
				$config['max_size'] = 102400; //100MB

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gudang')) {
					$fileData = $this->upload->data();
					$uploadData[$i]['file_name'] = $fileData['file_name'];
					$uploadData[$i]['created'] = date("Y-m-d H:i:s");
					$uploadData[$i]['modified'] = date("Y-m-d H:i:s");
					$data = array(
						'nama_file' 	=> $fileData['file_name'],
						'id_gudang' 	=> $id
					);
					$this->db->insert('file', $data);
				}
			}
		}
	}
	function notRead($lim)
	{
		$id = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT * FROM disposisi as d, disposisi_tugas as dt where d.agenda_id=dt.agenda_id and dt.staf_id='$id' order by d.agenda_id DESC limit $lim");

		return $query;
	}
	function numUnread()
	{
		$id = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT * FROM disposisi as d, disposisi_tugas as dt where d.agenda_id=dt.agenda_id and dt.staf_id='$id' and dt.read='1' ");

		return $query;
	}
	function numlaporan($n)
	{
		$id = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT * FROM disposisi as d, disposisi_tugas as dt where d.agenda_id=dt.agenda_id and dt.staf_id='$id' and d.status='$n' ");

		return $query;
	}
	function numUndispo($ai)
	{
		$query = $this->db->query("SELECT * FROM disposisi where agenda_id='$ai'");

		return $query;
	}

	function numternal()
	{
		$query = $this->db->query("SELECT * FROM alamat as a, disposisi as d WHERE d.agenda_dari=a.nama ");

		return $query;
	}

	function Rinternal()
	{
		$query = $this->db->query("SELECT * FROM alamat as a, disposisi as d WHERE d.agenda_dari=a.nama and a.status='internal'");

		return $query;
	}

	function numUndistu()
	{
		$query = $this->db->query("SELECT DISTINCT (agenda_id) FROM disposisi_tugas");

		return $query;
	}
	function Rdispo($id)
	{
		$query = $this->db->query("SELECT * FROM disposisi  where agenda_id='$id' ");

		return $query;
	}
	function countDis($id)
	{
		$thn = date('Y');
		$query = $this->db->query("SELECT count('d.agenda_id') as jumlah FROM disposisi as d, disposisi_tugas as dt where d.agenda_id=dt.agenda_id and dt.staf_id='$id' and year(d.agenda_tgl_terima)='$thn' ");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	function RstafChart()
	{
		$query = $this->db->query("SELECT iu.id, iu.first_name,iu.last_name FROM ic_users iu, ic_users_groups iug  where (iu.active=1 and iu.display=1) and (iu.id=iug.user_id and iug.group_id=2) or (iu.id=iug.user_id and iug.group_id=4) or (iu.id=iug.user_id and iug.group_id=1)  order by urut asc ");

		return $query;
	}
	function Rstaf()
	{
		$query = $this->db->query("SELECT iu.id, iu.first_name,iu.last_name FROM ic_users iu, ic_users_groups iug  where (iu.active=1 and iu.display=1) and (iu.id=iug.user_id and iug.group_id=2) or (iu.id=iug.user_id and iug.group_id=4) order by urut asc ");

		return $query;
	}
	function Rstaf2()
	{
		$query = $this->db->query("SELECT iu.id, iu.first_name,iu.last_name, iu.active FROM ic_users iu, ic_users_groups iug  where  (iu.id=iug.user_id and iug.group_id=2) or (iu.id=iug.user_id and iug.group_id=4) order by urut asc ");

		return $query;
	}
	function Rsekretaris()
	{
		$query = $this->db->query("SELECT iu.id, iu.first_name,iu.last_name FROM ic_users iu, ic_users_groups iug  where iu.id=iug.user_id and iug.group_id=1 and iu.active=1 and iu.display=1 order by urut asc ");

		return $query;
	}
	function Rlain()
	{
		$query = $this->db->query("SELECT iu.id, iu.first_name,iu.last_name FROM ic_users iu, ic_users_groups iug  where iu.id=iug.user_id and iug.group_id=5 and iu.active=1 and iu.display=1 order by urut asc ");

		return $query;
	}
	function Rdirektur()
	{
		$query = $this->db->query("SELECT iu.id, iu.first_name,iu.last_name FROM ic_users iu, ic_users_groups iug  where iu.id=iug.user_id and iug.group_id=3 and iu.active=1 and iu.display=1 order by urut asc ");

		return $query;
	}
	function Risi()
	{
		$query = $this->db->query("SELECT * FROM disposisi_isi   order by isi_id asc ");

		return $query;
	}
	function Rdistu($aid)
	{
		$query = $this->db->query("SELECT dt.read, dt.time, u.first_name, u.last_name, u.company FROM ic_users u, disposisi_tugas dt WHERE dt.staf_id=u.id  and dt.agenda_id = '$aid' ");

		return $query->result_array();
	}
	function Rdistuis($aid)
	{
		$query = $this->db->query("SELECT dt.ket, di.isi_nama FROM disposisi_tugas_isi dt, disposisi_isi di WHERE di.isi_id=dt.isi_id and  agenda_id = '$aid' ");
		return $query->result_array();
	}
	function rKomen($aid)
	{
		$query = $this->db->query("SELECT id_user as 'user', isi_komentar, file, time FROM komentar WHERE   agenda_id = '$aid' ");
		return $query->result_array();
	}
	function Ruser()
	{
		$query = $this->db->query("SELECT * FROM ic_users where active='1' order by urut asc");
		return $query;
	}
	function Ruser2()
	{
		$query = $this->db->query("SELECT * FROM ic_users order by urut asc");
		return $query;
	}
	function getrole($id)
	{
		$query = $this->db->query("SELECT * FROM ic_users_groups ug, ic_groups g where ug.group_id=g.id and ug.user_id='$id'");
		return $query;
	}

	function Iuser($data)
	{
		return $this->db->insert('disposisi_staf', $data);
	}
	function Uuser($id, $isi)
	{
		$this->db->where('staf_id', $id);
		$this->db->update('disposisi_staf', $isi);
	}
	function Duser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('ic_users');
	}

	function Rabsensi()
	{
		$query = $this->db->query(" SELECT * from absensi where MONTH(waktu) and YEAR(waktu) order by id_absen desc");
		if ($query->num_rows() > 0) {

			$data = $query->result_array();

			return $data;
		} else {

			return null;
		}
		//$query = $this->db->query("SELECT MONTH(waktu) as bulan FROM absensi where YEAR(waktu)  Group by  bulan order by bulan asc");

		return $query;
	}

	function Iabsensi($data)
	{
		return $this->db->insert('absensi', $data);
	}
	function Ipinjam($data)
	{
		return $this->db->insert('barang_log', $data);
	}
	function Usbarang($id)
	{
		$data = array(

			'status' => 'not',
			'ket' => $id

		);
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}
	function balik($id)
	{
		$data = array(

			'status' => 'pending'

		);
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}
	function balikLog($id)
	{
		$data = array(

			'pengembalian' => gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7)

		);
		$this->db->where('id_logB', $id);
		$this->db->update('barang_log', $data);
	}

	function Dabsensi($id)
	{
		$this->db->where('id_absen', $id);
		$this->db->delete('absensi');
	}

	function Tahun()
	{
		$getData = $this->db->query("SELECT YEAR(waktu) as tahun FROM absensi Group by  tahun order by tahun desc ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}

	function Bulan($thn)
	{
		$getData = $this->db->query("SELECT MONTH(waktu) as bulan FROM absensi where YEAR(waktu)= '$thn'  Group by  bulan order by bulan asc");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}

	function isi($bln, $thn)
	{
		$getData = $this->db->query("SELECT count(id_absen) as jum FROM absensi where MONTH(waktu) = '$bln' and YEAR(waktu) = '$thn'  ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}

	function SmMonth($bln, $thn)
	{
		$sql = "SELECT * from absensi where MONTH(waktu) = '$bln' and YEAR(waktu) = '$thn' order by id_absen desc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function cal()
	{
		$now		= gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);
		$no			= gmdate('Y-m-d H:i:s', strtotime("+2 days"));
		$sql = "SELECT * from ic_events  where start between '$now' and '$no' order by start ASC limit 10";
		$query = $this->db->query($sql);
		return $query;
	}
	function calDis()
	{
		$id = $this->session->userdata('user_id');
		$now		= gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);
		$no			= gmdate('Y-m-d H:i:s', strtotime("+2 days"));
		$sql = "SELECT * from ic_events ie, disposisi_tugas dt where ie.did=dt.agenda_id and dt.staf_id=$id and ie.start between '$now' and '$no' order by ie.start ASC limit 10";
		$query = $this->db->query($sql);
		return $query;
	}
	function barang()
	{
		$getData = $this->db->query("SELECT * FROM barang where status='available' order by Type ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function bpinjam()
	{
		$username = $this->session->userdata('username');
		$getData = $this->db->query("SELECT b.id_barang, b.Type, b.nama, b.status, b.username, b.ket, bl.id_logB, bl.tanggal, bl.pengembalian, bl.peminjam,bl.status as stat FROM barang b, barang_log bl where b.id_barang=bl.id_barang and bl.peminjam='$username' and bl.keterangan='' order by Type ");
		if ($getData->num_rows() > 0) {

			$data = $getData->result_array();

			return $data;
		} else {

			return null;
		}
	}
	function jenisReg($thn)
	{
		$query = $this->db->query("SELECT count('agenda_id') as jumlah FROM `disposisi` where year(agenda_tgl_terima)='$thn' group by month(`agenda_tgl_terima`)");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	// general
	function all($table)
	{
		return $this->db->get($table)->result_array();
	}
	function add($table, $data)
	{
		$hasil = $this->db->insert($table, $data);
		return $hasil;
	}
	function update($table, $id, $data)
	{
		$this->db->where($id);
		$hasil = $this->db->update($table, $data);
		return $hasil;
	}
	function delete($id, $table)
	{
		$this->db->where($id);
		$this->db->delete($table);
	}
	function whereAsc($table, $data, $sort)
	{
		$this->db->order_by($sort, 'ASC');
		$query = $this->db->get_where($table, $data);
		return $query->result_array();
	}
	function whereDesc($table, $data, $sort)
	{
		$this->db->order_by($sort, 'Desc');
		$query = $this->db->get_where($table, $data);
		return $query->result_array();
	}
	function where_row($table, $data)
	{
		$query = $this->db->get_where($table, $data);
		return $query->row();
	}

	function getKategori()
	{
		$query = $this->db->get('kategori');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
		} else {
			$hasil[] = 0;
		}
		return $hasil;
	}
}
