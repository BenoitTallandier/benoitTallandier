<?php
	int ignore_user_abort(true);
	while(1){
		$NombreOUT = file_get_contents('http://api.lifecraft.fr/rpg.php?ids=107827');
		echo $NombreOUT;

		$timeout = 0;

		$cookies_file = __DIR__.'/cookies.txt';

		/**************************************************
		Première requête : Connexion
		**************************************************/

		$url = 'http://intuition-games.net/index.php?page=vote';

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

		if (preg_match('`^https://`i', $url))
		{
		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		}

		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_NOBODY, true);

		// Forcer cURL à utiliser un nouveau cookie de session
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);

		curl_setopt($ch, CURLOPT_POST, true);

		curl_setopt($ch, CURLOPT_POSTFIELDS, "login=&passlog=&hidden=log&logon=");

		// Fichier dans lequel cURL va écrire les cookies
		// (pour y stocker les cookies de session)
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookies_file);

		$page = curl_exec($ch);
		print($page);

		//curl_close($ch);
		/**************************************************
		Seconde requête : Récupération du contenu
		**************************************************/

		$url = 'http://intuition-games.net/index.php?page=vote';

		//$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

		if (preg_match('`^https://`i', $url))
		{
		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		}

		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "out=".$NombreOUT."&vote=Confirmer");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// Fichier dans lequel cURL va lire les cookies
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies_file);

		$page_content = curl_exec($ch);

		print($page_content);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);

		print($page_content);
		$fp = fopen ("compteur.txt", "r+");
		// Instruction 2
		$nb_visites = fgets ($fp, 11);
		// Instruction 3
		$nb_visites = $nb_visites + 1;
		// Instruction 4
		fseek ($fp, 0);
		// Instruction 5
		fputs ($fp, $nb_visites);
		// Instrcution 6
		fclose ($fp);
		sleep(10800);
	}
	/**************************************************
	Troisème requête : Déconnexion
	**************************************************/
	/*
	$url = 'http://www.alsacreations.com/ident/logout/';

	$ch = curl_init($url);

	curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

	if (preg_match('`^https://`i', $url))
	{
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	}

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_setopt($ch, CURLOPT_COOKIESESSION, true);

	curl_exec($ch);

	curl_close($ch);

	// Effacement du fichier de stockage des cookies

	if (file_exists($cookies_file))
	  unlink($cookies_file);
	*/
	
?>