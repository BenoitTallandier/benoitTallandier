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
	if(isset($_SESSION['id_user']) and $_SESSION['id_user']==0){
			
		if(isset($_POST['valider'])){
			mysqli_query($db,"UPDATE information SET date_debut='".$_POST['dd']."', date_fin='".$_POST['df']."'");
			mysqli_query($db,"DELETE FROM resultat");
			mysqli_query($db,"DELETE FROM question");
			mysqli_query($db,"DELETE FROM resultat");	
			mysqli_query($db,"DELETE FROM users");
			for($i=0;$i<$_POST['iform'];$i++){
				if(isset($_POST['question'.$i])){
					mysqli_query($db,"INSERT INTO question (SELECT * FROM question_tot WHERE id_question=".$_POST['question'.$i].")");
					mysqli_query($db,"INSERT INTO reponse (SELECT * FROM reponse_tot WHERE ref_question=".$_POST['question'.$i].")");	
				}
			}
		}
			echo "<div class='bloc_admin'>";
				echo "<a href='addchap.php'>ajouter un chapitre</a></br>";
				echo "<a href='addquestion.php'>ajouter une question</a>";
			echo "</div>";
			echo "<div class='bloc_admin'>";
				echo "<H1>Résultat de la dernière session : </H1></br></br>";
				echo "<div class='table_admin'>";
					echo "<TABLE border=1 style='table-layout:fixed;width:100%;border-collapse:collapse;' >";
						echo "<TR>";
							echo"<TD class='question_admin'>Nom</TD>";
							echo"<TD class='question_admin'>Note</TD>";
							if($re = mysqli_query($db,"SELECT * FROM users")){
								$nbUser = mysqli_num_rows();
								
							}
							else{
								$nbUser = 2;
							}
							$re=mysqli_query($db,"SELECT * FROM question ORDER BY id_question");
							while($line = mysqli_fetch_array($re)){
								extract($line);
								$pour = 0;
								if($result1 = mysqli_query($db,"SELECT * FROM resultat WHERE ref_question='".$id_question."' AND point='1'")){
									$pour = mysqli_num_rows($result1);
									
								}
								$pour = $pour/$nbUser * 100;
								echo"<TD class='question_admin'>".$question."<div style='font-size:10px;'>".$pour."%</div></TD>";
							}
						echo "</TR>";
						$result = mysqli_query($db,"SELECT * FROM question");
						$total = mysqli_num_rows($result);
						$Result=mysqli_query($db,"SELECT * FROM users");
						while( $Line = mysqli_fetch_array($Result))
						{
							$note=0;
							extract($Line);
							
							if($result1 = mysqli_query($db,"SELECT * FROM resultat WHERE id_user=".$id_user." AND point='1'")){
								$note = mysqli_num_rows($result1);
							}
							$note=$note/$total*20;
							echo "<TR>";
								echo "<TD>".$name_user." ".$first_name_user."</TD>";
								echo "<TD>".$note."/20</TD>";
								$r = mysqli_query($db,"SELECT point FROM resultat WHERE id_user=".$id_user." ORDER BY ref_question");
								if($r){
									while($l = mysqli_fetch_array($r)){
										extract($l);
										if($point>0){echo"<TD style='background-color:green;'>V</TD>";}
										else{echo"<TD style='background-color:red;'>F</TD>";}
										}
								}
								
							echo "<TR>";
						}
						echo "</TABLE>";
					echo "</div>";
				echo "</div>";
				echo $today."</br>";
				echo "<div class='bloc_admin'>";
					echo "<H1>Ma prochaine session</H1>";
					echo "<a href='pdf.php'>Télécharger pdf</a></br></br>";
					extract(mysqli_fetch_array(mysqli_query($db,"SELECT * FROM information")));
					echo "commence le ".$date_debut."</br>";
					echo "fini le ".$date_fin."</br></br>";
					echo "les questions posées seront :</br>";
					echo "<ul>";
						$r1=mysqli_query($db,"SELECT * FROM question");
						while($line = mysqli_fetch_array($r1)){
							extract($line);
							echo "<li>".$question."</li>";
						}
					echo "</ul>";
				echo "</div>";	
				
				echo "<div class='bloc_admin'>";
					echo "</br></br></br><H2>Creer une nouvelle session :</H2> 	";
						echo "<form method='POST'>";
							echo "date-heure du début (sous la forme AAAA-MM-JJ HH:MM:SS)<input type='text' name='dd'></br>";
							echo "date-heure de fin (sous la forme AAAA-MM-JJ HH:MM:SS)<input type='text' name='df'></br></br>";
							$iform = 0;
							$r=mysqli_query($db,"SELECT * FROM matiere");
							echo "Questions sélectionnées pour le test : (<span id='nb_check'></span>)</br>";
							while($Line = mysqli_fetch_array($r)){
								extract($Line);
								echo "<span class='lien_matiere' num=".$id_matiere." >".$name_matiere."</span></br>";
								echo "<div class='matiere' id='matiere".$id_matiere."'>";
									$r1 = mysqli_query($db,"SELECT * FROM chapitres WHERE matiere=".$id_matiere."");
									while($l1 = mysqli_fetch_array($r1)){
										extract($l1);
										echo "<span class='lien_chapitre' num=".$id_chapitre." >".$name_chapitre."</span></br>";
										echo "<div class='chapitre' id='chapitre".$id_chapitre."'>";
											$r2 = mysqli_query($db,"SELECT * FROM question_tot WHERE chapitre=".$id_chapitre."");
											while($l2 = mysqli_fetch_array($r2)){
												extract($l2);
												echo "<input type='checkbox' name='question".$iform."' value='".$id_question."'>".$question."</input></br>";
											$iform+=1;
											}
										
										echo"</div>";
									}
								echo "</div>";							
							}
						echo "<input type='hidden' name='iform' value=".$iform.">";
						echo "</br><input type='submit' name='valider' value='valider'>";
						echo "</form>";
				echo "</div>";
		}
		else{
			echo "you don't have permission";
		}

		?>
	</div>
</html>