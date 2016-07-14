<div class="content">
<?php
  $sql="select * from tbl_tahun";
  $query=mysql_query($sql);
  $jumlah=mysql_num_rows($query);
  $urut = $jumlah + 1;
  
		if($jumlah > 0){
			$s="select * from tbl_tahun order by id_tahun desc";
  			$q=mysql_query($s);
			$d=mysql_fetch_array($q);
			$kode=$d["id_tahun"];
			$trim=substr($kode,2,1)+1;
				if($trim<10){$kodeauto="t0".$trim;}
				else if($trim>100){$kodeauto="t".$trim;}
			}
		else{
			  if($jumlah<10){$kodeauto="t0".$urut;}
			  else if($jumlah>=10){$kodeauto="t".$urut;}
			}
	
?>
        <h3 class="content-header-title">Tambah Tahun Penilaian</h3>
  <form class="form-horizontal" role="form" method="POST" action="">
        
            <input name="id_tahun" type="hidden" value="<?php echo $kodeauto ?>" class="form-control" readonly="readonly">
    
            
        <div class="form-group">
        Tahun Penilaian </br>
            <div class="col-md-4">
            <input name="nama_tahun" type="text" value="" class="form-control" required="required">
            </div> </div>
        </br>
          <div class="col-md-2"></div>
			<div class="form-group">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="?menu=tahun"><button type="button" class="btn btn-primary">Batal</button></a>
              </div>
    </fieldset>
  </form>
 
<!-- PROSES SIMPAN -->
<?php // simpan
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_tahun = $_POST['id_tahun'];
	$thn_penilaian = $_POST['nama_tahun'];

      $sqlsimpan = "INSERT INTO tbl_tahun SET
	  				id_tahun = '$id_tahun',
                    tahun = '$thn_penilaian'";
      mysql_query($sqlsimpan)
      or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
      echo "<script>alert('Tahun Penilaian Berhasil Ditambahkan ');document.location.href='?menu=tahun';</script>";
  }
?>
</div>