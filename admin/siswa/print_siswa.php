<?php
require '/xampp/htdocs/pkl/inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/pkl/inc/koneksi.php';
$siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa order by kelas, nama_siswa ASC");


$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/print.css" class="css">
    <title>PRINT DATA SISWA</title>
</head>
<body>
<table style="border: 1px solid #fff; width: 100%;">
        <tr>
            <td style="width: 15%;">
                <img src="../../dist/img/kalsel.png" style="width:90px; height:90px;"> 
            </td>
            <td style="width:77%;">
                <center>
                    <p style="font-size: 15px;"><b>PEMERINTAH PROVINSI KALIMANTAN SELATAN</b></p>
                    <P style="font-size: 15px;"><b>DINAS PENDIDIKAN DAN KEBUDAYAAN</b></P>
                    <P style="font-size: 15px;"><b>SMK NEGERI 2 BANJARBARU</b></P>
                    <P style="font-size: 12px";>Jalan Nusatara Nomor 1 <img src="../../dist/img/phone.png" style="width:10px; height: 10px;">/Fax(0511)4773452 Loktabat Selatan Banjarbaru</P>
                    <p style="font-size: 12px";>Website http://www.smkn2banjarbaru.sch.id Email: smkn2bjb@gmail.com</p>
                </center>
            </td>
        </tr>
    </table>
    <hr style="color: black; margin: 0px; padding: 0px; height: 5px;">
    <br>

    <h3 align="center">LAPORAN DATA SISWA PADA JURUSAN TEKNIK KOMPUTER DAN INFORMATIKA</h3>
    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>Nomor Telepon</th>
    </tr> ';
    $i = 1;
    foreach( $siswa as $row) {
        $html .= '<tr>
        <td align="center">'. $i++ .'</td>
        <td align="center">'. $row["nisn"].'</td>
        <td align="center">'. $row["nama_siswa"].'</td>
        <td align="center">'. $row["kelas"].'</td>
        <td align="center">'. $row["jekel"].'</td>
        <td>'. $row["email"].'</td>
        <td align="center">'. $row["no_hp"].'</td>
        </tr>';
    }

    $html .=   '</table>
    
</body>
</html>';

    

$mpdf->WriteHTML($html);
$mpdf->Output();
?>

