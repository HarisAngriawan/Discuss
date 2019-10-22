<?php
 
error_reporting(1);

require_once "koneksi.php";
session_start();

if(empty($_SESSION['email']))
{
    echo "Anda harus login untuk mengupload gambar";
}else
{
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE email='".$_SESSION['email']."' LIMIT 1");
    $row = mysqli_fetch_assoc($result); 
    $nama=$row['nama'];
    extract($_POST);
 
$target_dir = "image/";
$deskripsi = $_POST['des'];
 
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 
if($upd)
{
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
if($imageFileType != "JPEG" && $imageFileType != "JPG" && $imageFileType != "GIF" && $imageFileType != "PNG" && $imageFileType != "BMP" && $imageFileType != "TIFF" && $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "gif" && $imageFileType != "png" && $imageFileType != "bmp" && $imageFileType != "tiff")
{
    echo "File Format Not Suppoted";
} 
    
    else
    {
       $image_path=$_FILES['fileToUpload']['name'];
 
       mysqli_query($koneksi,"insert into image(nama_image,deskripsi_image,username) values('$image_path','$deskripsi','$nama')");
 
       move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
 
echo "<script>alert('Berhasil Diunggah')
window.location='list.php'
</script>";
    
    }
    
    }

}
  
 
?>
