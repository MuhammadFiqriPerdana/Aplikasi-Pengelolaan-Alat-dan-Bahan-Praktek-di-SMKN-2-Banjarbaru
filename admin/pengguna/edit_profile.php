<section class="content-header">
	<h1>
		Pengguna Sistem
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
					<h3 class="box-title">Ubah Pengguna</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
                <form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
                    <div class="form-group">
							<label>Foto</label>
							<input type="file" name="gambar" id="gambar">
						</div>
                    </div>
                    <div class="box-footer">
						<input type="submit" name="Upload" value="Upload" class="btn btn-success">
						<a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-warning">Batal</a>
					</div>
				</form>
</section>

<?php

if (isset($_POST['Upload'])) {
    if(isset($_FILES['gambar']['tmp_name'])){
    $image = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
    $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna, username, password,level,jurusan,foto) values(
    'udin',
    'udin',
    'udin',
    'Admin',
    'tkj',
    '".$image."')" ;
    }
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
}

?>