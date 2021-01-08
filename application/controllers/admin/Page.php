<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function __construct() {
        parent::__construct();
		$this->load->model('Models' , 'models');
		belumlogin();
    }
	public function data()
	{
		$this->load->view('admin/page/data');
	}

	public function add()
	{
		$this->load->view('admin/page/add');
	}

	public function edit()
	{
		$this->load->view('admin/page/edit');
	}
}
