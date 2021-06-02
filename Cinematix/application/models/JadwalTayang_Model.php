<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalTayang_Model extends CI_model {

    public function getAllJadwalTayang()
    {
        $this->db->select('jadwaltayang.*,film.JudulFilm as judul, teater.NamaTeater as namateater, studio.NomorStudio as nostudio');
        $this->db->from('jadwaltayang');
        $this->db->join('film','film.idFilm = jadwaltayang.idFilm');
        $this->db->join('teater','teater.idTeater = jadwaltayang.idTeater');
        $this->db->join('studio','studio.idStudio = jadwaltayang.idStudio');
        return $this->db->get()->result_array();
    }

    public function insertJadwalTayang($data){
        return $this->db->insert('jadwaltayang', $data); // menambahkan data jadwaltayang ke database
    }

    public function getJadwalTayangbyId($id)
    {
        return $this->db->get_where('jadwaltayang', ['idJadwalTayang' => $id])->row_array(); // mengambil data jadwal tayang berdasarkan 
    }

    public function updateJadwalTayang($data, $id)
    {
        $this->db->set($data);
        $this->db->where('idJadwalTayang', $id);
        $this->db->update('jadwaltayang');
    }

    public function deleteJadwalTayang($id)
    {
        $this->db->where('idJadwalTayang', $id);
        $this->db->delete('jadwaltayang');
    }

    public function getJadwalTayangDetail($id)
    {
        $this->db->select('jadwaltayang.*,film.JudulFilm as judul, teater.NamaTeater as namateater, studio.NomorStudio as nostudio');
        $this->db->from('jadwaltayang');
        $this->db->join('film','film.idFilm = jadwaltayang.idFilm');
        $this->db->join('teater','teater.idTeater = jadwaltayang.idTeater');
        $this->db->join('studio','studio.idStudio = jadwaltayang.idStudio');
        $this->db->where('idJadwalTayang', $id);
        return $this->db->get()->row_array();
    }

}