<?php

class M_pembayaran extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPembayaran()
    {
        return $this->db->select('*')
        ->from('trx_pembayaran')
        ->where('deleted', 0)
        ->order_by('tgl_pembayaran','desc')
        ->get()->result_array();
    }

    public function getPembayaranById($id_trx_pembayaran)
    {
        return $this->db->select('*')
        ->from('trx_pembayaran')
        ->where('deleted', 0)
        ->where('id_trx_pembayaran', $id_trx_pembayaran)
        ->get()->row_array();
    }

    public function createPembayaran($data)
    {
        $this->db->insert('trx_pembayaran', $data);
        return true;
    }
    
    public function updatePembayaran($data, $id_trx_pembayaran)
    {
        $this->db->where('id_trx_pembayaran', $id_trx_pembayaran)
        ->update('trx_pembayaran', $data);
        return true;
    }
    
    public function deletePembayaran($id_trx_pembayaran)
    {
        $this->db->where('id_trx_pembayaran', $id_trx_pembayaran)
        ->update('trx_pembayaran', ['deleted'=>1, 'date_deleted' => date('Y-m-d H:i:s')]);
        return true;
    }
}