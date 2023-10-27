<?php 
	include "includes/config.php";
	if(isset($_GET['hapusfoto'])) {
		$fotokode = $_GET["hapusfoto"];
		$hapusfoto = mysqli_query($connection, "SELECT * from fotokategori where fotokategoriID = '$fotokode'");
		$hapus = mysqli_fetch_array($hapusfoto);
		$namafile = $hapus['fotokategoriFILE'];

		mysqli_query($connection, "delete from fotokategori
			where fotokategoriID = '$fotokode'");
		unlink('images/'.$namafile);
		echo "<script>alert('DATA TELAH DIHAPUS');
			document.location='fotokategori.php'</script>";
	}
	
 ?>