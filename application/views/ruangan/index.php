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
                        <button type="button" id="tambah" style="float: right;" class="btn btn-warning btn-sm tambah">Tambah</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Laboratorium</th>
                                        <th>Ruangan</th>
                                        <th>Ail</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $b) : ?>
                                        <tr>
                                            <td><?= ++$start ?></td>
                                            <td><?= $b['nama_ruangan'] ?></td>
                                            <td>R.<?= $b['no_ruangan'] ?></td>
                                            <td><?= $b['id_user'] ?></td>
                                            <td><?php if ($b['status_ruangan'] == "Tersedia") { ?>
                                                    <a href="" class="badge badge-success"><?= $b['status_ruangan'] ?></a>
                                                <?php } ?>
                                                <?php if ($b['status_ruangan'] == "Booking") { ?>
                                                    <a href="" class="badge badge-warning"><?= $b['status_ruangan'] ?></a>
                                                <?php } ?>
                                                <?php if ($b['status_ruangan'] == "Tidak Tersedia") { ?>
                                                    <a href="" class="badge badge-danger"><?= $b['status_ruangan'] ?></a>
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
            <div id="formTambah" style="display:none;" class="col-md-5 stretch-card" aria-hidden="true">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $page_judul; ?></h4>
                        <form action="<?= base_url('Peminjaman/add') ?>" method="post">
                            <input type="hidden" id="id_user" name="id_user" value="<?php if (isset($id_user)) {
                                                                                        echo $id_user;
                                                                                    } ?>">
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
                                            <?php foreach ($level as $l) : ?>
                                                <option value="<?= $l['id_level']; ?>">Level <?= $l['id_level']; ?></option>
                                            <?php endforeach; ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="waktu" class="col-sm-5">Waktu Pelaksanaan</label>
                                <div class="col-sm">
                                    <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d', time()); ?>">
                                        <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" placeholder="Mulai" value="<?php echo date('H:i') ?>">
                                        <input type="time" class="form-control" name="jam_berakhir" id="jam_berakhir" placeholder="Selesai" value="<?php $time = new DateTime(date('H:i'));
                                                                                                                                                    $time->modify('+2 hours');
                                                                                                                                                    echo $time->format('H:i'); ?>">
                                    <?php } ?>
                                    <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php $time = new DateTime(date('Y-m-d', time()));
                                                                                                                                            $time->modify('+3 days');
                                                                                                                                            echo $time->format('Y-m-d'); ?>">
                                        <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" placeholder="Mulai" value="<?php echo date('H:i') ?>">
                                        <input type="time" class="form-control" name="jam_berakhir" id="jam_berakhir" placeholder="Selesai" value="<?php $time = new DateTime(date('H:i'));
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
    <!-- content-wrapper ends -->

    <script>
        var tambah = document.getElementsByClassName('tambah');

        for (var i = 0; i < tambah.length; i++) {
            tambah[i].addEventListener('click', function(event) {
                event.preventDefault();
                var formTambah = document.getElementById('formTambah');

                $(document).ready(function() {
                    loadbarang();
                    loadail();

                });

                // function loadbarang() {
                //     $("#id_ruangan").change(function() {
                //         var getruangan = $("#id_ruangan").val();

                //         $.ajax({
                //             type: "POST",
                //             dataType: "JSON",
                //             url: "<?= base_url(); ?>Peminjaman/getdatabarang",
                //             data: {
                //                 no_ruangan: getruangan,
                //             },
                //             success: function(data) {

                //                 console.log(data);
                //                 var html = '';
                //                 var i;
                //                 for (i = 0; i < data.length; i++) {
                //                     html += '<option value="' + data[i].id_lab + '">' + data[i].no_barang + '</option>';

                //                 }
                //                 $("#id_lab").html(html);
                //                 $("#id_lab").show();
                //             }
                //         });
                //     });
                // }

                // function loadail() {
                //     $("#id_ruangan").change(function() {
                //         var getruangan = $("#id_ruangan").val();

                //         $.ajax({
                //             type: "POST",
                //             dataType: "JSON",
                //             url: "<?= base_url(); ?>Peminjaman/getdatauser",
                //             data: {
                //                 no_ruangan: getruangan
                //             },
                //             success: function(data) {
                //                 console.log(data);

                //                 var html = '';
                //                 var j;
                //                 for (j = 0; j < data.length; j++) {
                //                     html += '<option value = "' + data[j].id_ail + '" >' + data[j].name + ' </option>';

                //                 }
                //                 $("#id_ail").html(html);
                //                 $("#id_ail").show();

                //             }
                //         });
                //     });
                // }

                if (formTambah.style.display === 'none') {
                    formTambah.style.display = 'block';
                } else {
                    formTambah.style.display = 'none';
                }
            });
        }
    </script>