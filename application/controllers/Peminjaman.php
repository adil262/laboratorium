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
        $page_data['page_title'] = "Ajukan Peminjaman";
        $page_data['page_judul'] = "Tambah Peminjaman";
        $page_data['id_user'] = $this->session->id_user;
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $page_data['nip'] = $this->session->nip;

        $page_data['user'] = $this->Md_Auth->getAll();
        $page_data['peminjaman1'] = $this->Md_Peminjaman->getByPeminjamanuser();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();
        $page_data['level'] = $this->Md_Peminjaman->getLevel();

        $this->form_validation->set_rules('nohp', 'Nohp', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam_mulai', 'required');

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('peminjaman/index', $page_data);
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
            'id_ail' => $this->input->post('id_ail'),
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
            $data_peminjaman = array(
                'id_peminjaman' => $id_peminjaman,
                'id_lab' => $data,
            );
            $this->Md_Peminjaman->addPeminjamanLab($data_peminjaman);
        }
        $this->session->set_flashdata('message', 'Peminjaman berhasil diajukan!');
        redirect('peminjaman');
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

    // public function riwayat()
    // {
    //     $page_data['page_title'] = "Riwayat Peminjaman";
    //     $page_data['page_judul'] = 'Detail Peminjaman';
    //     $page_data['email'] = $this->session->email;
    //     $page_data['name'] = $this->session->name;
    //     $page_data['nip'] = $this->session->nip;
    //     $page_data['level'] = $this->session->level;

    //     $page_data['peminjaman'] = $this->Md_Peminjaman->getPeminjaman();
    //     $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();

    //     $this->load->view('templates/include_header', $page_data);
    //     $this->load->view('templates/include_topbar', $page_data);
    //     $this->load->view('templates/include_sidebar', $page_data);
    //     $this->load->view('peminjaman/riwayat', $page_data);
    //     $this->load->view('templates/include_footer');
    // }



    // public function submitApproval($id_peminjaman, $level_approval)
    // {
    //     $status = 1; // Approval diset menjadi 1
    //     $status_barang = "Tidak Tersedia";
    //     $this->load->model('Md_Peminjaman');
    //     $level = $this->session->userdata('level');
    //     $peminjaman = $this->Md_Peminjaman->getByPeminjamanId($id_peminjaman);
    //     $peminjaman1 = $this->Md_Peminjaman->updateStatusBarang($id_peminjaman);


    //     // // Cek apakah pengguna memiliki hak akses untuk melakukan approval
    //     if ($peminjaman['id_level'] == 1) {
    //         if ($level == 'Ail' && $peminjaman['approval_ail'] == 0) {
    //             if ($id_peminjaman == $peminjaman['id_ail']) {
    //                 // Update status approval AIL menjadi disetujui
    //                 $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
    //                 $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Ail");
    //             }
    //         }
    //         if ($level == 'Kalab' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 0) {
    //             // Update status approval KALAB menjadi disetujui
    //             $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
    //             $this->Md_Peminjaman->updateStatus($id_peminjaman, "Peminjaman Sukses");
    //             foreach ($peminjaman1 as $data) {
    //                 $this->Md_Peminjaman->updateStatusData($data['id_lab'], $status_barang);
    //             }
    //         }
    //     }
    //     if ($peminjaman['id_level'] == 2) {
    //         if ($level == 'Ail' && $peminjaman['approval_ail'] == 0) {
    //             if ($peminjaman['id_ail'] == $id_peminjaman) {
    //                 // Update status approval AIL menjadi disetujui
    //                 $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
    //                 $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Ail");
    //             }
    //         }
    //         if ($level == 'Kalab' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 0) {
    //             // Update status approval KALAB menjadi disetujui
    //             $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
    //             $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Kalab");
    //         }
    //         if ($level == 'Kajur' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 1 && $peminjaman['approval_kajur'] == 0) {
    //             // Update status approval KAJUR menjadi disetujui
    //             $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
    //             $this->Md_Peminjaman->updateStatus($id_peminjaman, "Peminjaman Sukses");
    //             foreach ($peminjaman1 as $data) {
    //                 $this->Md_Peminjaman->updateStatusData($data['id_lab'], $status_barang);
    //             }
    //         }
    //     }
    //     if ($peminjaman['id_level'] == 3) {
    //         if ($level == 'Ail' && $peminjaman['approval_ail'] == 0) {
    //             // Update status approval AIL menjadi disetujui
    //             if ($peminjaman['id_ail'] == $id_peminjaman) {
    //                 // Update status approval AIL menjadi disetujui
    //                 $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
    //                 $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Ail");
    //             }
    //         }
    //         if ($level == 'Kalab' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 0) {
    //             // Update status approval KALAB menjadi disetujui
    //             $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
    //             $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Kalab");
    //         }
    //         if ($level == 'Kajur' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 1 && $peminjaman['approval_kajur'] == 0) {
    //             // Update status approval KAJUR menjadi disetujui
    //             $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
    //             $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Kajur");
    //         }
    //         if ($level == 'Pudir1'  && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 1 && $peminjaman['approval_kajur'] == 1 && $peminjaman['approval_pudir1'] == 0) {
    //             // Update status approval PUDIR1 menjadi disetujui
    //             $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
    //             $this->Md_Peminjaman->updateStatus($id_peminjaman, "Peminjaman Sukses");
    //             foreach ($peminjaman1 as $data) {
    //                 $this->Md_Peminjaman->updateStatusData($data['id_lab'], $status_barang);
    //             }
    //         }
    //     }

    //     redirect('peminjaman/riwayat');
    // }


}
