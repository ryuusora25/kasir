<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar_model extends CI_Model
{
    private $_table = "transaksi";

	
	public $id_trans;
	
    public $total;
	public $jenis_bayar;
	public $pengutang;
	public $tanggal;
    //public $image = "default.jpg";
    

    public function rules()
    {
        return [
			
			
            ['field' => 'bayar',
            'label' => 'Bayar oi',
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
		
        $this->id_trans = $post["id"];
		$this->total = $post["total"];
		$this->jenis_bayar = $post["jenis_bayar"];
		$this->pengutang = $post["pengutang"];
		$this->tanggal = date("Y-m-d");
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

    public function delete($id_trans)
    {
        return $this->db->delete($this->_table, array("id_trans" => $id_trans));
	}
	
	public function join($id_trans)
    {
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('transaksi_detail','menu.id_menu=transaksi_detail.id_menu');
		$this->db->where('transaksi_detail.id_trans',$id_trans);
		$query = $this->db->get();
		return $query->result();
		
	}

}
