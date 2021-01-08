<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct() {
        parent::__construct();
		$this->load->model('Models' , 'models');
    }
	public function index()
	{
		$data['hero'] = $this->db->query("SELECT * FROM hero")->result_array();
		$data['kontak'] = $this->db->query("SELECT * FROM kontak")->result_array();
		$data['about'] = $this->db->query("SELECT * FROM about")->result_array();
		$data['qSkill'] = $this->db->query("SELECT * FROM quotes WHERE page='skill' AND active = '1'")->result_array();
		$data['fSkill'] = $this->db->query("SELECT * FROM quotes WHERE page='footer' AND active = '1'")->result_array();
		$data['skill'] = $this->db->query("SELECT * FROM skill WHERE  active = '1'")->result_array();
		$data['category'] = $this->db->query("SELECT * FROM category WHERE  active = '1'")->result_array();
		$data['portofolio'] = $this->db->query("SELECT portofolio.*, category.name as kategori FROM portofolio , category WHERE category.id =portofolio.id_kategori AND  portofolio.active = '1'")->result_array();
		$insert = array(
			'tanggal' => date("Y-m-d"),
		);
		$this->models->insert('pengunjung', $insert);
		
		$this->load->view('home', $data);
	}
}
