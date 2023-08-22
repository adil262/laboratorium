<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome <?= $name; ?></h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="<?= base_url('assets/') ?>images/dashboard/people.svg" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-normal">Bangalore</h4>
                                    <h6 class="font-weight-normal">India</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Total Peminjaman Aktif</p>
                                <p class="fs-30 mb-2"><?= $paktif; ?> Peminjam</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Request Peminjaman</p>
                                <p class="fs-30 mb-2"><?= $request; ?> Peminjam</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Ruangan</p>
                                <p class="fs-30 mb-2"><?= $ruangan; ?> Ruangan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Total Barang</p>
                                <p class="fs-30 mb-2"><?= $barang; ?> Barang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Daftar Peminjaman</p>
                        <div class="table-responsive">
                            <div class="table-responsive" id="tampilanPeminjaman">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Ruangan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($riwayat_peminjaman as $b) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $b['name'] ?></td>
                                                <td>R.<?= $b['no_ruangan'] ?></td>
                                                <td><?php if ($b['status'] == "Peminjaman Sukses") { ?>
                                                        <a href="" class="badge badge-success"><?= $b['status'] ?></a>
                                                    <?php } ?>
                                                    <?php if ($b['status'] == "Peminjaman Ditolak") { ?>
                                                        <a href="" class="badge badge-danger"><?= $b['status'] ?></a>
                                                    <?php } ?>
                                                    <?php if ($b['status'] == "Peminjaman Selesai") { ?>
                                                        <a href="" class="badge badge-success"><?= $b['status'] ?></a>
                                                    <?php } ?>
                                                    <?php if ($b['status'] == "Disetujui Ail") { ?>
                                                        <a href="" class="badge badge-primary"><?= $b['status'] ?></a>
                                                    <?php } ?>
                                                    <?php if ($b['status'] == "Disetujui Kalab") { ?>
                                                        <a href="" class="badge badge-primary"><?= $b['status'] ?></a>
                                                    <?php } ?>
                                                    <?php if ($b['status'] == "Disetujui Pembina") { ?>
                                                        <a href="" class="badge badge-primary"><?= $b['status'] ?></a>
                                                    <?php } ?>
                                                    <?php if ($b['status'] == "Disetujui Kajur") { ?>
                                                        <a href="" class="badge badge-primary"><?= $b['status'] ?></a>
                                                    <?php } ?>
                                                    <?php if ($b['status'] == "Pending") { ?>
                                                        <a href="" class="badge badge-warning"><?= $b['status'] ?></a>
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
            </div>

        </div>
        <!-- content-wrapper ends -->