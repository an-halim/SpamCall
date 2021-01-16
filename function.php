<?php
$rand = rand(111, 9999);
function get_betwen($string, $start, $end) {
		$string = " ".$string;
		$ini = strpos($string,$start);
		if ($ini == 0) return "";
		$ini += strlen($start);
		$len = strpos($string,$end,$ini) - $ini;
		return substr($string,$ini,$len);
}

function color($color = "default" , $text){
        $arrayColor = array(
            'red'       => '1;31',
            'green'     => '1;32',
            'blue'      => '1;34',
        );  
        return "\033[".$arrayColor[$color]."m".$text."\033[0m";
 }

function getCsrf(){
		global $rand;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://www.citcall.com/demo/',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'authority: www.citcall.com',
		    'cache-control: max-age=0',
		    'sec-ch-ua: "Google Chrome";v="87", ""Not;A\\Brand";v="99", "Chromium";v="87"',
		    'sec-ch-ua-mobile: ?1',
		    'upgrade-insecure-requests: 1',
		    'user-agent: Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Mobile Safari/537.36',
		    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
		    'sec-fetch-site: same-origin',
		    'sec-fetch-mode: navigate',
		    'sec-fetch-user: ?1',
		    'sec-fetch-dest: document',
		    'referer: https://www.citcall.com/',
		    'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
		    'cookie: PHPSESSID=c7e015248b6c1374885d5501bf579655; _ga=GA1.2.1719997530.1610788006; _gid=GA1.2.1836554639.1610788006; crisp-client%2Fsession%2F331cd7b6-4c4b-43a0-b084-5a239bed3ca4=session_1ea8f024-bbea-4624-9b1c-a3d1154da'.$rand
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$token = get_betwen($response, 'id="csrf_token" value="', '">');
		$csrf = str_replace('=', '%3D', $token);
		$csrf = str_replace('/', '%2F', $csrf);

		return $csrf;

}

function Verif($no, $csrf){
		global $rand;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://www.citcall.com/demo/verification.php',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => 'cellNo=%2B62'. $no .'&csrf_token='. $csrf,
		  CURLOPT_HTTPHEADER => array(
		    'authority: www.citcall.com',
		    'cache-control: max-age=0',
		    'sec-ch-ua: "Google Chrome";v="87", ""Not;A\\Brand";v="99", "Chromium";v="87"',
		    'sec-ch-ua-mobile: ?1',
		    'upgrade-insecure-requests: 1',
		    'origin: https://www.citcall.com',
		    'content-type: application/x-www-form-urlencoded',
		    'user-agent: Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Mobile Safari/537.36',
		    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
		    'sec-fetch-site: same-origin',
		    'sec-fetch-mode: navigate',
		    'sec-fetch-user: ?1',
		    'sec-fetch-dest: document',
		    'referer: https://www.citcall.com/demo/',
		    'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
		    'cookie: PHPSESSID=c7e015248b6c1374885d5501bf579655; _ga=GA1.2.1719997530.1610788006; _gid=GA1.2.1836554639.1610788006; crisp-client%2Fsession%2F331cd7b6-4c4b-43a0-b084-5a239bed3ca4=session_1ea8f024-bbea-4624-9b1c-a3d1154da'.$rand
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

}




function  doSpam($no, $csrf){
		global $rand;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://www.citcall.com/demo/misscallapi.php',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'cid=%2B62'. $no .'&trying=1&csrf_token='. $csrf,
		  CURLOPT_HTTPHEADER => array(
		    'authority: www.citcall.com',
		    'sec-ch-ua: "Google Chrome";v="87", ""Not;A\\Brand";v="99", "Chromium";v="87"',
		    'accept: application/json, text/javascript, */*; q=0.01',
		    'x-requested-with: XMLHttpRequest',
		    'sec-ch-ua-mobile: ?1',
		    'user-agent: Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Mobile Safari/537.36',
		    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
		    'origin: https://www.citcall.com',
		    'sec-fetch-site: same-origin',
		    'sec-fetch-mode: cors',
		    'sec-fetch-dest: empty',
		    'referer: https://www.citcall.com/demo/verification.php',
		    'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
		    'cookie: PHPSESSID=c7e015248b6c1374885d5501bf579655; _ga=GA1.2.1719997530.1610788006; _gid=GA1.2.1836554639.1610788006; crisp-client%2Fsession%2F331cd7b6-4c4b-43a0-b084-5a239bed3ca4=session_1ea8f024-bbea-4624-9b1c-a3d1154da'.$rand
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$status = get_betwen($response, '"result":"', '"');

		if ($status == 'Success') {
			return true;
		}else{
			return false;
		}

}




?>