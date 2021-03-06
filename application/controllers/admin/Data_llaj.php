<?php

class Data_llaj extends CI_Controller
{

    public function index()
    {

        $data['data'] = $this->Model_data->Tampil_join()->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/data_llaj', $data);
        $this->load->view('template_admin/footer');
    }

    public function formatNbr($nbr)
    {
        if ($nbr == 0 || $nbr == NULL)
            return "001";
        else if ($nbr < 10)
            return "00" . $nbr;
        elseif ($nbr >= 10 && $nbr < 100)
            return "0" . $nbr;
        else
            return strval($nbr);
    }


    public function Tambah()
    {
        $kode = $this->db->select('max(id_data) as nomor')->from('data_llaj')->get()->result();
        if (!$kode[0]->nomor) {
            $newstring = 0;
        } else {
            $newstring = substr($kode[0]->nomor, -3);
        }
        $baru = $newstring + 1;
        $nourut = $this->formatNbr($baru);
        $data['no_urut'] = 'LLAJ' . $nourut;
        $data['data'] = $this->Model_data->Tampil_kategori()->result();
        $data['simpang'] = $this->Model_data->Tampil_simpang()->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/tambah_data', $data);
        // $this->load->view('admin/tambah_data_2', $data);
        $this->load->view('template_admin/footer');
    }

    public function Tambah_data()
    {
        $kategori = $this->input->post('kategori');
        if ($kategori == 'CCTV') {
            $data = array(
                'id_data'           =>  $this->input->post('id_data'),
                'jumlah'           =>  $this->input->post('jumlah'),
                'nama_jalan'           =>  $this->input->post('nama_jalan'),
                'simpang'           =>  $this->input->post('simpang'),
                'id_kategori'           =>  $this->input->post('kategori'),
                'latitude'           =>  $this->input->post('latitude'),
                'longitude'           =>  $this->input->post('longitude'),
            );

            $this->Model_data->Tambah_data($data, 'data_llaj');
            $this->session->set_flashdata('flashdata', 'Menambah');
            redirect('admin/data_llaj');
        } else {
            $data = array(
                'id_data'           =>  $this->input->post('id_data'),
                'nama_jalan'           =>  $this->input->post('nama_jalan'),
                'lokasi'           =>  $this->input->post('lokasi'),
                'id_kategori'           =>  $this->input->post('kategori'),
                'latitude'           =>  $this->input->post('latitude'),
                'longitude'           =>  $this->input->post('longitude'),
            );

            $this->Model_data->Tambah_data($data, 'data_llaj');
            $this->session->set_flashdata('flashdata', 'Menambah');
            redirect('admin/data_llaj');
        }
    }

    public function Hapus_data($id)
    {
        $where = array('id_data' => $id);
        $this->Model_data->hapus_data($where, 'data_llaj');
        $this->session->set_flashdata('flashdata', 'Menghapus');
        redirect('admin/Data_llaj');
    }
}
