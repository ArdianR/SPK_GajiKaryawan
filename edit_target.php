<?php
#==tahun aktif=================== 
$qtahun = mysql_query("SELECT * FROM tbl_tahun WHERE status='1'");
$t=mysql_fetch_array($qtahun);
$tahunaktif = $t['tahun'];
#=====================================
?>
<h3> Edit Bobot Penilaian</h3>
</br>
</p>
 <?php
 echo "<form action='' method='post' >";
	  echo"<p><strong>$nama_aspek</strong></p>
		<table align='center' class='table  table-bordered table-highlight table-striped'>
		<thead>
		  <tr>
			<th width='20%' >Keterangan</th>
			<th width='20%' style='text-align:center;'>Menu</th>
			</tr>
		</thead>
	   <tbody>";
	   $no =1;
	  		$sql2="select * from tbl_kriteria order by id_kriteria asc ";
	  		$query2=mysql_query($sql2);	
//--------------------------------------------------------------------------------------------					
			//$kdaspek=substr($nama_aspek,5);
//--------------------------------------------------------------------------------------------			
			while($d2 = mysql_fetch_array($query2)){
				$nama_kriteria = $d2["nama_kriteria"];
				$id_kriteria = $d2["id_kriteria"];
				$qbobot=mysql_query("select * from tbl_target where id_kriteria='$id_kriteria'");
				$databobot=mysql_fetch_array($qbobot);
				$bobot = $databobot["nilai"];
	   			echo"<tr>
					<td>
					  <input type='hidden' name='urut[]' value='".$databobot["id_target"]."'/>
					  $nama_kriteria 
					  <input type='hidden' name='krit[]' value='$id_kriteria'/>
					  <input type='hidden' name='tahun[]' value='$tahunaktif'/>  
					</td>
					<td>
					<center>"; ?>
					  <select name='cb[]'>
					  <option></option>
					  <option value='4' <?php if($bobot==4) echo "selected";?>>Sangat Diperlukan (4)</option>
					  <option value='3' <?php if($bobot==3) echo "selected";?>>Diperlukan (3)</option>
					  <option value='2' <?php if($bobot==2) echo "selected";?>>Cukup (2)</option>
					  <option value='1' <?php if($bobot==1) echo "selected";?>>Kurang Diperlukan (1)</option>
					  </select>
					<?php echo"</center>
					</td>
		</tr>";
		}
		echo"</tbody></table><hr>";	
	echo "<input type=\"submit\" name=\"submit\" value=\"Simpan\"  class='btn btn-success'/>
	 <a href='?menu=target'><button type='button' class='btn btn-default'>Batal</button></a></form>";
?>
</p></br>
<?php
	if(isset($_POST['submit'])){
	$size = count($_POST['cb']);

	// start a loop in order to update each record
	$i = 0;
	while ($i < $size) {
	// define each variable
	$urut = $_POST['urut'][$i];
	$tahun = $_POST['tahun'][$i];
	$krit = $_POST['krit'][$i];
	$bobotpos = $_POST['cb'][$i];
	
	// do the update and print out some info just to provide some visual feedback
	$query = "UPDATE tbl_target SET 
	id_target = '$urut',
	id_tahun = '$tahun',
	id_kriteria = '$krit',
	nilai = '$bobotpos' WHERE id_target = '$urut' LIMIT 1";
	 mysql_query($query)
	or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
      echo "<script>alert('Bobot Berhasil Disimpan');
	  document.location.href='?menu=target';</script>"; 
	++$i;
	} 
	}
?>
