<?php
require('../../fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN SEMUA DATA BARANG', 0, 10, 'C');
$pdf->Cell(10, 7, '', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 6, 'Nama Peminjaman', 1, 0);
$pdf->Cell(50, 6, 'Kelas', 1, 0);
$pdf->Cell(100, 6, 'Barang', 1, 0);
$pdf->Cell(100, 6, 'Guru Pengajar', 1, 0);
$pdf->Cell(100, 6, 'Tanggal Pinjam', 1, 0);
$pdf->SetFont('Arial', '', 10);
include '../../inc/koneksi.php';
$no = 1;
$result = mysqli_query($con, "SELECT * FROM tb_peminjaman WHERE status='pin'");
while ($data = mysqli_fetch_array($result)) {
 $pdf->Cell(10, 6, $no++, 1, 0);
 $pdf->Cell(20, 6, $data['nama_siswa'], 1, 0);
 $pdf->Cell(50, 6, $data['kelas'], 1, 0);
 $pdf->Cell(100, 6, $data['nama_barang'], 1, 0);
 $pdf->Cell(100, 6, $data['nama_guru'], 1, 0);
 $pdf->Cell(100, 6, $data['tgl_pinjam'], 1, 0);
}
$pdf->Output();