<?php 
class M_master extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        
    }

    public function getKaryawan() 
    {
        return $this->db->select('*')
        ->from('mst_karyawan')
        ->where('deleted', 0)
        ->get()->result_array();
    }

    public function getKaryawanById($id_mst_karyawan) 
    {
        return $this->db->select('*')
        ->from('mst_karyawan')
        ->where('deleted', 0)
        ->where('id_mst_karyawan', $id_mst_karyawan)
        ->get()->row_array();
    }
    
    public function createKaryawan($data)
    {
        $this->db->insert('mst_karyawan', $data);
        return true;
    }
    
    public function updateKaryawan($data, $id_mst_karyawan)
    {
        $this->db->where('id_mst_karyawan', $id_mst_karyawan)
        ->update('mst_karyawan', $data);
        return true;
    }
    
    public function deleteKaryawan($id_mst_karyawan)
    {
        $this->db->where('id_mst_karyawan', $id_mst_karyawan)
        ->update('mst_karyawan', [
            "deleted" => 1,
            "date_deleted" => date('Y-m-d h:i:s')
        ]);
        return true;
    }
}