<?php
$getid = $_GET["id"];
#==tahun aktif=================== 
$qtahun = mysql_query("SELECT * FROM tbl_tahun WHERE status='1'");
$t=mysql_fetch_array($qtahun);
$tahunaktif = $t['tahun'];
#=====================================
?>
<h3>Penilaian Karyawan</h3>
 <?php
 $sbbtp="select * from tbl_penilaian";
	$ql=mysql_query($sbbtp);
	$isi=mysql_num_rows($ql);
	if ($isi==0){
		$no=1;
	}
	else{
		$no = $isi+1;
	}
 echo "<form action='' method='post' >";
	  echo"
		<table align='center' class='table  table-bordered table-highlight table-striped'>
		<thead bgcolor='#999999'>
		  <tr>
			<th width='20%' >Keterangan</th>
			<th width='20%' style='text-align:center;'>Menu</th>
			</tr>
		</thead>
	   <tbody>";
	  		$sql2="select * from tbl_kriteria order by id_kriteria asc ";
	  		$query2=mysql_query($sql2);			
			while($d2 = mysql_fetch_array($query2)){
				$nama_kriteria = $d2["nama_kriteria"];
				$id_kriteria = $d2["id_kriteria"];
					$qceknilai=mysql_query("select * from tbl_karyawan where id_karyawan='$getid'");
				  	$dceknilai=mysql_fetch_array($qceknilai);
					$statpendidikan = $dceknilai['jenjang_pendidikan'];
						if($statpendidikan=="s1"){ $pendd = "Sangat Baik"; $nilaipendd=4; }
						else if($statpendidikan=="d3"){ $pendd = "Cukup"; $nilaipendd=3; }
						else{ $pendd = "Kurang"; $nilaipendd=1; }
					$kehadiran = $dceknilai['kehadiran'];
						if($kehadiran<100){ $khdr = "Kurang"; $nilaihdr=1;}
						else if($kehadiran>100 && $kehadiran<200){ $khdr = "Cukup"; $nilaihdr=2;}
						else if($kehadiran>200 && $kehadiran<280){ $khdr = "Baik"; $nilaihdr=3;}
						else{ $khdr = "Sangat Baik"; $nilaihdr=4;}
	   			echo"<tr>
					<td>
					  $nama_kriteria 
					  <input type='hidden' name='krit[]' value='$id_kriteria'/>
					  <input type='hidden' name='tahun[]' value='$tahunaktif'/>
					   <input type='hidden' name='idkar[]' value='$getid'/>  
					</td>
					<td>
					<center>"; 
					if($nama_kriteria!=("Disiplin") && $nama_kriteria!=("Pendidikan")){
						echo "<input type='hidden' name='urut[]' value='".$no++."'/>"; 
					?>
					  <select name='nilai[]'>
					  <option></option>
					  <option value='4'>Sangat Baik</option>
					  <option value='3'>Baik </option>
					  <option value='2'>Cukup </option>
					  <option value='1'>Kurang </option>
					  </select>
				<?php } else { 
				echo "<input type='hidden' name='urut[]' value='".$no++."'/>"; 
				?>
					  <?php if($nama_kriteria=="Disiplin"){ ?>
                      <input type="hidden" name="nilai[]" value="<?php echo $nilaipendd ?>" />
                      <select disabled="disabled"><option><?php echo $pendd ?></option></select> 
                      <?php } ?>
                      <?php if($nama_kriteria=="Pendidikan"){ ?>
                      <input type="hidden" name="nilai[]" value="<?php echo $nilaihdr ?>" /> 
                      <select disabled="disabled"><option><?php echo $khdr ?></option></select>
                      <?php } ?>
				<?php } echo"</center></td></tr>";
		}
		echo"</tbody></table><hr>";	
	echo "<input type=\"submit\" name=\"submit\" value=\"Simpan\"  class='btn btn-success'/>
	 <a href='?menu=daftarkaryawan'><button type='button' class='btn btn-default'>Batal</button></a></form>";
?>
</p></br>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
    foreach($_POST['urut'] as $key => $urut){  
    $sql = "insert into tbl_penilaian(id_penilaian,id_karyawan,id_tahun,id_kriteria,nilai) values 
	('{$_POST['urut'][$key]}', '{$_POST['idkar'][$key]}', '{$_POST['tahun'][$key]}', '{$_POST['krit'][$key]}', '{$_POST['nilai'][$key]}')";  
    mysql_query($sql)
	or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
      echo "<script>alert('Bobot Berhasil Disimpan');
	  document.location.href='?menu=daftarkaryawan';</script>";  
    } 
	}
	?>
