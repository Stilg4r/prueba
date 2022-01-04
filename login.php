<?php

if (! $_SERVER['REQUEST_METHOD'] === 'POST') {
	echo 'no acceso';
}

$url = "https://jsonplaceholder.typicode.com/users?username={$_POST['username']}";
$c = curl_init();
curl_setopt( $c , CURLOPT_URL , $url);
curl_setopt( $c , CURLOPT_USERAGENT, "Mozilla/5.0 (Linux Centos 7;) Chrome/74.0.3729.169 Safari/537.36");
curl_setopt( $c , CURLOPT_RETURNTRANSFER, true);
curl_setopt( $c , CURLOPT_SSL_VERIFYPEER, false);
curl_setopt( $c , CURLOPT_SSL_VERIFYHOST, false);
curl_setopt( $c , CURLOPT_TIMEOUT, 10000); // 10 sec
$data = curl_exec($c);
curl_close($c);

$data = json_decode($data, true);

if (empty($data)) {
	if (isset($_SERVER['HTTP_COOKIE'])) {
	    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	    foreach($cookies as $cookie) {
	        $parts = explode('=', $cookie);
	        $name = trim($parts[0]);
	        setcookie($name, '', time()-1000);
	        setcookie($name, '', time()-1000, '/');
	    }
	}
	http_response_code(401);
	var_dump($data);
}
else{
	http_response_code(200);
	setcookie("logged", 1, time()+3600);
	header('Location: users.php');
}
