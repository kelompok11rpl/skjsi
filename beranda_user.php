<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beranda</title>

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
	error_reporting(0);
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
					<li class="active">
                        <a href="beranda_user.php"><i class="fa fa-fw fa-home"></i> Beranda</a>
                    </li>
                        <li >
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
<?php											   
													
												$cek_permintaan=mysql_query("select count(*) as cek_permintaan from surat where disetujui='0' and id_user='$_SESSION[id_user]'");  
												while ($data = mysql_fetch_assoc($cek_permintaan))
											{
											$cek_permintaan=$data['cek_permintaan'];
											}
												
												$cek_setuju=mysql_query("select count(*) as cek_setuju from surat where disetujui='1' and id_user='$_SESSION[id_user]'");  
												while ($data2 = mysql_fetch_assoc($cek_setuju))
											{
											$cek_setuju=$data2['cek_setuju'];
											}
											
											$cek_tolak=mysql_query("select count(*) as cek_tolak from surat where disetujui='2' and id_user='$_SESSION[id_user]'");  
												while ($data3 = mysql_fetch_assoc($cek_tolak))
											{
											$cek_tolak=$data['cek_tolak'];
											if($cek_tolak==null)
											{
											$cek_tolak=0;
											}
											}
											?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Beranda
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> Beranda
                            </li>
                        </ol>
                    </div>
                </div>
             <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-envelope fa-5x fa-spin"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php  echo"$cek_permintaan";?></div>
                                        <div>Permintaan</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
					
					 <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-check fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php  echo"$cek_setuju";?></div>
                                        <div>Disetujui</div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
					
					 <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-ban fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php  echo"$cek_tolak";?></div>
                                        <div>Ditolak</div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
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
