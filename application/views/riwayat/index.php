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
        <?= form_error('Riwayat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0"><?= $page_title; ?></p>
                        <div class="template-demo">
                            <button type="button" onclick="tampilkanSukses()" class="btn btn-inverse-primary btn-fw btn-sm">Sukses</button>
                            <button type="button" onclick="tampilkanProses()" class="btn btn-inverse-primary btn-fw btn-sm">Proses</button>
                        </div>
                        <div class="table-responsive" id="tampilanSukses">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Ruangan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                            <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($sukses as $pinjam) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pinjam['name'] ?></td>
                                            <td><?= $pinjam['no_ruangan'] ?></td>
                                            <td><?= $pinjam['keterangan'] ?></td>
                                            <td>
                                                <a href="" class="badge badge-warning"><?= $pinjam['status'] ?></a>
                                            </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailPeminjaman<?= $pinjam['id_peminjaman']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a>
                                                <!-- <a href="" class="badge badge-warning">Kembalikan</a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive" id="tampilanProses">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Ruangan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($proses as $pinjam) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pinjam['name'] ?></td>
                                            <td><?= $pinjam['no_ruangan'] ?></td>
                                            <td><?= $pinjam['keterangan'] ?></td>
                                            <td>
                                                <a href="" class="badge badge-warning"><?= $pinjam['status'] ?></a>
                                            </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailPeminjaman<?= $pinjam['id_peminjaman']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a>

                                                <?php if ($pinjam['id_level'] == 1) : ?>
                                                    <?php if ($level == 'Ail' && $pinjam['approval_ail'] == 0) : ?>
                                                        <a href="<?php echo site_url('riwayat/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_ail'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('riwayat/disaccrequest/' . $pinjam['id_peminjaman']); ?>" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kalab' && $pinjam['approval_kalab'] == 0) : ?>
                                                        <a href="<?php echo site_url('riwayat/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_kalab'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="<?php echo base_url('riwayat/disaccrequest/' . $pinjam['id_peminjaman']); ?>" class=" btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if ($pinjam['id_level'] == 2) : ?>
                                                    <?php if ($level == 'Ail' && $pinjam['approval_ail'] == 0) : ?>
                                                        <a href="<?php echo site_url('riwayat/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_ail'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kalab' && $pinjam['approval_kalab'] == 0) : ?>
                                                        <a href="<?php echo site_url('riwayat/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_kalab'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kajur' && $pinjam['approval_kajur'] == 0) : ?>
                                                        <a href="<?php echo site_url('riwayat/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_kajur'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if ($pinjam['id_level'] == 3) : ?>
                                                    <?php if ($level == 'Ail' && $pinjam['approval_ail'] == 0) : ?>
                                                        <a href="<?php echo site_url('riwayat/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_ail'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kalab' && $pinjam['approval_kalab'] == 0) : ?>
                                                        <a href="<?php echo site_url('riwayat/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_kalab'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Kajur' && $pinjam['approval_kajur'] == 0) : ?>
                                                        <a href="<?php echo site_url('riwayat/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_kajur'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                    <?php if ($level == 'Pudir1' && $pinjam['approval_pudir1'] == 0) : ?>
                                                        <a href="<?php echo site_url('riwayat/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_pudir1'); ?>" class="btn btn-inverse-success btn-sm mdi mdi-checkbox-marked-circle-outline"></a>
                                                        <a href="" class="btn btn-inverse-danger btn-sm mdi mdi-close-circle-outline"></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <!-- <a href="" class="badge badge-warning">Kembalikan</a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <?php foreach ($peminjaman as $pinjam) { ?>
        <div class="modal fade bd-example-modal-lg" id="detailPeminjaman<?= $pinjam['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPeminjamanLabel" aria-hidden="true">
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
                                    <p><?= $pinjam['name'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">No Hp </p>
                                    <p><?= $pinjam['nohp'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Ruangan </p>
                                    <p>R.<?= $pinjam['no_ruangan'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">Level</p>
                                    <p><?= $pinjam['id_level'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Mulai </p>
                                    <p><?= $pinjam['tanggal_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Selesai</p>
                                    <p><?= $pinjam['tanggal_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Mulai </p>
                                    <p><?= $pinjam['jam_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Selesai</p>
                                    <p><?= $pinjam['jam_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Keterangan </p>
                                    <p><?= $pinjam['keterangan'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Peserta</p>
                                    <p><?= $pinjam['peserta'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <p class="text-success">Barang </p>
                                    <p><?= $pinjam['no_barang'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Status </p>
                                    <p class="badge badge-warning"><?= $pinjam['status'] ?></p>
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
    <!-- /.container-fluid -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lastView = localStorage.getItem("lastView");
            if (lastView === "proses") {
                tampilkanProses();
            } else {
                tampilkanSukses();
            }
        });

        function tampilkanSukses() {
            document.getElementById("tampilanSukses").style.display = "block";
            document.getElementById("tampilanProses").style.display = "none";
            // Menyimpan status tampilan terakhir ke localStorage
            localStorage.setItem("lastView", "sukses");
        }

        function tampilkanProses() {
            document.getElementById("tampilanSukses").style.display = "none";
            document.getElementById("tampilanProses").style.display = "block";
            // Menyimpan status tampilan terakhir ke localStorage
            localStorage.setItem("lastView", "proses");
        }
    </script>
    </script>