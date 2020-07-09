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
$t004_destination_view = new t004_destination_view();

// Run the page
$t004_destination_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_destination_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t004_destination_view->isExport()) { ?>
<script>
var ft004_destinationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft004_destinationview = currentForm = new ew.Form("ft004_destinationview", "view");
	loadjs.done("ft004_destinationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t004_destination_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t004_destination_view->ExportOptions->render("body") ?>
<?php $t004_destination_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t004_destination_view->showPageHeader(); ?>
<?php
$t004_destination_view->showMessage();
?>
<form name="ft004_destinationview" id="ft004_destinationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_destination">
<input type="hidden" name="modal" value="<?php echo (int)$t004_destination_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t004_destination_view->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t004_destination_view->TableLeftColumnClass ?>"><span id="elh_t004_destination_Nama"><?php echo $t004_destination_view->Nama->caption() ?></span></td>
		<td data-name="Nama" <?php echo $t004_destination_view->Nama->cellAttributes() ?>>
<span id="el_t004_destination_Nama">
<span<?php echo $t004_destination_view->Nama->viewAttributes() ?>><?php echo $t004_destination_view->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t004_destination_view->IsModal) { ?>
<?php if (!$t004_destination_view->isExport()) { ?>
<?php echo $t004_destination_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t004_destination_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t004_destination_view->isExport()) { ?>
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
$t004_destination_view->terminate();
?>