<section class="content-header">
	<h1>
		Master Data
		<small>Data Bahan</small>
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
			<a href="?page=MyApp/add_bahan" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>


			<a href="?page=MyApp/import_bahan" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-file"></i> Import Data</a>

		
				
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
							<th>Kode Bahan</th>
							<th>Nama Bahan</th>
							<th>Stok</th>
							<th>Harga Perbungkus</th>
							<th>Saldo</th>
							<th>Anggaran</th>
							<th>Kelola</th>
						</tr>
					</thead>	
					<tbody>

						<?php
                  $no = 1;
				  $jurusan = $_SESSION['jurusan'];
                  $sql =  $koneksi->query("SELECT * from tb_barang WHERE kategori='Bahan' AND kepemilikan ='$jurusan'"); 
                  while ($data= $sql->fetch_assoc()) {
				  $saldo = $data['stok'] * $data['harga'];	
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
							<td style="text-align: right;">
								<?php echo "Rp." . number_format($data['harga']) ?>
							</td>
							<td style="text-align: right;">
								<?php echo "Rp." . number_format($saldo) ?>
							</td>
							<td>
								<?php echo $data['anggaran']; ?>
							</td>
							<td>
								<a href="?page=MyApp/edit_bahan&kode=<?php echo $data['id_barang']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=MyApp/del_bahan&kode=<?php echo $data['id_barang']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
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