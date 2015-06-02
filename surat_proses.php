<?php
session_start(); // memulai session 
error_reporting(0);
	include "config.php";
	$id_user=$_SESSION[id_user];		
			if(isset($_POST["no_surat"]))
	{	
	$no_surat=$_POST["no_surat"];
	$id_surat=$_POST["id_surat"];
	$_SESSION[id_surat]=$id_surat;
	$id_jenis_surat=$_POST["id_jenis_surat"];
	$tgl_surat=$_POST["tgl_surat"];
	$alasan=$_POST["alasan"];
	$result= mysql_query("insert into surat (id_surat,id_jenis_surat,id_user,no_surat,tanggal_surat_dibuat,izin_kuliah,disetujui,download) VALUES ('$id_surat','$id_jenis_surat','$id_user','$no_surat','$tgl_surat','$alasan','0','0')");	  
		if(isset($_POST['no_surat']))
			{
				if($result >0)
				{
				header("Location: surat_orang.php");
			echo "<div align=center><h5><font color=blue size=6> Data berhasil diubah</font><h5></div>";	
				}
				else
			{
            echo "<div align=center><h5><font color=red size=6> Data gagal diubah</font><h5></div>";			
			}
			}	
	
		mysql_close();
		
	}
			?>	