<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
	}

	public function index()
	{//var_dump($this->input->post('Mahasiswa[nama]'));exit();
		$this->load->view('welcome_message');
	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{
		if (isset($_POST['Mahasiswa']))
		{
			$input = array(
				'nama' => $this->input->post('Mahasiswa[nama]'),
				'tgl_lahir' => $this->input->post('Mahasiswa[tgl_lahir]'),
				'hp' => $this->input->post('Mahasiswa[hp]'),
				'email' => $this->input->post('Mahasiswa[email]')
			);

			$this->db->where('id', $id);
			$this->db->update('mahasiswa', $input);
		}
		redirect('','refresh');
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$this->db->where('id', $id);
		$this->db->delete('mahasiswa');

		redirect('','refresh');
	}
}
