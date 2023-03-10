<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>LAUNDRY KELOMPOK 8</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="../../assets/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>WELCOME LAUNDRY</span>
              <h2><?php echo $_SESSION['data']['role'] ?>, <?php echo $_SESSION['data']['username'] ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <?php

          if ($_SESSION['data']['role'] == 'admin') { ?>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="../home/v_home_admin.php"><i class="fa fa-home"></i> Home <span class="label label-success pull-right"></span></a></li>

                  <li><a href="../transaksi/v_registrasi_pelanggan.php"><i class="fa fa-user"></i> Registrasi Pelanggan <span class="label label-success pull-right"></span></a></li>

                  <li><a><i class="fa fa-group"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../pengguna/v_list_pengguna.php">Daftar Pengguna</a></li>
                      <li><a href="../pengguna/v_tambah_pengguna.php">Tambah Pengguna</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-home"></i> Outlet <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../outlet/v_list_outlet.php">Daftar Outlet</a></li>
                      <li><a href="../outlet/v_tambah_outlet.php">Tambah Oulet</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Produk <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../produk/v_list_produk.php">Daftar Produk</a></li>
                      <li><a href="../produk/v_tambah_produk.php">Tambah Produk</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-money"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../transaksi/v_transaksi.php">Daftar Transaksi</a></li>
                      <li><a href="../transaksi/v_tambah_transaksi.php">Tambah Transaksi</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-list"></i> Generate Laporan <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="../transaksi/v_laporan.php">Cetak Transaksi</a></li>
                    </ul>
                  </li>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          <?php } elseif ($_SESSION['data']['role'] == 'owner') { ?>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="../home/v_home_admin.php"><i class="fa fa-home"></i> Home <span class="label label-success pull-right"></span></a></li>
                  <li><a><i class="fa fa-list"></i> Generate Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../transaksi/v_laporan.php">Cetak Transaksi</a></li>
                    </ul>
                  </li>

                </ul>

              </div>

            </div>
            <!-- /sidebar menu -->
          <?php } elseif ($_SESSION['data']['role'] == 'kasir') { ?>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="../home/v_home_admin.php"><i class="fa fa-home"></i> Home <span class="label label-success pull-right"></span></a></li>

                  <li><a href="../transaksi/v_registrasi_pelanggan.php"><i class="fa fa-user"></i> Registrasi Pelanggan <span class="label label-success pull-right"></span></a></li>

                  <li><a><i class="fa fa-money"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../transaksi/v_transaksi.php">Daftar Produk</a></li>
                      <li><a href="../transaksi/v_tambah_transaksi.php">Tambah Produk</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-list"></i> Generet Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../transaksi/v_laporan.php">Cetak Transaksi</a></li>
                    </ul>
                  </li>
                </ul>

              </div>

            </div>
            <!-- /sidebar menu -->
          <?php } ?>
        </div>
      </div>