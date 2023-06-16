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
                          <li class="nav-item"> <a class="nav-link" href="<?= base_url('peminjaman') ?>">Daftar Peminjaman</a></li>
                          <li class="nav-item"> <a class="nav-link" href="<?= base_url('peminjaman/riwayat') ?>">Riwayat Peminjaman</a></li>
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
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('ail') ?>">Asisten Laboratorium</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('lab_pemrograman') ?>">R.301</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url('lab_database') ?>">R.302</a></li>
                          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">R.303</a></li>
                          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">R.304</a></li>
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