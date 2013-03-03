<?php
class Grabber
{

  function grabUrl($url)
	{
		$ch = curl_init( ) ;
		curl_setopt($ch, CURLOPT_URL, $url) ;
		// do a POST
		//curl_setopt($ch, CURLOPT_POST, true) ;
		//curl_setopt($ch, CURLOPT_POSTFIELDS, "id=333") ;
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true ) ;
		curl_setopt($ch, CURLOPT_TIMEOUT, 800);
		// return the result of curl_exec, instead
		// of outputting it directly
		$result = curl_exec($ch) ;
		//curl_exec($ch) ;
		curl_close($ch) ;

		return $result;
	}
}

?>
