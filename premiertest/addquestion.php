<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<link rel="stylesheet" href="style.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>		
<script src="jquery.js" type="text/javascript"></script>	
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

	if(isset($_POST['ajouter'])){
		$question = modif($_POST['question']);
		$commentaire = modif($_POST['commentaire']);
		$query = "INSERT INTO question_tot (question,chapitre,commentaire,matiere) VALUES('".$question."','".$_POST['chap_question']."','".$commentaire."','".$_POST['mat_question']."')";
		mysqli_query($db,$query);
		$id = mysqli_insert_id($db);
		echo "<h1>".$id."</h1></br>";
		echo $_POST['type_question']."</br>";
		if($_POST['type_question']=="qcm"){
			for($i=0;$i<=3;$i++){
				if(!empty($_POST['reponse'.$i])){
					$reponse=modif($_POST['reponse'.$i]);
					if(isset($_POST['vrai'.$i])){
						mysqli_query($db,"INSERT INTO reponse_tot (reponse,ref_question,state) VALUES('".$reponse."','".$id."','1')");
					}
					else{
						mysqli_query($db,"INSERT INTO reponse_tot (reponse,ref_question,state) VALUES('".$reponse."','".$id."','0')");
					}
				}
			}
		}
		else{
			if(isset($_POST['vrai1'])){
				mysqli_query($db,"INSERT INTO reponse_tot (reponse,ref_question,state) VALUES('vrai','".$id_question."','1')");
				mysqli_query($db,"INSERT INTO reponse_tot (reponse,ref_question,state) VALUES('faux','".$id_question."','0')");

			}
			else{
				mysqli_query($db,"INSERT INTO reponse_tot (reponse,ref_question,state) VALUES('vrai','".$id_question."','0')");
				mysqli_query($db,"INSERT INTO reponse_tot (reponse,ref_question,state) VALUES('faux','".$id_question."','1')");
			}
		}
		header("Location: addquestion.php");
	}


	else{
		echo "<div id='bloc_add_question'>";
			echo "<center><a href='administration.php'>retour</a></center></br></br>";
			echo "<form method='POST' id='form_question' action=''>";
				echo "question : <input type='text' name='question' size='150'></br></br></br>";
				
				echo "qcm :<input type='radio' name='type_question' value='qcm'></br>";
				echo "<div id='typeqcm' class='type'>";
					for($i=0;$i<=3;$i++){
						echo "reponse : <input type='text' name='reponse".$i."' size='100'><input type='checkbox' name='vrai".$i."'></br>";
					}
				echo "</div>";
				echo "vrai/faux<input type='radio' name='type_question' value='vf'></br>";
				echo "<div id='typevf' class='type'>";
					echo "Vrai <input type='hidden' name='reponse_vf1' value='Vrai'><input type='checkbox' name='vrai1'></br>"; 
					echo "Faux <input type='hidden' name='reponse_vf2' value='Faux'><input type='checkbox' name='vrai2'></br>";
				echo "</div></br>";
				$r = mysqli_query($db,"SELECT * FROM matiere");
				while( $l = mysqli_fetch_array($r)){
					extract($l);
					echo "<input type='radio' name='mat_question' value='".$id_matiere."'>".$name_matiere."</br>";
					$r1 = mysqli_query($db,"SELECT * FROM chapitres WHERE matiere='".$id_matiere."'");
					echo "<div class='chap_question' id='chap".$id_matiere."'>";
						while($l1 = mysqli_fetch_array($r1) ){
							extract($l1);
								echo "<input type='radio' class='chap_single_question' name='chap_question' value='".$id_chapitre."'>".$name_chapitre."</br>";
						}
					echo "</div>";
				}
				echo "commentaire : <textarea name='commentaire'></textarea></br></br>";
				echo "<input type='submit' name='ajouter' value='valider'>";
			echo "</form>";
		echo "</div>";
	}
}
else{
	echo "you don't have permission";
}
?>