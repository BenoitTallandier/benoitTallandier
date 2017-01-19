<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<link rel="stylesheet" href="style.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>		
<script src="jquery.js" type="text/javascript"></script>		
<html>
	<?php
	$heure=date('H');
	$today = date('Y')."-".date('m')."-".date('d')." ".$heure.":".date('i').":".date('s')."";
	include "connection.php";
	include "fpdf/tfpdf.php";
	$pdf = new TFPDF("P","pt","A4");
	$pdf->AddPage();
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',20);
	$pdf->write(0,'Test\n');
	$pdf->SetFont('DejaVu','',14);

	$r1=mysqli_query($db,"SELECT * FROM question ORDER BY rand()");
	while($line = mysqli_fetch_array($r1)){
		extract($line);
		$pdf->Write(0,$question."\n");
		$r2 = mysqli_query($db,"SELECT * FROM reponse WHERE ref_question=".$id_question);
		while($l2 = mysqli_fetch_array($r2) ){
			extract($l2);
			$text = $text."\n".$reponse;
		}
		$pdf->SetFont('DejaVu','',12);
		$pdf->Write(14,$text."\n\n\n\n");
		$text = "";
		$pdf->SetFont('DejaVu','',14);
	}

	$pdf->Ln(10);
	ob_end_clean();
	$pdf->Output();
/*	$pdf->Output('test1.pdf','F');
	forcerTelechargement('test1.pdf','',10000);
	
	  function forcerTelechargement($nom, $situation, $poids)
	  {
		header('Content-Type: application/octet-stream');
		header('Content-Length: '. $poids);
		header('Content-disposition: attachment; filename='. $nom);
		header('Pragma: no-cache');
		header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		readfile($situation);
		exit();
	  }*/
	?>
</html>