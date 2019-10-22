<?php

require_once "../koneksi.php";

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $name = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_hp'];
    $jenis_kelamin= $_POST['jk'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // buat query
    $register = "INSERT INTO user (nama,alamat,no_telepon, jenis_kelamin,email, password) VALUES ('$name', '$alamat', '$no_telepon', '$jenis_kelamin', '$email','$password')";
    $query = mysqli_query($koneksi, $register);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        echo "<script>
                    alert('Anda Sudah Melakukan Pendaftaran')
                    window.location='../index.php'
                </script>";
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo "<script>alert('Gagal Mendaftar')
            window.location='../index.php'
        </script>";
    }


} else {
    die("Akses dilarang...");
}

?>