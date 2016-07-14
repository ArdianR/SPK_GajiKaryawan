<?php
$getKaryawan = $_GET['id'];
?>
<h4>Bobot Nilai GAP Karyawan</h4>
<?php
	
	echo"
	<table class='table table-bordered table-striped'>
	<tr>
	<td>No.</td>
	<td>Nama Karyawan</td>";
		$qkriteria=mysql_query("select * from tbl_kriteria order by id_kriteria");
		while($data=mysql_fetch_array($qkriteria)){
			echo "<td>$data[id_kriteria]</td>";
		}
		echo "</tr>";
			$no2 = 1;
			$qkaryawan2=mysql_query("select * from tbl_karyawan order by id_karyawan");
			while($dtkaryawan2=mysql_fetch_array($qkaryawan2)){
				echo "
				<tr>
				  <td>$no2</td>
				  <td>$dtkaryawan2[nama_karyawan]</td>";
				  $qkrit2=mysql_query("select * from tbl_kriteria order by id_kriteria");
				  while($dkrit2=mysql_fetch_array($qkrit2)){
						$qpn2=mysql_query("select * from tbl_penilaian where id_kriteria='$dkrit2[id_kriteria]' and id_karyawan='$dtkaryawan2[id_karyawan]' 
						order by id_kriteria");
				  		$dpn2=mysql_fetch_array($qpn2);
						    $qt=mysql_query("select * from tbl_target where id_kriteria='$dpn2[id_kriteria]' order by id_kriteria");
							$dtr=mysql_fetch_array($qt);
							#=== Rumus GAP==============
							$gap = $dpn2['nilai'] - $dtr['nilai']; 
						echo"<td>$gap</td>";
				  }
				  $no2++;
				}
				 echo"<tr  class='info'><td colspan='30'><center>Bobot Nilai GAP</strong></td>";
				#============
			$no = 1;
			$qkaryawan=mysql_query("select * from tbl_karyawan order by id_karyawan");
			while($dtkaryawan=mysql_fetch_array($qkaryawan)){
				echo "
				<tr>
				  <td>$no</td>
				  <td>$dtkaryawan[nama_karyawan]</td>";
				  $qkrit=mysql_query("select * from tbl_kriteria order by id_kriteria");
				  while($dkrit=mysql_fetch_array($qkrit)){
						$qpn=mysql_query("select * from tbl_penilaian where id_kriteria='$dkrit[id_kriteria]' and id_karyawan='$dtkaryawan[id_karyawan]' 
						order by id_kriteria");
				  		$dpn=mysql_fetch_array($qpn);
						    $qt2=mysql_query("select * from tbl_target where id_kriteria='$dpn[id_kriteria]' order by id_kriteria");
							$dtr2=mysql_fetch_array($qt2);
							#=== Rumus GAP==============
							$gap = $dpn['nilai'] - $dtr2['nilai'];
							#====== Bobot Nilai Gap
							switch($gap){
								case 0: $bobotnilaigap = 6; break;
								case 1: $bobotnilaigap = 5.5; break;
								case -1: $bobotnilaigap = 5; break;
								case 2: $bobotnilaigap = 4.5; break;
								case -2: $bobotnilaigap = 4; break;
								case 3: $bobotnilaigap = 3.5; break;
								case -3: $bobotnilaigap = 3; break;
								default: $bobotnilaigap = "~";
							}		 
						echo"<td><strong>$bobotnilaigap</strong></td>";
				  }
				  $no++;
				}
	echo"</table>";	
?>