<!DOCTYPE html>
<?php 

include_once '../../controllers/c_transaksi.php';

$transaksi = new c_transaksi();

?>

<html>
<head>
    <title>Website Laundry Cuci Bersih</title>
</head>
<body>
 
	<center>
		<h2>DATA LAPORAN TRANSAKSI</h2>
	</center>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">Nomor</th>
			<th>Kode Invoice</th>
			<th>Nama Pelanggan</th>
            <th>Tanggal masuk</th>
            <th>Tanggal Pengambilan</th>
            <th>Status</th>
			<th width="5%">Bayar</th>
		</tr>
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
 
	<script>
		window.print();
	</script>
 
</body>
</html>