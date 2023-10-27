<!doctype html>
<?php 
  include 'includes/config.php';
  $query = mysqli_query($connection, "SELECT * from area");
  $query2 = mysqli_query($connection, "SELECT * from berita");
  $query3 = mysqli_query($connection, "SELECT * from hotel");
  $query4 = mysqli_query($connection, "SELECT * from kabupaten");

  $destinasi = mysqli_query($connection, "SELECT * from kategori, destinasi, fotodestinasi
                            where kategori.kategoriID = destinasi.kategoriID
                            and destinasi.destinasiID = fotodestinasi.destinasiID" );
  $sql = mysqli_query($connection, "SELECT * from destinasi");
  $jumlah = mysqli_num_rows($sql);
  $foto = mysqli_query($connection, "SELECT * from fotodestinasi");

  $berita = mysqli_query($connection, "SELECT * from berita, destinasi, fotodestinasi 
                        where berita.destinasiID = destinasi.destinasiID 
                        and destinasi.destinasiID = fotodestinasi.destinasiID");
  $area = mysqli_query($connection, "SELECT * from area, destinasi, fotodestinasi
                      where area.areaID = destinasi.areaID and destinasi.destinasiID = fotodestinasi.destinasiID");
  $area1 = mysqli_query($connection, "SELECT * from area");
  $destinasiarea = mysqli_query($connection, "SELECT * from area, destinasi
                      where area.areaID = destinasi.areaID");
  $areapertama = mysqli_query($connection, "SELECT * from destinasi");
  $jumlah1 = mysqli_num_rows($areapertama);

  $kategoriother = mysqli_query($connection, "SELECT * from fotokategori, kategori
                              where kategori.kategoriID = fotokategori.kategoriID and kategori.kategoriID != 'KW03'");
  $thiskategori = mysqli_query($connection, "SELECT * from kategori, fotokategori where kategori.kategoriID = 'KW03' AND kategori.kategoriID = fotokategori.kategoriID");
  $deskategori = mysqli_query($connection, "SELECT * from destinasi, kategori, fotodestinasi where kategori.kategoriID = 'KW03' and destinasi.kategoriID = kategori.kategoriID and destinasi.destinasiID = fotodestinasi.destinasiID");
  
  $notthiskategori = mysqli_query($connection, "SELECT * from destinasi, kategori where kategori.kategoriID != 'KW03' and destinasi.kategoriID != 'KW03' and destinasi.kategoriID = kategori.kategoriID");
  $jmlnotthiskategori = mysqli_num_rows($notthiskategori);

  $kategorilain = mysqli_query($connection, "SELECT * from kategori where kategoriID != 'KW03'");

  $kategori = mysqli_query($connection, "SELECT * from kategori");
$desfooter = mysqli_query($connection, "SELECT * from area LIMIT 4");
  $katfooter = mysqli_query($connection, "SELECT * from kategori LIMIT 4");
 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>WISATA</title>
  </head>

  <style>
    .blockquote {
      max-width: 600px;
      margin-top: 30px;
      padding: 25px;
      background: #fbfbfb;
      border: 1px solid #8f8f8f;
      color: black;
      box-sizing: border-box;
    }

    .blockquote__text {
      text-align: justify-all;
      font-size: 17px;
    }

    .blockquote--bordered {
      border-left-width: 10px;
    }

  </style>
  <body>

    <!-- menu -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="height:70px; width: 100%; box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" fill="#18978F" class="bi bi-airplane-fill" viewBox="0 0 16 16">
  <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Z"/>
</svg>
  <a class="navbar-brand" href="index.php" style="color: #18978F;"><b>TRAVELIA</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php" style="padding-right: 20px; padding-left: 25px;">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> -->

      <li class="nav-item dropdown">
        <a class="nav-link" href="area.php" style="padding-right: 20px;">
          Destination
        </a>
        <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <php 
            if (mysqli_num_rows($query)>0) {
              while($row = mysqli_fetch_array($query)) {
                ?>
                <a class="dropdown-item" href="lembang.php"><php echo $row["areanama"]?></a>
             <php 
              }
            }
          ?>
        </div> -->
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 20px;">
          Category
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php 
            if (mysqli_num_rows($kategori)>0) {
              while($rows = mysqli_fetch_array($kategori)) {
                ?>
          <a class="dropdown-item" href="<?php echo $rows["kategorinama"]?>.php">Wisata <?php echo $rows["kategorinama"]?></a>
        <?php }} ?>
          <!-- <a class="dropdown-item" href="#">Wisata pantai</a>
          <a class="dropdown-item" href="#">Wisata Pantai</a>
          <a class="dropdown-item" href="#">Wisata Religi</a>
          <a class="dropdown-item" href="#">Wisata Kuliner</a>
          <a class="dropdown-item" href="#">Wisata Seni</a> -->
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="gallery.php" style="padding-right: 20px;">
          Gallery
        </a>
        <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <php 
            if (mysqli_num_rows($query3)>0) {
              while($row = mysqli_fetch_array($query3)) {
                ?>
                <a class="dropdown-item" href="#"><php echo $row["hotelnama"]?></a>
             <php 
              }
            }
          ?>
        </div> -->
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="berita.php" style="padding-right: 20px;">
          News
        </a>
        <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <php 
            if (mysqli_num_rows($query3)>0) {
              while($row = mysqli_fetch_array($query3)) {
                ?>
                <a class="dropdown-item" href="#"><php echo $row["hotelnama"]?></a>
             <php 
              }
            }
          ?>
        </div> -->
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="about.php" style="padding-right: 20px;">
          About
        </a>
        <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <php 
            if (mysqli_num_rows($query3)>0) {
              while($row = mysqli_fetch_array($query3)) {
                ?>
                <a class="dropdown-item" href="#"><php echo $row["hotelnama"]?></a>
             <php 
              }
            }
          ?>
        </div> -->
      </li>

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 20px;">
          Kabupaten
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <php 
            if (mysqli_num_rows($query4)>0) {
              while($row = mysqli_fetch_array($query4)) {
                ?>
                <a class="dropdown-item" href="#"><php echo $row["kabupatenNAMA"]?></a>
             <php 
              }
            }
          ?>
        </div>
      </li> -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Search" >
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-search" viewBox="0 0 16 16" style="position: relative; right: 35px;">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg>
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
   <!--  akhir menu -->

<!--    slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner">
    <div class="carousel-item active" style="height: 600px;">
      <img class="d-block w-100" src="images/wisatapantai.jpg" alt="First slide">
  </div>
</div>
</div>
<!--    akhir slider -->

<!-- ket kategori -->
<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
  <div class="col-sm-12">
  <h1 style="margin-bottom: 30px;">WISATA PANTAI</h1>
    <?php
    while($row1 = mysqli_fetch_array($thiskategori)) { ?>
      <div class="col-sm-11">
        <img src="images/<?php echo $row1["fotokategoriFILE"] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada" style="height: 300px; width: 300px; margin-left: -10px; object-fit: cover;">
      
      <div class="" style="position: absolute; top: 0%; left: 37%; text-align: justify; font-size: 18px">
      <a>Referensi: 
        <?php echo $row1["kategorireferensi"] ?> <br> 
        <?php echo $row1["kategoriketerangan"] ?>. <br> 
      </a>
      <blockquote class="blockquote blockquote--bordered">
        <p class="blockquote__text">
          Jika ditinjau dari aspek sosial dan etimologi, Wisata Pantai berarti sebuah kegiatan yang dilakukan secara sendiri atau bersama-sama untuk beraktivitas sekaligus menikmati indahnya suasana di sekitar pantai.
        </p>
      </blockquote>
      </div>
      </div>
    <?php } ?>
  </div>
</div>
   <!-- end ket kategori -->

<!-- video  -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="position:relative; margin-top: 100px;">
  <div class="carousel-inner" style="height: 400px; ">
    <div class="carousel-item active">
      <video class="img-fluid" autoplay loop muted style="display:flex; justify-content:center; width: 100%;">
        <source src="images/pantai.mp4" type="video/mp4">
      </video>
      <div class="carousel-caption" style="position: absolute; top: 130px; color: whitesmoke; text-shadow: 4px 4px 2px rgba(0,0,0,0.6);">
        <h1>Langit di atas, pasir di bawah, kedamaian di dalam.</h1>
        <h4>- Thomas Wolfe</h4>
      </div>
    </div>
  </div>
</div>
<!-- video -->

<!-- tampilan obyek -->
<div class="container" style="margin: 100px auto;">
  <h2 style="margin-bottom: 60px;">Destinasi Wisata Pantai</h2>
  <div class="row">
    <!-- cards -->
    <div class="col-sm-8">
      <?php
        if (mysqli_num_rows($deskategori)>0) {
          while ($row2 = mysqli_fetch_array($deskategori)) {?>
           <div class="card" style="width: 45rem; margin-bottom: 35px; border-radius: 10px; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
            <img class="card-img-top" style="width: 100%; height: 300px; object-fit:cover;" src="images/<?php echo $row2["fotofile"]?>" alt="Card image cap">
             <div class="card-body">
              <h4 class="card-title" style="font-size: 25px;"><?php echo $row2["destinasinama"] ?></h4>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
              <a class="card-text">
                <?php echo $row2["destinasialamat"]?>
              </a>
            </div>
           </div>
    <?php } } ?>
    </div>

    <!-- jumlah -->

    <div class="col-sm-4">
      <h4 style="margin-bottom: 30px; display: flex; justify-content: center;">Telusuri Wisata Lainnya</h4>
      <ul class="list-group" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
        <?php
        if (mysqli_num_rows($kategorilain)>0) {
          while ($rowK = mysqli_fetch_array($kategorilain)) {?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          
          Wisata <?php echo $rowK["kategorinama"]?>
          
          <a href="<?php echo $rowK["kategorinama"]?>.php" style="text-decoration: none; color: black;height: 44px;"><span class="btn btn-outline-info btn-pill">Telusuri</span></a>
        </li>
        <?php } } ?>
      </ul>

    </div>
  </div>
</div>
<!-- end obyek -->

<!-- kategori -->
<!-- <div class="container" style="margin-top: 100px;">
  <h1 style="margin-bottom: 60px; display: flex; justify-content:center;">Kategori Lainnya</h1>
  <div class="row">
      <php
    while($row4 = mysqli_fetch_array($kategoriother)) { ?>
    <div class="col-sm-4" style="margin-bottom: 30px;">
      <div class="card" style="width: 20rem; height: 25rem;border-radius: 10px; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
        <img class="card-img-top" style="width: 100%; height: 200px; object-fit:cover;" src="images/<php echo $row4["fotokategoriFILE"]?>" alt="Card image cap">
         <div class="card-body">
          <h4 class="card-title" style="font-size: 25px;"><php echo $row4["fotokategoriNAMA"] ?></h4>
          <p><php echo $row4["kategoriketerangan"] ?></p>
          <a href="#" class="btn btn-info">Telusuri</a>
        </div>
      </div>
    </div>
    <php }  ?>
  </div>
</div>  -->
<!-- end kategori -->


<!-- Footer -->
<footer class="text-center text-lg-start text-muted" style="background-color: #332D2D; margin-top: 100px;">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 text-light">
  </section>

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5 text-light" >
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            TRAVELIA
          </h6>
          <p>
            Website perjalanan terbaik dengan rekomendasi tempat wisata populer serta beragam informasi mengenai parawisata yang lengkap.
          </p>
          <div>
            <a href="" class="me-4 text-reset">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="whitesmoke" class="bi bi-facebook" viewBox="0 0 16 16" style="margin: 10;">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
              </svg>
            </a>
            <a href="" class="me-4 text-reset">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="whitesmoke" class="bi bi-twitter" viewBox="0 0 16 16" style="margin: 10;">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
              </svg>
            </a>
            <a href="" class="me-4 text-reset">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="whitesmoke" class="bi bi-google" viewBox="0 0 16 16" style="margin: 10;">
                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
              </svg>
            </a>
            <a href="" class="me-4 text-reset">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="whitesmoke" class="bi bi-instagram" viewBox="0 0 16 16" style="margin: 10;">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
              </svg>
            </a>
         </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-light">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            DESTINASI
          </h6>
          <?php
          while($rowDes = mysqli_fetch_array($desfooter)) { ?>
          <p>
            <a href="<?php echo $rowDes["areanama"]?>.php" class="text-reset text-light"><?php echo $rowDes["areanama"]?></a>
          </p>
        <?php } ?>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-light">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            KATEGORI
          </h6>
          <?php
          while($rowKat = mysqli_fetch_array($katfooter)) { ?>
          <p>
            <a href="<?php echo $rowKat["kategorinama"]?>.php" class="text-reset text-light"><?php echo $rowKat["kategorinama"]?></a>
          </p>
          <?php } ?>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-light">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i>  Jakarta, Indonesia</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
             travelia@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i>  +62 8123 1241 312</p>
          <p><i class="fas fa-print me-3"></i>  +62 2431 6451 645</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4 text-light" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset fw-bold text-light" href="https://mdbootstrap.com/">Travelia</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>