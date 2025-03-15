<?php
require 'koneksi.php';
//ambil data di url
$id = $_GET['id'];
//query data mahasiswa berdasarkan id
$mh= query ("SELECT * FROM biodata WHERE id = $id") [0];
//query data mahasiswa
if( isset($_POST['submit']) ) {
//cek keberhasilan data
if ( ubah($_POST) > 0) {
echo "
<script>
alert('data berhasil diubah!');
document.location.href = 'index.php';
</script>
";
} else {
echo "
<script>
alert('data gagal diubah!');
document.location.href = 'index.php';
</script>
";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah data mahasiswa</title>
</head>
<body>
<h1><center>Tambah Ubah Mahasiswa</center></h1>
<hr width="40%">
<form action="" method="post">
<table bgcolor="gray" cellpadding="10" cellspacing="10" width="40%" align="center">
<input type="hidden" name="id" value="<?= $mh["id"]; ?>"></td>
<tr><td>Nama Mhs</td> <td> : </td>
<td> <input type="text" name="nama" value="<?= $mh["nama"]; ?>" ></td>
<tr><td>No Induk Mhs</td> <td> : </td>
<td> <input type="text" name="nim" value="<?= $mh["nim"]; ?>" ></td>
</tr>
<tr><td>Program Studi</td> <td> : </td>
<td> <input type="text" name="prodi" value="<?= $mh["prodi"]; ?>" ></td>
</tr>
<tr><td><button type="submit" name="submit">Ubah Data</button></td>
</tr>
</table>
</form>
</body>
</html>