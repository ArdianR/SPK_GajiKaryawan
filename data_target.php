<h3> Target Penilaian</h3>
</p>
<?php 
	$cek_data="select * from tbl_target order by id_target";
	$querycek=mysql_query($cek_data);
	$jumlahdata = mysql_num_rows($querycek);
	if($jumlahdata==0){
		echo"<div class='alert alert-info'><center>
		<h4>Bobot pada posisi ini belum diisi</h4></br><a href='?menu=inputtarget'><p class='btn btn-danger'>
		<i class='icon-edit'></i>&nbsp; Input Nilai Prioritas $nama_posisi</p></a></center>
		</div>";
	}
	else{
?>

<?php 
echo"<a href='?menu=edittarget'><p class='btn btn-success'>
		<i class='icon-edit'></i>&nbsp; Ubah Nilai Prioritas $nama_posisi</p></a>";
?>
<?php
 	$sbbtp="select * from tbl_target";
	$ql=mysql_query($sbbtp);
	$isi=mysql_num_rows($ql);
	if ($isi==0){
		$no=1;
	}
	else{
		$no = $isi+1;
	}
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
				switch($bobot){
							  case 1: $prioritas = "Kurang diperlukan"; break;
							  case 2: $prioritas = "Opsional"; break;
							  case 3: $prioritas = "Dibutuhkan"; break;
							  case 4: $prioritas = "Sangat Dibutuhkan"; break;
							  default: $prioritas = "Nilia Tak diketahui";
						  }	
	   			echo"<tr>
					<td>
					  $nama_kriteria 
					</td>
					<td>
					$prioritas
					</td>
		</tr>";
		}
		echo"</tbody></table><hr>";	
	  /*$sql="select * from tbl_kriteria order by id_kriteria asc ";
	  $query=mysql_query($sql);
	  $jaspek=mysql_num_rows($query);
	  while($d=mysql_fetch_array($query)){
	  $id_aspek = $d["id_kriteria"];
	  $nama_aspek=$d["nama_kriteria"];
	  echo"<p><strong>$nama_aspek</strong></p>
		<table align='center' class='table  table-bordered table-highlight table-striped'>
		<thead bgcolor='#999999'>
		  <tr>
			<th width='20%' >Keterangan</th>
			<th width='20%' style='text-align:center;'>Menu</th>
			</tr>
		</thead>
	   <tbody>";
	  		$sql2="select * from tbl_kriteriaaspek where id_aspek='$id_aspek' ";
	  		$query2=mysql_query($sql2);	
//--------------------------------------------------------------------------------------------					
			$kdaspek=substr($nama_aspek,5);
//--------------------------------------------------------------------------------------------			
			while($d2 = mysql_fetch_array($query2)){
				$nama_kriteria = $d2["nama_kriteria"];
				$id_kriteria = $d2["id_kriteria"];
  $qbobot=mysql_query("select * from tbl_bobot_tiap_posisi where id_aspek='$id_aspek' and id_kriteria='$id_kriteria' and id_posisi='$getPosisi'");
  $databobot=mysql_fetch_array($qbobot);
  $bobot = $databobot["bobot"];
  switch($bobot){
				case 1: $prioritas = "Kurang diperlukan"; break;
				case 2: $prioritas = "Opsional"; break;
				case 3: $prioritas = "Dibutuhkan"; break;
				case 4: $prioritas = "Sangat Dibutuhkan"; break;
				default: $prioritas = "Nilia Tak diketahui";
			}	
	   			echo"<tr>
					<td>
					  <input type='hidden' name='urut[]' value='".$no++."'/>
					  <input type='hidden' name='posisi[]' value='".$_GET['id']."'/> 
					  $nama_kriteria 
					  <input type='hidden' name='krit[]' value='$id_kriteria'/>
					  <input type='hidden' name='aspek[]' value='$id_aspek'/>  
					</td>
					<td>
					<center>$prioritas [ bobot = $bobot ]</center>
					</td>
		</tr>";
		}
		echo"</tbody></table><hr>";	
	  } */
?>
<?php } ?>
</p></br>