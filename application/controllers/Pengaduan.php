 <?php

    use Carbon\Carbon;

    class Pengaduan extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            date_default_timezone_set("Asia/Jakarta");
        }
        public function index()
        {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('pengaduan');
            $this->load->view('template/footer');
        }

        public function tambah_pengaduan()
        {
            $this->form_validation->set_rules(
                'nama_pengirim',
                'Nama ',
                'required',
                array('required' => '%s tidak boleh kosong')
            );
            $this->form_validation->set_rules(
                'no_telp',
                'No Telpon',
                'required',
                array('required' => '%s tidak boleh kosong')
            );
            // $this->form_validation->set_rules(
            //     'bukti',
            //     'Bukti',
            //     'required',
            //     array('required' => '%s tidak boleh kosong')
            // );
            $this->form_validation->set_rules(
                'lokasi',
                'Lokasi',
                'required',
                array('required' => '%s tidak boleh kosong')
            );
            $this->form_validation->set_rules(
                'isi',
                'Deskripsi Pengaduan',
                'required',
                array('required' => '%s tidak boleh kosong')
            );
            // $this->form_validation->set_rules(
            //     'bukti',
            //     'Bukti',
            //     'required',
            //     array('required' => '%s tidak boleh kosong')
            // );

            if ($this->form_validation->run() == false) {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('pengaduan');
                $this->load->view('template/footer');
            } else {
                $gambar         = $_FILES['bukti']['name'];
                echo print_r($gambar);
                // exit;
                if (empty($gambar)) {
                    $this->session->set_flashdata('gambar', '<span class="text-danger">Gambar tidak boleh kosong!</span>');
                    $this->load->view('template/header');
                    $this->load->view('template/navbar');
                    $this->load->view('pengaduan');
                    $this->load->view('template/footer');
                    return false;
                } else {
                    $config['upload_path'] = './lampiran';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['file_name'] = 'L' . date('dmh');

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('bukti')) {
                        // echo "Gambar gagal diupload";
                        $this->session->set_flashdata('gambar', '<span class="text-danger">Format gambar tidak sesuai!</span>');
                        $this->load->view('template/header');
                        $this->load->view('template/navbar');
                        $this->load->view('pengaduan');
                        $this->load->view('template/footer');
                        return false;
                    } else {
                        $gambar = $this->upload->data('file_name');
                    }
                }
                date_default_timezone_set("Asia/Jakarta");
                $tgl = str_replace('-', '', date('d-m-Y'));
                $last = $this->db->get('pengaduan')->result_array();
                $terakhir = null;
                foreach ($last as $ls) {
                    $terakhir = $ls;
                }
                $angka = (int) substr($terakhir['no_tiket'], 8, 4);
                $angka++;
                $first = Carbon::now()->startOfMonth()->format('d');
                $today = Carbon::now()->format('d');
                if ($first == $today) {
                    $no_tiket = $tgl . '0001';
                } else {
                    if (strlen($angka) == 1) {
                        $no_tiket = $tgl . '000' . $angka;
                    } elseif (strlen($angka) == 2) {
                        $no_tiket = $tgl . '00' . $angka;
                    } elseif (strlen($angka) == 3) {
                        $no_tiket = $tgl . '0' . $angka;
                    } elseif (strlen($angka) == 4) {
                        $no_tiket = $tgl . $angka;
                    }
                }


                $data = array(
                    'no_tiket'             => $no_tiket,
                    'nama_pengirim'        =>  $this->input->post('nama_pengirim'),
                    'no_telp'        =>  $this->input->post('no_telp'),
                    'lokasi'           =>  $this->input->post('lokasi'),
                    'isi'           => $this->input->post('isi'),
                    'bukti'           =>  $gambar,
                    'status'        => '1',
                    'tgl_pengaduan'  => date('Y-m-d H:i:s')
                );
                $this->model_pengaduan->tambah_data($data, 'pengaduan');
                redirect('no_tiket');
            }
        }
        public function DetailPengaduan()
        {
            # code...
            $data['pengaduan'] = $this->db->get_where('proses_pengaduan', array('no_tiket' => $this->input->post('no_tiket')))->row();
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('lacak', $data);
            $this->load->view('template/footer');
        }
    }
