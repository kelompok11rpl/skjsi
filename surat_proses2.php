<?php
session_start();	
	include "config.php";
	
if(isset($_GET['lihat']))
	{	
	$id_surat=$_GET['lihat'];
	$no=0;
	$query = "SELECT * FROM surat left join surat_orang on surat.id_surat=surat_orang.id_surat left join jenis_surat on surat.id_jenis_surat=jenis_surat.id_jenis_surat where surat.id_surat = '$id_surat'";
$update = mysql_query($query);
while ($data = mysql_fetch_assoc($update))
{
$no++;
 $no_surat = $data['no_surat']; 
 $tanggal_surat_dibuat = $data['tanggal_surat_dibuat'];
 $tanggal_mulai = $data['tanggal_mulai'];
 $tanggal_selesai = $data['tanggal_selesai'];
 $alamat_surat = $data['alamat_surat'];
 $tempat = $data['tempat'];
 $waktu = $data['waktu'];
 $dana_bantuan = $data['dana_bantuan'];
 $jumlah_peserta = $data['jumlah_peserta'];
 $izin_matkul = $data['izin_matkul'];
 $izin_kuliah = $data['izin_kuliah'];
 $keperluan_ambil_data = $data['keperluan_ambil_data'];
 $tujuan = $data['tujuan'];
 $keperluan = $data['keperluan'];
 $nim = $data['nim'];
 $id_jenis_surat = $data['id_jenis_surat'];
 $nama=$data['nama'];
 $no;
 
 $tgl_tgl=(int)substr($tanggal_surat_dibuat,8,2);
 $tgl_bulan=(int)substr($tanggal_surat_dibuat,5,2);
 $tgl_tahun=(int)substr($tanggal_surat_dibuat,0,2);

}

if($id_jenis_surat=='srt01')
{?>
<script type="text/javascript">
window.location = 'surat_baru.php?surat=<?php echo"$id_surat";?>';</script>
<?php
}
else
{
if($id_jenis_surat=='srt02')
{?>
<script type="text/javascript">
window.location = 'surat_baru2.php?surat=<?php echo"$id_surat";?>';</script>
<?php
}
else
{
if($id_jenis_surat=='srt03')
{?>
<script type="text/javascript">
window.location = 'surat_baru2.php?surat=<?php echo"$id_surat";?>';</script>
<?php
}
}
}
	}
?>