<?php
class Mcal extends CI_Model
{

	private $table_events = 'ic_events';
	private $table_eventsqueues = 'ic_eventsqueues';
	private $table_category = 'ic_category';
	private $table_markers = 'ic_markers';
	private $private_value = 0;
	private $public_value = -1;

	//update the approve value
	private $approve_value = -3;
	function __construct()
	{
		parent::__construct();
		$this->db  = $this->load->database('default', TRUE);

		$this->load->helper('security');
	}

	public function countCalendarEvents()
	{
		return $this->db->count_all_results($this->table_events);
	}
	function showAll()
	{
		$data = array(
			'rendering' 	=> '',
		);

		$this->db->update($this->table_events, $data);
	}
	function log()
	{

		$query = $this->db->query("SELECT * FROM ic_bin order by eid desc ");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	function getEvent($id)
	{

		$query = $this->db->query("SELECT * FROM ic_bin where eid='$id'  ");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function EmptyTrash()
	{
		$this->db->truncate('ic_bin');
	}
	function Devent($id)
	{
		$this->db->where('eid', $id);
		return $this->db->delete('ic_bin');
	}
	function add_event($data)
	{


		$this->db->insert('ic_events', $data);
	}
}
