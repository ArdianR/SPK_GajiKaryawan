<?php
#==tahun aktif=================== 
$qtahun = mysql_query("SELECT * FROM tbl_tahun WHERE status='1'");
$t=mysql_fetch_array($qtahun);
$tahunaktif = $t['tahun'];
#=====================================
?>
<h3> Bobot Penilaian <?php echo"$nama_posisi"; ?></h3>
</br>
</p>
 <?php
 echo "<form action='' method='post' >";
	  echo"<p><strong>$nama_aspek</strong></p>
		<table align='center' class='table  table-bordered table-highlight table-striped'>
		<thead bgcolor='#999999'>
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
	   			echo"<tr>
					<td>
					  <input type='hidden' name='urut[]' value='".$no++."'/>
					  $nama_kriteria 
					  <input type='hidden' name='krit[]' value='$id_kriteria'/>
					  <input type='hidden' name='tahun[]' value='$tahunaktif'/>  
					</td>
					<td>
					<center>
					  <select name='nilai[]'>
					  <option></option>
					  <option value='4'>Sangat Baik</option>
					  <option value='3'>Baik </option>
					  <option value='2'>Cukup </option>
					  <option value='1'>Kurang </option>
					  </select>
					</center>
					</td>
		</tr>";
		}
		echo"</tbody></table><hr>";	
	echo "<input type=\"submit\" name=\"submit\" value=\"Simpan\"  class='btn btn-success'/>
	 <a href='?menu=target'><button type='button' class='btn btn-default'>Batal</button></a></form>";
?>
</p></br>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
    foreach($_POST['urut'] as $key => $urut){  
    $sql = "insert into tbl_target(id_target,id_tahun,id_kriteria,nilai) values 
	('{$_POST['urut'][$key]}', '{$_POST['tahun'][$key]}', '{$_POST['krit'][$key]}', '{$_POST['nilai'][$key]}')";  
    mysql_query($sql)
	or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
      echo "<script>alert('Bobot Berhasil Disimpan');
	  document.location.href='?menu=target';</script>";  
    } 
	}
	?>
