
<?php
	ignore_user_abort(true);
	//ini_set('display_errors',1);
//	error_reporting(E_ALL);
	/* DB Connection  */
	include("DBconnectionVote.php");

		$timeout = 1;

		$cookies_file = __DIR__.'/cookies.txt';
	while(1){
		$r = mysqli_query($db,"SELECT * FROM bot,user WHERE bot.user=user.idUser AND nameBot!='vps'");
		//$r = mysqli_query($db,"SELECT * FROM bot WHERE nameBot='".$nameBot."'");
		while($line = mysqli_fetch_array($r)){
			extract($line);
			echo "on lance : ".$nameBot."</br>";
			flush();
			if($isActive!=0){
				$ch = curl_init($url);

				curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

				if (preg_match('`^https://`i', $url))
				{
				  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				}

				curl_setopt($ch, CURLOPT_NOBODY, true);

				$page = curl_exec($ch);
				
				curl_close($ch);
			}
		}
		$heure=date('H')+0;
		if($heure>=23 || $heure<5){
			while($heure>=23 || $heure<5){
				sleep(600);
			}
		}
		else{
			sleep(10800+intval(rand(1,90)));
		}
		echo "heure : ".date('H').":".date('i')."</br>";
	}
	
?>
