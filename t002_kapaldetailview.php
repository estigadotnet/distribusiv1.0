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
$t002_kapaldetail_view = new t002_kapaldetail_view();

// Run the page
$t002_kapaldetail_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_kapaldetail_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_kapaldetail_view->isExport()) { ?>
<script>
var ft002_kapaldetailview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft002_kapaldetailview = currentForm = new ew.Form("ft002_kapaldetailview", "view");
	loadjs.done("ft002_kapaldetailview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_kapaldetail_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t002_kapaldetail_view->ExportOptions->render("body") ?>
<?php $t002_kapaldetail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t002_kapaldetail_view->showPageHeader(); ?>
<?php
$t002_kapaldetail_view->showMessage();
?>
<form name="ft002_kapaldetailview" id="ft002_kapaldetailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_kapaldetail">
<input type="hidden" name="modal" value="<?php echo (int)$t002_kapaldetail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t002_kapaldetail_view->Payload->Visible) { // Payload ?>
	<tr id="r_Payload">
		<td class="<?php echo $t002_kapaldetail_view->TableLeftColumnClass ?>"><span id="elh_t002_kapaldetail_Payload"><?php echo $t002_kapaldetail_view->Payload->caption() ?></span></td>
		<td data-name="Payload" <?php echo $t002_kapaldetail_view->Payload->cellAttributes() ?>>
<span id="el_t002_kapaldetail_Payload">
<span<?php echo $t002_kapaldetail_view->Payload->viewAttributes() ?>><?php echo $t002_kapaldetail_view->Payload->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_kapaldetail_view->DischRate->Visible) { // DischRate ?>
	<tr id="r_DischRate">
		<td class="<?php echo $t002_kapaldetail_view->TableLeftColumnClass ?>"><span id="elh_t002_kapaldetail_DischRate"><?php echo $t002_kapaldetail_view->DischRate->caption() ?></span></td>
		<td data-name="DischRate" <?php echo $t002_kapaldetail_view->DischRate->cellAttributes() ?>>
<span id="el_t002_kapaldetail_DischRate">
<span<?php echo $t002_kapaldetail_view->DischRate->viewAttributes() ?>><?php echo $t002_kapaldetail_view->DischRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_kapaldetail_view->Tch->Visible) { // Tch ?>
	<tr id="r_Tch">
		<td class="<?php echo $t002_kapaldetail_view->TableLeftColumnClass ?>"><span id="elh_t002_kapaldetail_Tch"><?php echo $t002_kapaldetail_view->Tch->caption() ?></span></td>
		<td data-name="Tch" <?php echo $t002_kapaldetail_view->Tch->cellAttributes() ?>>
<span id="el_t002_kapaldetail_Tch">
<span<?php echo $t002_kapaldetail_view->Tch->viewAttributes() ?>><?php echo $t002_kapaldetail_view->Tch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_kapaldetail_view->VarCost->Visible) { // VarCost ?>
	<tr id="r_VarCost">
		<td class="<?php echo $t002_kapaldetail_view->TableLeftColumnClass ?>"><span id="elh_t002_kapaldetail_VarCost"><?php echo $t002_kapaldetail_view->VarCost->caption() ?></span></td>
		<td data-name="VarCost" <?php echo $t002_kapaldetail_view->VarCost->cellAttributes() ?>>
<span id="el_t002_kapaldetail_VarCost">
<span<?php echo $t002_kapaldetail_view->VarCost->viewAttributes() ?>><?php echo $t002_kapaldetail_view->VarCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_kapaldetail_view->VsLaden->Visible) { // VsLaden ?>
	<tr id="r_VsLaden">
		<td class="<?php echo $t002_kapaldetail_view->TableLeftColumnClass ?>"><span id="elh_t002_kapaldetail_VsLaden"><?php echo $t002_kapaldetail_view->VsLaden->caption() ?></span></td>
		<td data-name="VsLaden" <?php echo $t002_kapaldetail_view->VsLaden->cellAttributes() ?>>
<span id="el_t002_kapaldetail_VsLaden">
<span<?php echo $t002_kapaldetail_view->VsLaden->viewAttributes() ?>><?php echo $t002_kapaldetail_view->VsLaden->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_kapaldetail_view->VsBallast->Visible) { // VsBallast ?>
	<tr id="r_VsBallast">
		<td class="<?php echo $t002_kapaldetail_view->TableLeftColumnClass ?>"><span id="elh_t002_kapaldetail_VsBallast"><?php echo $t002_kapaldetail_view->VsBallast->caption() ?></span></td>
		<td data-name="VsBallast" <?php echo $t002_kapaldetail_view->VsBallast->cellAttributes() ?>>
<span id="el_t002_kapaldetail_VsBallast">
<span<?php echo $t002_kapaldetail_view->VsBallast->viewAttributes() ?>><?php echo $t002_kapaldetail_view->VsBallast->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_kapaldetail_view->ComDay->Visible) { // ComDay ?>
	<tr id="r_ComDay">
		<td class="<?php echo $t002_kapaldetail_view->TableLeftColumnClass ?>"><span id="elh_t002_kapaldetail_ComDay"><?php echo $t002_kapaldetail_view->ComDay->caption() ?></span></td>
		<td data-name="ComDay" <?php echo $t002_kapaldetail_view->ComDay->cellAttributes() ?>>
<span id="el_t002_kapaldetail_ComDay">
<span<?php echo $t002_kapaldetail_view->ComDay->viewAttributes() ?>><?php echo $t002_kapaldetail_view->ComDay->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_kapaldetail_view->Jumlah->Visible) { // Jumlah ?>
	<tr id="r_Jumlah">
		<td class="<?php echo $t002_kapaldetail_view->TableLeftColumnClass ?>"><span id="elh_t002_kapaldetail_Jumlah"><?php echo $t002_kapaldetail_view->Jumlah->caption() ?></span></td>
		<td data-name="Jumlah" <?php echo $t002_kapaldetail_view->Jumlah->cellAttributes() ?>>
<span id="el_t002_kapaldetail_Jumlah">
<span<?php echo $t002_kapaldetail_view->Jumlah->viewAttributes() ?>><?php echo $t002_kapaldetail_view->Jumlah->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t002_kapaldetail_view->IsModal) { ?>
<?php if (!$t002_kapaldetail_view->isExport()) { ?>
<?php echo $t002_kapaldetail_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t002_kapaldetail_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_kapaldetail_view->isExport()) { ?>
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
$t002_kapaldetail_view->terminate();
?>