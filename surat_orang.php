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
			
					<form method="post" action="surat_orang.php" >
					<h4>Masukkan NIM dan Nama mahasiswa </h4>
				<div class="row">
				<div class="col-md-4 col-md-offset-4">				
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" class="form-control span12" name="nim" id="nim"  >
                </div>
				<div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control span12" name="nama" id="nama" >
                </div>
               
								
                <div class="form-group">
                     <input type="submit" class="btn btn-primary pull-right" value="Tambah" />
					 <a href="beranda_user.php"><i class="fa fa-fw fa-floppy-o"></i>Selesai</a>
                </div>
                    <div class="clearfix"></div>
  </div>
</div>
				 
            </form>
			<div class="col-md-12" style="top:5px">
					<div class="panel panel-default">
					<div class="panel-heading" style="text-align:center">
			<table class="table table-hover" class="col-lg-12">
							<thead align="center">
									 <tr>											
											<th><center>Nomor</center></th> 
											<th><center>NIM</center></th>											
											<th><center>Nama</center></th>	
									</tr>
							</thead>
			<?php
			
			$query3 = "SELECT max(id_surat_orang) as maxID3 FROM surat_orang";
							$penomoran3 = mysql_query($query3);
							while ($data3 = mysql_fetch_assoc($penomoran3))
							{
							 $id_surat_orang = $data3['maxID3'];							 	
							}
							//echo "$no_surat";
							
							if($id_surat_orang)
							{
							$id_surat_orang=(int)substr($id_surat_orang,11,3);
							$id_surat_orang++;
							$baru3='MHS-srt-01-';
							$newid3=$baru3.sprintf("%03s", $id_surat_orang);
							//echo "$newid";
							}
							else
							{
								$baru3='MHS-srt-01-';	
								$no3='001';
								$newid3=$baru3.$no3;
								//echo"$newid";
							}
			
			if(isset($_POST["nim"]))
	{	
	$nim=$_POST["nim"];
	$nama=$_POST["nama"];
	$id_surat=$_SESSION[id_surat];
		$result= mysql_query("insert into surat_orang (id_surat_orang,id_surat,nim,nama) VALUES ('$newid3','$id_surat','$nim','$nama')");	
	}
	$nomor=0;
								$result2=  mysql_query("select * from surat_orang where id_surat='$id_surat' ORDER BY nim ASC");
									while($baris2 = mysql_fetch_assoc($result2))
									{
									$nomor++;
										echo "
										<tbody>
											<tr>
												<td><center>$nomor</center></td>
												<td><center>$baris2[nim]</center></td>
												<td><center>$baris2[nama]</center></td>												
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
