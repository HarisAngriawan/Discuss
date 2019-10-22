<?php
require_once "koneksi.php";
session_start();
if(empty($_SESSION['email']))
{
    echo "Anda harus login untuk melihat";
}else
{
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE email='".$_SESSION['email']."' limit 1");
    $row = mysqli_fetch_assoc($result); 
    $video = mysqli_query($koneksi,"SELECT * FROM video WHERE username='".$row['nama']."'");
    $foto = mysqli_query($koneksi,"SELECT * FROM image WHERE username='".$row['nama']."'");
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>Discuss Indonesia</title>
</head>

<body>
  <!-- Start Header -->
  <nav class="navbar navbar-light" style="background-color: #fff;">
    <a class="navbar-brand">Discuss ID</a>
    <li class="form-inline">
    <?php
    if(empty($_SESSION['email']))
{
    echo '<a class="btn btn-dark" data-toggle="modal" href="#modalMasuk">LOGIN</a>';
}else
{
    echo '<a class="btn btn-dark" href="logout.php">Logout</a>';
}
    
?>
</li>
  </nav>
  <!-- End Header -->

  <!-- Start Nav -->
  <div class="container-fluid startnav">
    <div class="row">
      <div class="col navbtn">
        <a href="index.php" class="navbtnlink"><i class="material-icons material-icons-i">home
          </i></a></div>
      <div class="col navbtn">
        <a href="list.php" class="navbtnlink"><i class="material-icons material-icons-i">view_module
          </i></a></div>
      <div class="col navbtn">
        <a href="upload.php" class="navbtnlink"><i class="material-icons material-icons-i">photo_camera
          </i></a></div>
      <div class="col navbtn activenavbtn">
        <a href="profile.php" class="navbtnlink"><i class="material-icons material-icons-i">account_circle
          </i></a></div>
      <div class="col navbtn">
        <a href="setting.php" class="navbtnlink"><i class="material-icons material-icons-i">build
          </i></a></div>
    </div>
  </div>
  </div>
  <!-- End Nav -->

  <!-- Start Content -->
  <div class="container mt-3">
    <div class="row">

      <div class="col-md-12">
  <!-- jumbotron -->
  <div class="jumbotron jumbotron jb1 shadow">
    <div class="container text-center">
      <?php
      if ($row['foto_profil'] == "") {
        echo "<img src='images/foto_profil.png' class='mt-1 rounded-circle img-thumbnail' alt='' width='220px' height='220px'>";
      } else {
        echo "<img src='image/foto_user/" . $row['foto_profil'] . "' class='mt-1 rounded-circle img-thumbnail' alt='' width='220px' height='220px'>";
      }
      ?>
    </div>
  </div>
  <!-- akhir jumbotron -->

  <!-- info panel -->
  <div class="container info-panel">
    <div class=" row">
      <div class="col-2"></div>
      <div class="col-8 rounded bg-white shadow">
        <div class="container">
          <div class="row my-3">
            <div class="col-6">
              <h4><?php echo $row['username']?> <img src="images/cek.jpg" class="rounded-circle " style="width:15px; height:auto;"
                  alt=""></h4>
              <p>Hey yuk diskusi !</p>
              <a href="#" class="font-weight-light">YUK DISKUSI</a>
            </div>
            <div class="col-6 text-right my-auto"> <a href="upload.php"><button type="button" class="btn btn-success btn-lg"><img src="images/upload.png"
                  class=" img-thumbnail rounded-circle" style="width:30px;" alt=""> Upload</button></a></div>
          </div>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
  <!-- akhir info panel -->

  <!-- gallery konten -->

  <div class="container-fluid bg-white">

    <section class="gallery-block cards-gallery">
      <div class="container">
        <div class="row">
        <div class="col-md-12 mb-2 mt-2"><h1><center>VIDEO</center></h1></div>
        <?php
          for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 3; $j++) { 
              while ($all_video = mysqli_fetch_array($video)){ ?>
          <div class="col-md-4 col-sm-12">
            <div class="card border-0 transform-on-hover" style="height:350px;">
              <a class="lightbox" target="_blank" href="<?php echo " video/" .$all_video['nama_video']; ?>">
              <video width="100%" height="200" controls>
            <source src="video/<?php echo $all_video['nama_video']; ?>" type="video/mp4">
          </video>
              </a>
              <div class="card-body">
               <p style="font-size:14px;">Diunggah oleh : <b><font color="#444"><?php echo $all_video['username'];?></font></b></p>
               <p class="card-text"><font color="#02B1A6"><a href="detail_video.php?id_video=<?php echo $all_video['id_video'];?>"><?php echo $all_video['deskripsi_video'];?></a></font></p>
              </div>
            </div>
          </div>
          <?php 
              } 
      }
      } 
    ?>
    
        </div>
        <div class="row">
          <div class="col-md-12 mb-2 mt-2"><h1><center>FOTO</center></h1></div>
        <?php
          
          for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 3; $j++) { 
              while ($all_pict = mysqli_fetch_array($foto)){ ?>
          <div class="col-md-4 col-sm-12">
            <div class="card border-0 transform-on-hover" style="height:400px;">
              <a class="lightbox" target="_blank" href="<?php echo " image/" .$all_pict['nama_image']; ?>">
                <img height="250" width="150" class="col-lg-12 pt-2" src="<?php echo " image/" . $all_pict['nama_image']; ?>" controls>
              </a>
              <div class="card-body">
               <p class="card-text"><font color="#02B1A6"><a href="detail_image.php?id=<?php echo $all_pict['id_image'];?>"><?php echo $all_pict['deskripsi_image'];?></a></font></p>
              </div>
            </div>
          </div>
          <?php 
              }  
      }
      } 
    }?>
        </div>
      </div>
    </section>
  </div>
</div>

    </div>
  </div>
  <!-- End Content -->
  <!--Popup Masuk-->

  <div class="container my-4">
    <div class="row">
      <div class="col-4 p-2 m-auto mt-3 align-self-center modal" id="modalMasuk">
        <!-- Card -->
        <div class="modal-dialog modal-background">

          <!-- Card body -->
          <div class="modal-content">
            <div class="modal-body">

              <!-- Material form login-->

              <form action="fungsi/login_user.php" method="POST" ectype="multipart/form-part">
                <p class="h4 text-left py-4">Masuk <button type="button" class="close waves-effect waves-light text-right"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button></p>

                <!-- Material input email -->
                <div class="md-form">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <label for="materialFormCardEmailEx" class="font-weight-light">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>

                <!-- Material input password -->
                <div class="md-form">
                  <i class="fa fa-lock prefix grey-text"></i>
                  <label for="materialFormCardPasswordEx" class="font-weight-light">Kata Sandi</label>
                  <input type="password" class="form-control" name="password" required>
                </div>

                <div class="text-center py-4 mt-3">
                  <button class="btn btn-dark"><a class="text-white" name="">Login</a></button>
                  <p>
                    <br />
                    Belum punya akun <a class="link closemdLogin" data-toggle="modal" data-dismiss="modal" href="#modalDaftar">Daftar</a>
                </div>
              </form>
              <!-- Material form register -->

            </div>
          </div>
          <!-- Card body -->
        </div>
      </div>
    </div>
  </div>

  <!--End Popup Masuk-->

  <!--Popup Daftar-->

  <div class="container my-4">
    <div class="row">
      <div class="col-4 p-2 m-auto mt-3 align-self-center modal" id="modalDaftar">
        <!-- Card -->
        <div class="modal-dialog modal-background">

          <!-- Card body -->
          <div class="modal-content">
            <div class="modal-body">

              <!-- Material form register -->
              <form action="fungsi/register.php" method="POST" enctype="multipart/form-form">
                <p class="h4 text-left py-4">Daftar <button type="button" class="close waves-effect waves-light text-right"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button></p>

                <!-- Material input nama lengkap -->
                <div class="md-form">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <label for="materialFormCardEmailEx" class="font-weight-light">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" class="form-control" required>
                </div>
                <!-- Material input alamat -->
                <div class="md-form">
                  <i class="fa fa-lock prefix grey-text"></i>
                  <label for="exampleFormControlTextarea1">Alamat</label>
                  <textarea class="form-control" name="alamat" rows="1" required></textarea>
                </div>
                <!-- Material input telepon -->
                <div class="md-form">
                  <i class="fa fa-lock prefix grey-text"></i>
                  <label for="materialFormCardPasswordEx" class="font-weight-light">No Handphone</label>
                  <input type="text" name="no_hp" class="form-control" required>
                </div>
                <!-- Material input jenis-kelamin -->
                <div class="md-form mt-2 mb-2">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <label for="materialFormCardEmailEx" class="font-weight-light">Jenis Kelamin</label>
                  <label class="radio-inline ml-3"><input type="radio" name="jk" value="Laki-Laki" checked>Laki-Laki</label>
                  <label class="radio-inline ml-3"><input type="radio" name="jk" value="Perempuan">Perempuan</label>
                </div>
                <!-- Material input email -->
                <div class="md-form">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <label for="materialFormCardEmailEx" class="font-weight-light">Email</label>
                  <input type="email" name="email" id="materialFormCardUsenameEx" class="form-control" required>
                </div>
                <!-- Material input password -->
                <div class="md-form">
                  <i class="fa fa-lock prefix grey-text"></i>
                  <label for="materialFormCardPasswordEx" class="font-weight-light">Kata Sandi</label>
                  <input type="password" name="password" class="form-control" required>
                </div>
                <div class="text-center py-2 mt-1">
                  <button name="daftar" class="btn btn-dark">Daftar</button>
                </div>
              </form>
              <!-- Material form register -->

            </div>
          </div>
          <!-- Card body -->

        </div>
      </div>
    </div>
  </div>

  <!--End Popup Daftar-->



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>