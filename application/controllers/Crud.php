<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('crudModel');
		//Load Dependencies

	}

	// List all your items
	public function index()
	{

		$data = $this->crudModel->select();

		$content = array(
							'title'		=>	'Admin Mahasiswa',
							'content'	=>	$this->load->view('crud/index', $data, TRUE)
					);
		
		$this->load->view('template', $content);
	}

	// Add a new item
	public function add()
	{
			$input = array(
				'nama' => $this->input->post('Mahasiswa[nama]'),
				'tgl_lahir' => $this->input->post('Mahasiswa[tgl_lahir]'),
				'hp' => $this->input->post('Mahasiswa[hp]'),
				'email' => $this->input->post('Mahasiswa[email]')
			);

			$insert = $this->crudModel->insert($input);



			$hasil = '<tr id="hasil'.$insert.'">
						<td>'.$insert.'</td>
						<td>'.$input["nama"].'</td>
						<td>'.$input["tgl_lahir"].'</td>
						<td>'.$input["hp"].'</td>
						<td>'.$input["email"].'</td>
						<td>
						    <button class="btn btn-warning" onclick="edit_book('.$insert.')">Edit</button>
						    <h6><button class="badge badge-danger" id="hapus-mhs'.$insert.'" onclick="hapusMahasiswa('.$insert.')" value="'.$insert.'">Delete</button></h6>
						</td>
					</tr>';

			echo json_encode(array("status" => TRUE,"hasil"=>$hasil));

			// if ($this->db->insert('mahasiswa', $input))
			// {
			// 	$id = $this->db->getLastInsetId();

			// 	$hasil = '<tr id="hasil'.$id.'">
			// 				<td>'.$input["nama"].'</td>
			// 				<td>'.$input["tgl_lahir"].'</td>
			// 				<td>'.$input["hp"].'</td>
			// 				<td>'.$input["email"].'</td>
			// 			</tr>';

			// 	$data = array('hasil'=>$hasil,'status'=>1);
			// 	$response = utf8_encode($data);
	  //       	echo $response;
			// }
			// else
			// {
			// 	echo 0;
			// }
	}

	//Update one item
	public function update( $id = NULL )
	{

		$input = array(
			'nama' => $this->input->post('Mahasiswa[nama]'),
			'tgl_lahir' => $this->input->post('Mahasiswa[tgl_lahir]'),
			'hp' => $this->input->post('Mahasiswa[hp]'),
			'email' => $this->input->post('Mahasiswa[email]')
		);

		$this->crudModel->update(array('id' => $id), $input);
		echo json_encode(array("status" => TRUE));

		// $this->db->where('id', $id);
		// $this->db->update('mahasiswa', $input);

		// redirect('','refresh');
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$this->db->where('id', $id);
		
		if ($this->db->delete('mahasiswa'))
		{
        	echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function ajax_edit($id)
	{
		$data = $this->crudModel->get_by_id($id);

		echo json_encode($data);
	}
}

/* End of file Crud.php */
/* Location: ./application/controllers/Crud.php */