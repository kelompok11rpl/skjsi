<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ganti Password</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
	session_start(); // memulai session 

	include "config.php";
	if($_SESSION['level']=='usr02')
	{		 
	}
	else
	{
	header('location:notallow.html');
	}
	  
  ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SI Surat Keluar</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo "".$_SESSION['nama_user'].""; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="ganti_password_user.php"><i class="fa fa-fw fa-user"></i> Ganti password</a>
                        </li>                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                      <ul class="nav navbar-nav side-nav">
                    <li class="dropdown">
					<li>
                        <a href="beranda_user.php"><i class="fa fa-fw fa-home"></i> Beranda</a>
                    </li>
                        <li  class="active">
							<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-envelope"></i> Surat <i class="fa fa-fw fa-caret-down"></i></a>
							<ul id="demo" class="collapse">
								<li>
									<a href="transkrip.php"> Transkrip Nilai </a>
								</li>
								<li>
									<a href="izin_kuliah.php"> Izin Kuliah</a>
								</li>
								<li>
									<a href="izin_data_matkul.php"> izin Ambil Data Matkul </a>
								</li>
								<li>
									<a href="izin_data_ta.php"> Izin Ambil Data TA</a>
								</li>
								<li>
									<a href="kunjungan_industri.php"> Kunjungan Industri</a>
								</li>
								<li>
									<a href="dana_himpunan.php"> Bantuan Dana Himpunan</a>
								</li>
							</ul>
						</li>
                        <li>
                        <a href="user_kotak_masuk.php"><i class="fa fa-fw fa-folder-open"></i> Kotak masuk</a>
						</li>
                        
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Ganti Password
                        </h1>                      
						
						<div class="container-fluid">

<?php
error_reporting(0);
$id_user=$_SESSION[id_user];
$query = "SELECT * FROM user left join hak_akses on user.id_hak_akses=hak_akses.id_hak_akses where id_user ='$id_user'";
$update = mysql_query($query);
while ($data = mysql_fetch_assoc($update))
{
 $nama = $data['nama'];
 $password = $data['password'];
 $password_lama=base64_decode($password);
}

?>						
						
				<h3>Ubah Password</h3>
                <form method="post" action="ganti_password.php">
				<div class="row">
				<div class="col-md-4 col-md-offset-4">			
                
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control span12" value="<?php echo"$nama";?>"  name="nama" id="nama" readonly="readonly" required>
                </div>				
				<div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" class="form-control span12" name="password1" id="password1" required>
                </div>	
			<div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" class="form-control span12" name="password2" id="password2" required>
                </div>	
				<div class="form-group">
                    <label>Ulang Password Baru</label>
                    <input type="password" class="form-control span12" name="password3" id="password3" required>
                </div>					
				
                <div class="form-group">
                     <input type="submit" class="btn btn-primary pull-right" value="Ubah" />
                   
                </div>
                    <div class="clearfix"></div>
  </div>
</div>
				 
            </form>
			
<?php	
	if(isset($_POST["nama"]))
	{
	$nama=$_POST["nama"];
	$password1=$_POST["password1"];
	$password2=$_POST["password2"];
	$password3=$_POST["password3"];
	
	if($nama&&$password&&$password2&&$password3)
		{
	
	if($password1==$password_lama)
	{
		if($password2==$password3)
		{
		
		$password_baru=base64_encode($password2);
		$result= mysql_query("update user set password='$password_baru' where id_user='$id_user' ");	  
    
    
			if(isset($_POST['nama']))
			{
				if($result >0)
				{
			//	header("Location: admin_pengguna.php");
			echo "<div align=center><h5><font color=blue size=6> Password berhasil diubah</font><h5></div>";	
				}
				else
			{
            echo "<div align=center><h5><font color=red size=6> Password gagal diubah</font><h5></div>";			
			}
			}	
		mysql_close();
		}
		else
		{
		echo "<div align=center><h5><font color=red size=6>Password tidak sama </font><h5></div>";	
		}
		
	}
	else
	{
	 echo "<div align=center><h5><font color=red size=6>Password lama salah </font><h5></div>";	
	
	}
	}
	
		
	}
?>
            </div>
            
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
