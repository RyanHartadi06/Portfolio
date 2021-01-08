<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->model('Models' , 'models');
		belumlogin();
    }
	public function index()
	{ 
		
		$id = 1;
		$this->form_validation->set_rules('birthday' , 'Birthday' , 'required');
		if ($this->form_validation->run() == false) {
			$data['Pengguna'] = $this->db->get_where('users', ['id' =>
        	$this->session->userdata('id')])->row_array();
			$data['ku'] = $this->db->query("SELECT * FROM about WHERE id = '1'")->result_array();
			$this->load->view('admin/about/about' ,$data);
		}else {
			$update = $this->models->ubahdata2(array(
				'birthday' => $this->input->post("birthday"),
				'website' => $this->input->post("website"),
				'kota' => $this->input->post("city"),
				'umur' => $this->input->post("age"),
				'freelance' => $this->input->post("freelance_status"),
				'deskripsi' => $this->input->post("description"),
			),"id","about", $id);
			if($update){
				$ubahfoto = $_FILES['foto']['name'];
	
				if ($ubahfoto) {
					$config['allowed_types'] = 'jpg|png|gif|jpeg';
					$config['max_size'] = '2048';
					$config['upload_path'] = './uploads/about/';
	
					$this->load->library('upload', $config);
	
					if ($this->upload->do_upload('foto')) {
						// $user = $this->db->get_where('kategori', ['id'=>$id])->row_array();
						// $fotolama = $user['image'];
						// if ($fotolama) {
						// 	unlink(FCPATH . '/uploads/about/' . $fotolama);
						// }
						$fotobaru = $this->upload->data('file_name');
						$this->db->set('gambar', $fotobaru);
						$this->db->where('id', $id);
						$this->db->update('about');
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
						Berhasil Mengubah Data!
						</div>');
						redirect('admin/About');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
						. $this->upload->display_errors() .
						'</div>');
						// redirect('user/editprofile');
						redirect('admin/About');
					}
				}
				
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Data!
				</div>');
				redirect('admin/About');
			}
		}
		
		
	}
}
