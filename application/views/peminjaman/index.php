<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold"><?= $page_title; ?></h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0"><?= $page_title; ?></p>
                        <button type="button" id="tambah" style="float: right;" class="btn btn-warning btn-sm tambah">Pinjam</button>
                        <div class="template-demo">
                            <button type="button" onclick="tampilkanPeminjaman()" class="btn btn-inverse-primary btn-fw btn-sm">Peminjaman</button>
                            <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                <button type="button" onclick="tampilkanPengajuan()" class="btn btn-inverse-primary btn-fw btn-sm">Pengajuan</button>
                            <?php } ?>
                            <?php if ($this->session->userdata('level') == 'Ail') { ?>
                                <button type="button" onclick="tampilkanPengembalian()" class="btn btn-inverse-primary btn-fw btn-sm">Pengembalian</button>
                            <?php } ?>
                        </div>
                        <div class="table-responsive" id="tampilanPeminjaman">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($riwayat_peminjaman as $b) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $b['name'] ?></td>
                                            <td>R.<?= $b['no_ruangan'] ?></td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailPeminjaman<?= $b['id_peminjaman']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a>
                                                <?php if ($b['status'] == "Peminjaman Sukses") : ?>
                                                    <form method="post" action="<?php echo base_url('peminjaman/proses_pengembalian'); ?>">
                                                        <input type="hidden" name="id_peminjaman" value="<?= $b['id_peminjaman']; ?>">
                                                        <button class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline" type="submit">Kembalikan</button>
                                                    </form>
                                                <?php endif; ?>
                                                <?php if ($b['status'] == "Pending") : ?>
                                                    <a href="<?php echo site_url('peminjaman/batalpinjam/' . $b['id_peminjaman']); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive" id="tampilanPengajuan">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pengajuan as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['name'] ?></td>
                                            <td>R.<?= $p['no_ruangan'] ?></td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailPeminjaman<?= $p['id_peminjaman']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a>

                                                <?php if ($p['id_level'] == 1) : ?>
                                                    <?php if ($level == 'Ail' && $p['approval_ail'] == 0) : ?>
                                                        <a href="<?php echo site_url('peminjaman/submitApproval/' . $p['id_peminjaman'] . '/approval_ail'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('peminjaman/ditolak/' . $p['id_peminjaman']); ?>" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kalab' && $p['approval_kalab'] == 0) : ?>
                                                        <a href="<?php echo site_url('peminjaman/submitApproval/' . $p['id_peminjaman'] . '/approval_kalab'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('peminjaman/ditolak/' . $p['id_peminjaman']); ?>" class=" btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if ($p['id_level'] == 2) : ?>
                                                    <?php if ($level == 'Ail' && $p['approval_ail'] == 0) : ?>
                                                        <a href="<?php echo site_url('peminjaman/submitApproval/' . $p['id_peminjaman'] . '/approval_ail'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('peminjaman/ditolak/' . $p['id_peminjaman']); ?>" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kalab' && $p['approval_kalab'] == 0) : ?>
                                                        <a href="<?php echo site_url('peminjaman/submitApproval/' . $p['id_peminjaman'] . '/approval_kalab'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('peminjaman/ditolak/' . $p['id_peminjaman']); ?>" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kajur' && $p['approval_kajur'] == 0) : ?>
                                                        <a href="<?php echo site_url('peminjaman/submitApproval/' . $p['id_peminjaman'] . '/approval_kajur'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('peminjaman/ditolak/' . $p['id_peminjaman']); ?>" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if ($p['id_level'] == 3) : ?>
                                                    <?php if ($level == 'Ail' && $p['approval_ail'] == 0) : ?>
                                                        <a href="<?php echo site_url('peminjaman/submitApproval/' . $p['id_peminjaman'] . '/approval_ail'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('peminjaman/ditolak/' . $p['id_peminjaman']); ?>" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kalab' && $p['approval_kalab'] == 0) : ?>
                                                        <a href="<?php echo site_url('peminjaman/submitApproval/' . $p['id_peminjaman'] . '/approval_kalab'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('peminjaman/ditolak/' . $p['id_peminjaman']); ?>" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kajur' && $p['approval_kajur'] == 0) : ?>
                                                        <a href="<?php echo site_url('peminjaman/submitApproval/' . $p['id_peminjaman'] . '/approval_kajur'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('peminjaman/ditolak/' . $p['id_peminjaman']); ?>" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Pudir1' && $p['approval_pudir1'] == 0) : ?>
                                                        <a href="<?php echo site_url('peminjaman/submitApproval/' . $p['id_peminjaman'] . '/approval_pudir1'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('peminjaman/ditolak/' . $p['id_peminjaman']); ?>" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive" id="tampilanPengembalian">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pengembalian as $b) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $b['name'] ?></td>
                                            <td>R.<?= $b['no_ruangan'] ?></td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailPeminjaman<?= $b['id_peminjaman']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a>
                                                <?php if ($level == 'Ail' && $b['status_peminjaman'] == 2) : ?>
                                                    <a href="<?php echo site_url('peminjaman/konfirmasipengembalian/' . $b['id_peminjaman']); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline">Konfirmasi</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="formTambah" style="display:none;" class="col-md-5 stretch-card" aria-hidden="true">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $page_judul; ?></h4>
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('Peminjaman/add') ?>" method="post">
                            <input type="hidden" id="id_user" name="id_user" value="<?php $id_user; ?>">
                            <div class="form-group">
                                <label for="nama" class="col-sm-5">Nama</label>
                                <div class="col-sm">
                                    <input type="text" readonly class="form-control" name="name" id="name" value="<?php if (isset($name)) {
                                                                                                                        echo $name;
                                                                                                                    } ?>" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nip" class="col-sm-5">NIM/NIP</label>
                                <div class="col-sm">
                                    <input type="text" readonly class="form-control" name="nip" id="nip" value="<?php if (isset($nip)) {
                                                                                                                    echo $nip;
                                                                                                                } ?>" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nohp" class="col-sm-5">No Hp</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="nohp" id="nohp" placeholder="08xxxxxxxxxx">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kegiatan" class="col-sm-5">Kegiatan</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Kegiatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="level" class="col-sm-5">Level</label>
                                <div class="col-sm">
                                    <select class="form-control" name="id_level" id="id_level" placeholder="Level" onchange="loadJamOptions()">
                                        <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                                            <?php foreach ($level as $l) : ?>
                                                <option value="<?= $l['id_level']; ?>">Level <?= $l['id_level']; ?></option>
                                            <?php endforeach; ?>
                                        <?php } ?>
                                        <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                            <option value="1">Level 1</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="waktu" class="col-sm-5">Waktu Pelaksanaan</label>
                                <div class="col-sm">
                                    <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                        <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" placeholder="Tanggal Mulai" value="<?php echo date('Y-m-d', time()); ?>">
                                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" placeholder="Tanggal Selesai" value="<?php echo date('Y-m-d', time()); ?>">
                                        <input type="time" class="form-control" name="jam_awal" id="jam_awal" placeholder="Mulai" value="<?php echo date('H:i') ?>">
                                        <input type="time" class="form-control" name="jam_akhir" id="jam_akhir" placeholder="Selesai" value="<?php $time = new DateTime(date('H:i'));
                                                                                                                                                $time->modify('+2 hours');
                                                                                                                                                echo $time->format('H:i'); ?>">
                                    <?php } ?>
                                    <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                                        <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" placeholder="Tanggal Mulai" value="<?php $time = new DateTime(date('Y-m-d', time()));
                                                                                                                                                            $time->modify('+3 days');
                                                                                                                                                            echo $time->format('Y-m-d'); ?>">
                                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" placeholder="Tanggal Mulai" value="<?php $time = new DateTime(date('Y-m-d', time()));
                                                                                                                                                            $time->modify('+3 days');
                                                                                                                                                            echo $time->format('Y-m-d'); ?>">
                                        <input type="time" class="form-control" name="jam_awal" id="jam_awal" placeholder="Mulai" value="<?php echo date('H:i') ?>">
                                        <input type="time" class="form-control" name="jam_akhir" id="jam_akhir" placeholder="Selesai" value="<?php $time = new DateTime(date('H:i'));
                                                                                                                                                $time->modify('+2 hours');
                                                                                                                                                echo $time->format('H:i'); ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ruangan" class="col-sm-5">Ruangan</label>
                                <div class="col-sm">
                                    <select id="id_ruangan" name="id_ruangan" class="form-control" placeholder="Ruangan">
                                        <option value="">Pilih Ruangan</option>
                                        <?php foreach ($ruangan as $r) : ?>
                                            <option value="<?= $r['id_ruangan']; ?>">R.<?= $r['no_ruangan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="barang" class="col-sm-5">Barang</label>
                                <div class="col-sm">
                                    <select id="id_lab" name="id_lab[]" class="js-example-basic-multiple w-100" multiple>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Peserta" class="col-sm-5">Peserta</label>
                                <div class="col-sm">
                                    <textarea class="form-control" id="peserta" name="peserta" rows="4" name="peserta"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ail" class="col-sm-5">Asisten Instruktur</label>
                                <div class="col-sm">
                                    <select id="id_ail" name="id_ail" class="form-control" placeholder="Asisten Laboratorium">

                                    </select>
                                </div>
                            </div>
                            <?php
                            // Filter data $user berdasarkan level "Kepala Laboratorium"
                            $filteredKalab = array_filter($user, function ($u) {
                                return $u['level'] == "Kalab";
                            });
                            ?>
                            <div class="form-group">
                                <label for="kalab" class="col-sm-5">Kepala Laboratorium</label>
                                <div class="col-sm">
                                    <select id="name" name="name" class="form-control" placeholder="Kepala Laboratorium">
                                        <?php foreach ($filteredKalab as $u) : ?>
                                            <option value="<?php echo $u['name']; ?>"><?php echo $u['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                                <div class="form-group">
                                    <label for="pembina" class="col-sm-5">Pembina</label>
                                    <div class="col-sm">
                                        <select id="name" name="name" class="form-control" placeholder="Kepala Laboratorium">

                                            <option value=""></option>

                                        </select>
                                        <input type="file" name="img[]" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            // Filter data $user berdasarkan level "Ketua Jurusan"
                            $filteredKajur = array_filter($user, function ($u) {
                                return $u['level'] == "Kajur";
                            });
                            ?>
                            <div class="form-group">
                                <label for="kajur" class="col-sm-5">Ketua Jurusan</label>
                                <div class="col-sm">
                                    <select id="name" name="name" class="form-control" placeholder="Kepala Laboratorium">
                                        <?php foreach ($filteredKajur as $u) : ?>
                                            <option value="<?php echo $u['name']; ?>"><?php echo $u['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <?php
                            // Filter data $user berdasarkan level "Pembantu Direktur 1"
                            $filteredPudir = array_filter($user, function ($u) {
                                return $u['level'] == "Pudir1";
                            });
                            ?>
                            <div class="form-group">
                                <label for="pudir" class="col-sm-5">Pembantu Direktur 1</label>
                                <div class="col-sm">
                                    <select id="name" name="name" class="form-control" placeholder="Kepala Laboratorium">
                                        <?php foreach ($filteredPudir as $u) : ?>
                                            <option value="<?php echo $u['name']; ?>"><?php echo $u['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Pinjam</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Detail Peminjaman User -->
    <?php foreach ($riwayat_peminjaman as $b) { ?>
        <div class="modal fade bd-example-modal-lg" id="detailPeminjaman<?= $b['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPeminjamanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailPeminjamanLabel"><?= $page_judul; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Nama </p>
                                    <p><?= $b['name'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">No Hp </p>
                                    <p><?= $b['nohp'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Ruangan </p>
                                    <p>R.<?= $b['no_ruangan'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">Level</p>
                                    <p><?= $b['id_level'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Mulai </p>
                                    <p><?= $b['tanggal_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Selesai</p>
                                    <p><?= $b['tanggal_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Mulai </p>
                                    <p><?= $b['jam_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Selesai</p>
                                    <p><?= $b['jam_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Keterangan </p>
                                    <p><?= $b['keterangan'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Peserta</p>
                                    <p><?= $b['peserta'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <p class="text-success">Barang </p>
                                    <p></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Status </p>
                                    <p class="badge badge-warning"><?= $b['status'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Detail Peminjaman Pengajuan -->
    <?php foreach ($pengajuan as $p) { ?>
        <div class="modal fade bd-example-modal-lg" id="detailPeminjaman<?= $p['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPeminjamanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailPeminjamanLabel"><?= $page_judul; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Nama </p>
                                    <p><?= $p['name'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">No Hp </p>
                                    <p><?= $p['nohp'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Ruangan </p>
                                    <p>R.<?= $p['no_ruangan'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">Level</p>
                                    <p><?= $p['id_level'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Mulai </p>
                                    <p><?= $p['tanggal_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Selesai</p>
                                    <p><?= $p['tanggal_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Mulai </p>
                                    <p><?= $p['jam_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Selesai</p>
                                    <p><?= $p['jam_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Keterangan </p>
                                    <p><?= $p['keterangan'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Peserta</p>
                                    <p><?= $p['peserta'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <p class="text-success">Barang </p>
                                    <p></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Status </p>
                                    <p class="badge badge-warning"><?= $p['status'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Detail Peminjaman Pengembalian -->
    <?php foreach ($pengembalian as $b) { ?>
        <div class="modal fade bd-example-modal-lg" id="detailPeminjaman<?= $b['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPeminjamanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailPeminjamanLabel"><?= $page_judul; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Nama </p>
                                    <p><?= $b['name'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">No Hp </p>
                                    <p><?= $b['nohp'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Ruangan </p>
                                    <p>R.<?= $b['no_ruangan'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">Level</p>
                                    <p><?= $b['id_level'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Mulai </p>
                                    <p><?= $b['tanggal_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Selesai</p>
                                    <p><?= $b['tanggal_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Mulai </p>
                                    <p><?= $b['jam_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Selesai</p>
                                    <p><?= $b['jam_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Keterangan </p>
                                    <p><?= $b['keterangan'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Peserta</p>
                                    <p><?= $b['peserta'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <p class="text-success">Barang </p>
                                    <p></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Status </p>
                                    <p class="badge badge-warning"><?= $b['status'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- content-wrapper ends -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lastView = localStorage.getItem("lastView");
            if (lastView == "peminjaman") {
                tampilkanPeminjaman();
            }
            if (lastView == "pengajuan") {
                tampilkanPengajuan();
            }
            if (lastView == "pengembalian") {
                tampilkanPengembalian();
            }
        });

        function tampilkanPeminjaman() {
            document.getElementById("tampilanPeminjaman").style.display = "block";
            document.getElementById("tampilanPengajuan").style.display = "none";
            document.getElementById("tampilanPengembalian").style.display = "none";
            // Menyimpan status tampilan terakhir ke localStorage
            localStorage.setItem("lastView", "peminjaman");
        }

        function tampilkanPengajuan() {
            document.getElementById("tampilanPeminjaman").style.display = "none";
            document.getElementById("tampilanPengajuan").style.display = "block";
            document.getElementById("tampilanPengembalian").style.display = "none";
            // Menyimpan status tampilan terakhir ke localStorage
            localStorage.setItem("lastView", "pengajuan");
        }

        function tampilkanPengembalian() {
            document.getElementById("tampilanPeminjaman").style.display = "none";
            document.getElementById("tampilanPengajuan").style.display = "none";
            document.getElementById("tampilanPengembalian").style.display = "block";
            // Menyimpan status tampilan terakhir ke localStorage
            localStorage.setItem("lastView", "pengembalian");
        }

        var tambah = document.getElementsByClassName('tambah');

        for (var i = 0; i < tambah.length; i++) {
            tambah[i].addEventListener('click', function(event) {
                event.preventDefault();
                var formTambah = document.getElementById('formTambah');

                $(document).ready(function() {
                    loadbarang();
                    loadail();

                });

                function loadbarang() {
                    $("#id_ruangan").change(function() {
                        var getruangan = $("#id_ruangan").val();

                        $.ajax({
                            type: "POST",
                            dataType: "JSON",
                            url: "<?= base_url(); ?>Peminjaman/getdatabarang",
                            data: {
                                no_ruangan: getruangan,
                            },
                            success: function(data) {

                                console.log(data);
                                var html = '';
                                var i;
                                for (i = 0; i < data.length; i++) {
                                    html += '<option value="' + data[i].id_lab + '">' + data[i].no_barang + '</option>';

                                }
                                $("#id_lab").html(html);
                                $("#id_lab").show();
                            }
                        });
                    });
                }

                function loadail() {
                    $("#id_ruangan").change(function() {
                        var getruangan = $("#id_ruangan").val();

                        $.ajax({
                            type: "POST",
                            dataType: "JSON",
                            url: "<?= base_url(); ?>Peminjaman/getdatauser",
                            data: {
                                no_ruangan: getruangan
                            },
                            success: function(data) {
                                console.log(data);

                                var html = '';
                                var j;
                                for (j = 0; j < data.length; j++) {
                                    html += '<option value = "' + data[j].id_ail + '" >' + data[j].name + ' </option>';

                                }
                                $("#id_ail").html(html);
                                $("#id_ail").show();

                            }
                        });
                    });
                }

                if (formTambah.style.display === 'none') {
                    formTambah.style.display = 'block';
                } else {
                    formTambah.style.display = 'none';
                }
            });
        }
    </script>