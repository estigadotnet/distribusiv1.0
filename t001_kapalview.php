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
$t001_kapal_view = new t001_kapal_view();

// Run the page
$t001_kapal_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_kapal_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_kapal_view->isExport()) { ?>
<script>
var ft001_kapalview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft001_kapalview = currentForm = new ew.Form("ft001_kapalview", "view");
	loadjs.done("ft001_kapalview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_kapal_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t001_kapal_view->ExportOptions->render("body") ?>
<?php $t001_kapal_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t001_kapal_view->showPageHeader(); ?>
<?php
$t001_kapal_view->showMessage();
?>
<form name="ft001_kapalview" id="ft001_kapalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_kapal">
<input type="hidden" name="modal" value="<?php echo (int)$t001_kapal_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t001_kapal_view->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t001_kapal_view->TableLeftColumnClass ?>"><span id="elh_t001_kapal_Nama"><?php echo $t001_kapal_view->Nama->caption() ?></span></td>
		<td data-name="Nama" <?php echo $t001_kapal_view->Nama->cellAttributes() ?>>
<span id="el_t001_kapal_Nama">
<span<?php echo $t001_kapal_view->Nama->viewAttributes() ?>><?php echo $t001_kapal_view->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t001_kapal_view->IsModal) { ?>
<?php if (!$t001_kapal_view->isExport()) { ?>
<?php echo $t001_kapal_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
<?php
	if (in_array("t002_kapaldetail", explode(",", $t001_kapal->getCurrentDetailTable())) && $t002_kapaldetail->DetailView) {
?>
<?php if ($t001_kapal->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t002_kapaldetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t002_kapaldetailgrid.php" ?>
<?php } ?>
</form>
<?php
$t001_kapal_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_kapal_view->isExport()) { ?>
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
$t001_kapal_view->terminate();
?>