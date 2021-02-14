<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kasirs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model("kasir_model","kasir_model");
		$this->load->model("menu_model","menu_model");
		$this->load->model("bayar_model","bayar_model");
        $this->load->library('form_validation');
		
    }

    public function index()
    {
		$data["kasirs"] = $this->kasir_model->getAll();
		$data["menus"] = $this->menu_model->getAll();
        $this->load->view('admin/kasir/kasir', $data);
    }

	
 

	function get_menu($id_menu){
        $hsl=$this->db->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'id_menu' => $data->id_menu,
                    'nama_menu' => $data->nama_menu,
                    
                    );
            }
        }
        return $hasil;
	}
	
    public function add()
    {
	//	$data["kasirs"] = $this->kasir_model->getAll();
	
        $kasir = $this->kasir_model;
        $validation = $this->form_validation;
        $validation->set_rules($kasir->rules());

        if ($validation->run()) {
            $kasir->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(base_url('admin/kasirs/add'));
			
        }
		

		
			$data["a"]=$this->kasir_model->join();
											

		
										$data["menus"] = $this->menu_model->getAll();

        $this->load->view('admin/kasir/kasir',$data);
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
            redirect(base_url('admin/kasirs/add'));
        }
	}
	public function mbayar()
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


	

	public function cari(){
		
        $id_menu=$_GET['id_menu'];
        $cari =$this->menu_model->getMenu($id_menu)->result();
        echo json_encode($cari);
    } 

	function auto(){
		if (isset($_GET['term'])) {
			$result = $this->menu_model->golek($_GET['term']);
			 if (count($result) > 0) {
		  foreach ($result as $row)
			   $arr_result[] = $row->harga_menu;
			   echo json_encode($arr_result);
			   
			 }

	  }
    }
	public function data()
	{
	 $id_menu=$this->input->post('id_menu',TRUE);
   
	 $query=$this->menu_model->golek($id_menu);
	 $data = array();
		   foreach ($query as $row)
			   $data[]=[
					'id_menu'=>$row->id_menu];
		   echo json_encode($data);
	
   
   
	}

	public function caricari(){
 
        $term = $this->input->get('term');
 
        $this->db->like('nama_menu', $term);
 
        $data = $this->db->get("menu")->result();
 
        echo json_encode( $data);
    }

    

}
