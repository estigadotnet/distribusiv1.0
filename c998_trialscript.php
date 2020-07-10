<?php
namespace PHPMaker2020\p_distribusi;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$c998_trialscript = new c998_trialscript();

// Run the page
$c998_trialscript->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php

// array jumlahKapal * jumlahDistribusi * populasi
$jumlahKapal = 3;
$jumlahDistribusi = 8;
$populasi = 10;
for ($i = 0; $i < $populasi; $i++) {
	for ($j = 0; $j < ($jumlahKapal * $jumlahDistribusi); $j++) {
		//$kProses[$i][$j] = $i . "-" . $j;
		// diisi bilangan random 0 - 2
		$kProses[$i][$j] = number_format(rand(0, 200) / 100, 2);
	}
}
// misalkan populasi ke 9
// asumsinya :: populasi = $i
$index_key[0] = 9;
echo "<pre>";
print_r($kProses[$index_key[0]]);
echo "</pre>";


for ($k = 1; $k <= $jumlahKapal; $k++) {
	for ($d = 1; $d <= $jumlahDistribusi; $d++) {
		//echo $kProses[$index_key[0]][(($jumlahKapal * $d)-$jumlahKapal)+($k-1)] . "<br>";
		//$arrKapal[$k][$d] = $kProses[$index_key[0]][(($jumlahKapal * $d)-$jumlahKapal)+($k-1)];
		//$arrKapal = array([$k]=>array([$d] => $kProses[$index_key[0]][(($jumlahKapal * $d)-$jumlahKapal)+($k-1)]));
		$arrKapal[$k][(($jumlahKapal * $d)-$jumlahKapal)+($k-1)] = $kProses[$index_key[0]][(($jumlahKapal * $d)-$jumlahKapal)+($k-1)];
	}
	//echo "<br>";
}

// rekayasa 0
//$arrKapal[1][21] = 0;
//$arrKapal[2][22] = 0;
//$arrKapal[3][23] = 0;

echo "<pre>";
print_r($arrKapal);
echo "</pre>";

// check constraint per kapal
for ($k = 1; $k <= $jumlahKapal; $k++) {
	echo "array[".$k."] : ".array_sum($arrKapal[$k])."<br>";
	$hasilSum = array_sum($arrKapal[$k]);
	//if ($hasilSum >= 5) {
		while ($hasilSum >= 5) {
		// cari index terkecil
		$indexKey = array_keys($arrKapal[$k], min(array_filter($arrKapal[$k], function($varx) {return $varx != 0;})));
		
		// lakukan replacement 1 array menjadi 0
		$arrKapal[$k][$indexKey[0]] = 0;
		$kProses[$index_key[0]][$indexKey[0]] = 0;
				
		// lalu di-sum lagi
		$hasilSum = array_sum($arrKapal[$k]);
		echo "array[".$k."] : ".array_sum($arrKapal[$k])." - setelah replacement<br>";
		}
	//}
	//echo "array[".$k."] : ".array_sum($arrKapal[$k])." - setelah replacement<br>";
}
echo "<br>";
echo "<pre>";
print_r($arrKapal);
echo "</pre>";

echo "<pre>";
print_r($kProses[$index_key[0]]);
echo "</pre>";
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c998_trialscript->terminate();
?>