<?php
defined('BASEPATH') or exit('No direct script access allowed');

class R313 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Md_r313');
    }
    public function index()
    {
        $page_data['page_title'] = 'Lab Web Pemrograman 2 - R.313';
        $page_data['page_tambah'] = 'Tambah Data Laboratorium';
        $page_data['page_edit'] = 'Edit Data Laboratorium';
        $page_data['page_detail'] = 'Detail Data Laboratorium';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;

        $page_data['data'] = $this->Md_r313->getId1();

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('lab313/index', $page_data);
        $this->load->view('templates/include_footer');
    }
    public function add()
    {
        $uploaded_file = $_FILES['gambar']['name'];

        if (empty($uploaded_file)) {
            // Tangani jika file gambar tidak ada
        } else {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');

                $data = array(
                    'gambar' => $gambar,
                    'id_user' => 4,
                    'nama' => $this->input->post('nama'),
                    'no_barang' => $this->input->post('no_barang'),
                    'jumlah' => $this->input->post('jumlah'),
                    'keterangan' => $this->input->post('keterangan'),
                    'status_barang' => $this->input->post('status_barang'),
                    'id_ruangan' => 3
                );

                $this->Md_r313->add($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" 
                role="alert">Barang Berhasil Ditambahkan!</div>');
                redirect('r313');
            } else {
                $error = $this->upload->display_errors();
                echo $error;
            }
        }
    }
    public function update($id_lab)
    {
        $page_data['data'] = $this->Md_r313->getByLabId($id_lab);

        if (empty($page_data['data'])) {
            // Tangani jika data barang tidak ditemukan
            show_404();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploaded_file = $_FILES['gambar']['name'];

            // Cek apakah file gambar baru diunggah
            if (!empty($uploaded_file)) {
                $config['upload_path'] = './assets/gambar';
                $config['allowed_types'] = 'jpeg|jpg|png|gif';
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    // Jika gambar baru berhasil diunggah, hapus gambar lama (opsional)
                    $gambar_lama = $page_data['makanan']['gambar'];
                    if (!empty($gambar_lama)) {
                        unlink('./assets/gambar/' . $gambar_lama);
                    }

                    $gambar = $this->upload->data('file_name');

                    // Update data barang dengan gambar baru
                    $data_update = array(
                        'gambar' => $gambar,
                        'id_user' => 4,
                        'nama' => $this->input->post('nama'),
                        'no_barang' => $this->input->post('no_barang'),
                        'jumlah' => $this->input->post('jumlah'),
                        'keterangan' => $this->input->post('keterangan'),
                        'status_barang' => $this->input->post('status_barang'),
                        'id_ruangan' => 1
                    );

                    $this->Md_r313->updateByLab($id_lab, $data_update);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    role="alert">Data Berhasil Diperbarui!</div>');
                    redirect('r313');
                } else {
                    $error = $this->upload->display_errors();
                    echo $error;
                }
            } else {
                // Update data barang tanpa perubahan gambar
                $data_update = array(
                    'id_user' => 4,
                    'nama' => $this->input->post('nama'),
                    'no_barang' => $this->input->post('no_barang'),
                    'jumlah' => $this->input->post('jumlah'),
                    'keterangan' => $this->input->post('keterangan'),
                    'status_barang' => $this->input->post('status_barang'),
                    'id_ruangan' => 1
                );

                $this->Md_r313->updateByLab($id_lab, $data_update);

                $this->session->set_flashdata('message', '<div class="alert alert-success" 
                role="alert">Data Berhasil Diperbarui!</div>');
                redirect('r313');
            }
        } else {
            // Tampilkan tampilan form edit dengan data barang
            // $this->load->view('barang/edit', $page_data);
        }
    }
}
