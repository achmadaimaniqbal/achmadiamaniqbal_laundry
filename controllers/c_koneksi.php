<?php
//membuat koneksi ke database
class c_koneksi{

    function koneksi(){

        $conn = mysqli_connect('localhost','root','','laundy');

        // return $conn;

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }else{
            return $conn;
        }
    }
}

?>