      <!-- partial -->
      <!-- sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('') ?>">
                      <i class="icon-grid menu-icon"></i>
                      <span class="menu-title">Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                      <i class="icon-layout menu-icon"></i>
                      <span class="menu-title">Peminjaman</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="<?= base_url('peminjaman') ?>">Ajukan Peminjaman</a></li>
                          <li class="nav-item"> <a class="nav-link" href="<?= base_url('riwayat') ?>">Riwayat Peminjaman</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                      <i class="icon-columns menu-icon"></i>
                      <span class="menu-title">Data Laboratorium</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="form-elements">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('ruangan') ?>">Ruangan</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('r225') ?>">R.225</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('r312') ?>">R.312</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('r313') ?>">R.313</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('r316') ?>">R.316</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('r317') ?>">R.317</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('r319') ?>">R.319</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('r320') ?>">R.320</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('r324') ?>">R.324</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="pages/documentation/documentation.html">
                      <i class="icon-paper menu-icon"></i>
                      <span class="menu-title">Documentation</span>
                  </a>
              </li>
          </ul>
      </nav>