<?php
require 'koneksi.php';
if(isset($_POST["registrasi"])){
if (registrasi($_POST)>0) {
echo "
<script>
alert('user berhasil ditambahkan');
document.location.href ='index.php';
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
<title>Halaman Registrasi</title>
</head>
<body>
<h1> Halaman Registrasi </h1>
<form action="" method="post">
<div>
<label for="username"> User Name : </label> <br>
<input type="text" name="username" id="username">
</div>
<div>
<label for="password"> Password : </label> <br>
<input type="password" name="password" id="password">
</div>
<div>
<label for="password2"> Confirmation Password : </label> <br>
<input type="password" name="password2" id="password2">
</div>
<div><button type="submit" name="registrasi"> Daftar</button></div>
</form>
</body>
</html>