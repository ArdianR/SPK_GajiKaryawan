<h3> Skor Karyawan</h3>
</p>
<?php
	$getid = $_GET["id"];
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
				$qbobot=mysql_query("select * from tbl_penilaian where id_kriteria='$id_kriteria' and id_karyawan='$getid'");
				$databobot=mysql_fetch_array($qbobot);
				$bobot = $databobot["nilai"];
				switch($bobot){
							  case 1: $prioritas = "Kurang"; break;
							  case 2: $prioritas = "Cukup"; break;
							  case 3: $prioritas = "Baik"; break;
							  case 4: $prioritas = "Sangat Baik"; break;
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
?>
</p></br>