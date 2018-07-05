<?php ob_start();


?>
<html>
<head>
  <title>Cetak PDF</title>   
   <style>
   table {border-collapse:collapse; table-layout:fixed;width: 630px;}
   table td {word-wrap:break-word;width: 20%;}
   </style>
</head>
<body>

<!-- <p><img style="margin-left:15px;width:100px;height:auto;" src=""><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AL MUHTAR CLINICAL LABORATORY</b></p> -->
<h5 style="text-align:center;">Alamat : Jl. Tamansari No.55, Bandung, Jawa Barat (xxxx).<br>Telp/Fax : (022) 594xxxx. Email : kikirizkhita@gmail.com</h5>
Penanggung Jawab : Administrator
<hr width="100%" color="black" align="center">
<br>
<?php

include_once ('koneksi.php');
 
$id_pengajuan = $_GET['id_pengajuan'];

$query =mysqli_query( $con,"SELECT NIP_pengaju,jenis_cuti,alasan_cuti,lama_cuti,tgl_mulai,tgl_selesai,alamat,no_tlp,sp_kabid,sp_alasan FROM cuti_kap  WHERE  id_pengajuan='$id_pengajuan'  ");
$data= mysqli_fetch_array($query);

$NIP=$data['NIP_pengaju'];

//ngambil data sebagai ppk/pns
$cek = mysqli_query($con,"SELECT NIP from data_ppk where NIP='$NIP'");
$as_ppk = mysqli_num_rows($cek);

//jika ppk maka, jika pns maka
if($as_ppk>0){
$query2=mysqli_query($con, "SELECT data_pns.nama,data_pns.jabatan_eselon,data_pns.pangkat_golongan,data_ppk.kode_bidang,data_pns.masa_kerja FROM data_pns inner join data_ppk on data_ppk.NIP=data_pns.NIP  WHERE  data_pns.NIP='$NIP'  ");
$data2= mysqli_fetch_array($query2);
}else{
$query2=mysqli_query($con, "SELECT data_pns.nama,data_pns.jabatan_eselon,data_pns.pangkat_golongan,anggota_bidang.kode_bidang,data_pns.masa_kerja FROM data_pns inner join anggota_bidang on anggota_bidang.NIP=data_pns.NIP  WHERE  data_pns.NIP='$NIP'  ");
$data2= mysqli_fetch_array($query2);
}

$bagian=$data2['kode_bidang'];

$ambil=mysqli_query($con,"SELECT nama from bidang where kode_bidang='$bagian'");
$data3=mysqli_fetch_array($ambil);

if($as_ppk>0){
$ppk=mysqli_query($con,"SELECT NIP from data_kadin where posisi='kepala'");
$data4=mysqli_fetch_array($ppk);	
}else{
$ppk=mysqli_query($con,"SELECT NIP from data_ppk where kode_bidang='$bagian'");
$data4=mysqli_fetch_array($ppk);
}

$nip_ppk=$data4['NIP'];

$nama_ppk=mysqli_query($con,"SELECT nama from data_pns where NIP='$nip_ppk'");
$data5=mysqli_fetch_array($nama_ppk);


?>
<h5 style="text-align:center;">IZIN SEMENTARA PELAKSANAAN CUTI KARENA ALASAN PENTING</h5>
<h5 style="text-align:center;">NOMOR.............................</h5>

<?php
//DATA PEGAWAI
echo "<div style='margin-left:20px;margin-right:40px;'>1. Diberikan izin sementara untuk melaksanakan cuti karena alasan penting kepada Pegawai Negeri Sipil:</div><br>";

echo "<table style='width:120%;margin-left:40px;'>";
echo "<tr>";
echo "<td>Nama</td><td>:&nbsp;".$data2['nama']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>NIP</td><td>:&nbsp;" .$data['NIP_pengaju']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Pangkat/Golongan ruang</td><td>:&nbsp;" .$data2['pangkat_golongan']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Jabatan</td><td>:&nbsp;" .$data2['jabatan_eselon']."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Unit Kerja</td><td>:&nbsp;" .$data3['nama']."</td>";
echo "</tr>";
echo "</table>";

//LAMA CUTI
echo "<div style='margin-left:20px;'><br></div>";
echo "<table style='margin-left:40px;margin-right:20px;'>";
echo "<tr>";
echo "<td style='width:700px;'>Selama <b>".$data['lama_cuti']."</b>&nbsp;hari. Mulai tanggal <b>".$data['tgl_mulai']."</b> sampai dengan tanggal<b>&nbsp;".$data['tgl_selesai'].", dengan ketentuan sebagai berkut :</b></td>";
echo "</tr>";
echo "<tr>";
echo "<td style='width:700px;><br><br> a. Sebelum menjalankan cuti karena alasan penting, wajib menyerahkan
pekerjaannya kepada atasan langsungnya atau pejabat lain yang ditunjuk.<br><br>
b. Setelah selesai menjalankan cuti karena alasan penting, wajib melaporkan
diri kepada atasan langsungnya dan bekerja kembali sebagaimana biasa.<br><br><br><div style='margin-left:-20px;'>2. Demikian izin sementara melaksanakan cuti karena alasan penting ini dibuat
untuk dapat digunakan sebagaimana mestinya.</div></td>";
echo "</tr>";
echo "</table>";

//lakukan if else
//TTD PPK
echo "<table style='width:300%;margin-left:500px;'>";
echo "<tr>";
echo "<td style='margin-right:10px;'><br><br><br><br>(" .$data5['nama'].")<br>..........................................................</td>";
echo "</tr><tr>";
echo "<td><br><b>NIP</b>&nbsp;:&nbsp;" .$data4['NIP']."</td>";
echo "</tr>";
echo "</table>";

//KEPUTUSAN PEJABAT
echo "<div style='margin-left:20px;'>TEMBUSAN :<br><br></div>";
echo "<table style='width:700%;margin-left:40px;margin-right:20px;'>";
echo "<tr>";
echo "<td style='width:500px;><b>1</b>&nbsp;Kepala Dinas</td>";
echo "</tr><tr>";
echo "<td style='width:500px;><b>2</b>&nbsp;Badan Kepegawaian Daerah</td>";
echo "</tr><tr>";
echo "<td style='width:500px;><b>3</b>&nbsp;dan seterusnya</td>";
echo "</tr>";
echo "</table>";


?>

<?php

$html = ob_get_contents();
ob_end_clean();

require_once('../html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');

$pdf->WriteHTML($html);
$pdf->Output('SK_Cuti.pdf', 'D');
?>