                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $page_title; ?></h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                    <?= form_error('lab_database', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newBarang">Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>No Barang</th>
                                            <th>Gambar</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
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
                                                <td>
                                                    <a href="" class="badge badge-success">Edit</a>
                                                    <a href="" class="badge badge-danger">Hapus</a>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

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
                            <form action="<?= base_url('lab_database') ?>" method="post">
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
                                        <input type="text" class="form-control form-control-user" name="keterangan" id="keterangan" placeholder="Keterangan">
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

                </div>
                <!-- End of Main Content -->