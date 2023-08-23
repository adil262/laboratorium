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
                            <button type="button" onclick="tampilkanSelesai()" class="btn btn-inverse-primary btn-fw btn-sm">Selesai</button>
                            <button type="button" onclick="tampilkanDitolak()" class="btn btn-inverse-primary btn-fw btn-sm">Ditolak</button>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($sukses as $s) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $s['name'] ?></td>
                                            <td><?= $s['no_ruangan'] ?></td>
                                            <td><?= $s['keterangan'] ?></td>
                                            <td>
                                                <?php if ($s['status'] == "Peminjaman Sukses") { ?>
                                                    <a href="" class="badge badge-success"><?= $s['status'] ?></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailPeminjaman<?= $s['id_peminjaman']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a>
                                                <!-- <a href="" class="badge badge-warning">Kembalikan</a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= $this->pagination->create_links(); ?>
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
                                    <?php foreach ($proses as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['name'] ?></td>
                                            <td><?= $p['no_ruangan'] ?></td>
                                            <td><?= $p['keterangan'] ?></td>
                                            <td>
                                                <?php if ($p['status'] == "Disetujui Ail") { ?>
                                                    <a href="" class="badge badge-primary"><?= $p['status'] ?></a>
                                                <?php } ?>
                                                <?php if ($p['status'] == "Disetujui Kalab") { ?>
                                                    <a href="" class="badge badge-primary"><?= $p['status'] ?></a>
                                                <?php } ?>
                                                <?php if ($p['status'] == "Disetujui Pembina") { ?>
                                                    <a href="" class="badge badge-primary"><?= $p['status'] ?></a>
                                                <?php } ?>
                                                <?php if ($p['status'] == "Disetujui Kajur") { ?>
                                                    <a href="" class="badge badge-primary"><?= $p['status'] ?></a>
                                                <?php } ?>
                                                <?php if ($p['status'] == "Pending") { ?>
                                                    <a href="" class="badge badge-warning"><?= $p['status'] ?></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailPeminjaman<?= $p['id_peminjaman']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a>

                                                <!-- <a href="" class="badge badge-warning">Kembalikan</a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                        <div class="table-responsive" id="tampilanSelesai">
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
                                    <?php foreach ($selesai as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['name'] ?></td>
                                            <td><?= $p['no_ruangan'] ?></td>
                                            <td><?= $p['keterangan'] ?></td>
                                            <td>
                                                <?php if ($p['status'] == "Peminjaman Selesai") { ?>
                                                    <a href="" class="badge badge-success"><?= $p['status'] ?></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailPeminjaman<?= $p['id_peminjaman']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a>

                                                <!-- <a href="" class="badge badge-warning">Kembalikan</a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                        <div class="table-responsive" id="tampilanDitolak">
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
                                    <?php foreach ($ditolak as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['name'] ?></td>
                                            <td><?= $p['no_ruangan'] ?></td>
                                            <td><?= $p['keterangan'] ?></td>
                                            <td>
                                                <?php if ($p['status'] == "Peminjaman Ditolak") { ?>
                                                    <a href="" class="badge badge-danger"><?= $p['status'] ?></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailPeminjaman<?= $p['id_peminjaman']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a>

                                                <!-- <a href="" class="badge badge-warning">Kembalikan</a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Sukses -->
    <?php foreach ($sukses as $s) { ?>
        <div class="modal fade bd-example-modal-lg" id="detailPeminjaman<?= $s['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPeminjamanLabel" aria-hidden="true">
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
                                    <p><?= $s['name'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">No Hp </p>
                                    <p><?= $s['nohp'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Ruangan </p>
                                    <p>R.<?= $s['no_ruangan'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">Level</p>
                                    <p><?= $s['level_peminjaman'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Mulai </p>
                                    <p><?= $s['tanggal_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Tanggal Selesai</p>
                                    <p><?= $s['tanggal_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Mulai </p>
                                    <p><?= $s['jam_awal'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Jam Selesai</p>
                                    <p><?= $s['jam_akhir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Keterangan </p>
                                    <p><?= $s['keterangan'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Peserta</p>
                                    <p><?= $s['peserta'] ?></p>
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
                                    <p class="badge badge-warning"><?= $s['status'] ?></p>
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
    <!-- Detail Proses -->
    <?php foreach ($proses as $p) { ?>
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
                                    <p><?= $p['level_peminjaman'] ?></p>
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
    <!-- Detail Selesai -->
    <?php foreach ($selesai as $p) { ?>
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
                                    <p><?= $p['level_peminjaman'] ?></p>
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
    <!-- Detail Ditolak -->
    <?php foreach ($ditolak as $p) { ?>
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
                                    <p><?= $p['level_peminjaman'] ?></p>
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
    <!-- /.container-fluid -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lastView = localStorage.getItem("lastView");
            if (lastView === "proses") {
                tampilkanProses();
            }
            if (lastView === "sukses") {
                tampilkanSukses();
            }
            if (lastView === "selesai") {
                tampilkanSelesai();
            }
            if (lastView === "ditolak") {
                tampilkanDitolak();
            }
        });

        function tampilkanSukses() {
            document.getElementById("tampilanSukses").style.display = "block";
            document.getElementById("tampilanProses").style.display = "none";
            document.getElementById("tampilanSelesai").style.display = "none";
            document.getElementById("tampilanDitolak").style.display = "none";
            // Menyimpan status tampilan terakhir ke localStorage
            localStorage.setItem("lastView", "sukses");
        }

        function tampilkanProses() {
            document.getElementById("tampilanSukses").style.display = "none";
            document.getElementById("tampilanProses").style.display = "block";
            document.getElementById("tampilanSelesai").style.display = "none";
            document.getElementById("tampilanDitolak").style.display = "none";
            // Menyimpan status tampilan terakhir ke localStorage
            localStorage.setItem("lastView", "proses");
        }

        function tampilkanSelesai() {
            document.getElementById("tampilanSukses").style.display = "none";
            document.getElementById("tampilanProses").style.display = "none";
            document.getElementById("tampilanSelesai").style.display = "block";
            document.getElementById("tampilanDitolak").style.display = "none";
            // Menyimpan status tampilan terakhir ke localStorage
            localStorage.setItem("lastView", "selesai");
        }

        function tampilkanDitolak() {
            document.getElementById("tampilanSukses").style.display = "none";
            document.getElementById("tampilanProses").style.display = "none";
            document.getElementById("tampilanSelesai").style.display = "none";
            document.getElementById("tampilanDitolak").style.display = "block";
            // Menyimpan status tampilan terakhir ke localStorage
            localStorage.setItem("lastView", "ditolak");
        }
    </script>
    </script>