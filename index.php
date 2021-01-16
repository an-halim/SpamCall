<?php
// Spam call
// Credit: ahmad nur halim
require'function.php';



echo "###########################\n";
echo  color('blue', "\tSPAM CALL\n\tby halim\nTolong digunakan sewajarnya\n");
echo "###########################\n";
echo "[?] No. HP (+62) : ";
$no = trim(fgets(STDIN));
echo "[?] Jumlah : ";
$jml = trim(fgets(STDIN));

if ($jml > 10) {
	echo "MARUK AMAT ANJING!";
}else{
	for ($i=1; $i <= $jml ; $i++) { 

		$csrf = getCsrf();
		Verif($no, $csrf);
		$spam = doSpam($no, $csrf);
		if ($spam == true) {
			echo color('green', "[".$i."/".$jml."] Sukses spam ke +62". $no."\n");
		}else{
			echo color('red', "[".$i."/".$jml."] Gagal spam ke +62". $no." *No salah atau LIMIT anjg\n");
			sleep(10);
		}
	}

	echo "SIAP SIAP KENA KARMA YA ANJG!";

}



?>