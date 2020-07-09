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
$t006_parameter_view = new t006_parameter_view();

// Run the page
$t006_parameter_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_parameter_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t006_parameter_view->isExport()) { ?>
<script>
var ft006_parameterview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft006_parameterview = currentForm = new ew.Form("ft006_parameterview", "view");
	loadjs.done("ft006_parameterview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t006_parameter_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t006_parameter_view->ExportOptions->render("body") ?>
<?php $t006_parameter_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t006_parameter_view->showPageHeader(); ?>
<?php
$t006_parameter_view->showMessage();
?>
<form name="ft006_parameterview" id="ft006_parameterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_parameter">
<input type="hidden" name="modal" value="<?php echo (int)$t006_parameter_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t006_parameter_view->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t006_parameter_view->TableLeftColumnClass ?>"><span id="elh_t006_parameter_Nama"><?php echo $t006_parameter_view->Nama->caption() ?></span></td>
		<td data-name="Nama" <?php echo $t006_parameter_view->Nama->cellAttributes() ?>>
<span id="el_t006_parameter_Nama">
<span<?php echo $t006_parameter_view->Nama->viewAttributes() ?>><?php echo $t006_parameter_view->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t006_parameter_view->Nilai->Visible) { // Nilai ?>
	<tr id="r_Nilai">
		<td class="<?php echo $t006_parameter_view->TableLeftColumnClass ?>"><span id="elh_t006_parameter_Nilai"><?php echo $t006_parameter_view->Nilai->caption() ?></span></td>
		<td data-name="Nilai" <?php echo $t006_parameter_view->Nilai->cellAttributes() ?>>
<span id="el_t006_parameter_Nilai">
<span<?php echo $t006_parameter_view->Nilai->viewAttributes() ?>><?php echo $t006_parameter_view->Nilai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t006_parameter_view->Variabel->Visible) { // Variabel ?>
	<tr id="r_Variabel">
		<td class="<?php echo $t006_parameter_view->TableLeftColumnClass ?>"><span id="elh_t006_parameter_Variabel"><?php echo $t006_parameter_view->Variabel->caption() ?></span></td>
		<td data-name="Variabel" <?php echo $t006_parameter_view->Variabel->cellAttributes() ?>>
<span id="el_t006_parameter_Variabel">
<span<?php echo $t006_parameter_view->Variabel->viewAttributes() ?>><?php echo $t006_parameter_view->Variabel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t006_parameter_view->IsModal) { ?>
<?php if (!$t006_parameter_view->isExport()) { ?>
<?php echo $t006_parameter_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t006_parameter_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t006_parameter_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t006_parameter_view->terminate();
?>