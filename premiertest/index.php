<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<link rel="stylesheet" href="style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<?php
echo "<HTML>";
	include "connection.php";
	// prise d'info
	$heure=date('H')+1;
	$today = date('Y')."-".date('m')."-".date('d')." ".$heure.":".date('i').":".date('s')."";
	// fin de prise d'info
	$Result=mysqli_query($db,"SELECT * FROM information ORDER BY id_info DESC LIMIT 1");
	if($Result)
	{	extract(mysqli_fetch_array($Result));
	}
	else
	{
		echo "problème de paramétrage";
	}
	echo "date :".$date_debut."</br>";
	echo " date :".$today."</br>";
	echo " date :".$date_fin;
	if( strtotime($date_debut) <= strtotime($today) AND strtotime($today) <= strtotime($date_fin))
	{
		$_SESSION['session_aut']=true;
	}
	else
	{
		$_SESSION['session_aut']=false;
	}
	


	if(!isset($_SESSION['id_user']))
	{
		if(isset($_POST['connexion']))
		{
			if($_POST['name']=="agnest"){
				$_SESSION['id_user'] = 0;			
				// header('Location : administration.php');
				echo "<meta http-equiv='refresh' content='0;URL=administration.php'>";
			}
			else{
				$Query="INSERT INTO users (name_user,first_name_user,classe_user) VALUES ('".$_POST['name']."','".$_POST['f_name']."','".$_POST['classe']."')";
				mysqli_query($db,$Query);
				$result=mysqli_query($db,"SELECT * FROM users WHERE name_user='".$_POST['name']."' AND first_name_user='".$_POST['f_name']."' AND classe_user='".$_POST['classe']."'");
				extract(mysqli_fetch_array($result));
				$_SESSION['name_user'] = $name_user;
				$_SESSION['id_user'] = $id_user;
				// header('Location:question.php');
				echo "<meta http-equiv='refresh' content='0;URL=question.php'>";
			}	
		}
		else
		{
			echo "<div id='bloc_index'>";
				echo "<form style='text-align:center;' method='post' action='index.php'>";
					echo "<input type='text' name='name' placeholder='Nom'></input></br>";
					echo "<input type='text' name='f_name' placeholder='Prénom'></input></br>";
					echo "<input type='text' name='classe' placeholder='Classe'></input></br>";
					echo "<input type='submit' name='connexion'>";
				echo "</form>";
			echo "</div>";
		}
	}
	else if(isset($_POST['pass']) AND $_POST['name']=="agnest"){
		echo "<meta http-equiv='refresh' content='0;URL=administration.php'>";		
	}
	else
	{
		if($_SESSION['session_aut'])
		{
			echo "<a href='question.php'>Départ</a></br>";
			//echo "<a href='dec.php'>deconnexion</a>";
		}
		else
		{
			echo "<div id='bloc_index'>";
				echo "Le temps est écoulé";
			echo "</div>";
				echo "<form style='text-align:center;' method='post' action='index.php'>";
					echo "<input type='text' name='name' placeholder='Nom'></input></br>";
					echo "<input type='submit' name='pass'>";
				echo "</form>";
		}
	}
echo "</HTML>";
?>