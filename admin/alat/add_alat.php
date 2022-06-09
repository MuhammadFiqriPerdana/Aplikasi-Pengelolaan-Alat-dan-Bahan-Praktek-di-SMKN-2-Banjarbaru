<section class="content-header">
	<h1>
		Master Data
		<small>Data Alat</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Website Pengelolaan Alat Praktek SMKN 2 Banjarbaru</b>
			</a>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Barang</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Kode Alat</label>
							<input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang">
						</div>

						<div class="form-group">
							<label>Nama Alat</label>
							<input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang">
						</div>

						<div class="form-group">
							<label>Jumlah</label>
							<input type="text" name="stok" id="stok" class="form-control" placeholder="Jumlah">
						</div>

						<div class="form-group">
							<label>Anggaran</label>
							<input type="text" name="anggaran" id="anggaran" class="form-control" placeholder="Anggaran">
						</div>

						<div class="form-group">
							<label>Kondisi</label>
							<select name="kondisi" id="kondisi" class="form-control select2" style="width: 100%;">
							<option value="">-- Pilih --</option>
							<option value="Baik">Baik</option>
							<option value="Rusak">Rusak</option>
							</select>
						</div>

						<div class="form-group">
							<label>Foto</label>
							<input type="file" name="foto" id="foto">
						</div>
						
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_barang" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){
		
		// $image = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
		$dir = "./admin/alat/images/";
		$nama_file = $_FILES['foto']['name'];
		$nama_file_tmp = $_FILES['foto']['tmp_name'];
		$gantiNama = round(microtime(true));
		$dirUpload = "./admin/alat/images/";
		move_uploaded_file($nama_file_tmp, $dir . $gantiNama);
		$query;
		
		$jurusan = $_SESSION['jurusan'];
        $sql_simpan = "INSERT INTO tb_barang (kode_barang,nama_barang,stok,anggaran,kondisi,foto,kepemilikan,kategori) VALUES (
           '".$_POST['kode_barang']."',	
          '".$_POST['nama_barang']."',
          '".$_POST['stok']."',
          '".$_POST['anggaran']."',
          '".$_POST['kondisi']."',
          '".$gantiNama."',
          '".$jurusan."','Alat')";
		
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);
		
    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_alat';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_alat';
          }
      })</script>";
    }
  }
    
