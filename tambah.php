<?php
require 'koneksi.php';
if(isset($_POST["submit"])){
	if (tambah($_POST)>0) {
		echo "
		<script>
		alert('Data Berhasil Ditambah');
		document.location.href = 'index.php'
		</script>";
	}else{
		mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PENAMBAHAN DATA/INSERT DATA</title>
</head>
<body>
<form method="post" action=" ">
	<table border="0" cellpadding="10" cellspacing="0" align="center" bgcolor="lightblue">
		<tr><td colspan="2" align="center"><h2>PENAMBAHAN DATA/INSERT DATA</h2><hr></td></tr>
		<tr><td>No Induk Mhs</td><td><input type="text" onkeyup="isi_otomatis()" name="nim"></td></tr>
		<tr><td>Nama Mahasiswa</td><td><input type="text" name="nama"></td></tr>
		<tr><td>Jenis Kelamin</td><td>
			<input type="radio" name="jenis_kelamin" value="L">Laki Laki
			<input type="radio" name="jenis_kelamin" value="P">Perempuan
		</td></tr>
		<tr><td>Program Studi</td><td>
			<select name="prodi">
				<option value="Teknik Informatika">Teknik Informatika</option>
				<option value="Bisnis Digital">Bisnis Digital</option>
				<option value="Teknologi Informasi">Teknologi Informasi</option>
			</select>
		</td></tr>
		<tr><td>Alamat</td><td><input type="text" name="alamat"></td></tr>
		<tr><td colspan="2"><button type="submit" name="submit">Simpan</button></td></tr>
	</table>
</form>
</body>
</html>