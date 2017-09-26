<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudModel extends CI_Model
{
	var $table = 'mahasiswa';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function select()
	{
		$data['content'] = $this->db->get('mahasiswa');

		return $data;
	}

	function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
 
		return $query->row();
	}

	function insert($input)
	{
		$this->db->insert($this->table, $input);
		return $this->db->insert_id();
	}

}

/* End of file crudModel.php */
/* Location: ./application/models/crudModel.php */