<div class="content"> 
</p>
<h3>Perhitungan Core factor & Secondary Factor</h3></br>
<?php
		echo "<h4>Core Factor</h4>
		<table class='table table-bordered table-striped'><tr>
		<td width='5%'>No.</td>
		<td>Nama Karyawan</td>";
		$qkrit=mysql_query("select * from tbl_target where nilai='4' order by id_kriteria");
		while($dkrit=mysql_fetch_array($qkrit)){
			echo"<td>$dkrit[id_kriteria]</td>";					
		}
			echo"<td>Core Factor</td>";
			echo "</tr>";
			$no1 = 1;
			$qkaryawan=mysql_query("select * from tbl_karyawan order by id_karyawan");
			while($dtkaryawan=mysql_fetch_array($qkaryawan)){
				echo "
				<tr>
				  <td>$no1</td>
				  <td>$dtkaryawan[nama_karyawan]</td>";
				  $qkrit1=mysql_query("select * from tbl_target where nilai='4' order by id_kriteria");
				  $jumlahbobot= mysql_num_rows($qkrit1);
				  while($dkrit1=mysql_fetch_array($qkrit1)){
						$qpn=mysql_query("select * from tbl_penilaian where id_kriteria='$dkrit1[id_kriteria]' and id_karyawan='$dtkaryawan[id_karyawan]' 
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
							#( Rumus Total CF )
							$corefactor+=$bobotnilaigap/$jumlahbobot;
							#==============================
							echo"<td><strong>$bobotnilaigap</strong></td>";		 
				  }
				  $no1++;
				  $nilaiCoreFactor = number_format($corefactor,2);
			echo"<td><strong>$nilaiCoreFactor</strong></td>";
			$corefactor = 0;
			}
				  
		echo"</tr></table><hr>";
#=================================== SeCondary Factor ==============================
echo "<h4>Secondary Factor</h4>
		<table class='table table-bordered table-striped'><tr>
		<td width='5%'>No.</td>
		<td>Nama Karyawan</td>";
		$qkrit2=mysql_query("select * from tbl_target where nilai!='4' order by id_kriteria");
		while($dkrit2=mysql_fetch_array($qkrit2)){
			echo"<td>$dkrit2[id_kriteria]</td>";					
		}
			echo"<td>Secondary Factor</td>";
			echo "</tr>";
			$no2 = 1;
			$qkaryawan2=mysql_query("select * from tbl_karyawan order by id_karyawan");
			while($dtkaryawan2=mysql_fetch_array($qkaryawan2)){
				echo "
				<tr>
				  <td>$no1</td>
				  <td>$dtkaryawan2[nama_karyawan]</td>";
				  $qkrit2=mysql_query("select * from tbl_target where nilai!='4' order by id_kriteria");
				  $jumlahbobot2= mysql_num_rows($qkrit2);
				  while($dkrit2=mysql_fetch_array($qkrit2)){
						$qpn2=mysql_query("select * from tbl_penilaian where id_kriteria='$dkrit2[id_kriteria]' and id_karyawan='$dtkaryawan2[id_karyawan]' 
						order by id_kriteria");
				  		$dpn2=mysql_fetch_array($qpn2);
						    $qt1=mysql_query("select * from tbl_target where id_kriteria='$dpn2[id_kriteria]' order by id_kriteria");
							$dtr1=mysql_fetch_array($qt1);
							#=== Rumus GAP==============
							$gap2 = $dpn2['nilai'] - $dtr1['nilai'];
							#====== Bobot Nilai Gap
							switch($gap2){
								case 0: $bobotnilaigap2 = 6; break;
								case 1: $bobotnilaigap2 = 5.5; break;
								case -1: $bobotnilaigap2 = 5; break;
								case 2: $bobotnilaigap2 = 4.5; break;
								case -2: $bobotnilaigap2 = 4; break;
								case 3: $bobotnilaigap2 = 3.5; break;
								case -3: $bobotnilaigap2 = 3; break;
								default: $bobotnilaigap2 = "~";
							}
							#( Rumus Total CF )
							$secondfactor+=$bobotnilaigap2/$jumlahbobot2;
							#==============================
							echo"<td><strong>$bobotnilaigap2</strong></td>";		 
				  }
				  $no2++;
				  $nilaiSecondFactor = number_format($secondfactor,2);
			echo"<td><strong>$nilaiSecondFactor</strong></td>";
			$secondfactor = 0;
			}
				  
		echo"</tr></table><hr>";
?>
</p>
</div>  