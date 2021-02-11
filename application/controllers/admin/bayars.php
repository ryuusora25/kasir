<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bayars extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model("bayar_model");
	
        $this->load->library('form_validation');
    }

    public function index()
    {
		$data["bayars"] = $this->bayar_model->getAll();
	
      //  $this->load->view('admin/kasir/kasir', $data);
    }

	public function getId($id_trans)
    {
		
        return $this->db->get_where($this->_table, ["id_trans" => $id_trans])->result();
    }
    public function add()
    {
		//$data["bayars"] = $this->bayar_model->getAll();
        $bayar = $this->bayar_model;
        $validation = $this->form_validation;
        $validation->set_rules($bayar->rules());

        if ($validation->run()) {
            $bayar->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(base_url('admin/kasirs/add'));
			
        }	

       // $this->load->view('admin/kasir/kasir',$data);
    }

    public function edit($id_trans = null)
    {
        if (!isset($id_trans)) redirect('admin/v_menu');
       
        $kasir = $this->kasir_model;
        $validation = $this->form_validation;
        $validation->set_rules($kasir->rules());

        if ($validation->run()) {
			$kasir->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kasirs"] = $kasir->getById($id_trans);
        if (!$data["kasirs"]) show_404();
        
        $this->load->view("admin/edit_menu", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kasir_model->delete($id)) {
            redirect(base_url('admin/menus'));
        }
	}

	



}
