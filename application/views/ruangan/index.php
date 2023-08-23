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
                                            <td><?= $b['name'] ?></td>
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
            <div id="formTambah" style="display:none;" class="col-md-4 stretch-card" aria-hidden="true">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $page_tambah; ?></h4>
                        <form action="<?= base_url('Ruangan/add') ?>" method="post">
                            <div class="form-group">
                                <label for="noruangan" class="col-sm-5">Ruangan</label>
                                <div class="col-sm">
                                    <input type="number" class="form-control" name="no_ruangan" id="no_ruangan" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="namaruangan" class="col-sm-5">Nama Ruangan</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ail" class="col-sm-9">Asisten Instruktur Laboratorium</label>
                                <div class="col-sm">
                                    <select id="id_ail" name="id_ail" class="form-control" placeholder="Ail">
                                        <option value="">-- Pilih Ail --</option>
                                        <?php foreach ($ail as $r) : ?>
                                            <option value="<?= $r['id_ail']; ?>"><?= $r['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kalab" class="col-sm-9">Kepala Laboratorium</label>
                                <div class="col-sm">
                                    <select id="id_kalab" name="id_kalab" class="form-control" placeholder="Kalab">
                                        <option value="">-- Pilih Kalab --</option>
                                        <?php foreach ($kalab as $r) : ?>
                                            <option value="<?= $r['id_kalab']; ?>"><?= $r['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-9">Status Ruangan</label>
                                <div class="col-sm">
                                    <select id="status_ruangan" name="status_ruangan" class="form-control">
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