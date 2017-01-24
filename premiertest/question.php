<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<link rel="stylesheet" href="style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script src="jquery.js" type="text/javascript"></script>
<meta charset="UTF-8">

<?php
include "connection.php";
////
$heure=date('H')+1;
$today = date('Y')."-".date('m')."-".date('d')." ".$heure.":".date('i').":".date('s')."";
$bonne_reponse = 1;
$fausse_reponse = 0;
// fin de prise d'info
$Result=mysqli_query($db,"SELECT * FROM information ORDER BY id_info DESC LIMIT 1");
if($Result)
{	extract(mysqli_fetch_array($Result));
}


if( strtotime($date_debut) <= strtotime($today) AND strtotime($today) <= strtotime($date_fin))
{
	$_SESSION['session_aut']=true;
}
else
{
	$_SESSION['session_aut']=false;
}


if(!isset($_SESSION['id_user']) or !isset($_SESSION['session_aut']))
{
	// header("Location: index.php");
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";

}
if($_SESSION['session_aut']!=true){
		$r=mysqli_query($db,"SELECT * FROM resultat,question WHERE id_user=".$_SESSION['id_user']." AND ref_question=id_question");
		if(mysqli_num_rows($r)>0){
			echo "<div style='text-align:center;margin-top:100px;'><h2>Resultat</h2></br>";
				while($Line = mysqli_fetch_array($r)){
					extract($Line);
					echo $question." : ";
					if($point>0){echo"<span style='color:green;'>Bonne réponse</span></br>";}
					else{echo"<span style='color:red;'>Mauvaise réponse</span></br>";}
				}
			echo"</div>";
		}
		else{header("Location: index.php");}
}
else
{
	if(isset($_POST['valider'])){

		$point = 0;
		$valide = true;
		$repo = 0;
		$nb = mysqli_num_rows(mysqli_query($db,"SELECT * FROM reponse WHERE ref_question='".$_POST['question']."' AND state=1"));
		for($ipost = 0;$ipost<$_POST['nb_rep'];$ipost++){
			
			if(isset($_POST['rep'.$ipost])){
				$result = mysqli_query($db,"SELECT * FROM reponse WHERE id_reponse='".$_POST['rep'.$ipost]."' AND state=1");
				if($result!=false and mysqli_num_rows($result)!=0){$repo+=1;}
				else{$valide = false;}

			}
		}
		if($valide == true and $nb == $repo){$point = $bonne_reponse;}
		else{$point = $fausse_reponse;}
		mysqli_query($db,"INSERT INTO resultat (id_user,ref_question,point) VALUES (".$_SESSION['id_user'].",'".$_POST['question']."','".$point."')");						
		// header("Location: question.php");
		echo "<meta http-equiv='refresh' content='0;URL=question.php'>";

	}
	else{
		
		$r = mysqli_query($db,"SELECT * FROM question");
		$total = mysqli_num_rows($r);
		$Query = "SELECT * FROM  question WHERE id_question NOT IN (SELECT ref_question FROM resultat WHERE id_user=".$_SESSION['id_user'].") ORDER BY RAND() ";
		$Result = mysqli_query($db,$Query);
		$nombre = mysqli_num_rows($Result);
		if ($nombre<=0){
			echo "<div id='bloc_resultat'>";
				echo "<h2>Resultat</h2></br>";
				echo "<TABLE>";
					$r=mysqli_query($db,"SELECT * FROM resultat,question WHERE id_user=".$_SESSION['id_user']." AND ref_question=id_question");
					while($Line = mysqli_fetch_array($r)){
						echo "<TR>";
							extract($Line);
							echo "<TD style='text-align:right;'>".$question." :</TD><TD>";
							if($point>0){echo"<span style='color:green;'>Bonne réponse</span></br>";}
							else{echo"<span style='color:red;'>Mauvaise réponse</span></br>";}
						echo "</TD></TR>";
					}
				echo "</TABLE>";
			echo "</div>";
		}
		else{
			extract(mysqli_fetch_array($Result));
			echo "<div id='bloc_question'>";
				echo $question."</BR></br>";
				$Result2 = mysqli_query($db,"SELECT * FROM reponse WHERE ref_question=".$id_question);
			
				echo "<form method='POST'>";
					$iform = 0;
					while($Line=mysqli_fetch_array($Result2)){
						extract($Line);
						echo "<div class='c_question' num=".$id_reponse."><input type='checkbox' class='reponse input_question' name='rep".$iform."' id='id_reponse".$id_reponse."' value='".$id_reponse."'>".$reponse."</div></br>";					
						$iform+=1;
					}
					echo "<input type='hidden' name='nb_rep' value='".$iform."'>";
					echo "<input type='hidden' name='question' value='".$id_question."'>";
					echo "</br><input id='val_question' type='submit' name='valider' value='valider'>";						
					echo "<input id='val_question' type='submit' name='passe' value='passer'>";						
				echo "</form>";
				$pour = ($total-$nombre)/$total *100;
				echo "<div style='float:right;color:grey;'>".$pour."%,</div>";
			echo "</div>";
		}
	}
}