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
$c005_bf1 = new c005_bf1();

// Run the page
$c005_bf1->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<!-- row -->
<div class="row">

	<!-- Parameter Distribusi -->
	<div class="col-sm-6">
		<div class="card mb-3">
			<div class="card-header">Parameter Distribusi</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="p-2">
							<!-- form -->
							<form action="c006_bf2.php" method="POST">
							<input type="hidden" name="generasi" class="form-control form-control-user" id="jumlahDepo" placeholder="" value="<?php echo ExecuteScalar('select Generasi from t007_operator'); ?>">
							<input type="hidden" name="populasi" class="form-control form-control-user" id="jumlahDepo" placeholder="" value="<?php echo ExecuteScalar('select Populasi from t007_operator'); ?>">
							<input type="hidden" name="token" value="<?php echo CurrentPage()->Token; ?>">
							<div class="form-group row">
								Jumlah Kapal
								<input type="text" name="jumlahKapal" class="form-control form-control-user" id="jumlahKapal" placeholder="" value="<?php echo ExecuteScalar('select count(id) from t001_kapal'); ?>" readonly>
							</div>
							<div class="form-group row">
								Jumlah Distribusi
								<input type="text" name="jumlahDistribusi" class="form-control form-control-user" id="jumlahDistribusi" placeholder="" value="<?php echo ExecuteScalar('select count(id) from t005_distribusi'); ?>" readonly>
							</div>
							<div class="form-group row">
								Jumlah Permintaan
								<input type="text" name="jumlahPermintaan" class="form-control form-control-user" id="jumlahDistribusi" placeholder="" value='<?php echo number_format(ExecuteScalar("select Nilai from t006_parameter where Nama = 'Demand'")); ?>' readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.Kromosom GA -->

</div>
<!-- ./row -->

<!-- row -->
<div class="row">

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
							<a href="c006_bf2.php" class="btn btn-primary btn-icon-split">
								<span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
								<span class="text">Back</span>
							</a>
							<input type="submit" class="btn btn-primary" type="submit" name="proses" value="Calculate Brute Force">
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
$c005_bf1->terminate();
?>