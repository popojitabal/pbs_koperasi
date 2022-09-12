<?php

class M_pembelian extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        
    }

    // ====================== BARANG
    public function getBarang()
    {
        return $this->db->select('*')
        ->from('mst_barang')
        ->where('deleted', 0)
        ->get()->result_array();
    }

    public function getBarangById($id_mst_barang)
    {
        return $this->db->select('*')
        ->from('mst_barang')
        ->where('deleted', 0)
        ->where('id_mst_barang', $id_mst_barang)
        ->get()->row_array();
    }

    public function createBarang($data)
    {
        $this->db->insert('mst_barang', $data);
        return true;
    }
    
    public function updateBarang($data, $id_mst_barang)
    {
        $this->db->where('id_mst_barang', $id_mst_barang)
        ->update('mst_barang', $data);
        return true;
    }
    
    public function deleteBarang($id_mst_barang)
    {
        $this->db->where('id_mst_barang', $id_mst_barang)
        ->update('mst_barang', ['deleted'=>1, 'date_deleted' => date('Y-m-d H:i:s')]);
        return true;
    }

    // ======================== TOKO
    public function getToko()
    {
        return $this->db->select('*')
        ->from('mst_toko')
        ->where('deleted', 0)
        ->get()->result_array();
    }

    public function getTokoById($id_mst_toko)
    {
        return $this->db->select('*')
        ->from('mst_toko')
        ->where('deleted', 0)
        ->where('id_mst_toko', $id_mst_toko)
        ->get()->row_array();
    }

    public function createToko($data)
    {
        $this->db->insert('mst_toko', $data);
        return true;
    }
    
    public function updateToko($data, $id_mst_toko)
    {
        $this->db->where('id_mst_toko', $id_mst_toko)
        ->update('mst_toko', $data);
        return true;
    }
    
    public function deleteToko($id_mst_toko)
    {
        $this->db->where('id_mst_toko', $id_mst_toko)
        ->update('mst_toko', ['deleted'=>1, 'date_deleted' => date('Y-m-d H:i:s')]);
        return true;
    }

    //========================= pembelian
    public function getPembelian()
    {
        return $this->db->select('*')
        ->from('trx_pembelian')
        ->where('deleted', 0)
        ->get()->result_array();
    }

    public function getPembelianById($id_trx_pembelian)
    {
        return $this->db->select('*')
        ->from('trx_pembelian')
        ->where('deleted', 0)
        ->where('id_trx_pembelian', $id_trx_pembelian)
        ->get()->row_array();
    }

    public function createPembelian($data)
    {
        $metadata = [];
        $barang = $this->getBarangById($data['id_mst_barang']);
        if($barang){
            $metadata['barang'] = [
                'nama_barang' => $barang['nama_barang'],
                'jenis_barang' => $barang['jenis_barang'],
                'deskripsi_barang' => $barang['deskripsi_barang'],
            ];
        }
        $toko = $this->getTokoById($data['id_mst_toko']);
        if($toko){
            $metadata['toko'] = [
                'nama_toko' => $toko['nama_toko'],
                'alamat' => $toko['alamat'],
            ];
        }
        $data['metadata'] = json_encode($metadata);
        $this->db->insert('trx_pembelian', $data);
        return true;
    }
    
    public function updatePembelian($data, $id_trx_pembelian)
    {
        $metadata = [];
        $barang = $this->getBarangById($data['id_mst_barang']);
        if($barang){
            $metadata['barang'] = [
                'nama_barang' => $barang['nama_barang'],
                'jenis_barang' => $barang['jenis_barang'],
                'deskripsi_barang' => $barang['deskripsi_barang'],
            ];
        }
        $toko = $this->getTokoById($data['id_mst_toko']);
        if($toko){
            $metadata['toko'] = [
                'nama_toko' => $toko['nama_toko'],
                'alamat' => $toko['alamat'],
            ];
        }
        $data['metadata'] = json_encode($metadata);
        $this->db->where('id_trx_pembelian', $id_trx_pembelian)
        ->update('trx_pembelian', $data);
        return true;
    }
    
    public function deletePembelian($id_trx_pembelian)
    {
        $this->db->where('id_trx_pembelian', $id_trx_pembelian)
        ->update('trx_pembelian', ['deleted'=>1, 'date_deleted' => date('Y-m-d H:i:s')]);
        return true;
    }
}