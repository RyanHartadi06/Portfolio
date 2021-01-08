<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models', 'models');
		belumlogin();
	}
	public function data()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();
		$data['ku'] = $this->db->query("SELECT portofolio.* , category.name as nama_kategori FROM portofolio , category WHERE portofolio.id_kategori = category.id")->result_array();
		$this->load->view('admin/project/data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('project_name', 'project_name', 'required');
		if ($this->form_validation->run() == false) {
			$data['Pengguna'] = $this->db->get_where('users', ['id' =>
			$this->session->userdata('id')])->row_array();
			$data['kat'] = $this->db->query("SELECT * FROM category WHERE active = '1'")->result_array();
			$this->load->view('admin/project/add', $data);
		} else {
			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './uploads/portofolio/';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('project_picture')) {
				$foto_namaBaru = $this->upload->data('file_name');
				$insert = array(
					'name' => $this->input->post('project_name'),
					'nama_instansi' => $this->input->post('company'),
					'id_kategori' => $this->input->post('category'),
					'tanggal' => $this->input->post('date_start'),
					'deskripsi' => $this->input->post('project_description'),
					'gambar' => $foto_namaBaru,
					'url' => $this->input->post('url'),
					'active' => 1,
				);
				// echo json_encode($insert);
				if ($this->v->insert('portofolio', $insert)) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Category Berhasil Ditambahkan
					</div>');
					redirect('admin/Project/data');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
					redirect('admin/Project/data');
				}
			} else {
				$insert = array(
					'name' => $this->input->post('project_name'),
					'nama_instansi' => $this->input->post('company'),
					'id_kategori' => $this->input->post('category'),
					'tanggal' => $this->input->post('date_start'),
					'deskripsi' => $this->input->post('project_description'),
					'gambar' => '',
					'url' => $this->input->post('url'),
					'active' => 1,
				);
				if ($this->v->insert('portofolio', $insert)) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Category Berhasil Ditambahkan
					</div>');
					redirect('admin/Project/data');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
					redirect('admin/Project/data');
				}
			}
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('project_name', 'project_name', 'required');
		if ($this->form_validation->run() == false) {
			$data['Pengguna'] = $this->db->get_where('users', ['id' =>
			$this->session->userdata('id')])->row_array();
			$data['kat'] = $this->db->query("SELECT * FROM category WHERE active = '1'")->result_array();
			$data['ku'] = $this->db->query("SELECT portofolio.* , category.name as nama_kategori FROM portofolio , category WHERE portofolio.id_kategori = category.id AND portofolio.id = '$id'")->result_array();
			$this->load->view('admin/project/edit', $data);
		} else {
			$update = $this->models->ubahdata2(array(
				'name' => $this->input->post("project_name"),
				'nama_instansi' => $this->input->post("company"),
				'id_kategori' => $this->input->post("category"),
				'tanggal' => $this->input->post("date"),
				'deskripsi' => $this->input->post("project_description"),
				'active' => $this->input->post("project_status"),
				'url' => $this->input->post('url'),
			), "id", "portofolio", $id);
			if ($update) {
				$ubahfoto = $_FILES['project_picture']['name'];

				if ($ubahfoto) {
					$config['allowed_types'] = 'jpg|png|gif|jpeg';
					$config['max_size'] = '2048';
					$config['upload_path'] = './uploads/portofolio/';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('project_picture')) {
						// $user = $this->db->get_where('kategori', ['id'=>$id])->row_array();
						// $fotolama = $user['image'];
						// if ($fotolama) {
						// 	unlink(FCPATH . '/uploads/about/' . $fotolama);
						// }
						$fotobaru = $this->upload->data('file_name');
						$this->db->set('gambar', $fotobaru);
						$this->db->where('id', $id);
						$this->db->update('portofolio');
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Mengubah Data!
					</div>');
							redirect('admin/Project/data');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
							. $this->upload->display_errors() .
							'</div>');
						// redirect('user/editprofile');
							redirect('admin/Project/data');
					}
				}else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Mengubah Data!
					</div>');
					redirect('admin/Project/data');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Gagal Mengubah Data!
			</div>');
					redirect('admin/Project/data');
			}
		}
	}
	public function off($id)
	{
		// $post = $this->input->post();
		$this->db->set('active', 0);
		$this->db->where('id', $id);
		$qry = $this->db->update('portofolio');
		if ($qry) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah
            </div>');
			redirect('admin/Project/data');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Gagal Ubah Status
            </div>');
			redirect('admin/Project/data');
		}
	}
	public function on($id)
	{
		// $post = $this->input->post();
		$this->db->set('active', 1);
		$this->db->where('id', $id);
		$qry = $this->db->update('portofolio');
		if ($qry) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah
            </div>');
			redirect('admin/Project/data');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Gagal Ubah Status
            </div>');
			redirect('admin/Project/data');
		}
	}
}
