<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
require_once "../koneksi.php";
 
// menangkap data yang dikirim dari form

$email = $_POST['email'];
$password = md5($_POST['password']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where email='$email' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	echo "<script>alert('Anda Telah berhasil login')
            window.location='../index.php?=$email'
        </script>";

}else{
   echo "<script>alert('Login Gagal, Email atau Password Salah')
            window.location='../index.php'
        </script>";
}
?>