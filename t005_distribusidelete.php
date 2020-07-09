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
$t005_distribusi_delete = new t005_distribusi_delete();

// Run the page
$t005_distribusi_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_distribusi_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft005_distribusidelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft005_distribusidelete = currentForm = new ew.Form("ft005_distribusidelete", "delete");
	loadjs.done("ft005_distribusidelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t005_distribusi_delete->showPageHeader(); ?>
<?php
$t005_distribusi_delete->showMessage();
?>
<form name="ft005_distribusidelete" id="ft005_distribusidelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_distribusi">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t005_distribusi_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t005_distribusi_delete->source_id->Visible) { // source_id ?>
		<th class="<?php echo $t005_distribusi_delete->source_id->headerCellClass() ?>"><span id="elh_t005_distribusi_source_id" class="t005_distribusi_source_id"><?php echo $t005_distribusi_delete->source_id->caption() ?></span></th>
<?php } ?>
<?php if ($t005_distribusi_delete->destination_id->Visible) { // destination_id ?>
		<th class="<?php echo $t005_distribusi_delete->destination_id->headerCellClass() ?>"><span id="elh_t005_distribusi_destination_id" class="t005_distribusi_destination_id"><?php echo $t005_distribusi_delete->destination_id->caption() ?></span></th>
<?php } ?>
<?php if ($t005_distribusi_delete->Jarak->Visible) { // Jarak ?>
		<th class="<?php echo $t005_distribusi_delete->Jarak->headerCellClass() ?>"><span id="elh_t005_distribusi_Jarak" class="t005_distribusi_Jarak"><?php echo $t005_distribusi_delete->Jarak->caption() ?></span></th>
<?php } ?>
<?php if ($t005_distribusi_delete->RateO->Visible) { // RateO ?>
		<th class="<?php echo $t005_distribusi_delete->RateO->headerCellClass() ?>"><span id="elh_t005_distribusi_RateO" class="t005_distribusi_RateO"><?php echo $t005_distribusi_delete->RateO->caption() ?></span></th>
<?php } ?>
<?php if ($t005_distribusi_delete->RateD->Visible) { // RateD ?>
		<th class="<?php echo $t005_distribusi_delete->RateD->headerCellClass() ?>"><span id="elh_t005_distribusi_RateD" class="t005_distribusi_RateD"><?php echo $t005_distribusi_delete->RateD->caption() ?></span></th>
<?php } ?>
<?php if ($t005_distribusi_delete->Demand->Visible) { // Demand ?>
		<th class="<?php echo $t005_distribusi_delete->Demand->headerCellClass() ?>"><span id="elh_t005_distribusi_Demand" class="t005_distribusi_Demand"><?php echo $t005_distribusi_delete->Demand->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t005_distribusi_delete->RecordCount = 0;
$i = 0;
while (!$t005_distribusi_delete->Recordset->EOF) {
	$t005_distribusi_delete->RecordCount++;
	$t005_distribusi_delete->RowCount++;

	// Set row properties
	$t005_distribusi->resetAttributes();
	$t005_distribusi->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t005_distribusi_delete->loadRowValues($t005_distribusi_delete->Recordset);

	// Render row
	$t005_distribusi_delete->renderRow();
?>
	<tr <?php echo $t005_distribusi->rowAttributes() ?>>
<?php if ($t005_distribusi_delete->source_id->Visible) { // source_id ?>
		<td <?php echo $t005_distribusi_delete->source_id->cellAttributes() ?>>
<span id="el<?php echo $t005_distribusi_delete->RowCount ?>_t005_distribusi_source_id" class="t005_distribusi_source_id">
<span<?php echo $t005_distribusi_delete->source_id->viewAttributes() ?>><?php echo $t005_distribusi_delete->source_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_distribusi_delete->destination_id->Visible) { // destination_id ?>
		<td <?php echo $t005_distribusi_delete->destination_id->cellAttributes() ?>>
<span id="el<?php echo $t005_distribusi_delete->RowCount ?>_t005_distribusi_destination_id" class="t005_distribusi_destination_id">
<span<?php echo $t005_distribusi_delete->destination_id->viewAttributes() ?>><?php echo $t005_distribusi_delete->destination_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_distribusi_delete->Jarak->Visible) { // Jarak ?>
		<td <?php echo $t005_distribusi_delete->Jarak->cellAttributes() ?>>
<span id="el<?php echo $t005_distribusi_delete->RowCount ?>_t005_distribusi_Jarak" class="t005_distribusi_Jarak">
<span<?php echo $t005_distribusi_delete->Jarak->viewAttributes() ?>><?php echo $t005_distribusi_delete->Jarak->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_distribusi_delete->RateO->Visible) { // RateO ?>
		<td <?php echo $t005_distribusi_delete->RateO->cellAttributes() ?>>
<span id="el<?php echo $t005_distribusi_delete->RowCount ?>_t005_distribusi_RateO" class="t005_distribusi_RateO">
<span<?php echo $t005_distribusi_delete->RateO->viewAttributes() ?>><?php echo $t005_distribusi_delete->RateO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_distribusi_delete->RateD->Visible) { // RateD ?>
		<td <?php echo $t005_distribusi_delete->RateD->cellAttributes() ?>>
<span id="el<?php echo $t005_distribusi_delete->RowCount ?>_t005_distribusi_RateD" class="t005_distribusi_RateD">
<span<?php echo $t005_distribusi_delete->RateD->viewAttributes() ?>><?php echo $t005_distribusi_delete->RateD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_distribusi_delete->Demand->Visible) { // Demand ?>
		<td <?php echo $t005_distribusi_delete->Demand->cellAttributes() ?>>
<span id="el<?php echo $t005_distribusi_delete->RowCount ?>_t005_distribusi_Demand" class="t005_distribusi_Demand">
<span<?php echo $t005_distribusi_delete->Demand->viewAttributes() ?>><?php echo $t005_distribusi_delete->Demand->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t005_distribusi_delete->Recordset->moveNext();
}
$t005_distribusi_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_distribusi_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t005_distribusi_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t005_distribusi_delete->terminate();
?>