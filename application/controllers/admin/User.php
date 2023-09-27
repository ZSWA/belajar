<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index(){
		$this->db->from('user');
		$this->db->order_by('nama','ASC');
		$user = $this->db->get()->result_array();

		$data = array(
			'judul' => 'Data User',
			'user'	=> $user
		);
		$this->template->load('template_admin','admin/user_index', $data);
	}

	public function simpan(){
		$this->db->from('user');
		$this->db->where('username',$this->input->post('username'));
		$validasi = $this->db->get()->result_array();

		if ($validasi!=NULL) {
			$this->session->set_flashdata('alert','
			<div class="alert alert-danger" role="alert">
			Username sudah ada!
			</div>
			');
			redirect('admin/user');
		}

		$this->User_model->simpan();
		$this->session->set_flashdata('alert','
		<div class="alert alert-success" role="alert">
		Berhasil menambahkan user
		</div>
		');
		redirect('admin/user');
	}

	public function delete_data($id){
		$where = array(
			'id_user' => $id
		);

		$this->db->delete('user',$where);
		$this->session->set_flashdata('alert','
		<div class="alert alert-success" role="alert">
		Berhasil menghapus user
		</div>
		');
		redirect('admin/user');
	}

	public function update(){
		$this->User_model->update();
		$this->session->set_flashdata('alert','
		<div class="alert alert-success" role="alert">
		Berhasil update user
		</div>
		');
		redirect('admin/user');
	}

}
