<?php
include_once 'c_koneksi.php';

class c_transaksi
{

    function invoice()
    {
        $conn = new c_koneksi();

        // mengambil data barang dengan kode paling besar
        $query = mysqli_query($conn->koneksi(), "SELECT max(kode_invoice) as kodeTerbesar FROM tb_transaksi");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];

        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kodeBarang, 3, 3);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

        // membentuk kode barang baru
        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $huruf = "L";
        $kodeBarang = $huruf . sprintf("%03s", $urutan);
        return $kodeBarang;
    }

    public function insert($id, $id_outlet, $kode_invoice, $id_member, $tgl, $batas_waktu,  $status, $bayar, $id_user, $paket, $qty, $ket)
    {

        $conn = new c_koneksi();

        $sql = "INSERT INTO tb_transaksi VALUES ('$id', '$id_outlet', '$kode_invoice', '$id_member', '$tgl', '$batas_waktu', '', '', '', '', '$status', '$bayar', '$id_user', '$paket', '$qty', '$ket')";

        $query = mysqli_query($conn->koneksi(), $sql);


        if ($query) {

            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/transaksi/v_transaksi.php'</script>";
        } else {

            echo "data gagal ditambahkan";
        }
    }

    function tampil()
    {
        $conn = new c_koneksi();

        $sql = "SELECT tb_transaksi.id, tb_transaksi.kode_invoice, tb_member.nama AS member_nama, tb_transaksi.tgl, tb_transaksi.batas_waktu, tb_transaksi.status, tb_transaksi.dibayar FROM tb_transaksi JOIN tb_member ON tb_transaksi.id_member = tb_member.id  JOIN tb_outlet ON tb_transaksi.id_outlet = tb_outlet.id JOIN tb_user ON tb_transaksi.id_user = tb_user.id JOIN tb_paket ON tb_transaksi.id_paket = tb_paket.id ORDER BY tb_transaksi.kode_invoice DESC";

        $query = mysqli_query($conn->koneksi(), $sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }
        
        return $hasil;
    }

    function total_cucian($id)
    {
        $conn = new c_koneksi();

        $sql = "SELECT tb_transaksi.id, tb_transaksi.id_outlet, tb_transaksi.kode_invoice, tb_transaksi.id_member, tb_transaksi.tgl, tb_transaksi.batas_waktu, tb_transaksi.tgl_bayar, tb_transaksi.status, tb_transaksi.dibayar, tb_transaksi.id_user, tb_transaksi.id_paket, tb_transaksi.qty AS t_qty, tb_transaksi.keterangan, tb_member.nama AS membernama, tb_paket.harga AS p_harga FROM tb_transaksi JOIN tb_paket ON tb_transaksi.id_paket = tb_paket.id JOIN tb_member ON tb_transaksi.id_member = tb_member.id WHERE tb_transaksi.id=$id";

        $query = mysqli_query($conn->koneksi(), $sql);

        while ($q = mysqli_fetch_assoc($query)) {

            $hasil[] = $q;
        }

        return $hasil;
    }

    function bayar($id, $tanggal_bayar, $bayar)
    {

        $conn = new c_koneksi();

        $sql = "UPDATE tb_transaksi SET  tgl_bayar='$tanggal_bayar', dibayar='$bayar' WHERE id='$id'";

        $query = mysqli_query($conn->koneksi(), $sql);


        if ($query) {

            echo "<script>alert('Transaksi berhasil');window.location='../views/transaksi/v_transaksi.php'</script>";
        } else {

            echo "Transaksi gagal";
        }
    }

    function delete($id)
    {
        $conn = new c_koneksi();

        $query = "DELETE FROM tb_transaksi WHERE id = $id";

        mysqli_query($conn->koneksi(), $query);

        header("location:../views/transaksi/v_transaksi.php");
    }

    function edit($id)
    {
        $conn = new c_koneksi();

        $sql = "SELECT tb_transaksi.id, tb_transaksi.kode_invoice, tb_transaksi.tgl, tb_transaksi.batas_waktu, tb_transaksi.status, tb_member.nama AS member_nama FROM tb_transaksi JOIN tb_member ON tb_transaksi.id_member = tb_member.id WHERE tb_transaksi.id=$id";

        $query = mysqli_query($conn->koneksi(), $sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }

        return $hasil;
    }

    function update($id, $status)
    {
        $conn = new c_koneksi();

        $sql = "UPDATE tb_transaksi SET  status='$status' WHERE id='$id'";

        $query = mysqli_query($conn->koneksi(), $sql);


        if ($query) {

            echo "<script>alert('Data berhasil diubah');window.location='../views/transaksi/v_transaksi.php'</script>";
        } else {

            echo "Data gagal diubah";
        }
    }
}
