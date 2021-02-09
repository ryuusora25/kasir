<?php

class Admin extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("admin/home");
	}

	public function tambah_menu()
	{
        // load view admin/overview.php
        $this->load->view("admin/menu");
	}

	public function v_menu()
	{
        // load view admin/overview.php
        $this->load->view("admin/v_menu");
	}
}
