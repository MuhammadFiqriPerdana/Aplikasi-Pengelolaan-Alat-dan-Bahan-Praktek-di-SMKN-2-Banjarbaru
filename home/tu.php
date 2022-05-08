<?php
	$sql = $koneksi->query("SELECT count(kode_barang) as barang from tb_barang");
	while ($data= $sql->fetch_assoc()) {
	
		$barang=$data['barang'];
	}
?>


<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Tata Usaha</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

	<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h4>
						<?= $barang; ?>
					</h4>

					<p>Barang</p>
				</div>
				<div class="icon">
					<i class="fas fa-toolbox"></i>
				</div>
				<a href="?page=tu_barang" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
