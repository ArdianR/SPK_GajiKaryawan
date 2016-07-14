<?php
  $sql="select * from tbl_kriteria";
  $query=mysql_query($sql);
  $jumlah=mysql_num_rows($query);
  $urut = $jumlah + 1;
  
		if($jumlah == 0){
			$kodeauto="K".$urut;
			}
		else{
			$s="select * from tbl_kriteria order by id_kriteria desc";
  			$q=mysql_query($s);
			$d=mysql_fetch_array($q);
			$kode=$d["id_kriteria"];
			$trim=substr($kode,1)+1;
			$kodeauto="K".$trim;
			}	
?>
<h3> Tambah Kriteria </h3><br />
<form role="form" method="post" action="" >
                  
              	<div class="form-group">
                <label for="kdkriteria">Kode Kriteria</label>
                <br />
            <input type="text" class="form-control" id="kode_krit" name="kode_krit" value="<?php echo $kodeauto ?>"  size="30" readonly="readonly"/>
              	</div>
               <div class="form-group">
               <label for="kriteria">Kriteria</label>
               <br />
               <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Silahkan isi nama kriteria"  required/>
               </div>
               
              
               
               <div class="form-group"><br />
               </div>
               
              
                <button type="submit" class="btn btn-primary">Buat Kriteria</button>
      
                 </form>

<?php 	//menyimpan dan merubah data
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$id_kriteria=$_POST["kode_krit"];
		$nama_kriteria=$_POST["kriteria"];

			$sql="INSERT INTO tbl_kriteria SET
				  id_kriteria = '$id_kriteria',
				  nama_kriteria = '$nama_kriteria'";
			mysql_query($sql)
			or die ("<div class='alert alert-error'> Gagal Perintah SQL ". mysql_error()."</div>");
			echo "<script>alert('Data Berhasil Ditambahkan ');document.location.href='?menu=kriteria';</script>";
		}
?>