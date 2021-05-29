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

}