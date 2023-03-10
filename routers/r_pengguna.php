<?php

include_once '../controllers/c_pengguna.php';

$pengguna = new c_pengguna();

try {
    if (isset($_POST['tambah']) || isset($_POST['update'])) {

        $id = $_POST['id'];
        $nama = $_POST['username'];
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $ido = $_POST['id_outlet'];
        $role = $_POST['role'];

        if ($_GET['aksi'] == 'tambah') {

            //memanggil method insert
            $pengguna->insert($id, $nama, $username, $pass, $ido, $role);
        } elseif ($_GET['aksi'] == 'update') {

            //memanggil method update
            $pengguna->update($id, $nama, $username, $pass, $ido, $role);
        }
    } elseif ($_GET['aksi'] == 'hapus') {

        $id = $_GET['id'];

        $pengguna->delete($id);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
