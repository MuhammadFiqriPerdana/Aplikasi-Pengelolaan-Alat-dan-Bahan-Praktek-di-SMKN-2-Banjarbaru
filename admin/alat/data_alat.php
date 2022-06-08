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
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_alat" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>

		
				
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
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Stok</th>
							<th>Anggaran</th>
							<th>Kondisi</th>
							<th>Foto</th>
							<th>Kelola</th>
						</tr>
					</thead>	
					<tbody>

						<?php
                  $no = 1;
				  $jurusan = $_SESSION['jurusan'];
                  $sql =  $koneksi->query("SELECT * from tb_barang WHERE kategori='Alat' AND kepemilikan ='$jurusan'"); 
                  while ($data= $sql->fetch_assoc()) {
					
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['kode_barang']; ?>
							</td>
							<td>
								<?php echo $data['nama_barang']; ?>
							</td>
							<td>
								<?php echo $data['stok']; ?>
							</td>
							<td>
								<?php echo $data['anggaran']; ?>
							</td>
							<td>
								<?php echo $data['kondisi']; ?>
							</td>
							<td>
								<!-- <img src="../../dist/img/alat/<?php echo $data['foto']; ?>" width="100" height="100"> -->
								<?php echo "<img src='../../dist/img/alat/$data[foto]' width='70' height='90' />";?>
							</td>
							<td>
								<a href="?page=MyApp/edit_alat&kode=<?php echo $data['id_barang']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=MyApp/del_alat&kode=<?php echo $data['id_barang']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>