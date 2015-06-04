<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kotak Masuk</title>

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
                        <li  class="active">
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
                            Kotak Masuk
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="beranda_user.php">Beranda</a>
                            </li>                            
							<li class="active">
                                <i class="fa fa-Plus"></i> Kotak Masuk
                            </li>
                        </ol>
                    </div>
                </div>
            <table class="table table-hover">
							<thead align="center">
									 <tr>											
											<th><center>Nomor</center></th> 
											<th><center>NIM</center></th>											
											<th><center>Nama</center></th>										
											<th><center>Jenis Surat</center></th>
											<th><center>Nomor Surat</center></th>
											<th><center>Tanggal Surat</center></th>
											<th></th>
									</tr>
							</thead>
								<?php
								error_reporting(0);
								require_once 'config.php';
								
								$nomor=0;
								$result=  mysql_query("SELECT * FROM jenis_surat left join surat on jenis_surat.id_jenis_surat=surat.id_jenis_surat left join surat_orang on surat.id_surat=surat_orang.id_surat where disetujui='0' and id_user='$_SESSION[id_user]' group by surat.id_surat DESC");
									while($baris = mysql_fetch_assoc($result))
									{
									$nomor++;
										echo "
										<tbody>
											<tr>
												<td><center>$nomor</center></td>
												<td><center>$baris[nim]</center></td>
												<td><center>$baris[nama]</center></td>
												<td><center>$baris[jenis]</center></td>
												<td><center>$baris[no_surat]</center></td>
												<td><center>$baris[tanggal_surat_dibuat]</center></td>";
												if($baris[id_jenis_surat]=='srt06')
												{
												echo "<td>Disetujui</td>";
												
												}
												else
												{
												echo"
												<td>
												<a href='surat_proses2.php?lihat=$baris[id_surat]'><button type='submit' class='btn btn-primary'>Download</button></a>
												 </td>";
												}
												echo"
											</tr>
										<tbody>";
									}

	if(isset($_GET['setuju']))
	{	
	$no_surat=$_GET['setuju'];
	//echo "$no_surat";
		$result= mysql_query("update surat set disetujui='1' where no_surat='$no_surat' ");	  
    	if($result >0)
				{
				?>
				<script type="text/javascript">alert('Permintaan disetujui');
				window.location = 'permintaan.php';</script>
			<?php
				}
				
		mysql_close();
	}
	
		if(isset($_GET['tolak']))
	{	
	$no_surat=$_GET['tolak'];
	//echo "$no_surat";
		$result= mysql_query("update surat set disetujui='2' where no_surat='$no_surat' ");	  
    	if($result >0)
				{
				?>
				<script type="text/javascript">alert('Permintaan ditolak');
				window.location = 'permintaan.php';</script>
			<?php
				}
				
		mysql_close();
	}
								?>

                            </table>
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
