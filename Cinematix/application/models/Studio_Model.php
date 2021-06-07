<?php

class Studio_Model extends CI_model{

    public function getAllStudio(){
        $this->db->select('studio.*,teater.NamaTeater as namateater');
        $this->db->from('studio');
        $this->db->join('teater','teater.idTeater = studio.idTeater');
        return $this->db->get()->result_array(); // mengambil semua data studio dari database
    }
    
    public function insertStudio($data){
        return $this->db->insert('studio', $data); // menambahkan data studio ke database
    }

    public function getStudiobyId($id)
    {
        return $this->db->get_where('studio', ['idStudio' => $id])->row_array(); // mengambil data studio berdasarkan id studio pada
    }                                                                             // database

    public function updateStudio($data, $id)
    {
        $this->db->set($data); // set data baru yang ingin menimpa data lama 
        $this->db->where('idStudio', $id); // mengambil data berdasarkan idStudio pada database
        $this->db->update('studio'); // melakukan update data ke database
    }

    public function deleteStudio($id)
    {
        $this->db->query("DELETE FROM pemesanan WHERE idJadwalTayang IN (SELECT idJadwalTayang FROM jadwaltayang WHERE idStudio = '" . $id . "')");
        $this->db->where('idStudio', $id);
        $this->db->delete('jadwaltayang');
        $this->db->where('idStudio', $id); // mengambil data berdasarkan idStudio pada database
        $this->db->delete('Studio'); // melakukan hapus data pada database
    }

    public function cekDuplicate($nostudio,$idteater)
    {
        $this->db->where('NomorStudio', $nostudio);
        $this->db->where('idTeater',$idteater);
        return $this->db->get('studio')->num_rows();
    }

    public function getIdStudio($NomorStudio,$idTeater)
    {
        $this->db->select('idStudio');
        $this->db->from('studio');
        $this->db->where('NomorStudio', $NomorStudio);
        $this->db->where('idTeater',$idTeater);
        $query = $this->db->get();
        $result = $query->row()->idStudio;
        return $result;
    }

}

?>