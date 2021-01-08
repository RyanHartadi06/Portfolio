<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		$this->load->model('Models' , 'models');
		belumlogin();
    }
	public function index()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
        	$this->session->userdata('id')])->row_array();
		$this->form_validation->set_rules('profile_name' , 'profile_name' , 'required');
		if ($this->form_validation->run() == false) {
			$data['data'] = $this->db->query("SELECT * FROM hero WHERE id = '1'")->result_array();
			$this->load->view('admin/hero/hero',$data);
		}else {
			$update = $this->models->ubahdata2(array(
				'name' => $this->input->post("profile_name"),
				'profession' => $this->input->post("profession"),
			),"id","hero", 1);
			if($update){
				$ubahfoto = $_FILES['background']['name'];
	
				if ($ubahfoto) {
					$config['allowed_types'] = 'jpg|png|gif|jpeg';
					$config['max_size'] = '2048';
					$config['upload_path'] = './uploads/hero/';
	
					$this->load->library('upload', $config);
	
					if ($this->upload->do_upload('background')) {
						$fotobaru = $this->upload->data('file_name');
						$this->db->set('gambar', $fotobaru);
						$this->db->where('id', 1);
						$this->db->update('hero');
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
						Berhasil Mengubah Data!
						</div>');
						redirect('admin/Hero');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
						. $this->upload->display_errors() .
						'</div>');
						// redirect('user/editprofile');
						redirect('admin/Hero');
					}
				}else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
						Berhasil Mengubah Data!
						</div>');
						redirect('admin/Hero');
				}
				
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Data!
				</div>');
				redirect('admin/Hero');
			}
		}
	}
}
