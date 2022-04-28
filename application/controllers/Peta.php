<?php

class Peta extends CI_Controller
{

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('peta');
        $this->load->view('template/footer');
    }

    public function map_data()
    {
        $response = [];
        $get_cctv = $this->model_peta->tampil_cctv()->result_array();
        foreach ($get_cctv as $knk) {
            $data = null;
            $data['nama_jalan'] = $knk['nama_jalan'];
            $data['latitude'] = $knk['latitude'];
            $data['longitude'] = $knk['longitude'];
            $response[] = $data;
        }
        echo "var data_cctv=" . json_encode($response, JSON_PRETTY_PRINT);
    }
}
