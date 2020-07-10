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
$c997_trialscript2 = new c997_trialscript2();

// Run the page
$c997_trialscript2->run();

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

$no = 0;
for ($d = 0; $d < $jumlahDistribusi; $d++) {
	for ($k = 0; $k < $jumlahKapal; $k++) {
		$arrKapal[$d][$k] = $kProses[$index_key[0]][$no++];
	}
}
echo "<pre>";
print_r($arrKapal);
echo "</pre>";

?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c997_trialscript2->terminate();
?>