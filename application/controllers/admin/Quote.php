<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->model('Models' , 'v');
		belumlogin();
    }
	public function data()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();
		$data['data'] = $this->db->query("SELECT * FROM quotes")->result_array();
		$this->load->view('admin/quote/data',$data);
	}

	public function add()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();
		$this->form_validation->set_rules('page', 'page', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/quote/add',$data);
		} else {
			$insert = array(
				'page' => $this->input->post('page'),
				'quote' => $this->input->post('quote'),
				'active' => 1,
			);
			if ($this->models->insert('quotes', $insert)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Quote Berhasil Ditambahkan
				</div>');
				redirect('admin/Quote/data');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
				redirect('admin/Quote/data');
			}
		}
	}

	public function edit($id)
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();
		
		$this->form_validation->set_rules('page', 'page', 'required');
		if ($this->form_validation->run() == false) {
			$data['data'] = $this->db->query("SELECT * FROM quotes WHERE id = '$id'")->result_array();
			$this->load->view('admin/quote/edit',$data);
		} else {
			$update = array(
				'page' => $this->input->post('page'),
				'quote' => $this->input->post('quote'),
				'active' => $this->input->post('page_status'),
			);
			if ($this->v->ubahdata2($update, "id", "quotes", $id)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Quote Berhasil Diubah
				</div>');
				redirect('admin/Quote/data');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
				redirect('admin/Quote/data');
			}
		}
	}
	public function off($id)
	{
		// $post = $this->input->post();
		$this->db->set('active', 0);
		$this->db->where('id', $id);
		$qry = $this->db->update('quotes');
		if ($qry) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah
            </div>');
				redirect('admin/Quote/data');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Gagal Ubah Status
            </div>');
				redirect('admin/Quote/data');
		}
	}
	public function on($id)
	{
		// $post = $this->input->post();
		$this->db->set('active', 1);
		$this->db->where('id', $id);
		$qry = $this->db->update('quotes');
		if ($qry) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah
            </div>');
				redirect('admin/Quote/data');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Gagal Ubah Status
            </div>');
				redirect('admin/Quote/data');
		}
	}
}
