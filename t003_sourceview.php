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
$t003_source_view = new t003_source_view();

// Run the page
$t003_source_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_source_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t003_source_view->isExport()) { ?>
<script>
var ft003_sourceview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft003_sourceview = currentForm = new ew.Form("ft003_sourceview", "view");
	loadjs.done("ft003_sourceview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t003_source_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t003_source_view->ExportOptions->render("body") ?>
<?php $t003_source_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t003_source_view->showPageHeader(); ?>
<?php
$t003_source_view->showMessage();
?>
<form name="ft003_sourceview" id="ft003_sourceview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_source">
<input type="hidden" name="modal" value="<?php echo (int)$t003_source_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t003_source_view->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t003_source_view->TableLeftColumnClass ?>"><span id="elh_t003_source_Nama"><?php echo $t003_source_view->Nama->caption() ?></span></td>
		<td data-name="Nama" <?php echo $t003_source_view->Nama->cellAttributes() ?>>
<span id="el_t003_source_Nama">
<span<?php echo $t003_source_view->Nama->viewAttributes() ?>><?php echo $t003_source_view->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t003_source_view->IsModal) { ?>
<?php if (!$t003_source_view->isExport()) { ?>
<?php echo $t003_source_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t003_source_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t003_source_view->isExport()) { ?>
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
$t003_source_view->terminate();
?>