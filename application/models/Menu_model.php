<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    private $_table = "menu";

    public $id_menu;
    public $nama_menu;
	public $harga_menu;
	public $tipe;
    //public $image = "default.jpg";
    

    public function rules()
    {
        return [
			['field' => 'id_menu',
            'label' => 'Kode',
			'rules' => 'required'],
			
            ['field' => 'nama_menu',
            'label' => 'Nama Menu',
            'rules' => 'required'],

            ['field' => 'harga_menu',
            'label' => 'Harga Menu',
			'rules' => 'numeric'],

			['field' => 'tipe',
            'label' => 'Tipe',
            'rules' => 'required']
            
        
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getMenu($id_menu)
    {
		// $id_menu=$this->input->post('id_menu');
        // $data=$this->m_pos->get_menu($id_menu);
        // echo json_encode($data);
          return $this->db->get_where($this->_table, ["id_menu" => $id_menu])->row();
		// $query= $this->db->get_where('menu',array('id_menu'=>$id_menu));
        // return $query;
    }

    public function save()
    {
		
		// $q=$this->db->select('id_menu')->from('menu')->order_by('id_menu','desc')->limit(1)->get();
		// $hasil=$q->result();
		// foreach($hasil as $row){
		// 	$id=$row->id_menu;
		// }
		// if($q->num_rows() > 0){
			
		// 	$id_m=$id+1;
		// }else{
		// 	$id_m=1;
			
		// }
        $post = $this->input->post();
        $this->id_menu = $post["id_menu"];
        $this->nama_menu = $post["nama_menu"];
		$this->harga_menu = $post["harga_menu"];
		$this->tipe = $post["tipe"];
        //$this->description = $post["description"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_menu = $post["id_menu"];
        $this->nama_menu = $post["nama_menu"];
		$this->harga_menu = $post["harga_menu"];
		$this->tipe = $post["tipe"];
        //$this->description = $post["description"];
        return $this->db->update($this->_table, $this, array('id_menu' => $post['id_menu']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_menu" => $id));
	}

	

	function golek($nama_menu){
        $this->db->like('nama_menu', $nama_menu , 'both');
		$this->db->order_by('nama_menu', 'ASC');
		$this->db->limit(10);
		return $this->db->get('menu')->result();
	
	}
	function golekMenu($id_menu){

		$response = array();
   
		if(isset($id_menu['id_menu']) ){
		  // Select record
		  $this->db->like('nama_menu', $id_menu['id_menu'],'both');
         $this->db->order_by('nama_menu', 'ASC');
         $this->db->limit(10);
         
		  $records = $this->db->get('menu')->result();
   
		  foreach($records as $row ){
			 $response[] = array("id_menu"=>$row->id_menu,"nama_menu"=>$row->nama_menu);
		  }
   
		}
   
		return $response;
	 }

}
