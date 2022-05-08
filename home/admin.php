<?php
	$sql = $koneksi->query("SELECT count(kode_barang) as barang from tb_barang");
	while ($data= $sql->fetch_assoc()) {
	
		$barang=$data['barang'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nisn) as siswa from tb_siswa");
	while ($data= $sql->fetch_assoc()) {
	
		$siswa=$data['siswa'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nik) as guru from tb_guru");
	while ($data= $sql->fetch_assoc()) {
	
		$guru=$data['guru'];
	}
?>

<?php

	$sql = $koneksi->query("SELECT count(id_peminjaman) as pin from tb_peminjaman where status='PIN'");
	while ($data= $sql->fetch_assoc()) {
	
		$pin=$data['pin'];
	}

?>

<?php

	$sql = $koneksi->query("SELECT count(id_peminjaman) as kem from tb_peminjaman where status='KEM'");
	while ($data= $sql->fetch_assoc()) {
	
		$kem=$data['kem'];
	}

?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Administrator</small>
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
				<a href="?page=MyApp/data_barang" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h4>
						<?= $siswa; ?>
					</h4>

					<p>Siswa</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="?page=MyApp/data_siswa" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-orange">
				<div class="inner">
					<h4>
						<?= $guru; ?>
					</h4>

					<p>Guru</p>
				</div>
				<div class="icon">
					<i class="fas fa-user-tie"></i>
				</div>
				<a href="?page=MyApp/data_siswa" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h4>
						<?= $pin; ?>
					</h4>

					<p>Peminjaman</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="?page=data_sirkul" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h4>
						<?= $kem; ?>
					</h4>

					<p>Pengembalian</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="?page=log_kembali" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>