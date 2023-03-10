<?php

include_once 'c_koneksi.php';

class c_produk{

    function tampil(){

        $conn = new c_koneksi();

        $sql = "SELECT tb_paket.id, id_outlet, tb_outlet.nama AS outlet_nama, jenis, nama_paket, harga  FROM `tb_paket` JOIN tb_outlet ON tb_paket.id_outlet=tb_outlet.id ORDER BY tb_outlet.nama ASC";

        $query = mysqli_query($conn->koneksi(), $sql);

        while($q = mysqli_fetch_object($query) ){

            $hasil[] = $q;
    }

        return $hasil;
}

    function insert($id, $outlet, $jenis, $paket, $harga){

        $conn = new c_koneksi();

        $sql = "INSERT INTO tb_paket VALUES ('$id','$outlet','$jenis','$paket','$harga')";

        $query = mysqli_query($conn->koneksi(),$sql);


        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/produk/v_list_produk.php'</script>";
         }

         else{

            echo "data gagal ditambahkan";
         }

    }

    function edit($id){

        $conn = new c_koneksi();
        
        $sql = "SELECT tb_paket.id, id_outlet, tb_outlet.nama AS outlet_nama, jenis, nama_paket, harga  FROM `tb_paket` JOIN tb_outlet ON tb_paket.id_outlet=tb_outlet.id WHERE tb_paket.id=$id ";

        $query = mysqli_query($conn->koneksi(),$sql);

        
        while ($q = mysqli_fetch_object($query)) {
                
        $hasil[] = $q;

        }

        return $hasil;
    }

    function update($id, $outlet, $jenis, $paket, $harga){

        $conn = new c_koneksi();

        $sql = "UPDATE tb_paket SET  id_outlet='$outlet', jenis='$jenis', nama_paket='$paket', harga='$harga' WHERE id='$id'";
        // echo var_dump($sql);

        $query = mysqli_query($conn->koneksi(), $sql);
        

        if ($query) {

            echo "<script>alert('Data Berhasil Di Ubah');window.location='../views/produk/v_list_produk.php'</script>";

         }

         else{

            echo "data gagal diubah";
         }


    }

    function delete($id){

        $conn = new c_koneksi();

        $query = "DELETE FROM tb_paket WHERE id = $id";

        mysqli_query($conn->koneksi(),$query);

        header("location:../views/produk/v_list_produk.php");
    }
    

}

?>