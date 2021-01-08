<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$query =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(tanggal) as month_name FROM pengunjung
		GROUP BY YEAR(tanggal),MONTH(tanggal)")->result();

		foreach ($query as $row) {
			$data['label'][] = $row->month_name;
			$data['data'][] = (int) $row->count;
		}
		$data['chart_data'] = json_encode($data);
		$this->load->view('admin/dashboard', $data);
	}
}
