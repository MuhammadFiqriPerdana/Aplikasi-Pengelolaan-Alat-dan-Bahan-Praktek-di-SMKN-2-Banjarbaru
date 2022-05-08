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
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Siswa</h3>
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
							<input type="text" name="nisn" id="nisn" class="form-control">
						</div>

						<div class="form-group">
							<label>Nama siswa</label>
							<input type="text" name="nama_siswa" id="nama_siswa" class="form-control" placeholder="Nama Siswa">
						</div>

						<div class="form-group">
							<label>Kelas</label>
							<select name="kelas" id="kelas" class="form-control" required>
								<?php
								$jurusan = $_SESSION['jurusan'];
								if ($jurusan=="tkj"){
								?>
								<option value="">-- Pilih --</option>
								<option value="X TKJ A">X TKJ A</option>
								<option value="X TKJ B">X TKJ B</option>
								<option value="X TKJ C">X TKJ C</option>
								<option value="XI TKJ A">XI TKJ A</option>
								<option value="XI TKJ B">XI TKJ B</option>
								<option value="XI TKJ C">XI TKJ C</option>
								<option value="XII TKJ A">XII TKJ A</option>
								<option value="XII TKJ B">XII TKJ B</option>
								<option value="XII TKJ C">XII TKJ C</option>
								<?php
								} elseif ($jurusan=="tkr") {
								?>
								<option value="">-- Pilih --</option>
								<option value="X TO A">X TO A</option>
								<option value="X TO B">X TO B</option>
								<option value="X TO C">X TO C</option>
								<option value="XI TO A">XI TO A</option>
								<option value="XI TO B">XI TO B</option>
								<option value="XI TO C">XI TO C</option>
								<option value="XII TO A">XII TO A</option>
								<option value="XII TO B">XII TO B</option>
								<option value="XII TO C">XII TO C</option>
								<?php
								} elseif ($jurusan=="tet") {
								?>
								<option value="">-- Pilih --</option>
								<option value="X TET A">X TET A</option>
								<option value="X TET B">X TET B</option>
								<option value="X TET C">X TET C</option>
								<option value="XI TET A">XI TET A</option>
								<option value="XI TET B">XI TET B</option>
								<option value="XI TET C">XI TET C</option>
								<option value="XII TET A">XII TET A</option>
								<option value="XII TET B">XII TET B</option>
								<option value="XII TET C">XII TET C</option>
								<?php
								} elseif ($jurusan=="dpib") {
								?>
								<option value="">-- Pilih --</option>
								<option value="X DPIB A">X DPIB A</option>
								<option value="X DPIB B">X DPIB B</option>
								<option value="X DPIB C">X DPIB C</option>
								<option value="XI DPIB A">XI DPIB A</option>
								<option value="XI DPIB B">XI DPIB B</option>
								<option value="XI DPIB C">XI DPIB C</option>
								<option value="XII DPIB A">XII DPIB A</option>
								<option value="XII DPIB B">XII DPIB B</option>
								<option value="XII DPIB C">XII DPIB C</option>
								<?php
								} elseif ($jurusan=="bkp") {
								?>
								<option value="">-- Pilih --</option>
								<option value="X BKP A">X BKP A</option>
								<option value="X BKP B">X BKP B</option>
								<option value="X BKP C">X BKP C</option>
								<option value="XI BKP A">XI BKP A</option>
								<option value="XI BKP B">XI BKP B</option>
								<option value="XI BKP C">XI BKP C</option>
								<option value="XII BKP A">XII BKP A</option>
								<option value="XII BKP B">XII BKP B</option>
								<option value="XII BKP C">XII BKP C</option>
								<?php
								} elseif ($jurusan=="tktl") {
								?>
								<option value="">-- Pilih --</option>
								<option value="X TKTL A">X TKTL A</option>
								<option value="X TKTL B">X TKTL B</option>
								<option value="X TKTL C">X TKTL C</option>
								<option value="XI TKTL A">XI TKTL A</option>
								<option value="XI TKTL B">XI TKTL B</option>
								<option value="XI TKTL C">XI TKTL C</option>
								<option value="XII TKTL A">XII TKTL A</option>
								<option value="XII TKTL B">XII TKTL B</option>
								<option value="XII TKTL C">XII TKTL C</option>
								<?php
								}
								?>					
							</select>
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jekel" id="jekel" class="form-control" required>
								<option>-- Pilih --</option>
								<option>Laki-Laki</option>
								<option>Perempuan</option>
							</select>
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" id="email" class="form-control" placeholder="Email">
						</div>

						<div class="form-group">
							<label>No HP</label>
							<input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="No HP">
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_siswa" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){
		$jurusan = $_SESSION['jurusan'];
        $sql_simpan = "INSERT INTO tb_siswa (nisn,nama_siswa,kelas,jekel,email,no_hp,jurusan) VALUES (
           '".$_POST['nisn']."',
          '".$_POST['nama_siswa']."',
          '".$_POST['kelas']."',
          '".$_POST['jekel']."',
          '".$_POST['email']."',
          '".$_POST['no_hp']."',
		  '".$jurusan."')";

        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_siswa';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_siswa';
          }
      })</script>";
    }
  }
    
