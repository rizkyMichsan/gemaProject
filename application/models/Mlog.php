<?php
class Mlog extends CI_Model
	{
		function __construct() {
        parent::__construct();
        $this->db  = $this->load->database('default',TRUE);
    }
		function check_user($username, $password, $db)
		{
			
			
				if($username=="admin"){
					$sql="select * from admins where username=? and password=?";}
				else{
					$sql="select * from disposisi_staf where username=? and password=?";}
				$this->db->query($sql, array($username, $password));
			$afftectedRows = $this->db->affected_rows();
			if($afftectedRows == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function take_data($username)
		{		
			if($username=="admin"){$sql = "select * from admins where username=?";}
			else{	
			$sql = "select * from disposisi_staf where username=?";}
			$query = $this->db->query($sql, array($username));
			if ($query->num_rows() > 0 ) {

				foreach ($query->result() as $data) {
						$hasil[] = $data;
						}
						return $hasil;
			}
		}
		function updateStatus($id){
		if($id=="1"){$query = $this->db->query("UPDATE `admins` SET `status`= 'Online' WHERE staf_id='$id'");}
		else{
		$query = $this->db->query("UPDATE `disposisi_staf` SET `status`= 'Online' WHERE staf_id='$id'");}
		return $query;
		}
		function logout($now,$user){
			if($user=="admin"){$query = $this->db->query("UPDATE admins set status='Offline', last_out='$now' WHERE username='$user'");}
			else{$query = $this->db->query("UPDATE disposisi_staf set status='Offline', last_out='$now' WHERE username='$user'");}
			//echo $query;
		return $query;
		}
		
	}
?>
