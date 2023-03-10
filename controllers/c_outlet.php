<?php

require_once 'c_koneksi.php';

class c_outlet{

    //read atau mengambil data dari database untuk ditampilkan ke view v_list_outlet
    function tampil(){

        $conn = new c_koneksi();

        $sql = "SELECT * FROM tb_outlet";

        $query = mysqli_query($conn->koneksi(), $sql);

        while($q = mysqli_fetch_object($query) ){

            $hasil[] = $q;
    }

        return $hasil;
}
    //membuat method tambah data
    function insert($id, $nama, $alamat, $tlp){
        
        //memanggil method atau function
        $conn = new c_koneksi();

        $sql = "INSERT INTO tb_outlet VALUES ('$id','$nama','$alamat','$tlp')";

        //perintah input ke database
        $query = mysqli_query($conn->koneksi(),$sql);


        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/outlet/v_list_outlet.php'</script>";
         }

         else{

            echo "data gagal ditambahkan";
         }

    }

    function edit($id){

        $conn = new c_koneksi();
        
        $sql = "SELECT * FROM tb_outlet WHERE id=$id ";

        $query = mysqli_query($conn->koneksi(),$sql);

        
        while ($q = mysqli_fetch_object($query)) {
                
        $hasil[] = $q;

        }

        return $hasil;
    }

    function update($id, $nama, $alamat, $tlp){

        $conn = new c_koneksi();

        $sql = "UPDATE tb_outlet SET  nama='$nama', alamat='$alamat', tlp='$tlp' WHERE id='$id'";

        $query = mysqli_query($conn->koneksi(), $sql);
        

        if ($query) {

            echo "<script>alert('Data Berhasil Di Ubah');window.location='../views/outlet/v_list_outlet.php'</script>";

         }

         else{

            echo "data gagal diubah";
         }


    }

    function delete($id){

        $conn = new c_koneksi();

        $query = "DELETE FROM tb_outlet WHERE id = $id";

        mysqli_query($conn->koneksi(),$query);

        header("location:../views/outlet/v_list_outlet.php");
    }
    

}

?>