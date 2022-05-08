<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_barang WHERE id_barang='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
		Master Data
		<small>Data Barang</small>
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
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Barang</h3>
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
							<input type='text' class="form-control" name="kode_barang" value="<?php echo $data_cek['kode_barang']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Nama Alat</label>
							<input type='text' class="form-control" name="nama_barang" value="<?php echo $data_cek['nama_barang']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Jumlah</label>
							<input type='text' class="form-control" name="stok" value="<?php echo $data_cek['stok']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Anggaran</label>
							<input type='text' class="form-control" name="anggaran" value="<?php echo $data_cek['anggaran']; ?>"
							/>
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
							<input type="file" name="gambar" id="gambar">
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_alat" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
	if(isset($_FILES['gambar']['tmp_name'])){
		$image = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
    $sql_ubah = "UPDATE tb_barang SET
		kode_barang='".$_POST['kode_barang']."',
		nama_barang='".$_POST['nama_barang']."',
		stok='".$_POST['stok']."',
		kondisi='".$_POST['kondisi']."',
		foto='".$image."'
        WHERE id_barang='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
	}

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_alat';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_alat';
            }
        })</script>";
    }
}

