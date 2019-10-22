<?php
require_once "../koneksi.php";
session_start();

if (isset($_POST['update'])) {

    // ambil data dari formulir
    $name = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_hp'];
    $jenis_kelamin = $_POST['jk'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // buat query
    $update = "UPDATE user SET  nama = '$name', alamat = '$alamat', no_telepon='$no_telepon',
     jenis_kelamin='$_POST[jk]',email='$email', password='$password'WHERE email='" . $_SESSION['email'] . "'";
    $query = mysqli_query($koneksi, $update);
    if ($query) {
        echo "<script>
                    alert('Anda Berhasil Merubah Data')
                    window.location='../setting.php'
                </script>";
    } else {
        echo "<script>alert('Gagal Merubah Data')
             window.location='../setting.php'
         </script>";
    }
}

?>