<?php

include_once '../controllers/c_outlet.php';

$outlet = new c_outlet();

try {
    if (isset($_POST['tambah']) || isset($_POST['update'])) {        
    
    $id = $_POST['id']; 
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['telepon'];   

        if ($_GET['aksi'] == 'tambah') {

            //memanggil method insert
            $outlet->insert($id, $nama, $alamat, $tlp);

        } elseif ($_GET['aksi'] == 'update') {

            //memanggil method update
            $outlet->update($id, $nama, $alamat, $tlp);

        }
    }elseif ($_GET['aksi'] == 'hapus') {

            $id = $_GET['id'];

            $outlet->delete($id);
        }
    } 
    catch (Exception $e) {
        echo $e->getMessage();
    }


?>