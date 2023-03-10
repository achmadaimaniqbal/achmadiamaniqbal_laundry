<?php

include_once '../controllers/c_transaksi.php';

$transaksi = new c_transaksi();


//membuat objek
try {
    if (isset($_POST['tambah'])) {

        if ($_GET['aksi'] == 'tambah') {

        $id = $_POST['id'];
        $id_outlet = $_POST['id_outlet'];
        $id_member = $_POST['id_member'];
        $kode_invoice = $_POST['kode_invoice'];
        $id_member = $_POST['id_member'];
        $tgl = $_POST['tanggal'];
        $batas_waktu = $_POST['batas_waktu'];
        $status = $_POST['status'];
        $bayar = $_POST['dibayar'];
        $id_user = $_POST['id_user'];
        $paket = $_POST['id_paket'];
        $qty = $_POST['qty'];
        $ket = $_POST['keterangan'];

            //memanggil method insert
            $transaksi->insert($id, $id_outlet, $kode_invoice, $id_member, $tgl, $batas_waktu, $status, $bayar, $id_user, $paket, $qty, $ket);
        }
    } elseif ($_GET['aksi'] == 'bayar') {
        $id = $_POST['id'];
        $tanggal_bayar = $_POST['tgl_bayar'];
        $bayar = $_POST['dibayar'];

        $transaksi->bayar($id,$tanggal_bayar,$bayar);
    } elseif ($_GET['aksi'] == 'hapus') {
        $id = $_GET['id'];

        $transaksi->delete($id);

    }elseif ($_GET['aksi'] == 'update') {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $transaksi->update($id,$status);

    }
} catch (Exception $e) {
    echo $e->getMessage();
}
