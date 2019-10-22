<?php
 
error_reporting(1);

require_once "koneksi.php";
session_start();

if(empty($_SESSION['email']))
{
    echo "Anda harus login untuk mengupload video";
}else
{
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE email='".$_SESSION['email']."' LIMIT 1");
    $row = mysqli_fetch_assoc($result); 
    $nama=$row['nama'];
    extract($_POST);
    
    $target_dir = "video/";
    $deskripsi = $_POST['des'];
    
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if($upd)
    {
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    if($imageFileType != "MP4" && $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
    {
        echo "File Format Not Suppoted";
    } 
    
    else
    {
        $video_path=$_FILES['fileToUpload']['name'];
        
        mysqli_query($koneksi,"insert into video(nama_video,deskripsi_video,username) values('$video_path','$deskripsi','$nama')");
        
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
        
        echo "<script>alert('Berhasil Diunggah')
        window.location='index.php'
        </script>";
    
    }
    
    }

}
  
 
?>
