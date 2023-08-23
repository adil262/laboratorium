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
            <div class="col-md-8 grid-margin">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0"><?= $page_title; ?></p>
                        <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                            <button type="button" id="tambah" style="float: right;" class="btn btn-warning btn-sm tambah">Tambah</button>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Barang</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $b) : ?>
                                        <tr>
                                            <td><?= ++$start ?></td>
                                            <td><?= $b['nama'] ?></td>
                                            <td><?= $b['no_barang'] ?></td>
                                            <td><?= $b['keterangan'] ?></td>
                                            <td><?php if ($b['status_barang'] == "Tersedia") { ?>
                                                    <a href="" class="badge badge-success"><?= $b['status_barang'] ?></a>
                                                <?php } ?>
                                                <?php if ($b['status_barang'] == "Booking") { ?>
                                                    <a href="" class="badge badge-warning"><?= $b['status_barang'] ?></a>
                                                <?php } ?>
                                                <?php if ($b['status_barang'] == "Tidak Tersedia") { ?>
                                                    <a href="" class="badge badge-danger"><?= $b['status_barang'] ?></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <abbr title="detail"><a href="" data-toggle="modal" data-target="#detail<?= $b['id_lab']; ?>" class="btn btn-inverse-info btn-sm mdi mdi-information-variant"></a></abbr>
                                                <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                                    <abbr title="edit"><a href="" class="btn btn-inverse-warning btn-sm mdi mdi-border-color" data-toggle="modal" data-target="#edit<?= $b['id_lab']; ?>"></a></abbr>
                                                <?php } ?>
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
            <div id="formTambah" style="display:none;" class="col-md-4 stretch-card" aria-hidden="true">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $page_tambah; ?></h4>
                        <form action="<?= base_url('R324/tambah') ?>" method="post">
                            <div class="form-group">
                                <label for="nama" class="col-sm-5">Nama Barang</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nobarang" class="col-sm-5">No Barang</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="no_barang" id="no_barang" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="col-sm-5">Jumlah</label>
                                <div class="col-sm">
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-sm-9">Keterangan</label>
                                <div class="col-sm">
                                    <select id="keterangan" name="keterangan" class="form-control" placeholder="Ail">
                                        <option value="Aset">Aset</option>
                                        <option value="Non Aset">Non Aset</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kalab" class="col-sm-9">Status Barang</label>
                                <div class="col-sm">
                                    <select id="status_barang" name="status_barang" class="form-control" placeholder="Kalab">
                                        <option value="Tersedia">Tersedia</option>
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
    <?php foreach ($data as $m) { ?>
        <div class="modal fade bd-example-modal-lg" id="edit<?= $m['id_lab']; ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel"><?= $page_edit; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('R324/update/' . $m['id_lab']); ?>" method="post" enctype="multipart/form-data" role="form">
                        <hr>
                        <div class="form-group">
                            <label for="nama" class="col-sm-5">Nama</label>
                            <div class="col-sm">
                                <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama" value="<?= $m['nama'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stok" class="col-sm-5">No Barang</label>
                            <div class="col-sm">
                                <input type="text" class="form-control form-control-user" name="no_barang" id="no_barang" placeholder="no_barang" value="<?= $m['no_barang'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="col-sm-5">Jumlah</label>
                            <div class="col-sm">
                                <input type="number" class="form-control form-control-user" name="jumlah" id="jumlah" placeholder="jumlah" value="<?= $m['jumlah'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stok" class="col-sm-5">Keterangan</label>
                            <div class="col-sm">
                                <input type="text" class="form-control form-control-user" name="keterangan" id="keterangan" placeholder="keterangan" value="<?= $m['keterangan'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stok" class="col-sm-5">Status Barang</label>
                            <div class="col-sm">
                                <input type="text" class="form-control form-control-user" name="status_barang" id="status_barang" placeholder="status_barang" value="<?= $m['status_barang'] ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- content-wrapper ends -->
    <?php foreach ($data as $lab) { ?>
        <div class="modal fade bd-example-modal-lg" id="detail<?= $lab['id_lab']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailLabLabel" aria-hidden="true">
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
                                    <p class="text-success">Ruangan</p>
                                    <p><?= $lab['nama_ruangan'] ?> - R.<?= $lab['no_ruangan'] ?></p>
                                </div>
                                <div class=" col-sm-6">
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