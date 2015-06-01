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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo "".$_SESSION['nama_user'].""; ?> <b class="caret"></b></a>
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
                        <a href="beranda_admin.php"><i class="fa fa-fw fa-dashboard"></i> Beranda</a>
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
                            Pengguna
                        </h1>                      
						 <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="beranda_admin.php">Beranda</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Pengguna
                            </li>
                        </ol>
						 <div class="row">
                    <div class="col-md-12" style="top:5px">
					<div class="panel panel-default">
					<div class="panel-heading" style="text-align:center">
                        <h2>Data pengguna (Mahasiswa JSI)</h2><a href='admin_pengguna_tambah.php'><button type='submit' class='btn btn-primary'>Tambah</button></a
                        <div class="table-responsive">
                            <table class="table table-hover">
							<thead align="center">
									 <tr>											
											<th><center>Nomor</center></th> 
											<th><center>NIM</center></th>											
											<th><center>Nama</center></th>										
											<th><center>Email</center></th>
											<th><center>Status Aktif</center></th>
											<th><center>Tanggal Lahir</center></th>
											<th><center>HP</center></th>
											<th></th>
									</tr>
							</thead>
								<?php
								error_reporting(0);
								require_once 'config.php';
											
								if(isset($_GET['delete']))
								{
									$delete = $_GET['delete'];	
									
									$resultHapus = mysql_query("DELETE FROM user WHERE id_user='$delete' ");
									
									
								}            
									  
								$nomor=0;
								$result=  mysql_query("select * from user where id_hak_akses='usr02' ORDER BY id_user ASC");
									while($baris = mysql_fetch_assoc($result))
									{
									$nomor++;
										echo "
										<tbody>
											<tr>
												<td>$nomor</td>
												<td>$baris[id_user]</td>
												<td>$baris[nama]</td>
												<td>$baris[email]</td>
												<td>$baris[status]</td>
												<td>$baris[ttl]</td>
												<td>$baris[hp]</td>				
												<td>
												<a href='admin_pengguna_ubah.php?ubah=$baris[id_user]'><button type='submit' class='btn btn-warning'>Ubah</button></a>
												<a href='admin_pengguna.php?delete=$baris[id_user]'><button type='submit' class='btn btn-danger'>Hapus</button></a>
												 </td>
												
											</tr>
										<tbody>";
									}

								mysql_close();

								?>

                            </table>
                            
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
