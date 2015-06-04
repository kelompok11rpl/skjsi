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
	
			if(isset($_POST["no_surat2"]))
	{	
	$no_surat=$_POST["no_surat2"];
	$id_surat=$_POST["id_surat"];
	$_SESSION[id_surat]=$id_surat;
	$id_jenis_surat=$_POST["id_jenis_surat"];
	$tgl_surat=$_POST["tgl_surat"];
	$alamat=$_POST["alamat"];
	$matkul=$_POST["matkul"];
	$result= mysql_query("insert into surat (id_surat,id_jenis_surat,id_user,no_surat,tanggal_surat_dibuat,alamat_surat,keperluan_ambil_data,disetujui,download) VALUES ('$id_surat','$id_jenis_surat','$id_user','$no_surat','$tgl_surat','$alamat','$matkul','0','0')");	  
		if(isset($_POST['no_surat2']))
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
	
			if(isset($_POST["no_surat3"]))
	{	
	$no_surat=$_POST["no_surat3"];
	$id_surat=$_POST["id_surat"];
	$_SESSION[id_surat]=$id_surat;
	$id_jenis_surat=$_POST["id_jenis_surat"];
	$tgl_surat=$_POST["tgl_surat"];
	$alamat=$_POST["alamat"];
	$result= mysql_query("insert into surat (id_surat,id_jenis_surat,id_user,no_surat,tanggal_surat_dibuat,alamat_surat,disetujui,download) VALUES ('$id_surat','$id_jenis_surat','$id_user','$no_surat','$tgl_surat','$alamat','0','0')");	  
		if(isset($_POST['no_surat3']))
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
	if(isset($_POST["no_surat4"]))
	{	
	
	$no_surat=$_POST["no_surat4"];
	$id_surat=$_POST["id_surat"];
	$_SESSION[id_surat]=$id_surat;
	$id_jenis_surat=$_POST["id_jenis_surat"];
	$tgl_surat=$_POST["tgl_surat"];
	$alamat=$_POST["alamat"];
	$keperluan=$_POST["acara"];
	$hari=$_POST["hari"];
	$tanggal_mulai=$_POST["tgl_mulai"];
	$tanggal_selesai=$_POST["tgl_selesai"];
	$waktu=$_POST["pukul"];
	$tempat=$_POST["tempat"];
	$dana_bantuan=$_POST["bantuan"];
	$result= mysql_query("insert into surat (id_surat,id_jenis_surat,id_user,no_surat,tanggal_surat_dibuat,alamat_surat,keperluan,hari,tanggal_mulai,tanggal_selesai,waktu,tempat,dana_bantuan,disetujui,download) VALUES ('$id_surat','$id_jenis_surat','$id_user','$no_surat','$tgl_surat','$alamat','$keperluan','$hari','$tanggal_mulai','$tanggal_selesai','$waktu','$tempat','$dana_bantuan','0','0')");	  
		if(isset($_POST['no_surat4']))
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
	
	if(isset($_POST["no_surat5"]))
	{	
	
	$no_surat=$_POST["no_surat5"];
	$id_surat=$_POST["id_surat"];
	$_SESSION[id_surat]=$id_surat;
	$id_jenis_surat=$_POST["id_jenis_surat"];
	$tgl_surat=$_POST["tgl_surat"];
	$alamat=$_POST["alamat"];
	$hari=$_POST["hari"];
	$tanggal_mulai=$_POST["tgl_mulai"];
	$waktu=$_POST["pukul"];
	$tempat=$_POST["tempat"];
	$jumlah_peserta=$_POST["jumlah_peserta"];
	$result= mysql_query("insert into surat (id_surat,id_jenis_surat,id_user,no_surat,tanggal_surat_dibuat,alamat_surat,hari,tanggal_mulai,waktu,tempat,jumlah_peserta,disetujui,download) VALUES ('$id_surat','$id_jenis_surat','$id_user','$no_surat','$tgl_surat','$alamat','$hari','$tanggal_mulai','$waktu','$tempat','$jumlah_peserta','0','0')");	  
		if(isset($_POST['no_surat5']))
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