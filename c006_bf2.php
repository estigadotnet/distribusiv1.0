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
$c006_bf2 = new c006_bf2();

// Run the page
$c006_bf2->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php

$recordPertama    = 1;
$jumlahKapal      = "";
$jumlahDistribusi = "";
$generasi         = "";
$populasi         = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$jumlahKapal      = $_POST["jumlahKapal"];
	$jumlahDistribusi = $_POST["jumlahDistribusi"];
	$jumlahPermintaan = $_POST["jumlahPermintaan"];
	$generasi         = $_POST["generasi"];
	$populasi         = $_POST["populasi"];
	$show             = (isset($_POST["rawdata"]) ? $_POST["rawdata"] : "");
}

// metode perhitungan
// _MP_ = "max";
// _MP_ = "min";
$q = "select * from t006_parameter where Nama = 'Metode Perhitungan'";
$r = ExecuteRow($q);
define("_MP_", $r["Nilai"]); //echo _MP_; die();

// _SRD_ = show raw data
// _SRD_ = "show" => true;
// _SRD_ = "" => false;
define("_SRD_", ($show == "show" ? true : false));

// _MC_ = Max Cost;
define("_MC_", ExecuteScalar("select Nilai from t006_parameter where Nama = 'Max Cost'"));

// hapus isi tabel t101_hasil
$q = "delete from t102_bfresult";
Execute($q);

	if (_SRD_) echo "<b>Jumlah Kapal</b>";
	if (_SRD_) echo "<br>";
	$rJumlah = ExecuteRows("select Jumlah from v102_result");
	foreach ($rJumlah as $rs) {
		if (_SRD_) echo $rs["Jumlah"].", ";
	}	
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Var Cost</b>";
	if (_SRD_) echo "<br>";
	$rVarCost = ExecuteRows("select VarCost from v102_result");
	foreach ($rVarCost as $rs) {
		if (_SRD_) echo $rs["VarCost"].", ";
	}	
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>TCH</b>";
	if (_SRD_) echo "<br>";
	$rTch = ExecuteRows("select Tch from v102_result");
	foreach ($rTch as $rs) {
		if (_SRD_) echo $rs["Tch"] . ", ";
	}
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Payload</b>";
	if (_SRD_) echo "<br>";
	$rPayload = ExecuteRows("select Payload from v102_result");
	foreach ($rPayload as $rs) {
		if (_SRD_) echo $rs["Payload"] . ", ";
	}
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Sea-Time (jam)</b>";
	if (_SRD_) echo "<br>";
	$rsea_time = ExecuteRows("select sea_time from v102_result");
	foreach ($rsea_time as $rs) {
		if (_SRD_) echo $rs["sea_time"] . ", ";
	}
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Port-Time (jam)</b>";
	if (_SRD_) echo "<br>";
	$rport_time = ExecuteRows("select port_time from v102_result");
	foreach ($rport_time as $rs) {
		if (_SRD_) echo $rs["port_time"] . ", ";
	}
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Roundtrip Days</b>";
	if (_SRD_) echo "<br>";
	$rroundtrip_days = ExecuteRows("select roundtrip_days from v102_result");
	foreach ($rroundtrip_days as $rs) {
		if (_SRD_) echo $rs["roundtrip_days"] . ", ";
	}
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Freq Max by Trip</b>";
	if (_SRD_) echo "<br>";
	$rfreqmaxbytrip = ExecuteRows("select freqmaxbytrip from v102_result");
	foreach ($rfreqmaxbytrip as $rs) {
		if (_SRD_) echo $rs["freqmaxbytrip"] . ", ";
	}
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Freq Max by Cargo</b>";
	if (_SRD_) echo "<br>";
	$rfreqmaxbycargo = ExecuteRows("select freqmaxbycargo from v102_result");
	foreach ($rfreqmaxbycargo as $rs) {
		if (_SRD_) echo $rs["freqmaxbycargo"] . ", ";
	}
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


// loop berdasarkan jumlah $generasi
for ($g = 0; $g <= $generasi; $g++) {

	// create kromosom
	for ($pop = 0; $pop < intval($populasi); $pop++) {
		for ($kap = 0; $kap < (intval($jumlahKapal) * intval($jumlahDistribusi)); $kap++) {
			$kProses[$pop][$kap] = number_format(rand(0, 200) / 100, 2);
		}
	}

	if (_SRD_) echo "<b>Gen[".$g."]</b>";
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<b>--------------------</b>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Kromosom</b>";
	if (_SRD_) echo "<br>";
	for ($i = 0; $i < $pop; $i++) {
		for ($j = 0; $j < $kap; $j++) {
			if (_SRD_) echo $kProses[$i][$j] . ", ";
		}
		if (_SRD_) echo "<br>";
	}
	if (_SRD_) echo "<br>";


	//if (_SRD_) echo "<b>FAA</b>";
	//if (_SRD_) echo "<br>";
	for ($i = 0; $i < $pop; $i++) {
		for ($j = 0; $j < $kap; $j++) {
			$faa[$i][$j] = ($kProses[$i][$j] * $rfreqmaxbytrip[$j][0]);
			//if (_SRD_) echo $faa[$i][$j] . ", ";
		}
		//if (_SRD_) echo "<br>";
	}
	//if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Cargo Terangkut</b>";
	if (_SRD_) echo "<br>";
	for ($i = 0; $i < $pop; $i++) {
		for ($j = 0; $j < $kap; $j++) {
			$cargoterangkut[$i][$j] = (($kProses[$i][$j] * $rfreqmaxbytrip[$j][0]) * $rPayload[$j][0]);
			if (_SRD_) echo $cargoterangkut[$i][$j] . ", ";
		}
		if (_SRD_) echo "<br>";
	}
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Jumlah Kapal</b>";
	if (_SRD_) echo "<br>";
	for ($i = 0; $i < $pop; $i++) {
		for ($j = 0; $j < $kap; $j++) {
			$jumlahkapal[$i][$j] = ceil(($kProses[$i][$j] * $rfreqmaxbytrip[$j][0]) / $rfreqmaxbytrip[$j][0]);
			if (_SRD_) echo $jumlahkapal[$i][$j] . ", ";
		}
		if (_SRD_) echo "<br>";
	}
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>FC</b>";
	if (_SRD_) echo "<br>";
	for ($i = 0; $i < $pop; $i++) {
		$total_fc[$i] = 0;
		for ($j = 0; $j < $kap; $j++) {
			$fc[$i][$j] = ceil($jumlahkapal[$i][$j] * $rTch[$j][0] * 365);
			$total_fc[$i] += $fc[$i][$j];
			if (_SRD_) echo $fc[$i][$j] . ", ";
		}
		if (_SRD_) echo "<br>";
	}
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>VC</b>";
	if (_SRD_) echo "<br>";
	for ($i = 0; $i < $pop; $i++) {
		$total_vc[$i] = 0;
		for ($j = 0; $j < $kap; $j++) {
			$varcost[$i][$j] = ($kProses[$i][$j] * $rfreqmaxbytrip[$j][0]) * $rroundtrip_days[$j][0] * $rVarCost[$j][0];
			$total_vc[$i] += $varcost[$i][$j];
			if (_SRD_) echo $varcost[$i][$j] . ", ";
		}
		if (_SRD_) echo "<br>";
	}
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Total Cost</b>";
	if (_SRD_) echo "<br>";
	for ($i = 0; $i < $pop; $i++) {
		$total_tc[$i] = $total_fc[$i] + $total_vc[$i];
		if (_SRD_) echo $total_tc[$i] . ", ";
	}
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Total Cargo</b>";
	if (_SRD_) echo "<br>";
	for ($i = 0; $i < $pop; $i++) {
		$total_cf[$i] = 0;
		for ($j = 0; $j < $kap; $j++) {
			$total_cf[$i] += $cargoterangkut[$i][$j];
		}
		if (_SRD_) echo $total_cf[$i] . ", ";
	}
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	$total_fitness = 0;
	
	if (_SRD_) echo "<b>Nilai Fitness</b>";
	if (_SRD_) echo "<br>";
	for ($i = 0; $i < $pop; $i++) {
		//$fitness[$i] = (100000000 / ($total_tc[$i] + $total_cf[$i]));
		$fitness[$i] = ($total_tc[$i] / _MC_);
		//$fitness[$i] = (1000000000 / $total_tc[$i]);
		//$fitness[$i] = $total_tc[$i];
		$total_fitness += $fitness[$i];
		if (_SRD_) echo $fitness[$i];
		if (_SRD_) echo "<br>";
	}
	if (_SRD_) echo "<br>";


	if (_SRD_) echo "<b>Individu Optimum (" . _MP_ . "(Fitness))</b>";
	if (_SRD_) echo "<br>";
	if (_SRD_) echo " ".(_MP_ == 'max' ? max($fitness) : min($fitness));
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";

	$index_key = array_keys($fitness, (_MP_ == 'max' ? max($fitness) : min($fitness)));
	if (_SRD_) echo "<b>Populasi ke</b>";
	if (_SRD_) echo "<br>";
	if (_SRD_) echo ($index_key[0]+1);
	if (_SRD_) echo "<br>";
	if (_SRD_) echo "<br>";


	// simpan ke tabel, dengan cara seleksi
	$q = "insert into
		t102_bfresult
		(TotalCost, TotalCargo, Fitness, Kromosom, Generasi)
		values
		(";
		if ($recordPertama == 1) {
			$recordPertama = 2;
			$total_tcAcuan = $total_tc[$index_key[0]];
			$total_cfAcuan = $total_cf[$index_key[0]];
			$fitnessAcuan  = (_MP_ == 'max' ? max($fitness) : min($fitness));
			$kromosomAcuan = serialize($kProses[$index_key[0]]);
		}
		else {
			if (_MP_ == 'max') {
				if ($fitness[$index_key[0]] > $fitnessAcuan) {
					$total_tcAcuan = $total_tc[$index_key[0]];
					$total_cfAcuan = $total_cf[$index_key[0]];
					$fitnessAcuan  = (_MP_ == 'max' ? max($fitness) : min($fitness));
					$kromosomAcuan = serialize($kProses[$index_key[0]]);
				}
				else {
				}
			}
			else {
				if ($fitness[$index_key[0]] > $fitnessAcuan) {
				}
				else {
					$total_tcAcuan = $total_tc[$index_key[0]];
					$total_cfAcuan = $total_cf[$index_key[0]];
					$fitnessAcuan  = (_MP_ == 'max' ? max($fitness) : min($fitness));
					$kromosomAcuan = serialize($kProses[$index_key[0]]);
				}
			}
		}
	$q = $q . $total_tcAcuan.", ".$total_cfAcuan.", ".$fitnessAcuan.", '".$kromosomAcuan."', ".$g.")";
	Execute($q); //echo $q; //die();
	
}
// ./loop berdasarkan jumlah $generasi
?>

<!-- row -->
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">Brute Force</div>
		</div>
	</div>
</div>
<div class="row">

	<!-- Parameter Distribusi -->
	<div class="col-sm-4">
		<!-- Loading -->
		<div class="card">
			<div class="card-header">Parameter Distribusi</div>
			<div class="card-body">
				<!-- form -->
				<form action="c004_input4.php" method="POST">
				<input type="hidden" name="token" value="<?php echo CurrentPage()->Token; ?>">
				<div class="row"><div class="col-4">Jumlah Kapal</div><div class="col-4"><?php echo $jumlahKapal; ?></div></div>
				<div class="row"><div class="col-4">Jumlah Distribusi</div><div class="col-4"><?php echo $jumlahDistribusi; ?></div></div>
				<div class="row"><div class="col-4">Jumlah Permintaan</div><div class="col-4"><?php echo $jumlahPermintaan; ?></div></div>
			</div>
		</div>
	</div>
	<!-- ./Kromosom GA -->
	
</div>
<div class="row">

	<?php if ($jumlahKapal > 0 or $jumlahDistribusi > 0) { ?>
			
	<!-- proses total ke bawah -->
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				Individu Optimum
			</div>
			<div class="card-body">
					
				<div class="row">
							
					<!-- tabel 1            -->
					<!-- baris = distribusi -->
					<!-- kolom = kapal      -->
					<?php if ($jumlahDistribusi > 0) { ?>

						<!-- kolom d[1], d[2], d[n] -->
						<!-- kolom pertama -->
						<div class="col-sm-1">
							<div class="p-1">
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
								<div class="form-group row"><div class="col bg-light text-dark text-center">d<?php echo $i; ?></div></div>
								<?php } ?>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
							</div>
						</div>
								
						<!-- kolom d[1], d[2], d[n]  -->
						<!-- kolom kedua, kolom[n-2] -->
						<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
						<?php   $totalCargo[$i] = 0; ?>
						<?php } ?>
						<?php for ($d = 1; $d <= $jumlahKapal; $d++) { ?>
						<?php   $row = 1; ?>
						<div class="col-sm-1">
							<div class="p-1">
								<div class="form-group row"><div class="col bg-light text-dark text-center">k<?php echo $d; ?></div></div>
								<?php $totalKapal = 0; ?>
								<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($kProses[$index_key[0]][(($jumlahKapal * $i)-$jumlahKapal)+($d-1)], 2); ?></div></div>
								<?php   $totalKapal += $kProses[$index_key[0]][(($jumlahKapal * $i)-$jumlahKapal)+($d-1)]; ?>
								<?php   $totalCargo[$i] += $cargoterangkut[$index_key[0]][(($jumlahKapal * $i)-$jumlahKapal)+($d-1)]; ?>
								<?php } ?>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($totalKapal); ?></div></div>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($rJumlah[$d-1][0]); ?></div></div>
							</div>
						</div>
						<?php } ?>

						<!-- kolom sebelum terakhir -->
						<div class="col-sm-1">
							<div class="p-1">
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<?php //$q = "select Nilai from t006_parameter where Nama = 'Demand'"; $demand = ExecuteScalar($q); ?>
								<?php $gtCargo = 0;?>
								<?php $q = "select Demand from t005_distribusi"; $demand = ExecuteRows($q); ?>
								<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($totalCargo[$i]); ?></div></div>
								<?php   $gtCargo += $totalCargo[$i]; ?>
								<?php } ?>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($gtCargo); ?></div></div>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
							</div>
						</div>
								
						<!-- kolom terakhir -->
						<div class="col-sm-1">
							<div class="p-1">
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<?php //$q = "select Nilai from t006_parameter where Nama = 'Demand'"; $demand = ExecuteScalar($q); ?>
								<?php $q = "select Demand from t005_distribusi"; $demand = ExecuteRows($q); ?>
								<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($demand[$d-1][0]); ?></div></div>
								<?php } ?>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
							</div>
						</div>
							
					<?php } ?>
					<!-- end of tabel 1    -->
							
				</div>
			</div>
		</div>
	</div>
	<!-- end of proses total ke bawah -->

</div>
<div class="row">

	<!-- total ke kanan -->
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				Cargo Terangkut
			</div>
			<div class="card-body">
					
				<div class="row">
							
					<!-- tabel 1            -->
					<!-- baris = distribusi -->
					<!-- kolom = kapal      -->
					<?php if ($jumlahDistribusi > 0) { ?>

						<!-- kolom d[1], d[2], d[n] -->
						<!-- kolom pertama -->
						<div class="col-sm-1">
							<div class="p-1">
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
								<div class="form-group row"><div class="col bg-light text-dark text-center">d<?php echo $i; ?></div></div>
								<?php } ?>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
							</div>
						</div>
								
						<!-- kolom d[1], d[2], d[n] -->
						<!-- kolom kedua, kolom[n-2] -->
						<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
						<?php   $totalCargo[$i] = 0; ?>
						<?php } ?>
						<?php for ($d = 1; $d <= $jumlahKapal; $d++) { ?>
						<?php   $row = 1; ?>
						<div class="col-sm-1">
							<div class="p-1">
								<div class="form-group row"><div class="col bg-light text-dark text-center">k<?php echo $d; ?></div></div>
								<?php $totalKapal = 0; ?>
								<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($cargoterangkut[$index_key[0]][(($jumlahKapal * $i)-$jumlahKapal)+($d-1)]); ?></div></div>
								<?php   $totalKapal += $kProses[$index_key[0]][(($jumlahKapal * $i)-$jumlahKapal)+($d-1)]; ?>
								<?php   $totalCargo[$i] += $cargoterangkut[$index_key[0]][(($jumlahKapal * $i)-$jumlahKapal)+($d-1)]; ?>
								<?php } ?>
								<div class="form-group row"><div class="col bg-light text-dark white text-right"><?php echo number_format($totalKapal); ?></div></div>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($rJumlah[$d-1][0]); ?></div></div>
							</div>
						</div>
						<?php } ?>
								
						<!-- kolom sebelum kolom terakhir -->
						<div class="col-sm-1">
							<div class="p-1">
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<?php $gtCargo = 0;?>
								<?php //$q = "select Nilai from t006_parameter where Nama = 'Demand'"; $demand = ExecuteScalar($q); ?>
								<?php $q = "select Demand from t005_distribusi"; $demand = ExecuteRows($q); ?>
								<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($totalCargo[$i]); ?></div></div>
								<?php   $gtCargo += $totalCargo[$i]; ?>
								<?php } ?>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($gtCargo); ?></div></div>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
							</div>
						</div>

						<!-- kolom terakhir -->
						<div class="col-sm-1">
							<div class="p-1">
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<?php //$q = "select Nilai from t006_parameter where Nama = 'Demand'"; $demand = ExecuteScalar($q); ?>
								<?php $q = "select Demand from t005_distribusi"; $demand = ExecuteRows($q); ?>
								<?php for ($i = 1; $i <= $jumlahDistribusi; $i++) { ?>
								<div class="form-group row"><div class="col bg-light text-dark text-right"><?php echo number_format($demand[$d-1][0]); ?></div></div>
								<?php } ?>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
								<div class="form-group row"><div class="col">&nbsp;</div></div>
							</div>
						</div>
							
					<?php } ?>
					<!-- end of tabel 1    -->
							
				</div>
			</div>
		</div>
	</div>
	<!-- end of total ke kanan -->
			
	<?php }?>

</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<div id="chart_div"></div>
					<!-- <div id="curve_chart" style="width: 900px; height: 500px"></div> -->
					<!-- <div id="curve_chart"></div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">

	<!-- proses -->
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="p-1">
							<a href="c005_bf1.php" class="btn btn-primary btn-icon-split">
								<span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
								<span class="text">Back</span>
							</a>
							<!--<a href="Report1smry.php" target="_blank" class="btn btn-primary btn-icon-split">
								<span class="text">Grafik</span>
							</a>-->
							<a href="#" class="btn btn-primary btn-icon-split" onclick="window.print()">
								<span class="text">Print</span>
							</a>
							<!-- /form -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ./proses -->

</div>
<!-- ./row -->

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
google.charts.load('current', {
  packages: ['corechart']
});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

  var data = google.visualization.arrayToDataTable([

 ['Generasi','Total Cost'],

  <?php
  $q = "select Generasi, TotalCost from t102_bfresult";
  $r = ExecuteRows($q);
  foreach ($r as $rs) {
  	echo "[".$rs["Generasi"].", ".$rs["TotalCost"]."],";
  }
  ?>
  ]);

  var options = {
	hAxis: {
	  title: 'Generasi'
	},
	vAxis: {
	  title: 'Total Cost'
	},
	width: '100%',
	height: '500',
	curveType: 'function',
	title: 'Grafik Brute Force'
  };

  var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

  chart.draw(data, options);
}

	</script>


<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c006_bf2->terminate();
?>