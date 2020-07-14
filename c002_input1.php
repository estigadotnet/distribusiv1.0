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
$c002_input1 = new c002_input1();

// Run the page
$c002_input1->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<!-- row -->
<div class="row">

	<!-- Parameter Distribusi -->
	<div class="col-sm-4">
		<div class="card mb-3">
			<div class="card-header">Parameter Distribusi</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="p-2">
							<!-- form -->
							<form action="c003_input2.php" method="POST">
							<input type="hidden" name="token" value="<?php echo CurrentPage()->Token; ?>">
							<div class="form-group row">
								Jumlah Kapal
								<input type="text" name="jumlahKapal" class="form-control form-control-user" id="jumlahKapal" placeholder="" value="<?php echo ExecuteScalar('select count(id) from t001_kapal where Diproses = 1'); ?>" readonly>
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
	<div class="col-sm-4">
		<div class="card mb-3">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="p-2">
							<input type="submit" class="btn btn-primary" type="submit" name="proses" value="Create">
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
$c002_input1->terminate();
?>