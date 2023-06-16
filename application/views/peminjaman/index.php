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
                                        <th>Status Ruangan</th>
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
                                            <td><?= $b['status_ruangan'] ?></td>
                                            <td>
                                                <button type="button" data-id_ruangan="<?= $b['id_ruangan']; ?>" data-nama="<?= $b['nama']; ?>" data-barang="<?php $b['no_barang']; ?>" class="btn btn-warning tambah">Pinjam</button>
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
                                        <option value="Level 1">Level 1</option>
                                        <option value="Level 2">Level 2</option>
                                        <option value="Level 3">Level 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="waktu" class="col-sm-5">Waktu Pelaksanaan</label>
                                <div class="col-sm">
                                    <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal">
                                    <input type="time" class="form-control" name="awal" id="awal" placeholder="Mulai">
                                    <input type="time" class="form-control" name="akhir" id="akhir" placeholder="Selesai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ruangan" class="col-sm-5">Ruangan</label>
                                <div class="col-sm">
                                    <select id="id_ruangan" name="id_ruangan" class="form-control" placeholder="Ruangan">
                                        <option value="<?= $b['id_ruangan']; ?>"><?= $b['no_ruangan']; ?></option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="barang" class="col-sm-5">Barang</label>
                                <div class="col-sm">
                                    <!-- <label class=" form-check-label"> -->
                                    <select id="no_barang" name="no_barang" class="form-control" placeholder="Barang">
                                        <option value="<?= $b['no_barang']; ?>"><?= $b['no_barang']; ?></option>
                                    </select>
                                    <!-- </label> -->
                                    <!-- <select id=" daftarBarang" name="id_ruangan" class="form-control" style="display: none;" placeholder="Ruangan">
                                            <option value="</option>

                                    </select> -->
                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="Peserta" class="col-sm-5">Peserta</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="peserta" id="peserta" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-sm-5">Keterangan</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Tersedia">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ail" class="col-sm-5">Asisten Instruktur</label>
                                <div class="col-sm">
                                    <input type="text" readonly class="form-control" name="ail" id="ail" placeholder="Asisten Instruktur" value="<?= $b['nama']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kalab" class="col-sm-5">Kepala Laboratorium</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="kalab" id="kalab" placeholder="Kepala Laboratorium">
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
                            <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                                <div class="form-group">
                                    <label for="kajur" class="col-sm-5">Ketua Jurusan</label>
                                    <div class="col-sm">
                                        <input type="text" class="form-control" name="kajur" id="kajur" placeholder="Ketua Jurusan">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->userdata('level') == 'Peminjam') { ?>
                                <div class="form-group">
                                    <label for="pudir" class="col-sm-5">Pembantu Direktur 1</label>
                                    <div class="col-sm">
                                        <input type="text" class="form-control" name="pudir" id="pudir" placeholder="Pembantu Direktur 1">
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
        var barangSelect = document.getElementById('no_barang');

        for (var i = 0; i < tambah.length; i++) {
            tambah[i].addEventListener('click', function(event) {
                event.preventDefault();
                var formTambah = document.getElementById('formTambah');

                var selectedRuanganId = this.getAttribute('data-id_ruangan');
                var selectedBarangId = this.getAttribute('data-barang');
                var selectedRuangan = ruanganData.find(function(ruangan) {
                    return ruangan.id === selectedRuanganId;
                });
                var selectedBarang = ruanganData.find(function(ruangan) {
                    return ruangan.id === selectedBarangId;
                });

                if (selectedRuangan) {
                    ruanganSelect.innerHTML = '<option value="' + selectedRuangan.id + '">' + selectedRuangan.no_ruangan + '</option>';
                }

                if (selectedBarang) {
                    barangSelect.innerHTML = '<option value="' + selectedBarang.id + '">' + selectedBarang.no_barang + '</option>';
                }
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
                no_ruangan: ruanganDataFromPHP[j]['no_ruangan']
            };
            ruanganData.push(ruangan);
        }

        ruanganSelect.addEventListener('change', function() {
            var selectedRuangan = ruanganSelect.value;
            noBarangDiv.innerHTML = selectedRuangan;

            var selectedBarang = barangData[selectedRuangan];
            barangSelect.innerHTML = '';
            if (selectedBarang) {
                selectedBarang.forEach(function(barang) {
                    var option = document.createElement('option');
                    option.value = barang.id;
                    option.text = barang.nama;
                    barangSelect.appendChild(option);
                });
                daftarBarangDiv.style.display = 'block'; // Tampilkan daftar barang
            } else {
                daftarBarangDiv.style.display = 'none'; // Sembunyikan daftar barang
            }
        });
        ruanganSelect.innerHTML = '';
        // Menambahkan opsi ruangan yang baru
        ruanganData.forEach(function(ruangan) {
            var option = document.createElement('option');
            option.value = ruangan.id;
            option.text = ruangan.no_ruangan;
            ruanganSelect.appendChild(option);
        });
    </script>