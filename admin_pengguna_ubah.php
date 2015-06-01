<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengguna</title>

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
	if($_SESSION['level']=='usr01')
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo "".$_SESSION['nama_user'].""; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="ganti_password.php"><i class="fa fa-fw fa-user"></i> Ganti password</a>
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
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="permintaan.php"><i class="fa fa-fw fa-bar-chart-o"></i> Permintaan Surat</a>
                    </li>
                    <li>
                        <a href="arsip.php"><i class="fa fa-fw fa-table"></i> Arsip</a>
                    </li>
                    <li>
                        <a href="penomoran.php"><i class="fa fa-fw fa-edit"></i> Penomoran Surat</a>
                    </li>
					<li class="active">
                        <a href="admin_pengguna.php"><i class="fa fa-fw fa-user"></i> Pengguna</a>
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
                           Tambah Pengguna
                        </h1>                      
						 <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="beranda_admin.php">Beranda</a>
                            </li>
                            <li>
                                <i class="fa fa-user"></i> <a href="admin_pengguna.php">pengguna</a>
                            </li>
							<li class="active">
                                <i class="fa fa-Plus"></i> Tambah
                            </li>
                        </ol>
						<div class="container-fluid">

<?php
error_reporting(0);
if(isset($_GET['ubah']))
{
	$ubah=$_GET['ubah'];

$query = "SELECT * FROM user left join hak_akses on user.id_hak_akses=hak_akses.id_hak_akses where id_user = '$ubah'";
$update = mysql_query($query);
while ($data = mysql_fetch_assoc($update))
{
 $id_user = $data['id_user']; 
 $nama = $data['nama'];
 $email = $data['email'];
 $status=$data['status'];
 $ttl = $data['ttl'];
 $hp = $data['hp'];
 $akses = $data['akses'];
  $id_hak_akses = $data['id_hak_akses'];

}

}

?>						
						
				<h3>Tambah Pengguna</h3>
                <form method="post" action="admin_pengguna_ubah.php">
				<div class="row">
				<div class="col-md-4 col-md-offset-4">				
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" class="form-control span12" value="<?php echo"$id_user";?>"  name="nim" id="nim" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control span12" value="<?php echo"$nama";?>"  name="nama" id="nama" required>
                </div>				
				<div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control span12" value="<?php echo"$email";?>"  name="email" id="email" required>
                </div>
				<div class="form-group">
                    <label>Status Aktif</label>
					<select name="status_aktif" size="1" class="form-control span12" required>
					<option value="Aktif">Aktif</option>
					<option value="Non-Aktif">Non-Aktif</option>
					<?php
					echo "<option selected value=$status>$status</option>";
					?>				
					</select>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control span12" value="<?php echo"$ttl";?>"  name="ttl" id="ttl" required>
                </div>
				  
				 <div class="form-group">
                    <label>HP</label>
                    <input type="number" class="form-control span12" value="<?php echo"$hp";?>"  name="hp" id="hp" required>
                </div>                
                <div class="form-group">
                    <label>Hak Akses</label>
					<select name="id_hak_akses" size="1" class="form-control span12" required>
										<?php
$query_hak=  mysql_query("SELECT * FROM user left join hak_akses on user.id_hak_akses=hak_akses.id_hak_akses");
    while($baris2 = mysql_fetch_assoc($query_hak))
   
 {   
echo "<option value=$baris2[id_hak_akses]>$baris2[akses]</option>";

}
echo "<option selected value=$id_hak_akses>$akses</option>";

?>						
					</select>
                </div>
				
                <div class="form-group">
                     <input type="submit" class="btn btn-primary pull-right" value="Ubah" />
                   
                </div>
                    <div class="clearfix"></div>
  </div>
</div>
				 
            </form>
			
<?php	
	if(isset($_POST["nim"]))
	{	
	$nim=$_POST["nim"];
	$nama=$_POST["nama"];
	$email=$_POST["email"];
	$status=$_POST["status_aktif"];
	$ttl=$_POST["ttl"];
	$hp=$_POST["hp"];
	$id_hak_akses=$_POST["id_hak_akses"];
	
		if($nim&&$nama&&$email&&$status&&$ttl&&$hp&&$id_hak_akses)
		{
		
		$result= mysql_query("update user set id_user='$nim', nama='$nama', email='$email', status='$status', ttl='$ttl', hp='$hp', id_hak_akses='$id_hak_akses' where id_user='$nim' ");	  
    
    
			if(isset($_POST['nim']))
			{
				if($result >0)
				{
			//	header("Location: admin_pengguna.php");
			echo "<div align=center><h5><font color=blue size=6> Data berhasil diubah</font><h5></div>";	
				}
				else
			{
            echo "<div align=center><h5><font color=red size=6> Data gagal diubah</font><h5></div>";			
			}
			}	
		mysql_close();
		}
		else
		{
		echo "<div align=center><h5><font color=red size=3>Form harus diisi semua</font><h5></div>";    
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
