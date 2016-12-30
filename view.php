
<?php
// Instruction 1
$fp = fopen ("compteur.txt", "r");
// Instruction 2
$contenu_du_fichier = fgets ($fp, 255);
// Instruction 3
fclose ($fp);
// Instruction 4
echo 'Nombre de tentative : '.$contenu_du_fichier;
?>