<?php
session_start();
include_once '../template/header.php';
include_once '../template/sidebar.php';
// include_once '../template/topbar.php';
?>

<?php

include_once '../../controllers/c_transaksi.php';

$transaksi = new c_transaksi();

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Daftar Transaksi </small></h3>
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
            <h2> Daftar Pengguna</h2>
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
                  <th>Nomor</th>
                  <th>Kode Invoice</th>
                  <th>Nama Pelanggan</th>
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Pengambilan</th>
                  <th>Status</th>
                  <th>Bayar</th>
                  <center>
                    <th>Aksi</th>
                  </center>
                </tr>
              </thead>
              <tbody>
                <?php
                if($transaksi->tampil() == null){ ?>
                  <tr>
                    <td colspan="7"><h1><center>Tidak Ada Data Transaksi</center></h1></td>
                  </tr>
                  
                <?php }else{ 
                  $nomor = 1;
                  foreach ($transaksi->tampil() as $t) {
                ?>
                    <tr>
                      <th scope="row"><?= $nomor++ ?></th>
                      <td><?= $t->kode_invoice ?></td>
                      <td><?= $t->member_nama ?></td>
                      <td><?= $t->tgl ?></td>
                      <td><?= $t->batas_waktu ?></td>
                      <td><?= $t->status ?></td>
                      <td><?= $t->dibayar ?></td>
                      <td>

                        <center>
                          <a href="v_edit_transaksi.php?id=<?= $t->id ?>"><button type="button" class="btn btn-round btn-primary">Edit</button></a>

                          <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../../routers/r_transaksi.php?id=<?= $t->id ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger">Hapus</button></a>

                          <?php if ($t->dibayar == 'belum_dibayar') { ?>
                            <a href="v_transaksi_bayar.php?id=<?= $t->id ?>"><button type="button" class="btn btn-round btn-warning">Bayar</button></a>
                          <?php } ?>
                        </center>
                      </td>
                    </tr>
                <?php }}
                ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>


    </div>
  </div>
</div>
<!-- /page content -->

<?php include_once '../template/footer.php'; ?>