<?php

class Studio_Model extends CI_model{

    public function getAllStudio(){
        return $this->db->get('studio')->result_array(); // mengambil semua data studio dari database
    }

    public function insertStudio($data){
        return $this->db->insert('studio', $data); // menambahkan data film ke database
    }

    public function getStudiobyId($id)
    {
        return $this->db->get_where('studio', ['idStudioo' => $id])->row_array(); // mengambil data studio berdasarkan id studio pada
    }                                                                             // database

    public function updateStudio($data, $id)
    {
        $this->db->set($data); // set data baru yang ingin menimpa data lama 
        $this->db->where('idStudio', $id); // mengambil data berdasarkan idStudio pada database
        $this->db->update('studio'); // melakukan update data ke database
    }

    public function deleteStudio($id)
    {
        $this->db->where('idStudio', $id); // mengambil data berdasarkan idStudio pada database
        $this->db->delete('Studio'); // melakukan hapus data pada database
    }


}

?>