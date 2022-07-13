<?php


class Model_terminal extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('data_terminal');
    }

    public function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    
    public function Update_data($where, $data, $table)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }
    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('data_cctv', array('id_cctv' => $id))->row();
        return $query;
    }
}
