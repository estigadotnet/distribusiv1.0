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
$t007_operator_view = new t007_operator_view();

// Run the page
$t007_operator_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_operator_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t007_operator_view->isExport()) { ?>
<script>
var ft007_operatorview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft007_operatorview = currentForm = new ew.Form("ft007_operatorview", "view");
	loadjs.done("ft007_operatorview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t007_operator_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t007_operator_view->ExportOptions->render("body") ?>
<?php $t007_operator_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t007_operator_view->showPageHeader(); ?>
<?php
$t007_operator_view->showMessage();
?>
<form name="ft007_operatorview" id="ft007_operatorview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_operator">
<input type="hidden" name="modal" value="<?php echo (int)$t007_operator_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t007_operator_view->Generasi->Visible) { // Generasi ?>
	<tr id="r_Generasi">
		<td class="<?php echo $t007_operator_view->TableLeftColumnClass ?>"><span id="elh_t007_operator_Generasi"><?php echo $t007_operator_view->Generasi->caption() ?></span></td>
		<td data-name="Generasi" <?php echo $t007_operator_view->Generasi->cellAttributes() ?>>
<span id="el_t007_operator_Generasi">
<span<?php echo $t007_operator_view->Generasi->viewAttributes() ?>><?php echo $t007_operator_view->Generasi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t007_operator_view->Populasi->Visible) { // Populasi ?>
	<tr id="r_Populasi">
		<td class="<?php echo $t007_operator_view->TableLeftColumnClass ?>"><span id="elh_t007_operator_Populasi"><?php echo $t007_operator_view->Populasi->caption() ?></span></td>
		<td data-name="Populasi" <?php echo $t007_operator_view->Populasi->cellAttributes() ?>>
<span id="el_t007_operator_Populasi">
<span<?php echo $t007_operator_view->Populasi->viewAttributes() ?>><?php echo $t007_operator_view->Populasi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t007_operator_view->Seleksi->Visible) { // Seleksi ?>
	<tr id="r_Seleksi">
		<td class="<?php echo $t007_operator_view->TableLeftColumnClass ?>"><span id="elh_t007_operator_Seleksi"><?php echo $t007_operator_view->Seleksi->caption() ?></span></td>
		<td data-name="Seleksi" <?php echo $t007_operator_view->Seleksi->cellAttributes() ?>>
<span id="el_t007_operator_Seleksi">
<span<?php echo $t007_operator_view->Seleksi->viewAttributes() ?>><?php echo $t007_operator_view->Seleksi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t007_operator_view->CO->Visible) { // CO ?>
	<tr id="r_CO">
		<td class="<?php echo $t007_operator_view->TableLeftColumnClass ?>"><span id="elh_t007_operator_CO"><?php echo $t007_operator_view->CO->caption() ?></span></td>
		<td data-name="CO" <?php echo $t007_operator_view->CO->cellAttributes() ?>>
<span id="el_t007_operator_CO">
<span<?php echo $t007_operator_view->CO->viewAttributes() ?>><?php echo $t007_operator_view->CO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t007_operator_view->Mutasi->Visible) { // Mutasi ?>
	<tr id="r_Mutasi">
		<td class="<?php echo $t007_operator_view->TableLeftColumnClass ?>"><span id="elh_t007_operator_Mutasi"><?php echo $t007_operator_view->Mutasi->caption() ?></span></td>
		<td data-name="Mutasi" <?php echo $t007_operator_view->Mutasi->cellAttributes() ?>>
<span id="el_t007_operator_Mutasi">
<span<?php echo $t007_operator_view->Mutasi->viewAttributes() ?>><?php echo $t007_operator_view->Mutasi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t007_operator_view->IsModal) { ?>
<?php if (!$t007_operator_view->isExport()) { ?>
<?php echo $t007_operator_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t007_operator_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t007_operator_view->isExport()) { ?>
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
$t007_operator_view->terminate();
?>