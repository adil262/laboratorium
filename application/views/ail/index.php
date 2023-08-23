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
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0"><?= $page_title; ?></p>
                        <?php if ($this->session->userdata('level') == 'Kalab') { ?>
                            <button type="button" id="tambah" style="float: right;" class="btn btn-warning btn-sm tambah">Tambah</button>
                        <?php } ?>
                        <?php if ($this->session->userdata('level') == 'Kajur') { ?>
                            <button type="button" id="tambah" style="float: right;" class="btn btn-warning btn-sm tambah">Tambah</button>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>NIP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $b) : ?>
                                        <tr>
                                            <td><?= ++$start ?></td>
                                            <td><?= $b['name'] ?></td>
                                            <td><?= $b['email'] ?></td>
                                            <td><?= $b['nip'] ?></td>
                                            <td><abbr title="edit"><a href="" data-toggle="modal" data-target="#editAil<?= $b['id_ail']; ?>" class="btn btn-inverse-warning btn-sm mdi mdi-border-color"></a></abbr>
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
                        <form action="<?= base_url('UserAil/add') ?>" method="post">
                            <div class="form-group">
                                <label for="user" class="col-sm-5">Pilih User</label>
                                <div class="col-sm">
                                    <select id="id_user" name="id_user" class="form-control" placeholder="Pilih User">
                                        <option value="">-- Pilih User --</option>
                                        <?php foreach ($user as $r) : ?>
                                            <option value="<?= $r['id_user']; ?>"><?= $r['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="namaruangan" class="col-sm-5">Ubah Role</label>
                                <div class="col-sm">
                                    <select id="level" name="level" class="form-control" placeholder="Pilih User">
                                        <option value="">-- Pilih Role --</option>
                                        <option value="Ail">Ail</option>
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
    <?php foreach ($data as $m) { ?>
        <div class="modal fade bd-example-modal-lg" id="editAil<?= $m['id_ail']; ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel"><?= $page_edit; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('UserAil/update/' . $m['id_ail']); ?>" method="post" enctype="multipart/form-data" role="form">
                        <input type="text" hidden name="id_user" id="id_user" value="<?= $m['id_user'] ?>">
                        <div class="form-group">
                            <label for="nama" class="col-sm-5">User</label>
                            <div class="col-sm">
                                <input type="text" readonly class="form-control form-control-user" name="name" id="name" placeholder="Nama" value="<?= $m['name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stok" class="col-sm-5">Pilih Role</label>
                            <div class="col-sm">
                                <select id="level" name="level" class="form-control" placeholder="Pilih Level">
                                    <option value="Peminjam">Peminjam</option>
                                </select>
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