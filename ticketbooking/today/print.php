<?php 

	$f_name=$_POST['From_name'];
	$l_name=$_POST['to_name'];
	$t_date=$_POST['date'];
	$t_price=$_POST['z_subject'];
	$t_time=$_POST['time'];
	$t_number=$_POST['t_no'];
	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage(); 
	$pdf->SetFont("Arial","B",16);
	$pdf->Cell(50,10,"Welcome To Bangalore Metro",0,1);
	$pdf->Cell(50,10,"Ticket No.:",0,0);
	$pdf->Cell(50,10,$t_number,0,1);
	$pdf->Cell(50,10,"DOJ:",0,0);
	$pdf->Cell(50,10,$t_date,$t_time,0,0);
	$pdf->Cell(50,10,$t_time,0,1);
	$pdf->Cell(50,10,"From:",0,0);
	$pdf->Cell(50,10,$f_name,0,0);
	$pdf->Cell(50,10,"To:",0,0);
	$pdf->Cell(50,10,$l_name,0,1);
	$pdf->Cell(50,10,"Price:",0,0);
	$pdf->Cell(50,10,$t_price,0,1);
	$pdf->Cell(50,10,"Happy Journey",0,1);
	$pdf->Cell(50,10,"Thank You",0,1);
	$pdf->Output();

?>
