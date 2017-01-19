<?php
session_start();
session_unset();
session_destroy();
echo"<p><vert> déconnection réussie </vert></p>";
header ("Refresh: 1;URL=index.php");
// echo "<META HTTP-equiv='refresh' content=0;URL=index.php>";
?>