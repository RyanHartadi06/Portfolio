<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->model('Models' , 'models');
		belumlogin();
    }
	public function index()
	{
		$data['Pengguna'] = $this->db->get_where('users', ['id' =>
		$this->session->userdata('id')])->row_array();
		// $data['Pengguna'] = $this->db->query("SELECT * FROM users WHERE ")->row_array();
		$this->load->view('admin/dashboard',$data);
		// echo json_encode($data['Pengguna']);
	}
}
