<?php
//koneksi ke data base
$conn = mysqli_connect("localhost","root","","xakademik");

function query($query) {
global $conn;
$result = mysqli_query($conn, $query);
$rows = []; 
while ($row = mysqli_fetch_assoc($result) ) {
$rows[] = $row;
}
return $rows;
}

function cari ($keyword) {
	$query = "SELECT * FROM biodata WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword' ";
	return query ($query);
}

function ubah($data) {
global $conn;
$id = $data["id"];
$nama = $data["nama"];
$nim = $data["nim"];
$prodi = $data["prodi"];
$query = "UPDATE biodata SET
nama = '$nama',
nim= '$nim',
prodi = '$prodi'
WHERE id =$id
";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function hapus ($id) {
global $conn;
mysqli_query($conn, "DELETE FROM biodata WHERE id=$id");
return mysqli_affected_rows($conn);
}

function tambah ($data) {
global $conn;
$nama = $data["nama"];
$nim = $data["nim"];
$prodi = $data["prodi"];
$query = "INSERT INTO biodata VALUES ('', '$nama', $nim, '$prodi')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function registrasi ($data) {
global $conn;
$username = strtolower(stripslashes($data["username"]));
$password = mysqli_real_escape_string($conn, $data["password"]);
$password2 = mysqli_real_escape_string($conn, $data["password2"]);
$result = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username' ");
if (mysqli_fetch_assoc($result) ) {
echo "
<script> alert ('username sudah digunakan')
</script>";
return false;
}
//cek konfirmasi password
if ($password !== $password2) {
echo "
<script>
alert('password dan konfirmasi password tidak sama')
</script>";
return false;
}
//enkripsi password
$password= password_hash($password, PASSWORD_DEFAULT);
$query = "INSERT INTO login VALUES('','$username','$password')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}
?> 