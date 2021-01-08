<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Models', 'v');
		// $this->load->library('curl');
		belumlogin();
	}
	public function index()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();
		$data['data'] = $this->db->query("SELECT * FROM category")->result_array();
		$this->load->view('admin/category/data', $data);
	}

	public function add()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();
		$this->form_validation->set_rules('category_name', 'category_name', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/category/add', $data);
		} else {
			$insert = array(
				'name' => $this->input->post('category_name'),
				'active' => 1,
			);
			if ($this->v->insert('category', $insert)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Category Berhasil Ditambahkan
				</div>');
				redirect('admin/Category');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
				redirect('admin/Category');
			}
		}
	}
	public function edit($id)
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();
		$this->form_validation->set_rules('category_name', 'category_name', 'required');
		if ($this->form_validation->run() == false) {
			$data['data'] = $this->db->query("SELECT * FROM category WHERE id = '$id'")->result_array();
			$this->load->view('admin/category/edit', $data);
		} else {
			$update = array(
				'name' => $this->input->post('category_name'),
				'active' => $this->input->post('category_status'),
			);
			if ($this->v->ubahdata2($update, "id", "category", $id)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Category Berhasil Diubah
				</div>');
				redirect('admin/Category');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
				redirect('admin/Category');
			}
		}
	}
	public function off($id)
	{
		// $post = $this->input->post();
		$this->db->set('active', 0);
		$this->db->where('id', $id);
		$qry = $this->db->update('category');
		if ($qry) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah
            </div>');
			redirect('admin/Category');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Gagal Ubah Status
            </div>');
			redirect('admin/Category');
		}
	}
	public function on($id)
	{
		// $post = $this->input->post();
		$this->db->set('active', 1);
		$this->db->where('id', $id);
		$qry = $this->db->update('category');
		if ($qry) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah
            </div>');
			redirect('admin/Category');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Gagal Ubah Status
            </div>');
			redirect('admin/Category');
		}
	}
}
