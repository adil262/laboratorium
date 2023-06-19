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
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Laboratorium</th>
                                        <th>Ruangan</th>
                                        <th>Asisten Laboratorium</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($barang as $b) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $b['nama_ruangan'] ?></td>
                                            <td><?= $b['no_ruangan'] ?></td>
                                            <td><?= $b['name'] ?></td>
                                            <td>
                                                <button type="button" data-id_ruangan="<?= $b['id_ruangan']; ?>" class="btn btn-warning btn-sm tambah">Pinjam</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="formTambah" style="display: none;" class="col-md-5 stretch-card" aria-hidden="true">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $page_judul; ?></h4>
                        <form action="<?= base_url('peminjaman') ?>" method="post">
                            <div class="form-group">
                                <label for="nama" class="col-sm-5">Nama</label>
                                <div class="col-sm">
                                    <input type="text" readonly class="form-control" name="name" id="name" value="<?= $name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nip" class="col-sm-5">NIM/NIP</label>
                                <div class="col-sm">
                                    <input type="text" readonly class="form-control" name="nip" id="nip" value="<?= $nip; ?>">
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
                                    <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="level" class="col-sm-5">Level</label>
                                <div class="col-sm">
                                    <select class="form-control" name="level" id="level" placeholder="Level">
                                        <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                                            <option value="Level 1">Level 1</option>
                                            <option value="Level 2">Level 2</option>
                                            <option value="Level 3">Level 3</option>
                                        <?php } ?>
                                        <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                            <option value="Level 1">Level 1</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="waktu" class="col-sm-5">Waktu Pelaksanaan</label>
                                <div class="col-sm">
                                    <?php if ($this->session->userdata('level') != 'Peminjam') { ?>
                                        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal" value="<?php echo date('Y-m-d', time()); ?>">
                                        <input type="time" class="form-control" name="awal" id="awal" placeholder="Mulai" value="<?php echo date('H:i') ?>">
                                        <input type="time" class="form-control" name="akhir" id="akhir" placeholder="Selesai" value="<?php $time = new DateTime(date('H:i'));
                                                                                                                                        $time->modify('+2 hours');
                                                                                                                                        echo $time->format('H:i'); ?>">
                                    <?php } ?>
                                    <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                                        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal" value="<?php $time = new DateTime(date('Y-m-d', time()));
                                                                                                                                    $time->modify('+3 days');
                                                                                                                                    echo $time->format('Y-m-d'); ?>">
                                        <input type="time" class="form-control" name="awal" id="awal" placeholder="Mulai" value="<?php echo date('H:i') ?>">
                                        <input type="time" class="form-control" name="akhir" id="akhir" placeholder="Selesai" value="<?php $time = new DateTime(date('H:i'));
                                                                                                                                        $time->modify('+2 hours');
                                                                                                                                        echo $time->format('H:i'); ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ruangan" class="col-sm-5">Ruangan</label>
                                <div class="col-sm">
                                    <select id="id_ruangan" name="id_ruangan" class="form-control" placeholder="Ruangan">

                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="barang" class="col-sm-5">Barang</label>
                                <div class="col-sm">
                                    <?php foreach ($ruangan as $r) : ?>
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label">
                                                <input id="no_barang" name="no_barang" type="checkbox" class="form-check-input" value="<?= $r['no_barang']; ?>">
                                                <?= $r['no_barang']; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="Peserta" class="col-sm-5">Peserta</label>
                                <div class="col-sm">
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="peserta" id="peserta"></textarea>
                                </div>
                            </div>
                            <?php
                            // Filter data $user berdasarkan level "Kepala Laboratorium"
                            $filteredAil = array_filter($user, function ($u) {
                                return $u['level'] == "Asisten Instruktur Laboratorium";
                            });
                            ?>
                            <div class="form-group">
                                <label for="ail" class="col-sm-5">Asisten Instruktur</label>
                                <div class="col-sm">
                                    <select id="name" name="name" class="form-control" placeholder="Kepala Laboratorium">
                                        <?php foreach ($filteredAil as $u) : ?>
                                            <option value="<?php echo $u['name']; ?>"><?php echo $u['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <?php
                            // Filter data $user berdasarkan level "Kepala Laboratorium"
                            $filteredKalab = array_filter($user, function ($u) {
                                return $u['level'] == "Kepala Laboratorium";
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
                                        <input type="text" class="form-control" name="pembina" id="pembina" placeholder="Pembina">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            // Filter data $user berdasarkan level "Ketua Jurusan"
                            $filteredKajur = array_filter($user, function ($u) {
                                return $u['level'] == "Kajur";
                            });
                            ?>
                            <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
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
                            <?php } ?>
                            <?php
                            // Filter data $user berdasarkan level "Pembantu Direktur 1"
                            $filteredPudir = array_filter($user, function ($u) {
                                return $u['level'] == "Pembantu Direktur 1";
                            });
                            ?>
                            <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
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
                            <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Pinjam</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <script>
        // document.getElementById('tambah').addEventListener('click', function() {
        //     var formTambah = document.getElementById('formTambah');
        //     if (formTambah.style.display === 'none') {
        //         formTambah.style.display = 'block';
        //     } else {
        //         formTambah.style.display = 'none';
        //     }
        // });
        // Mendapatkan elemen <select> untuk ruangan
        var tambah = document.getElementsByClassName('tambah');
        var ruanganSelect = document.getElementById('id_ruangan');
        // var barangSelect = document.getElementById('no_barang');
        var ailSelect = document.getElementById('name');

        for (var i = 0; i < tambah.length; i++) {
            tambah[i].addEventListener('click', function(event) {
                event.preventDefault();
                var formTambah = document.getElementById('formTambah');

                var selectedRuanganId = this.getAttribute('data-id_ruangan');

                var selectedRuangan = ruanganData.find(function(ruangan) {
                    return ruangan.id === selectedRuanganId;
                });
                var selectedAil = ruanganData.find(function(ruangan) {
                    return ruangan.name === selectedRuanganId;
                });
                // var selectedBarang = barangData.find(function(barang) {
                //     return barang.id === selectedRuanganId;
                // });

                if (selectedRuangan) {
                    ruanganSelect.innerHTML = '<option value="' + selectedRuangan.id + '">' + selectedRuangan.no_ruangan + '</option>';
                }
                if (selectedAil) {
                    ailSelect.innerHTML = '<option value="' + selectedAil.name + '">' + selectedAil.name + '</option>';
                }
                // if (selectedBarang) {
                //     barangSelect.innerHTML = '<option value="' + selectedBarang.no_barang + '">' + selectedBarang.no_barang + '</option>';
                // }

                // for ($i = 0; $i <= selectedBarang.length; $i++) {
                //     barangSelect.innerHTML = '<option value="' + selectedBarang + '">' + selectedBarang + '</option>';
                //     daftarBarangDiv.style.display = 'block'; // Tampilkan daftar barang
                // }
                if (formTambah.style.display === 'none') {
                    formTambah.style.display = 'block';
                } else {
                    formTambah.style.display = 'none';
                }
            });
        }

        var ruanganDataFromPHP = <?= json_encode($barang); ?>;
        var ruanganData = [];

        for (var j = 0; j < ruanganDataFromPHP.length; j++) {
            var ruangan = {
                id: ruanganDataFromPHP[j]['id_ruangan'],
                no_ruangan: ruanganDataFromPHP[j]['no_ruangan'],
                name: ruanganDataFromPHP[j]['name'],
            };
            ruanganData.push(ruangan);
        }
        // var barangDataFromPHP = <?= json_encode($ruangan); ?>;
        // var barangData = [];

        // for (var j = 0; j < barangDataFromPHP.length; j++) {
        //     var barang = {
        //         no_barang: barangDataFromPHP[j]['no_barang']
        //     };
        //     barangData.push(barang);
        // }

        // ruanganSelect.addEventListener('change', function() {
        //     var selectedRuangan = ruanganSelect.value;
        //     noBarangDiv.innerHTML = selectedRuangan;

        //     var selectedBarang = barangData[selectedRuangan];
        //     barangSelect.innerHTML = '';
        //     if (selectedBarang) {
        //         selectedBarang.forEach(function(barang) {
        //             var option = document.createElement('option');
        //             option.value = barang.id;
        //             option.text = barang.no_barang;
        //             barangSelect.appendChild(option);
        //         });
        //         daftarBarangDiv.style.display = 'block'; // Tampilkan daftar barang
        //     } else {
        //         daftarBarangDiv.style.display = 'none'; // Sembunyikan daftar barang
        //     }
        // });
        // ruanganSelect.innerHTML = '';
        // // Menambahkan opsi ruangan yang baru
        // ruanganData.forEach(function(ruangan) {
        //     var option = document.createElement('option');
        //     option.value = ruangan.id;
        //     option.text = ruangan.no_ruangan;
        //     ruanganSelect.appendChild(option);
        // });
    </script>