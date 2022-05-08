<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_peminjaman WHERE id_peminjaman='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
		Peminjaman
		<small>Barang</small>
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
					<h3 class="box-title">Tambah Peminjaman</h3>
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
							<label>ID Peminjaman</label>
							<input type='text' class="form-control" name="id_peminjaman" value="<?php echo $data_cek['id_peminjaman']; ?>"readonly/>
						</div>
						</div>

						<div class="form-group">
							<label>Nama Peminjam</label>
							<?php
								// ambil data dari database
								$query = "select * from tb_peminjaman";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									<input type='text' class="form-control" name="id_peminjaman" value="<?php echo $row['nama_peminjam']; ?>"readonly/>
								<?php
								}
								?>
							
							
						</div>

						<div class="form-group">
							<label>Barang</label>
							<select name="kode_barang" id="kode_barang" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih --</option>
								<?php
								// ambil data dari database
								$query = "select * from tb_barang";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['kode_barang'] ?>">
									<?php echo $row['kode_barang'] ?>
									-
									<?php echo $row['nama_barang'] ?>
								</option>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Jumlah</label>
							<input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan Jumlah Barang Yang Dipinjam"/>
						</div>


						<div class="form-group">
							<label>Guru Pengajar</label>
							<select name="nik" id="nik" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih --</option>
								<?php
								// ambil data dari database
								$query = "select * from tb_guru";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['nik'] ?>">
									<?php echo $row['nik'] ?>
									-
									<?php echo $row['nama_guru'] ?>
								</option>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Tgl Pinjam</label>
							<input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" />
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=data_sirkul" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){

		//menangkap post tgl pinjam
		$tgl_p=$_POST['tgl_pinjam'];
		$jumlah=$_POST['jumlah'];
		$selSto =mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kode_barang='" . $_POST['kode_barang'] . "'");
		$sto    =mysqli_fetch_array($selSto);
		$stok    =$sto[2];
		//menghitung sisa stok
		$sisa    = $stok-$jumlah;
        $sql_simpan = "INSERT INTO tb_peminjaman (id_peminjaman,nisn,kode_barang, jumlah, nik, tgl_pinjam,status) VALUES (
         '".$_POST['id_peminjaman']."',
		  '".$_POST['nisn']."',
          '".$_POST['kode_barang']."',
          '".$_POST['jumlah']."',
          '".$_POST['nik']."',
          '".$_POST['tgl_pinjam']."',
		  'PIN');";
		  if($sql_simpan) {
			  //update stok
			  $upstok = mysqli_query($koneksi, "UPDATE tb_barang SET stok='$sisa' WHERE kode_barang='" .$_POST["kode_barang"]. "'");
		  }
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
		/*
		$get_current_stock = "SELECT * FROM tb_barang WHERE kode_barang='" . $_POST["kode_barang"] . "'";
		$query_get_stock = mysqli_query($koneksi, $get_current_stock);
		$current_stock = mysqli_fetch_array($query_get_stock)[2];
		$current_stock++;
		//update stok
		$update_stock = "UPDATE tb_barang SET stok='" . $current_stock . "' WHERE kode_barang='" . $_POST["kode_barang"] . "'";
		mysqli_query($koneksi, $update_stock);
        mysqli_close($koneksi);
*/

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=peminjaman';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=add_peminjaman';
          }
      })</script>";
    }
  }
    
