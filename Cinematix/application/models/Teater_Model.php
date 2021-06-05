<?php

class Teater_Model extends CI_model {

    public function getAllTeater(){
        return $this->db->get('teater')->result_array();
    }

    public function insertTeater($data){
        return $this->db->insert('teater', $data);
    }

    public function getTeaterbyId($id)
    {
        return $this->db->get_where('teater', ['idTeater' => $id])->row_array();
    }

    public function updateTeater($data, $id)
    {
        $this->db->set($data);
        $this->db->where('idTeater', $id);
        $this->db->update('teater');
    }

    public function deleteTeater($id)
    {
        $this->db->query("DELETE FROM pemesanan WHERE idJadwalTayang IN (SELECT idJadwalTayang FROM jadwaltayang WHERE idTeater = '" . $id . "')");
        $this->db->where('idTeater', $id);
        $this->db->delete('studio');
        $this->db->where('idTeater', $id);
        $this->db->delete('jadwaltayang');
        $this->db->where('idTeater', $id);
        $this->db->delete('teater');
    }

	public function getNumTeater()
    {
        return $this->db->get('teater')->num_rows();
    }
}
