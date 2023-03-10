<?php

//memulai session atau memanggil session bawaan dari php
session_start();

include_once 'c_koneksi.php';

class c_login
{
    // login multi user 
    public function login_role($username = null, $password = null)
    {

        //membuat objek baru dari kelas perintah
        $conn = new c_koneksi();

        // untuk mengecek apakah tombol login di tekan atau belum 
        if (isset($_POST['login'])) {

            //untuk mengambil semua data berdasarkan username yang di inputkan oleh user
            $sql = "SELECT * FROM tb_user WHERE username='$username'";

            // mengeksekusi perintah sql diatas
            $query = mysqli_query($conn->koneksi(), $sql);

            // merubah data menjadi array asosiatif
            $data = mysqli_fetch_assoc($query);

            //untuk mengecek apakah query select data berhasil atau tidak
            if ($data) {
                // mengecek password apakah sama atau tidak antara yang dinputkan oleh user dengan yang ada di database
                if (password_verify($password, $data['password'])) {

                    if ($data['role'] == 'admin') {

                        // membuat variabel session yang nantinya akan digunkan pada halaman tampil_data 
                        $_SESSION["data"] = $data;
                        $_SESSION["role"] = $data['role'];

                        // jika login berhasil maka berpindah kehalaman tampil_data.php 
                        header("Location: ../views/home/v_home_admin.php");
                        exit;
                    } else if ($data['role'] == 'owner') {

                        // membuat variabel session yang nantinya akan digunkan pada halaman tampil_data 
                        $_SESSION["data"] = $data;
                        $_SESSION["role"] = $data['role'];

                        // jika login berhasil maka berpindah kehalaman tampil_data.php 
                        header("Location: ../views/home/v_home_owner.php");

                        exit;
                    } else if ($data['role'] == 'kasir') {

                        // membuat variabel session yang nantinya akan digunkan pada halaman tampil_data 
                        $_SESSION["data"] = $data;
                        $_SESSION["role"] = $data['role'];

                        // jika login berhasil maka berpindah kehalaman tampil_data.php 
                        header("Location: ../views/home/v_home_kasir.php");

                        exit;
                    }
                } else {

                    //menampilkan alert login gagal dan tetap berada dihalaman login
                    echo "<script>alert('Login Gagal !!! Silahkan cek Username dan Password');window.location='../index.php'</script>";
                }
            }else{
                echo "<script>alert('Login Gagal !!! Silahkan cek Username dan Password');window.location='../index.php'</script>";
            }
        }
    }


    public function logout()
    {

        //menghapus sessian 
        session_destroy();

        // fungsi untuk berpindah kehalaman index.php 
        header("location: ../index.php");
        exit;
    }
}
