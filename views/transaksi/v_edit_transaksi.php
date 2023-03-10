<?php
session_start();
include_once '../template/header.php';
include_once '../template/sidebar.php';
include_once '../template/topbar.php';
?>

<?php 

	include_once '../../controllers/c_transaksi.php';

	$tr = new c_transaksi();
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3> Tambah Transaksi </small></h3>
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
						<form action="../../routers/r_transaksi.php?aksi=update" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                            
                            <?php foreach ($tr->edit($_GET['id']) as $t) { ?>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="id" name="id" class="form-control" value="<?= $t->id?>" hidden>
								</div>
							</div>

                            <div class="item form-group">
								<label for="outlet" class="col-form-label col-md-3 col-sm-3 label-align">Kode Invoice</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="id" name="kode_invoice" class="form-control " value="<?= $t->kode_invoice ?>" readonly>
								</div>
							</div>

                            <div class="item form-group">
								<label for="outlet" class="col-form-label col-md-3 col-sm-3 label-align">Nama Member</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="id" name="kode_invoice" class="form-control " value="<?= $t->member_nama ?>" readonly>
								</div>
							</div>

                            <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal <span class="required"></span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" class="date-picker form-control" name ="tanggal" value="<?= $t->tgl ?>" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" readonly>
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
                            
                            <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Batas Waktu <span class="required"></span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" class="date-picker form-control" name ="batas_waktu" value="<?= $t->batas_waktu ?>" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" readonly>
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
                            
                            <div class="item form-group">
								<label for="dibayar" class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
								<div class="col-md-6 col-sm-6 ">
									<select id="dibayar" class="form-control" name="status">
										<option value="<?= $t->status ?>"><?= $t->status ?></option>
										<option value="baru">Baru</option>
										<option value="proses">Proses</option>
										<option value="selesai">Selesai</option>
										<option value="diambil">Di Ambil</option>
									</select>
								</div>
							</div> 

							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button class="btn btn-primary" type="submit" name="update">Save</button>
								</div>
							</div>
                            <?php } ?>
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