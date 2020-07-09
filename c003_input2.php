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
$c003_input2 = new c003_input2();

// Run the page
$c003_input2->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php

$jumlahKapal      = "";
$jumlahDistribusi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$jumlahKapal      = $_POST["jumlahKapal"];
	$jumlahDistribusi = $_POST["jumlahDistribusi"];
	$jumlahPermintaan = $_POST["jumlahPermintaan"];
}

?>

<!-- row -->
<div class="row">

	<!-- Parameter Distribusi -->
	<div class="col-sm-4">
		<!-- Loading -->
		<div class="card mb-3">
			<div class="card-header">Parameter Distribusi</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="p-2">
							<!-- form -->
							<form action="c004_input3.php" method="POST">
							<input type="hidden" name="token" value="<?php echo CurrentPage()->Token; ?>">
							<div class="form-group row">
								Jumlah Kapal
								<input type="text" name="jumlahKapal" class="form-control form-control-user" id="jumlahKapal" placeholder="" value="<?php echo $jumlahKapal; ?>" readonly>
							</div>
							<div class="form-group row">
								Jumlah Distribusi
								<input type="text" name="jumlahDistribusi" class="form-control form-control-user" id="jumlahDistribusi" placeholder="" value="<?php echo $jumlahDistribusi; ?>" readonly>
							</div>
							<div class="form-group row">
								Jumlah Permintaan
								<input type="text" name="jumlahPermintaan" class="form-control form-control-user" id="jumlahDistribusi" placeholder="" value="<?php echo $jumlahPermintaan; ?>" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ./Kromosom GA -->
	
	<!-- Operator GA -->
	<div class="col-sm-8">
		<div class="card mb-3">
			<div class="card-header">Operator GA</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="p-2">
							<div class="form-group row">
								Stopping Criteria
								<!-- <input type="text" name="generasi" class="form-control form-control-user" id="jumlahDepo" placeholder="" value="<?php echo ExecuteScalar('select Generasi from t007_operator'); ?>"> -->
								<select class="form-control form-control-user" name="stopping">
									<option value="generasi">Count of Generasi</option>
									<option value="repeat">Repetition of the same Fitness value</option>
									<option value="time">by Time (in minutes)</option>
								</select>
							</div>
							<div class="form-group row">
								Populasi
								<input type="text" name="populasi" class="form-control form-control-user" id="jumlahDepo" placeholder="" value="<?php echo ExecuteScalar('select Populasi from t007_operator'); ?>">
							</div>
							<div class="form-group row">
								Prob. Seleksi
								<input type="text" name="seleksi" class="form-control form-control-user" id="jumlahPengimpor" placeholder="" value="<?php echo ExecuteScalar('select Seleksi from t007_operator'); ?>">
							</div>
							<div class="form-group row">
								Prob. CO
								<input type="text" name="co" class="form-control form-control-user" id="jumlahPengimpor" placeholder="" value="<?php echo ExecuteScalar('select CO from t007_operator'); ?>">
							</div>
							<div class="form-group row">
								Prob. Mutasi
								<input type="text" name="mutasi" class="form-control form-control-user" id="jumlahPengimpor" placeholder="" value="<?php echo ExecuteScalar('select Mutasi from t007_operator'); ?>">
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="p-2">
							<div class="form-group row">
								Stopping Criteria Value
								<input type="text" name="generasi" class="form-control form-control-user" id="jumlahDepo" placeholder="" value="<?php echo ExecuteScalar('select Generasi from t007_operator'); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ./Operator GA -->

	<!-- proses -->
	<div class="col-sm-12">
		<div class="card mb-3">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="p-2">
							<input type="checkbox" name="rawdata" value="show">&nbsp;<label> Show Raw Data </label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="p-2">
							<a href="c002_input1.php" class="btn btn-primary btn-icon-split">
								<span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
								<span class="text">Back</span>
							</a>
							<input type="submit" class="btn btn-primary" type="submit" name="proses" value="Calculate GA">
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

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c003_input2->terminate();
?>