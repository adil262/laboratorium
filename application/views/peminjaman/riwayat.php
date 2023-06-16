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
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0"><?= $page_title; ?></p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Ruangan</th>
                                        <th>Keterangan</th>
                                        <th>Detail</th>
                                        <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                            <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($peminjaman as $pinjam) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pinjam['name'] ?></td>
                                            <td><?= $pinjam['no_ruangan'] ?></td>
                                            <td><?= $pinjam['keterangan'] ?></td>
                                            <td><a href="" class="mdi mdi-information">Detail</a></td>
                                            <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                                <td>
                                                    <a href="" class="badge badge-success">Terima</a>
                                                    <a href="" class="badge badge-danger">Tolak</a>
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
    <div class="modal fade" id="newPinjam" tabindex="-1" role="dialog" aria-labelledby="newBarangLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content col-sm-30">
                <div class="modal-header">
                    <h5 class="modal-title" id="newBarangLabel"><?= $page_judul; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('peminjaman') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-5 col-form-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control" name="name" id="name" value="<?= $name; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-5 col-form-label">NIM/NIP</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control" name="nip" id="nip" value="<?= $nip; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nohp" class="col-sm-5 col-form-label">No Hp</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nohp" id="nohp" placeholder="08xxxxxxxxxx">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kegiatan" class="col-sm-5 col-form-label">Kegiatan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="waktu" class="col-sm-5 col-form-label">Waktu Pelaksanaan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tanggal">
                                <input type="text" class="form-control" name="awal" id="awal" placeholder="Mulai">
                                <input type="text" class="form-control" name="akhir" id="akhir" placeholder="Selesai">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ruangan" class="col-sm-5 col-form-label">Ruangan</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="status_barang" id="status_barang" placeholder="Status">
                                    <option value="<?= $no_ruangan; ?>"><?= $no_ruangan; ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level" class="col-sm-5 col-form-label">Level</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="level" id="level" placeholder="Level">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Peserta" class="col-sm-5 col-form-label">Peserta</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="peserta" id="peserta" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barang" class="col-sm-5 col-form-label">Peminjaman Barang</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="barang" id="barang" placeholder="Barang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-5 col-form-label">Keterangan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Tersedia">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ail" class="col-sm-5 col-form-label">Asisten Instruktur</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="ail" id="ail" placeholder="Asisten Instruktur">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kalab" class="col-sm-5 col-form-label">Kepala Laboratorium</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="kalab" id="kalab" placeholder="Kepala Laboratorium">
                            </div>
                        </div>
                        <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                            <div class="form-group row">
                                <label for="pembina" class="col-sm-5 col-form-label">Pembina</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="pembina" id="pembina" placeholder="Pembina">
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                            <div class="form-group row">
                                <label for="kajur" class="col-sm-5 col-form-label">Ketua Jurusan</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="kajur" id="kajur" placeholder="Ketua Jurusan">
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                            <div class="form-group row">
                                <label for="pudir" class="col-sm-5 col-form-label">Pembantu Direktur 1</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="pudir" id="pudir" placeholder="Pembantu Direktur 1">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Pinjam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>