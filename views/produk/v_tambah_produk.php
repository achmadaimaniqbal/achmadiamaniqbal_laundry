<?php
session_start();
include_once '../template/header.php';
include_once '../template/sidebar.php';
include_once '../template/topbar.php';
?>

<?php

include_once '../../controllers/c_outlet.php';

$outlet = new c_outlet();
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3> Tambah Produk </small></h3>
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

		<!-- start form  -->
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Form Design <small>different form elements</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a class="dropdown-item" href="#">Settings 1</a>
									</li>
									<li><a class="dropdown-item" href="#">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form action="../../routers/r_produk.php?aksi=tambah" method="POST" data-parsley-validate class="form-horizontal form-label-left">

							<div class="item form-group">
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="id" name="id" class="form-control " hidden>
								</div>
							</div>

							<div class="item form-group">
								<label for="role" class="col-form-label col-md-3 col-sm-3 label-align">Jenis <span class="required"></span></label>
								<div class="col-md-6 col-sm-6 ">
									<select id="role" class="form-control" name="jenis" required="required">
										<option>Choose option</option>
										<option value="kiloan">Kiloan</option>
										<option value="selimut">Selimut</option>
										<option value="bed_cover">Bed_cover</option>
										<option value="kaos">Kaos</option>
										<option value="lain">Lain</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label for="nama_paket" class="col-form-label col-md-3 col-sm-3 label-align">Nama Paket <span class="required"></span></label>
								<div class="col-md-6 col-sm-6 ">
									<input id="nama_paket" class="form-control" type="text" name="nama_paket" required="required">
								</div>
							</div>

                            <div class="item form-group">
								<label for="harga" class="col-form-label col-md-3 col-sm-3 label-align">Harga <span class="required"></span></label>
								<div class="col-md-6 col-sm-6 ">
									<input id="harga" class="form-control" type="text" name="harga" required="required">
								</div>
							</div>

							<div class="item form-group">
								<label for="outlet" class="col-form-label col-md-3 col-sm-3 label-align">Outlet <span class="required"></span></label>
								<div class="col-md-6 col-sm-6 ">
									<select id="outlet" class="form-control" name="id_outlet" required="required">
										<option>Choose option</option>

										<?php foreach ($outlet->tampil() as $o) { ?>
												<option value="<?= $o->id ?>"><?= $o->nama ?></option>
										<?php } ?>

									</select>
								</div>
							</div>
							
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button class="btn btn-primary" type="submit" name="tambah">simpan</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end form  -->

	</div>
</div>
<!-- /page content -->


<?php include_once '../template/footer.php'; ?>