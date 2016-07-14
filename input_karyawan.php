<?php
  $sql="select * from tbl_karyawan";
  $query=mysql_query($sql);
  $jumlah=mysql_num_rows($query);
  $urut = $jumlah + 1;
  
		if($jumlah > 0){
			$s="select * from tbl_karyawan order by id_karyawan desc";
  			$q=mysql_query($s);
			$d=mysql_fetch_array($q);
			$kode=$d["id_karyawan"];
			$trim=substr($kode,2,1)+1;
				if($trim<10){$kodeauto="K0".$trim;}
				else if($trim>100){$kodeauto="K".$trim;}
			}
		else{
			  if($jumlah<10){$kodeauto="K0".$urut;}
			  else if($jumlah>=10){$kodeauto="K".$urut;}
			}
	
?>
<h3>Tambah Data Karyawan</h3>
</br>
<form action="" method="post">
<table width="894" border="0">
  <tr>
    <td width="183" height="25" valign="top">Nama Karyawan</td>
    <td width="35" align="center">:</td>
    <td width="662"><input type="text" placeholder="Nama Karyawan" name="nama" required="required" />
    				<input type="hidden" value="<?php echo $kodeauto?>" name="id" required="required" /></td>
  </tr>
  <tr>
    <td height="25" valign="top">Alamat</td>
    <td align="center" valign="top">:</td>
    <td><textarea cols="6" name="alamat" placeholder="Alamat Karyawan"></textarea></td>
  </tr>
  <tr>
    <td height="25" valign="top">Nomer Telepon</td>
    <td align="center" valign="top">:</td>
    <td><input type="text" required="required" name="telepon" placeholder="Nomer Telepon"/></td>
  </tr>
  <tr>
     <td height="25" valign="top">Status Karyawan</td>
    <td align="center" valign="top">:</td>
    <td>
    <select name="status_karyawan" >
       <option value=""> -- Status Karyawan --</option>
       <option value="kontrak"> Karyawan Kontrak</option>
       <option value="tetap"> Karyawan Tetap</option>
   </select>
     </td>
  </tr>
   <tr>
    <td height="25" valign="top">Usia</td>
    <td align="center" valign="top">:</td>
    <td><input type="text" required="required" name="usia" placeholder="Usia"/></td>
  </tr>
  <tr>
    <td height="25" valign="top">Agama</td>
    <td align="center" valign="top">:</td>
    <td><input type="text" required="required" name="agama" placeholder="Agama"/></td>
  </tr>
   <tr>
     <td height="25" valign="top">Pendidikan</td>
    <td align="center" valign="top">:</td>
    <td>
    <select name="jenjang_pendidikan" >
       <option value=""> -- Jenjang Pendidikan --</option>
       <option value="sma"> SMA / SMK</option>
       <option value="d3"> D3</option>
       <option value="s1"> S1</option>
   </select>
     </td>
  </tr>
  <tr>
    <td height="25" valign="top">Jumlah Kehadiran</td>
    <td align="center" valign="top">:</td>
    <td><input type="text" required="required" name="kehadiran" placeholder="Kehadiran Dalam 1 Tahun"/></td>
  </tr>
  <tr>
    <td height="13" valign="top"></td>
    <td align="center" valign="top"></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><button type="submit" class="btn  btn-success">Daftar</button>
    <button type="reset" class="btn ">Reset</button>
    </td>
  </tr>
</table>
</form>
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['id'];
	$nama_karyawan = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_tlpn = $_POST['telepon'];
	$status_karyawan = $_POST['status_karyawan'];
	$usia = $_POST['usia'];
	$agama = $_POST['agama'];
	$pendidikn = $_POST['jenjang_pendidikan'];
	$jml_kehadran = $_POST['kehadiran'];

      $sqlsimpan = "INSERT INTO tbl_karyawan SET
	  				id_karyawan = '$id',
	  				nama_karyawan = '$nama_karyawan',
					alamat = '$alamat',
					telepon = '$no_tlpn',
					status_karyawan = '$status_karyawan',
					usia = '$usia',
					agama = '$agama',
					jenjang_pendidikan = '$pendidikn',
					kehadiran = '$jml_kehadran'";
					
      mysql_query($sqlsimpan)
      or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
      echo "<script>alert('Anda Telah Terdaftar !');</script>";
  }
?>
</br>