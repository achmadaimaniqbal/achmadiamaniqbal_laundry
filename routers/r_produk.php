<?php

include_once '../controllers/c_produk.php';

$produk = new c_produk();
//membuat objek
try {
    if (isset($_POST['tambah']) || isset($_POST['update'])) {

        $id = $_POST['id'];
        $outlet = $_POST['id_outlet'];
        $jenis = $_POST['jenis'];
        $paket = $_POST['nama_paket'];
        $harga = $_POST['harga'];

        //membuat method mana yang dipanggil atau dijalankan
        if ($_GET['aksi'] == 'tambah') {

            //memanggil method insert
            $produk->insert($id, $outlet, $jenis, $paket, $harga);
        } elseif ($_GET['aksi'] == 'update') {

            //memanggil method update
            $produk->update($id, $outlet, $jenis, $paket, $harga);
        }
    } elseif ($_GET['aksi'] == 'hapus') {

        $id = $_GET['id'];

        $produk->delete($id);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
