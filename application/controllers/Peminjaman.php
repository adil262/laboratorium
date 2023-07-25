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
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $page_data['nip'] = $this->session->nip;
        $page_data['level'] = $this->session->level;

        $id_user = $this->session->userdata('id_user');

        if (!$id_user) {
            // Jika tidak ada ID user dalam sesi, mungkin pengguna belum login
            // Lakukan aksi sesuai kebijakan Anda, misalnya arahkan ke halaman login
            // ...
            return;
        }
        $page_data['riwayat_peminjaman'] = $this->Md_Peminjaman->getPeminjamanByUser($id_user);
        $page_data['pengajuan'] = $this->Md_Peminjaman->getByPeminjamanProses();
        $page_data['pengembalian'] = $this->Md_Peminjaman->getByPengembalian();

        $page_data['peminjaman'] = $this->Md_Peminjaman->getByPeminjaman();
        $page_data['user'] = $this->Md_Auth->getAll();
        $page_data['ruangan1'] = $this->Md_Peminjaman->getByPeminjamanUser();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();

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
        $nohp = '085161762468';
        $data = array(
            'id_user' =>  $this->session->id_user,
            'id_ruangan' => $this->input->post('id_ruangan'),
            'id_level' => $this->input->post('id_level'),
            'id_ail' => $this->input->post('id_ail'),
            'nohp' => $nohp,
            'tanggal_awal' => $this->input->post('tanggal_awal'),
            'tanggal_akhir' => $this->input->post('tanggal_akhir'),
            'jam_awal' => $this->input->post('jam_awal'),
            'jam_akhir' => $this->input->post('jam_akhir'),
            'keterangan' => $this->input->post('keterangan'),
            'peserta' => $this->input->post('peserta'),
            'status' => 'Pending',
            'approval_ail' => 0,
            'approval_kalab' => 0,
            'approval_kajur' => 0,
            'approval_pudir1' => 0,
        );
        // var_dump($data);
        // die;
        // Cek apakah ada foto yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $data['gambar'] = $this->upload->data('file_name');
            } else {
                // Foto gagal diunggah, tampilkan pesan error atau lakukan aksi lain
                // ...
            }
        }

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

    public function submitApproval($id_peminjaman, $level_approval)
    {
        $status = 1; // Approval diset menjadi 1
        $status_barang = "Tidak Tersedia";

        $level = $this->session->userdata('level');

        $peminjaman = $this->Md_Peminjaman->getByPeminjamanId($id_peminjaman);
        $barang = $this->Md_Peminjaman->updateStatusBarang($id_peminjaman);
        // $peminjaman1 = $this->Md_Peminjaman->updateStatusBarang($id_peminjaman);

        // // Cek apakah pengguna memiliki hak akses untuk melakukan approval
        if ($peminjaman['id_level'] == 1) {
            if ($level == 'Ail' && $peminjaman['approval_ail'] == 0) {
                // Update status approval AIL menjadi disetujui
                $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
                $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Ail");
            }
            if ($level == 'Kalab' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 0) {
                // Update status approval KALAB menjadi disetujui
                $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
                $this->Md_Peminjaman->updateStatus($id_peminjaman, "Peminjaman Sukses");
                $this->Md_Peminjaman->updateAktif($id_peminjaman, 1);
                foreach ($barang as $data) {
                    $this->Md_Peminjaman->updateStatusData($data['id_lab'], $status_barang);
                }
            }
        }
        if ($peminjaman['id_level'] == 2) {
            if ($level == 'Ail' && $peminjaman['approval_ail'] == 0) {
                // Update status approval AIL menjadi disetujui
                $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
                $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Ail");
            }
            if ($level == 'Kalab' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 0) {
                // Update status approval KALAB menjadi disetujui
                $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
                $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Kalab");
            }
            if ($level == 'Kajur' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 1 && $peminjaman['approval_kajur'] == 0) {
                // Update status approval KAJUR menjadi disetujui
                $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
                $this->Md_Peminjaman->updateStatus($id_peminjaman, "Peminjaman Sukses");
                $this->Md_Peminjaman->updateAktif($id_peminjaman, 1);
                foreach ($barang as $data) {
                    $this->Md_Peminjaman->updateStatusData($data['id_lab'], $status_barang);
                }
            }
        }
        if ($peminjaman['id_level'] == 3) {
            if ($level == 'Ail' && $peminjaman['approval_ail'] == 0) {
                // Update status approval AIL menjadi disetujui
                $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
                $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Ail");
            }
            if ($level == 'Kalab' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 0) {
                // Update status approval KALAB menjadi disetujui
                $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
                $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Kalab");
            }
            if ($level == 'Kajur' && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 1 && $peminjaman['approval_kajur'] == 0) {
                // Update status approval KAJUR menjadi disetujui
                $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
                $this->Md_Peminjaman->updateStatus($id_peminjaman, "Disetujui Kajur");
            }
            if ($level == 'Pudir1'  && $peminjaman['approval_ail'] == 1 && $peminjaman['approval_kalab'] == 1 && $peminjaman['approval_kajur'] == 1 && $peminjaman['approval_pudir1'] == 0) {
                // Update status approval PUDIR1 menjadi disetujui
                $this->Md_Peminjaman->update($id_peminjaman, $level_approval, $status);
                $this->Md_Peminjaman->updateStatus($id_peminjaman, "Peminjaman Sukses");
                $this->Md_Peminjaman->updateAktif($id_peminjaman, 1);
                foreach ($barang as $data) {
                    $this->Md_Peminjaman->updateStatusData($data['id_lab'], $status_barang);
                }
            }
        }
        redirect('riwayat/index');
    }

    public function proses_pengembalian()
    {
        // Lakukan validasi data pengembalian barang, seperti ID peminjaman
        // ...
        $id_peminjaman = $this->input->post('id_peminjaman');

        // Panggil fungsi di model untuk memproses pengembalian barang
        $this->Md_Peminjaman->pengembalian_barang($id_peminjaman);
        $this->Md_Peminjaman->updateAktif($id_peminjaman, 2);
        redirect('peminjaman');

        // Tampilkan pesan sukses atau lakukan aksi lain setelah pengembalian berhasil
        // ...
    }

    public function konfirmasipengembalian($id_peminjaman)
    {
        $peminjaman = $this->Md_Peminjaman->getByPeminjamanId($id_peminjaman);
        $barang = $this->Md_Peminjaman->updateStatusBarang($id_peminjaman);

        if ($peminjaman['status_peminjaman'] == 2) {
            $this->Md_Peminjaman->updateAktif($id_peminjaman, 3);
            $this->Md_Peminjaman->updateStatus($id_peminjaman, "Peminjaman Selesai");
            foreach ($barang as $data) {
                $this->Md_Peminjaman->updateStatusData($data['id_lab'], "Tersedia");
            }
        }
        redirect('peminjaman');
    }

    public function ditolak($id_peminjaman)
    {
        $this->Md_Peminjaman->updateAktif($id_peminjaman, 4);
        $this->Md_Peminjaman->updateStatus($id_peminjaman, "Peminjaman Ditolak");
        redirect('peminjaman');
    }

    public function batalpinjam($id_peminjaman)
    {
        $batalpinjam = $this->Md_Peminjaman->deletedata('peminjaman', array('id_peminjaman' => $id_peminjaman));
        if ($batalpinjam) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i> Dibatalkan!</h5></div>');
            redirect('peminjaman');
        }
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
