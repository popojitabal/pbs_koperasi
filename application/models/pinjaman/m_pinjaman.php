<?php

class M_pinjaman extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function getPinjaman()
    {
        return $this->db->select('*')
        ->from('trx_pinjaman')
        ->where('deleted', 0)
        ->order_by('tgl_pinjam','desc')
        ->get()->result_array();
    }

    public function getPinjamanById($id_trx_pinjaman)
    {
        return $this->db->select('*')
        ->from('trx_pinjaman')
        ->where('deleted', 0)
        ->where('id_trx_pinjaman', $id_trx_pinjaman)
        ->get()->row_array();
    }

    public function createPinjaman($data)
    {
        $this->db->insert('trx_pinjaman', $data);
        return true;
    }
    
    public function updatePinjaman($data, $id_trx_pinjaman)
    {
        $this->db->where('id_trx_pinjaman', $id_trx_pinjaman)
        ->update('trx_pinjaman', $data);
        return true;
    }
    
    public function deletePinjaman($id_trx_pinjaman)
    {
        $this->db->where('id_trx_pinjaman', $id_trx_pinjaman)
        ->update('trx_pinjaman', ['deleted'=>1, 'date_deleted' => date('Y-m-d H:i:s')]);
        return true;
    }
    
    // ========================== SETORAN
    public function getSetoran($id_trx_pinjaman)
    {
        return $this->db->select('*')
        ->from('trx_pinjaman_setor')
        ->where('deleted', 0)
        ->where('id_trx_pinjaman', $id_trx_pinjaman)
        ->order_by('tgl_penyetoran','desc')
        ->get()->result_array();
    }

    public function getSetoranById($id_trx_pinjaman_setor)
    {
        return $this->db->select('*')
        ->from('trx_pinjaman_setor')
        ->where('deleted', 0)
        ->where('id_trx_pinjaman_setor', $id_trx_pinjaman_setor)
        ->get()->row_array();
    }

    public function createSetoran($data)
    {
        $this->db->insert('trx_pinjaman_setor', $data);
        return true;
    }
    
    public function updateSetoran($data, $id_trx_pinjaman_setor)
    {
        $this->db->where('id_trx_pinjaman_setor', $id_trx_pinjaman_setor)
        ->update('trx_pinjaman_setor', $data);
        return true;
    }
    
    public function deleteSetoran($id_trx_pinjaman_setor)
    {
        $this->db->where('id_trx_pinjaman_setor', $id_trx_pinjaman_setor)
        ->update('trx_pinjaman_setor', ['deleted'=>1, 'date_deleted' => date('Y-m-d H:i:s')]);
        return true;
    }
}