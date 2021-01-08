<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
	public function __construct() {
        parent::__construct();
		$this->load->model('Models' , 'models');
		belumlogin();
    }
	public function index()
	{
		$this->load->view('admin/account/data');
	}

	public function add()
	{
		$this->load->view('admin/account/add');
	}

	public function edit()
	{
		$this->load->view('admin/account/edit');
	}
}
