<?php
include 'koneksi.php';
// ambil data (quary) dari tabel mahasiswa
$mahasiswa = query("SELECT * FROM biodata");
//tombol ditekan
if( isset($_POST["cari"]) ) {
$mahasiswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Utama</title>
</head>
<body>
<h1> Daftar Nama Mahasiswa </h1>
<a href="tambah.php"> Tambah data Mahasiswa </a>||
<a href="registrasi.php"> Daftar Akun </a>
<br>
<br>
<from action="" method="POST">
<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian">
<button type="submit" name="cari"> Cari </button>
</from>
<br>
<table border="1" cellpadding="10" cellspacing="0" bgcolor="cyan">
<tr>
<th>No</th>
<th>Nama Mhs</th>
<th>No Induk Mhs</th>
<th>Program Studi</th>
<th>Aksi</th>
</tr>
<?php $i = 1; ?>
<?php foreach ($mahasiswa as $mhs ) : ?>
<tr>
<td> <?= $i; ?> </td>
<td> <?= $mhs ["nama"]; ?> </td>
<td> <?= $mhs ["nim"]; ?> </td>
<td> <?= $mhs ["prodi"]; ?> </td>
<td><a href="ubah.php?id=<?= $mhs ["id"]; ?> "> Edit </a> || <a href="hapus.php?id=<?= $mhs ["id"]; ?> "> Hapus</a> </td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
</body>
</html>