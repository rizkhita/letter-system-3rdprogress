$query=mysqli_query($con,"SELECT data_pns.NIP,cuti_lahir.id_pengajuan,data_pns.nama,cuti_lahir.NIP_pengaju,cuti_lahir.tgl_pengajuan,cuti_lahir.alasan_cuti,cuti_lahir.lama_cuti,cuti_lahir.tgl_mulai,cuti_lahir.tgl_selesai,cuti_lahir.provinsi,cuti_lahir.no_tlp FROM cuti_lahir inner join data_pns on cuti_lahir.NIP_pengaju=data_pns.NIP inner join data_pns on cuti_lahir.NIP_pengaju=data_pns.NIP where data_pns.NIP=cuti_lahir.NIP_pengaju ");


<!-- <br><br><br><br>
<table border="1" style="width:200%;margin:auto;">
<tr>
  
  <th style='text-align:center;'>No.</th>
  <th style='text-align:center;'>Golongan darah</th>
  <th style='text-align:center;'>Rhesus</th>
</tr>

<style type="text/css">
table th{
  background: #7386D5;
}
table tr td{
  width:10px;
}
</style>
<?php
      $i=0;
      for ($i=0; $i <1 ; $i++) { 
        # code...
       
        echo "<tr>";
        echo "<td style='width:40px;text-align:center;'>".$i."</td>";
        echo "<td style='text-align:center;'>".$data['golongan']."</td>";
        echo "<td style='text-align:center;'>".$data['rhesus']."</td>";    
        echo "</tr>";
       
}
    $i++;
    
  
?>
</table> -->

<br><br><br><br><br><br><br>
<h5 style="text-align:right;margin-right:50px;">Pemeriksa&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
<<!-- h5 style="text-align:right;margin-right:50px;"><img style="width:100px;height:auto;" src="img/logo.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5> -->
<!-- <img style="margin-right:15px;width:100px;height:auto;" src="img/logo.png"> -->
<h6 style="text-align:right;margin-right:50px;"> Dr. Rizhita Habib Muhtar Sp.PD-KEMD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>
</body>
</html>