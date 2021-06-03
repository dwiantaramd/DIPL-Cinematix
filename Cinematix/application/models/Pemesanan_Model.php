<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_Model extends CI_model {

    public function getAllPemesanan()
    {
        $this->db->select('pemesanan.*,user.Nama as namauser,film.JudulFilm as judul, jadwaltayang.WaktuMulai as jam, jadwaltayang.Tgltayang as tanggal, studio.NomorStudio as nostudio, teater.NamaTeater as namateater, jadwaltayang.harga as harga');
        $this->db->from('pemesanan');
        $this->db->join('user','pemesanan.User = user.Username');
        $this->db->join('jadwaltayang','pemesanan.idJadwalTayang = jadwaltayang.idJadwalTayang');
        $this->db->join('film','film.idFilm = jadwaltayang.idFilm');
        $this->db->join('teater','teater.idTeater = jadwaltayang.idTeater');
        $this->db->join('studio','studio.idStudio = jadwaltayang.idStudio');
        return $this->db->get()->result_array();
    }

    public function deletePemesanan($id)
    {
        $this->db->where('idPemesanan', $id);
        $this->db->delete('pemesanan');
    }

    public function getPemesananDetail($id)
    {
        $this->db->select('pemesanan.*,user.Nama as namauser,film.JudulFilm as judul, jadwaltayang.WaktuMulai as jam, jadwaltayang.Tgltayang as tanggal, studio.NomorStudio as nostudio, teater.NamaTeater as namateater, jadwaltayang.harga as harga');
        $this->db->from('pemesanan');
        $this->db->join('user','pemesanan.User = user.Username');
        $this->db->join('jadwaltayang','pemesanan.idJadwalTayang = jadwaltayang.idJadwalTayang');
        $this->db->join('film','film.idFilm = jadwaltayang.idFilm');
        $this->db->join('teater','teater.idTeater = jadwaltayang.idTeater');
        $this->db->join('studio','studio.idStudio = jadwaltayang.idStudio');
        $this->db->where('idPemesanan', $id);
        return $this->db->get()->row_array();
    }
}