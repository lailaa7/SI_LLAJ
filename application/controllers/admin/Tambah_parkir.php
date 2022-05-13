<?php

class Tambah_parkir extends CI_Controller
{

    public function index()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/tambah_parkir');
        $this->load->view('template_admin/footer');
    }

    public function tambah_aksi()
    {
        $this->form_validation->set_rules(
            'nama_jalan',
            'Nama Jalan',
            'required',
            array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'kondisi',
            'kondisi',
            'required',
            array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'latitute',
            'latitude',
            'required',
            array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'longitude',
            'longitude',
            'required',
            array('required' => '%s tidak boleh kosong')
        );



        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/tambah_parkir');
            $this->load->view('template_admin/footer');
        } else {
            $data = array(
                'nama_jalan'        =>  $this->input->post('nama_jalan'),
                'kondisi'           =>  $this->input->post('kondisi'),
                'latitude'           => $this->input->post('latitude'),
                'longitude'           =>  $this->input->post('longitude')
            );
            $this->model_parkir->tambah_data($data, 'data_parkir');
            redirect('admin/parkir_admin');
        }
    }
}
