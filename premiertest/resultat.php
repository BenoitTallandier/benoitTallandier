<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<link rel="stylesheet" href="style.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<?php
include "connection.php";
$nombre_total = mysql_num_rows(mysql_query("SELECT * FROM Question WHERE session='".$_SESSION['session']."'"));
$Result1 = mysql_query("SELECT * FROM participe WHERE id_user='".$_SESSION['id_user']."'");
$score=0;
$br=0;
$abstention=0;
$mr=0;
while ( $Line1=mysql_fetch_array($Result1))
{
	extract($Line1);
	if($resultat==1)
	{
		$br+=1;
	}
	else if($resultat==0)
	{
		$abstention+=1;
	}
	else
	{
		$mr+=1;
	}
	
	$score=$score + $resultat;

}
// $score = mysql_num_rows($Result1);
echo "merci de votre participation";
echo "</BR> votre score : ".$score;
echo "</BR> nb de bonnes réponses : ".$br;
echo "</BR> nb de mauvaises réponses : ".$mr;
echo "</BR> nb de réponses passées : ".$abstention;
echo "</BR> nb total question : ".$nombre_total;
echo "</BR> votre note sur 20 : ".$note=$score/$nombre_total*20;
mysql_query("UPDATE user SET note='".$note."' WHERE id_user='".$_SESSION['id_user']."'");




?>