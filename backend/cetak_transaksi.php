<?php

require('../fpdf/fpdf.php');
include('config.php');

$id = $_GET['id'];

$query = mysqli_query($db, "SELECT * FROM transaksi WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'BUKTI TRANSAKSI',0,1,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','',12);

$pdf->Cell(50,10,'Kode Transaksi');
$pdf->Cell(5,10,':');
$pdf->Cell(100,10,'TRX-'.str_pad($data['id'],4,'0',STR_PAD_LEFT));
$pdf->Ln();

$pdf->Cell(50,10,'Nama');
$pdf->Cell(5,10,':');
$pdf->Cell(100,10,$data['nama']);
$pdf->Ln();

$pdf->Cell(50,10,'NIK');
$pdf->Cell(5,10,':');
$pdf->Cell(100,10,$data['nik']);
$pdf->Ln();

$pdf->Cell(50,10,'Jenis Kelamin');
$pdf->Cell(5,10,':');
$pdf->Cell(100,10,$data['jenis_kelamin']);
$pdf->Ln();

$pdf->Cell(50,10,'Nomor HP');
$pdf->Cell(5,10,':');
$pdf->Cell(100,10,$data['nomor_hp']);
$pdf->Ln();

$pdf->Cell(50,10,'Email');
$pdf->Cell(5,10,':');
$pdf->Cell(100,10,$data['email']);
$pdf->Ln();

$pdf->Cell(50,10,'Status Pembayaran');
$pdf->Cell(5,10,':');
$pdf->Cell(100,10,$data['status_bayar']);
$pdf->Ln();

$pdf->Ln(10);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Terima kasih telah melakukan Pemesanan.',0,1);

$pdf->Output('I', 'Bukti_Transaksi.pdf');

?>