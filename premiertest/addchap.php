<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<link rel="stylesheet" href="style.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<?php
if(isset($_SESSION['id_user']) and $_SESSION['id_user']==0){
	$heure=date('H');
	$today = date('Y')."-".date('m')."-".date('d')." ".$heure.":".date('i').":".date('s')."";
	include "connection.php";
	function modif($texte)
	{
		$sortie=addslashes($texte);
		$sortie=str_replace("\n","<BR/>", $sortie);
		$sortie=str_replace("\r","<BR>", $sortie);
		return ($sortie);
	}

	if(isset($_POST['addchap'])){
		$reponse=modif($_POST['chap']);
		$q = "INSERT INTO chapitres (name_chapitre,matiere) VALUES('".$reponse."','".$_POST['mat']."')";
		mysqli_query($db,$q);
		echo $q."</br>";
		echo "<div id='bloc_add_question' style='text-align:center;color:green'>Le chapitre a été ajouté </br><a href='administration.php'>retour</a></div>";
	}
	else{
		echo "<div id='bloc_add_question'>";
			echo "<form method='POST' action=''>";
				echo "matière : <ul>";
					$r = mysqli_query($db,"SELECT * FROM matiere");
					while( $l = mysqli_fetch_array( $r ) ){
						extract($l);
						echo "<li><input type='radio' class='mat' name='mat' value='".$id_matiere."'>".$name_matiere."</li>";
					}
				echo "</ul></br></br>nom du chapitre : <input type='text' name='chap' size='100'></br></br>";
				echo "<input type='submit' name='addchap' value='ajouter'>";	
			echo "</form>";
		echo "</div>";
	}
}
else{
	echo "you don't have permission";
}
?>