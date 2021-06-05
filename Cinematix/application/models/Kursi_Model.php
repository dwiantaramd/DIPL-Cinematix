<?php

class Kursi_Model extends CI_model {

    public function getAllKursi(){
        $this->db->select('kursi.*,studio.NomorStudio as nostudio, teater.NamaTeater as namateater');
        $this->db->from('kursi');
        $this->db->join('studio','studio.idStudio = kursi.idStudio');
        $this->db->join('teater','studio.idTeater = teater.idTeater');
        return $this->db->get()->result_array(); // mengambil semua data kursi dari database
        
    }

    public function insertKursi($data){
        return $this->db->insert('kursi', $data); // menambahkan data kursi ke database
    }

    public function deleteKursi($id)
    {
        $this->db->where('idKursi', $id); 
        $this->db->delete('pemesanan'); 
        $this->db->where('idKursi', $id); // mengambil data berdasarkan idkursi pada database
        $this->db->delete('kursi'); // melakukan hapus data pada database
    }

}