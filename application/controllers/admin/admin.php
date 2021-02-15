<?php

class Admin extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("bayar_model");
	}

	public function index()
	{
        // load view admin/overview.php

		//$data['bl'] =$this->bayar_model->getPerBl();
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
