<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Models', 'v');
		// $this->load->library('curl');
		belumlogin();
	}
	public function data()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
        	$this->session->userdata('id')])->row_array();
		$data['data'] = $this->db->query("SELECT * FROM skill")->result_array();
 		$this->load->view('admin/skill/data',$data);
	}

	public function add()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
        	$this->session->userdata('id')])->row_array();
		$this->form_validation->set_rules('skill_name', 'skill_name', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/skill/add',$data);
		} else {
			$insert = array(
				'name' => $this->input->post('skill_name'),
				'persentase' => $this->input->post('skill_percentage'),
				'active' => 1,
			);
			if ($this->v->insert('skill', $insert)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Skill Berhasil Ditambahkan
				</div>');
				redirect('admin/Skill/data');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
				redirect('admin/Skill/data');
			}
		}
	}

	public function edit($id)
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
        	$this->session->userdata('id')])->row_array();
		$this->form_validation->set_rules('skill_name', 'skill_name', 'required');
		if ($this->form_validation->run() == false) {
			$data['data'] = $this->db->query("SELECT * FROM skill WHERE id = '$id'")->result_array();
			$this->load->view('admin/skill/edit',$data);
		} else {
			$update = array(
				'name' => $this->input->post('skill_name'),
				'persentase' => $this->input->post('skill_percentage'),
				'active' => $this->input->post('skill_status'),
			);
			if ($this->v->ubahdata2($update,"id", "skill", $id)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Skill Berhasil Diubah
				</div>');
					redirect('admin/Skill/data');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
					redirect('admin/Skill/data');
			}
		}
	}
	public function off($id)
    {
        // $post = $this->input->post();
        $this->db->set('active', 0);
        $this->db->where('id', $id);
        $qry = $this->db->update('skill');
        if ($qry) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah
            </div>');
           	redirect('admin/Skill/data');
        }else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Gagal Ubah Status
            </div>');
           	redirect('admin/Skill/data');
        }
	}
	public function on($id)
    {
        // $post = $this->input->post();
        $this->db->set('active', 1);
        $this->db->where('id', $id);
        $qry = $this->db->update('skill');
        if ($qry) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah
            </div>');
           	redirect('admin/Skill/data');
        }else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Gagal Ubah Status
            </div>');
           	redirect('admin/Skill/data');
        }
    }
}
