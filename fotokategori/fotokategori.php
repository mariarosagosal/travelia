<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Foto Kategori Wisata</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<?php 
ob_start();
session_start();
if(!isset($_SESSION['emailuser'])) {
	header("location:login.php");
}
?>

<?php include 'header.php';?>

<div class="container-fluid">
<div class="card shadow mb-4">


<?php
  include "includes/config.php";

  if(isset($_POST['Simpan']))
  {
  	$kodefoto = $_POST['inputkode'];
  	$namafoto = $_POST['inputnama'];
  	$kodekategori = $_POST['kodekategori'];

  	$nama = $_FILES['file']['name'];
  	$file_tmp = $_FILES["file"]["tmp_name"];

  	$ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);
  	//PERIKSA EKSTENSI FILE HARUS JPG ATAU jpg
  	if(($ekstensifile == "jpg") or ($ekstensifile == "JPG")) {
  		move_uploaded_file($file_tmp, 'images/'.$nama); //unggah file ke folder images
  		mysqli_query($connection, "insert into fotokategori values ('$kodefoto', '$namafoto', '$nama', '$kodekategori')");
  		header("location:fotokategori.php");
  	}

  }

  $datakategori = mysqli_query($connection, "select * from kategori");

?>

<body>
	<div class="row">
		<div class="col-sm-1"></div>

		<div class="col-sm-10">
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Input Photo Kategori Wisata</h1>
				</div>
			</div>

			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="kodefoto" class="col-sm-2 col-form-label">Kode Photo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="kodefoto" name="inputkode" placeholder="Kode Photo" maxlength="4">
					</div>
				</div>

				<div class="form-group row">
					<label for="namafoto" class="col-sm-2 col-form-label">Nama Photo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="namafoto" name="inputnama" placeholder="Nama Photo">
					</div>
				</div>

				<div class="form-group row">
					<label for="file" class="col-sm-2 col-form-label">Photo Wisata</label>
					<div class="col-sm-10">
						<input type="file" id="file" name="file">
						<p class="help-block">Field ini digunakan untuk unggah file</p>
					</div>
				</div>

				<div class="form-group row">
                    <label for="namakategori" class="col-sm-2 col-form-label">Nama kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="namakategori" name="kodekategori">
					    	<?php 
					    	while($row = mysqli_fetch_array($datakategori)) {
					    	?>
						    	<option value="<?php echo $row["kategoriID"] ?>">
						    		<?php echo $row["kategoriID"]?>
						    		<?php echo $row["kategorinama"]?>
						    	</option>
					    	<?php } ?>
					    </select>
                    </div>
         </div>
				

				<div class="form-group row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan" style="background-color: #6C4AB6;">
						<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
					</div>
				</div>

			</form>
		</div>

		<div class="col-sm-1"></div>
	</div>
	

	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Daftar Photo kategori Wisata</h1>
				</div>
			</div>	
		
			<table class="table table-hover table-primary">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Kode Photo</th>
						<th>Nama Photo Wisata</th>
						<th>Foto kategori</th>
						<th>Kode kategori</th>
						<th colspan="2" style="text-align: center">Action</th>
					</tr>
				</thead>

				<tbody>
					<?php $query = mysqli_query($connection, "select * from fotokategori");
					$nomor = 1;
					while($row = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?php echo $nomor;?></td>
							<td><?php echo $row['fotokategoriID'];?></td>
							<td><?php echo $row['fotokategoriNAMA'];?></td>
							<td>
							<?php
								if(is_file("images/".$row['fotokategoriFILE'])) { ?>
									<img src="images/<?php echo $row['fotokategoriFILE']?>" width="80">
								<?php }

								else 
									echo "<img src='images/noimage.png' width='80'>"
								?>
							</td>
							<td><?php echo $row['kategoriID'];?></td>

						<!-- icon edit + delete -->
							<td>
								<a href="fotokategoriubah.php?ubahfoto=<?php echo $row["fotokategoriID"]?>" class="btn btn-success btn-sm" title="Edit">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
									<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
									<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg>
								</a>
							</td>

							<td>
								<a href="fotokategorihapus.php?hapusfoto=<?php echo $row["fotokategoriID"]?>" class="btn btn-danger btn-sm" title="Delete">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
									<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
									</svg>
								</a>
							</td>
							<!-- close icon edit + delete -->
						</tr>
						<?php $nomor += 1;
					}

					?>
				</tbody>
			</table>

		</div>
		<div class="col-sm-1"></div>
	</div>
</body>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</div> 
</div> <!-- penutup container-fluid -->
<?php include "footer.php";?>
<?php 
mysqli_Close($connection);
ob_end_flush();
?>

</html>