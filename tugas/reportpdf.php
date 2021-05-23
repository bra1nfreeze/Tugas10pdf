<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$sql = mysqli_query($koneksi, "select * from data");
$html = '<center><h3>Daftar Peserta Didik</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
<tr>
<th> No. </th>
<th> Jenis Pendaftaran </th>
<th> Tanggal Masuk Sekolah </th>
<th> NIS </th>
<th> Nomor Peserta Ujian </th>
<th> Apakah Pernah PAUD </th>
<th> Apakah Pernah TK </th>
<th> No. Seri SKHUN Sebelumnya </th>
<th> No. Seri Ijazah Sebelumnya </th>
<th> Hobi </th>
<th> Cita-cita </th>
<th> Nama Lengkap </th>
<th> Jenis Kelamin </th>
<th> NISN </th>
<th> NIK </th>
<th> Tempat Lahir </th>
<th> Tanggal Lahir </th>
<th> Agama </th>
<th> Berkebutuhan Khusus </th>
<th> Alamat Jalan </th>
<th> RT </th>
<th> RW </th>
<th> Nama Dusun </th>
<th> Nama Desa </th>
<th> Kecamatan </th>
<th> Kode Pos </th>
<th> Tempat Tinggal </th>
<th> Moda Transportasi </th>
<th> Nomor HP </th>
<th> Nomor Telepon </th>
<th> Nomor Email Pribadi </th>
<th> Penerima KPS/PKH/KIP </th>
<th> No. KPS/PKH/KIP </th>
<th> Kewarganegaraan </th>
</tr>';

$no = 1;
while ($row = mysqli_fetch_array($sql)) {
    $html .= "<tr>
	<td>" . $no . "</td>
	<td>" . $row['jp'] . "</td>
	<td>" . $row['tgl_masuk'] . "</td>
	<td>" . $row['nis'] . "</td>
	<td>" . $row['npu'] . "</td>
	<td>" . $row['pernah_paud'] . "</td>
	<td>" . $row['pernah_tk'] . "</td>
	<td>" . $row['skhun'] . "</td>
	<td>" . $row['ijazah'] . "</td>
	<td>" . $row['hobi'] . "</td>
	<td>" . $row['cita'] . "</td>
	<td>" . $row['nama'] . "</td>
	<td>" . $row['jk'] . "</td>
	<td>" . $row['nisn'] . "</td>
	<td>" . $row['nik'] . "</td>
	<td>" . $row['tl'] . "</td>
	<td>" . $row['tgl_lahir'] . "</td>
	<td>" . $row['agama'] . "</td>
	<td>" . $row['bk'] . "</td>
	<td>" . $row['jalan'] . "</td>
	<td>" . $row['rt'] . "</td>
	<td>" . $row['rw'] . "</td>
	<td>" . $row['dusun'] . "</td>
	<td>" . $row['desa'] . "</td>
	<td>" . $row['kecamatan'] . "</td>
	<td>" . $row['kodepos'] . "</td>
	<td>" . $row['tinggal'] . "</td>
	<td>" . $row['transportasi'] . "</td>
	<td>" . $row['nohp'] . "</td>
	<td>" . $row['notelp'] . "</td>
	<td>" . $row['email'] . "</td>
	<td>" . $row['kps'] . "</td>
	<td>" . $row['nokps'] . "</td>
	<td>" . $row['kwn'] . "</td>
	</tr>";
    $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A1', 'landscape');
// rendering dari html ke pdf
$dompdf->render();
// melakukan output file pdf
$dompdf->stream('laporan_siswa.pdf');
