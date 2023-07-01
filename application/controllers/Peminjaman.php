<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Md_Peminjaman');
        $this->load->model('Md_Ruangan');
        $this->load->model('Md_Auth');
    }

    public function index()
    {
        $page_data['page_title'] = "Daftar Peminjaman";
        $page_data['page_judul'] = "Tambah Data Peminjaman";
        $page_data['id_user'] = $this->session->id_user;
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $page_data['nip'] = $this->session->nip;


        $page_data['user'] = $this->Md_Auth->getAll();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();
        $page_data['level'] = $this->Md_Peminjaman->getLevel();

        $this->form_validation->set_rules('nohp', 'Nohp', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam_mulai', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/include_header', $page_data);
            $this->load->view('templates/include_topbar', $page_data);
            $this->load->view('templates/include_sidebar', $page_data);
            $this->load->view('peminjaman/index', $page_data);
            $this->load->view('templates/include_footer');
        } else {
        }
    }

    public function riwayat()
    {
        $page_data['page_title'] = "Riwayat Peminjaman";
        $page_data['page_judul'] = 'Tambah Data Peminjaman';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $page_data['nip'] = $this->session->nip;
        $page_data['level'] = $this->session->level;

        $page_data['peminjaman'] = $this->Md_Peminjaman->getPeminjaman();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('peminjaman/riwayat', $page_data);
        $this->load->view('templates/include_footer');
    }

    public function add()
    {
        $page_data['id_user'] = $this->session->id_user;
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $page_data['nip'] = $this->session->nip;
        $page_data['level'] = $this->session->level;

        $page_data['user'] = $this->Md_Auth->getAll();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();

        $data = array(
            'id_user' => $this->input->post('id_user'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'id_level' => $this->input->post('id_level'),
            'nohp' => $this->input->post('nohp'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'peserta' => $this->input->post('peserta'),
            'status' => 'Pending',
            'approval_ail' => 0,
            'approval_kalab' => 0,
            'approval_kajur' => 0,
            'approval_pudir1' => 0,
        );
        $id_peminjaman = $this->Md_Peminjaman->add($data);
        $id_lab = $this->input->post('id_lab');
        foreach ($id_lab as $data) {
            $dataPeminjaman = array(
                'id_peminjaman' => $id_peminjaman,
                'id_lab' => $data,
            );
            $this->Md_Peminjaman->addPeminjamanLab($dataPeminjaman);
        }

        // Simpan data peminjaman ke tabel peminjaman
        // $this->load->model('Md_Peminjaman');
        // $peminjaman_id = $this->Md_Peminjaman->add($data);

        // Tampilkan pesan sukses dan redirect ke halaman peminjaman
        $this->session->set_flashdata('message', 'Peminjaman berhasil diajukan!');
        redirect('peminjaman');
    }

    public function submitApproval($id_peminjaman, $level_approval)
    {
        $status = 1; // Approval diset menjadi 1
        $status_peminjaman = "Disetujui";
        $status_barang = "Tidak Tersedia";
        $this->load->model('Md_Peminjaman');
        $level = $this->session->userdata('level');
        $peminjaman = $this->Md_Peminjaman->getByPeminjamanId($id_peminjaman);
        // redirect('peminjaman/riwayat');
        // $level = $this->session->level;
        // // Load model dan ambil data peminjaman berdasarkan ID
        // $this->load->model('Md_Peminjaman');

        // // Cek apakah pengguna memiliki hak akses untuk melakukan approval
        if ($level == 'Ail' && $peminjaman['approval_ail'] == 0) {
            // Update status approval AIL menjadi disetujui
            $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
        } elseif ($level == 'Kalab' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 0) {
            // Update status approval KALAB menjadi disetujui
            $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
        } elseif ($level == 'Kajur' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 1 && $peminjaman['approval_kajur'] == 0) {
            // Update status approval KAJUR menjadi disetujui
            $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
        } elseif ($level == 'Pudir1'  && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 1 && $peminjaman['approval_kajur'] == 1 && $peminjaman['approval_pudir1'] == 0) {
            // Update status approval PUDIR1 menjadi disetujui
            $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
            $this->Md_Peminjaman->updateStatus($id_peminjaman, $status_peminjaman, $status_barang);
        } else {
            // Jika tidak memenuhi syarat approval berantai, tampilkan halaman peminjaman
            redirect('peminjaman/riwayat');
        }

        redirect('peminjaman/riwayat');
        // $this->Md_Peminjaman->updateStatus($id_peminjaman, 'Peminjaman Sukses', 'Tidak Tersedia');
        // if ($level_approval == 'ail') {
        //     // Jika AIL sudah melakukan approval, lakukan approval KALAB
        //     $this->Md_Peminjaman->update($id_peminjaman, 'ail', 0);
        // } elseif ($level_approval == 'kalab') {
        //     // Jika KALAB sudah melakukan approval, lakukan approval KAJUR
        //     $this->Md_Peminjaman->update($id_peminjaman, 'kalab', 0);
        // } elseif ($level_approval == 'kajur') {
        //     // Jika KAJUR sudah melakukan approval, lakukan approval PUDIR1
        //     $this->Md_Peminjaman->update($id_peminjaman, 'kajur', 0);
        // } elseif ($level_approval == 'pudir1') {
        //     // Jika PUDIR1 sudah melakukan approval, ubah status peminjaman menjadi "Peminjaman Sukses"
        //     $this->Md_Peminjaman->update($id_peminjaman, 'pudir1', 0);
        // }
        // redirect('peminjaman/riwayat');
    }

    public function getdatauser()
    {
        $id_ruangan = $this->input->post('no_ruangan');
        $page_data = $this->Md_Peminjaman->getdatauser($id_ruangan);
        echo json_encode($page_data);
    }
    public function getdatabarang()
    {
        $id_ruangan = $this->input->post('no_ruangan');
        $page_data = $this->Md_Peminjaman->getdatabarang($id_ruangan);
        echo json_encode($page_data);
    }
}
