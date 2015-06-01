<?php 
session_start(); // memulai session 

include "config.php"; 

	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$pass=base64_encode($password);
	$sql=mysql_query("SELECT id_user,nama,password,id_hak_akses FROM user
					  WHERE id_user = '$_POST[username]' 
					  AND password = '$pass'"); 
	$data=mysql_fetch_array($sql); 

	// untuk mendeteksi apakah user tersebut memang terdaftar, 
	// jika terdaftar, maka tidak akan menghasilkan nilai 0 (null) 
	$hasil=mysql_num_rows($sql); 

// membandingkan nilai tersebut dengan 0 
if ($hasil > 0 ) 
{ 
//meng-isi-kan variable yang telah dibentuk 
$_SESSION[id_user]=$data[id_user];
$_SESSION[nama_user]=$data[nama]; 
$_SESSION[password]=$data[pw]; 
$_SESSION[level]=$data[id_hak_akses]; 
header('location:halaman-admin.php'); 
	if($_SESSION[level]==usr01)
	{
	header('location:beranda_admin.php');
	}
	else
	{
	header('location:beranda_user.php');
	}
} 
else 
{ 
echo "<p>Login gagal! ID tidak terdaftar atau password salah</p><p><a href=\"index.php\">Ulangi Lagi</a></p>"; 

} 

?>
