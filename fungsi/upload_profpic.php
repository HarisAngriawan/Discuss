<?php
require_once "../koneksi.php";
session_start();

if (isset($_POST['ubah_foto'])) {

    $foto = $_FILES['profpic']['name'];
    $tmp = $_FILES['profpic']['tmp_name'];
    $path = "../image/foto_user/" . $foto;


    if (move_uploaded_file($tmp, $path)) {
        $update = "UPDATE user SET foto_profil= '" . $_FILES['profpic']['name'] . "' WHERE email='" . $_SESSION['email'] . "'";
        $query = mysqli_query($koneksi, $update);
    }

    if ($query) {
        echo " <script>
        alert('Anda Berhasil Merubah Data')
        window . location = '../setting.php'
        </script> ";
    } else {
        echo " <script> alert('Gagal Merubah Data')
        window . location = '../setting.php'
        </script> ";
    }
}

?>