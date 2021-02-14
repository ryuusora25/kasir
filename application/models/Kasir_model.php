<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_model extends CI_Model
{
    private $_table = "transaksi_detail";

	public $id;
	public $id_trans;
	public $id_menu;
    public $jumlah;
	public $total;
	
	public $tanggal_trans;
    //public $image = "default.jpg";
    

    public function rules()
    {
        return [
			
			
            ['field' => 'jumlah',
            'label' => 'Jumlahnya oi',
            'rules' => 'required'],

           

			
            
        
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getId($id_trans)
    {
		
        return $this->db->get_where($this->_table, ["id_trans" => $id_trans])->result();
    }

    public function save()
    {
		$post = $this->input->post();
		$id_menu=$post["id_menu"];

		$query=$this->db->select('harga_menu')->from('menu')->where('id_menu',$id_menu)->get()->result();
		foreach($query as $qq){
			$har=$qq->harga_menu;
		}


		
		$jum=$post["jumlah"];
		$tot=$jum*$har;
		
        $this->id_trans = $post["id_trans"];
        $this->id_menu = $id_menu;
		$this->jumlah = $jum;
		$this->total = $tot;
		$this->tanggal_trans = date("Y-m-d");
      
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_menu = $post["id_menu"];
        $this->nama_menu = $post["nama_menu"];
		$this->harga_menu = $post["harga_menu"];
		$this->tipe = $post["tipe"];
        
        return $this->db->update($this->_table, $this, array('id_menu' => $post['id_menu']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
	}
	
	public function join()
    {
		$q=$this->db->select('id_trans')->from('transaksi')->order_by('id_trans','desc')->limit(1)->get();
				$hasil=$q->result();
				foreach($hasil as $row){
					$id=$row->id_trans;
				}
				if($q->num_rows() > 0){
					$a=substr($id,2);
					$id_a=$a+1;
					$id_trans='TR0'.$id_a;
				}else{
								
					$id_trans='TR1';										
				}
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('transaksi_detail','menu.id_menu=transaksi_detail.id_menu');
		$this->db->where('transaksi_detail.id_trans',$id_trans);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		return $query->result_array();
		
	}

}
