<?php 
session_start();
include_once '../template/header.php'; 
include_once '../template/sidebar.php'; 
include_once '../template/topbar.php'; 
?>
<?php 
include_once '../../controllers/c_outlet.php';
include_once '../../controllers/c_produk.php';

$outlet = new c_outlet();
$produk = new c_produk();
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Daftar Paket</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row" style="display: block;">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Paket </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Outlet</th>
                          <th>Nama Paket</th>
                          <th>Harga</th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                if($produk->tampil() == null){ ?>
                  <tr>
                    <td colspan="7"><h1><center>Tidak Ada Data produk</center></h1></td>
                  </tr>
                      <?php }else{
                      $no = 1;
                      foreach ($produk->tampil() as $b) {
                      ?>
                        <tr>
                          <th scope="row"><?= $no++  ?></th>
                          <td><?= $b->outlet_nama  ?></td>
                          <td><?= $b->nama_paket  ?></td>
                          <td><?= $b->harga  ?></td>
                          <td>
                            <center>
                            <a href="v_edit_produk.php?id=<?= $b->id ?>"><button type="button" class="btn btn-round btn-primary">Edit</button></a>
                            
                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../../routers/r_produk.php?id=<?= $b->id ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger">Hapus</button></a>
                            </center>
                          </td>
                        </tr>
                      <?php }} ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include_once '../template/footer.php';?>
