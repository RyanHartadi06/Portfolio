<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models', 'models');
		belumlogin();
	}
	public function index()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();

		$this->form_validation->set_rules('wa', 'wa', 'required');
		if ($this->form_validation->run() == false) {
			$data['ku'] = $this->db->query("SELECT * FROM kontak WHERE id = '1'")->result_array();
			$this->load->view('admin/contact/data', $data);
		} else {
			$update = array(
				'github' => $this->input->post('github'),
				'twitter' => $this->input->post('twitter'),
				'fb' => $this->input->post('fb'),
				'ig' => $this->input->post('ig'),
				'wa' => $this->input->post('wa'),
				'linkedin' => $this->input->post('linkedin'),
			);
			if ($this->models->ubahdata2($update, "id", "kontak", 1)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Contact Berhasil Diubah
				</div>');
				redirect('admin/Contact');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
				redirect('admin/Contact');
			}
		}
	}

	// public function add()
	// {
	// 	$data['Pengguna'] = $this->db->get_where('users', ['id' =>
	// 	$this->session->userdata('id')])->row_array();
	// 	$this->load->view('admin/contact/add', $data);
	// }

	// public function edit()
	// {
	// 	$data['Pengguna'] = $this->db->get_where('users', ['id' =>
	// 	$this->session->userdata('id')])->row_array();
	// 	$this->load->view('admin/contact/edit', $data);
	// }
}
