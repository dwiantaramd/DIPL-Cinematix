<?php

class Film_Model extends CI_model {

    public function getAllFilm(){
        return $this->db->get('film')->result_array(); // mengambil semua data film dari database
    }

    public function insertFilm($data){
        return $this->db->insert('film', $data); // menambahkan data film ke database
    }

    public function getFilmbyId($id)
    {
        return $this->db->get_where('film', ['idFilm' => $id])->row_array(); // mengambil data film berdasarkan id film pada
    }                                                                        // database

    public function updateFilm($data, $id)
    {
        $this->db->set($data); // set data baru yang ingin menimpa data lama 
        $this->db->where('idFilm', $id); // mengambil data berdasarkan idfilm pada database
        $this->db->update('film'); // melakukan update data ke database
    }

    public function deleteFilm($id)
    {
        $this->db->where('idFilm', $id); // mengambil data berdasarkan idfilm pada database
        $this->db->delete('Film'); // melakukan hapus data pada database
    }

}