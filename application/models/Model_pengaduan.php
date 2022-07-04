<?php


class Model_pengaduan extends CI_Model
{

    public function tampil_data()
    {
        $result =  $this->db->get('pengaduan');
        return $result;
    }

    public function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('pengaduan', array('no_tiket' => $id))->row();
        return $query;
    }

    public function get_status($id = NULL)
    {
        $query = $this->db->get_where('proses_pengaduan', array('no_tiket' => $id))->row();
        return $query;
    }

    public function lacak($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
