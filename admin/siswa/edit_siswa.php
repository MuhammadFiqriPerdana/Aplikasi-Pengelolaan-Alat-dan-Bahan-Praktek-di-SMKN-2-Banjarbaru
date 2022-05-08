<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_siswa WHERE nisn='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
		Master Data
		<small>Data Siswa</small>
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
					<h3 class="box-title">Ubah Siswa</h3>
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
							<label>NISN</label>
							<input type='text' class="form-control" name="nisn" value="<?php echo $data_cek['nisn']; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>Nama Siswa</label>
							<input type='text' class="form-control" name="nama_siswa" value="<?php echo $data_cek['nama_siswa']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Kelas</label>
							<select name="kelas" id="kelas" class="form-control" required>
								<option value="">-- Pilih --</option>
								<?php
                                //cek data yg dipilih sebelumnya
                                if ($data_cek['kelas'] == "X TKJ A") echo "<option value='X TKJ A' selected>X TKJ A</option>";
                                else echo "<option value='X TKJ A'>X TK A</option>";

                                if ($data_cek['kelas'] == "X TKJ B") echo "<option value='X TKJ B' selected>X TKJ B</option>";
                                else echo "<option value='X TKJ B'>X TKJ B</option>";
                                
                                if ($data_cek['kelas'] == "XI TK A") echo "<option value='XI TKJ A' selected>XI TKJ A</option>";
                                else echo "<option value='XI TKJ A'>XI TKJ A</option>";

                                if ($data_cek['kelas'] == "XI TK B") echo "<option value='XI TKJ B' selected>XI TKJ B</option>";
                                else echo "<option value='XI TKJ B'>XI TKJ B</option>";

								if ($data_cek['kelas'] == "XII TKJ A") echo "<option value='XII TKJ A' selected>XII TKJ A</option>";
                                else echo "<option value='XII TKJ A'>XII TKJ A</option>";

								if ($data_cek['kelas'] == "XII TKJ B") echo "<option value='XII TKJ B' selected>XII TKJ B</option>";
                                else echo "<option value='XII TKJ B'>XII TKJ B</option>";
                            ?>
							</select>
						</div>


						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jekel" id="jekel" class="form-control" required>
								<option value="">-- Pilih --</option>
								<?php
                                //cek data yg dipilih sebelumnya
                                if ($data_cek['jekel'] == "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
                                else echo "<option value='Laki-Laki'>Laki-Laki</option>";
                                
                                if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                                else echo "<option value='Perempuan'>Perempuan</option>";
                            ?>
							</select>
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type='text' class="form-control" name="email" value="<?php echo $data_cek['email']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>No HP</label>
							<input type='number' class="form-control" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"
							/>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_siswa" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE tb_siswa SET
		nama='".$_POST['nama_siswa']."',
		kelas='".$_POST['kelas']."',
		jekel='".$_POST['jekel']."',
		email='".$_POST['email']."',
        no_hp='".$_POST['no_hp']."'
        WHERE nisn='".$_POST['nisn']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_siswa';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_siswa';
            }
        })</script>";
    }
}

