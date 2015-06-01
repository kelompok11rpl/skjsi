<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Surat</title>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo "".$_SESSION['nama_user'].""; ?><b class="caret"></b></a>
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
                            Surat Izin Kuliah
                        </h1>
                         <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="beranda_user.php">Beranda</a>
                            </li>                            
							<li class="active">
                                <i class="fa fa-Plus"></i> Surat
                            </li>
                        </ol>
                    </div>
							<div class="container-fluid">				
                <form method="post" action="izin_kuliah.php">
				<div class="row">
				<div class="col-md-4 col-md-offset-4">	
			
				 <div class="form-group">
                    <label>Mahasiswa</label>
                    <input type="text" class="form-control span12" placeholder="NIM" name="nim" id="nim" required>					
                </div>  
				<div class="form-group">                    
					<input type="text" class="form-control span12" placeholder="Nama" name="nama" id="nama" required>
                </div> 				
                 <div class="form-group">
                    <input type="submit" class="btn btn-primary pull-right" value="Tambahkan" />
					 <a href='admin_pengguna_ubah.php?ubah=$baris[id_user]'><button type='submit' class='btn btn-warning'>Lanjut</button></a>
                   
                </div>
               				 
                    <div class="clearfix"></div>
  </div>
</div>
				 
            </form>
			<?php
			if(isset($_POST["jumlah_mahasiswa"]))
			{	
			$jumlah=$_POST["jumlah_mahasiswa"];
			}
			?>
			<form method="post" action="admin_pengguna_tambah.php" hidden="hidden">
				<div class="row">
				<div class="col-md-4 col-md-offset-4">				
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" class="form-control span12" name="nim" id="nim" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control span12" name="nama" id="nama" required>
                </div>
				<div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control span12" name="password" id="password" required>
                </div>
				<div class="form-group">
                    <label>Ulang Password</label>
                    <input type="password" class="form-control span12" name="password2" id="password2" required>
                </div>
				<div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control span12" name="email" id="email" required>
                </div>
				<div class="form-group">
                    <label>Status Aktif</label>
					<select name="status_aktif" size="1" class="form-control span12" required>
					<option value="Aktif">Aktif</option>
					<option value="Non-Aktif">Non-Aktif</option>					
					</select>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control span12" name="ttl" id="ttl" required>
                </div>
				  
				 <div class="form-group">
                    <label>HP</label>
                    <input type="number" class="form-control span12" name="hp" id="hp" required>
                </div>                
                <div class="form-group">
                    <label>Hak Akses</label>
					<select name="hak_akses" size="1" class="form-control span12" required>
					<option value="usr01">Admin</option>
					<option value="usr02">Mahasiswa</option>					
					</select>
                </div>
				
                <div class="form-group">
                     <input type="submit" class="btn btn-primary pull-right" value="Tambah" />
                   
                </div>
                    <div class="clearfix"></div>
  </div>
</div>
				 
            </form>

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
