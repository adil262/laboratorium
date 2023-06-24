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
        <?= form_error('lab_pemrograman', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <div class="row">
            <div class="col-md-14 grid-margin stretch-card">
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title align-items-start flex-column"><?= $page_title; ?></p>
                    <div class="card-toolbar">
                        <?php if ($this->session->userdata('level') == 'Kajur') { ?>
                            <a href="" style="float: right;" class="badge badge-warning" data-toggle="modal" data-target="#newBarang">Tambah</a>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>No Barang</th>
                                        <th>Gambar</th>
                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Status</th>
                                        <?php if ($this->session->userdata('level') == 'Kajur') { ?>
                                            <th>Aksi</th>
                                        <?php } ?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($lab_database as $lab) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $lab['nama'] ?></td>
                                            <td><?= $lab['no_barang'] ?></td>
                                            <td><?= $lab['gambar'] ?></td>
                                            <td><?= $lab['jumlah'] ?></td>
                                            <td><?= $lab['keterangan'] ?></td>
                                            <td><?= $lab['status_barang'] ?></td>
                                            <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                                <td>
                                                    <a href="" class="badge badge-success">Edit</a>
                                                    <a href="" class="badge badge-danger">Hapus</a>
                                                </td>
                                            <?php } ?>
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
    <!-- content-wrapper ends -->
    <!-- Modal -->
    <div class="modal fade" id="newBarang" tabindex="-1" role="dialog" aria-labelledby="newBarangLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newBarangLabel"><?= $page_judul; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('lab_pemrograman') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama Barang">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="no_barang" id="no_barang" placeholder="No Barang">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="jumlah" id="jumlah" placeholder="Jumlah">
                        </div>
                        <div class="form-group">
                            <select type="text" class="form-control form-control-user" name="keterangan" id="keterangan" placeholder="Keterangan">
                                <option value="Bagus">Bagus</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="status_barang" id="status_barang" placeholder="Status">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->