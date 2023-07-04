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
                        <?php if ($this->session->userdata('level') == 'Kajur') { ?>
                            <button type="button" id="tambah" style="float: right;" class="btn btn-warning btn-sm tambah">Tambah</button>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>No Barang</th>
                                        <th>Status</th>
                                        <?php if ($this->session->userdata('level') == 'Kajur') { ?>
                                            <th>Aksi</th>
                                        <?php } ?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($lab_pemrograman as $lab) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $lab['nama'] ?></td>
                                            <td><?= $lab['no_barang'] ?></td>
                                            <td><?= $lab['status_barang'] ?></td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#detailLab<?= $lab['id_lab']; ?>" class="badge badge-info">Detail</a>
                                                <?php if ($this->session->userdata('level') == 'Kajur') { ?>
                                                    <a href="" class="badge badge-success">Edit</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="formTambah" style="display:none;" class="col-md-4 stretch-card" aria-hidden="true">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $page_judul; ?></h4>
                        <form action="<?= base_url('lab_pemrograman') ?>" method="post">
                            <div class="form-group">
                                <label for="nama" class="col-sm-5">Nama Barang</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama Barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_barang" class="col-sm-5">No Barang</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control form-control-user" name="no_barang" id="no_barang" placeholder="No Barang">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jumlah" class="col-sm-5">Jumlah</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control form-control-user" name="jumlah" id="jumlah" placeholder="Jumlah">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan" class="col-sm-5">Keterangan</label>
                                <div class="col-sm">
                                    <select type="text" class="form-control form-control-user" name="keterangan" id="keterangan" placeholder="Keterangan">
                                        <option value="Bagus">Bagus</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status_barang" class="col-sm-5">Status Barang</label>
                                <div class="col-sm">
                                    <select class="form-control" name="status_barang" id="status_barang" placeholder="Status">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    <!-- Modal -->
    <?php foreach ($lab_pemrograman as $lab) { ?>
        <div class="modal fade bd-example-modal-lg" id="detailLab<?= $lab['id_lab']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailLabLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailLabLabel"><?= $page_detail; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Nama </p>
                                    <p><?= $lab['nama'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">Nomor Barang </p>
                                    <p><?= $lab['no_barang'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Gambar </p>
                                    <p><?= $lab['gambar'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-success">Jumlah</p>
                                    <p><?= $lab['jumlah'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Keterangan</p>
                                    <p><?= $lab['keterangan'] ?></p>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p class="text-success">Ruangan</p>
                                    <p><?= $lab['nama_ruangan'] ?> - R.<?= $lab['no_ruangan'] ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <p class="text-success">Status Barang</p>
                                    <p class="badge badge-warning"><?= $lab['status_barang'] ?></p>
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

    <script>
        var tambah = document.getElementsByClassName('tambah');

        for (var i = 0; i < tambah.length; i++) {
            tambah[i].addEventListener('click', function(event) {
                event.preventDefault();
                var formTambah = document.getElementById('formTambah');

                if (formTambah.style.display === 'none') {
                    formTambah.style.display = 'block';
                } else {
                    formTambah.style.display = 'none';
                }
            });
        }
    </script>