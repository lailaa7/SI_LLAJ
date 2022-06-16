<?php

class Pengaduan extends CI_Controller
{

    public function index()
    {

        $data['pengaduan'] = $this->model_pengaduan->tampil_data()->result_array();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/pengaduan', $data);
        $this->load->view('template_admin/footer');
    }

    public function detail_pengaduan($id)
    {
        $this->load->model('model_pengaduan');
        $data['detail'] = $this->model_pengaduan->detail_data($id);
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/detail_pengaduan', $data);
        $this->load->view('template_admin/footer');
    }

    public function konfirmasi()
    {
        $type = (int) $this->input->post('type_proses');

        if ($type == 1) {
            $data = array(
                'no_tiket' => $this->input->post('no_tiket'),
                'status' =>  '2',
            );

            $this->model_pengaduan->tambah_data($data, 'proses_pengaduan');
        } elseif ($type == 2) {
            $data = array(
                'no_tiket' => $this->input->post('no_tiket'),
                'status' =>  '3',
            );

            $this->model_pengaduan->tambah_data($data, 'proses_pengaduan');
        }
        redirect('admin/pengaduan');
    }
}
