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
                                        <th>Status</th>
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
                                            <td><a href="" class="badge badge-warning"><?= $pinjam['status'] ?></a></td>
                                            <td>
                                                <?php if ($level == 'Ail' && $pinjam['approval_ail'] == 0) : ?>
                                                    <a href="<?php echo site_url('peminjaman/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_ail'); ?>" class="badge badge-success">Terima</a>
                                                <?php endif; ?>
                                                <?php if ($level == 'Kalab' && $pinjam['approval_kalab'] == 0) : ?>
                                                    <a href="<?php echo site_url('peminjaman/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_kalab'); ?>" class="badge badge-success">Terima</a>
                                                <?php endif; ?>
                                                <?php if ($level == 'Kajur' && $pinjam['approval_kajur'] == 0) : ?>
                                                    <a href="<?php echo site_url('peminjaman/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_kajur'); ?>" class="badge badge-success">Terima</a>
                                                <?php endif; ?>
                                                <?php if ($level == 'Pudir1' && $pinjam['approval_pudir1'] == 0) : ?>
                                                    <a href="<?php echo site_url('peminjaman/submitApproval/' . $pinjam['id_peminjaman'] . '/approval_pudir1'); ?>" class="badge badge-success">Terima</a>
                                                <?php endif; ?>

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