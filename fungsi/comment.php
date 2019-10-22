<?php
session_start();
require_once '../koneksi.php';

if (isset($_POST['comment'])) {

$id_video = $_GET['id_video'];
$isi_comment = $_POST['isi_comment'];

$user=mysqli_query($koneksi,"SELECT * FROM user WHERE email='".$_SESSION['email']."' limit 1");
$row = mysqli_fetch_assoc($user);
$nama = $row['nama']; 

$comment = "INSERT INTO comment (id_comment, id_video , isi_comment, username, tanggal)
 VALUES (NULL, '$id_video' , '$isi_comment','$nama', CURRENT_TIMESTAMP )";
$result = mysqli_query($koneksi, $comment);

if ($result) {
    echo "<script>
        alert('berhasil comment video')
        window.location='../detail_video.php?id_video=$id_video'
    </script>";
}else {
    echo "<script>
    alert('gagal comment')
    window.location='../detail_video.php?id_video=$id_video'
</script>";
}
}