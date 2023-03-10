<?php
session_start();
include_once '../template/header.php';
include_once '../template/sidebar.php';
include_once '../template/topbar.php';
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
        <h3> Data Laporan Transaksi </small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-3 col-sm-3   form-group pull-right btn btn-secondary">
        <a href="v_print.php"><button type="button" class="btn btn-secondary">Print</button>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2> Daftar Transaksi</h2>
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
                </tr>
              </thead>
              <tbody>
                <?php 
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
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>

<?php include_once '../template/footer.php'; ?>