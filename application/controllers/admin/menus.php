<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("menu_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["menus"] = $this->menu_model->getAll();
        $this->load->view('admin/v_menu', $data);
    }

    public function add()
    {
        $menu = $this->menu_model;
        $validation = $this->form_validation;
        $validation->set_rules($menu->rules());

        if ($validation->run()) {
            $menu->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			
        }

        $this->load->view('admin/tambah_menu');
    }

    public function edit($id_menu = null)
    {
        if (!isset($id_menu)) redirect('admin/v_menu');
       
        $menu = $this->menu_model;
        $validation = $this->form_validation;
        $validation->set_rules($menu->rules());

        if ($validation->run()) {
			$menu->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["menus"] = $menu->getById($id_menu);
        if (!$data["menus"]) show_404();
        
        $this->load->view("admin/edit_menu", $data);
    }

    public function delete($id_menu=null)
    {
        if (!isset($id_menu)) show_404();
        
        if ($this->menu_model->delete($id_menu)) {
            redirect(base_url('admin/menus'));
        }
	}

	function auto(){
		
		if (isset($_GET['term'])) {
            $result = $this->menu_model->golek($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_menu ;
                echo json_encode($arr_result);
				
            }
			
        }   
    }
	
}
