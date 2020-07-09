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
$t002_kapaldetail_delete = new t002_kapaldetail_delete();

// Run the page
$t002_kapaldetail_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_kapaldetail_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_kapaldetaildelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft002_kapaldetaildelete = currentForm = new ew.Form("ft002_kapaldetaildelete", "delete");
	loadjs.done("ft002_kapaldetaildelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_kapaldetail_delete->showPageHeader(); ?>
<?php
$t002_kapaldetail_delete->showMessage();
?>
<form name="ft002_kapaldetaildelete" id="ft002_kapaldetaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_kapaldetail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t002_kapaldetail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t002_kapaldetail_delete->Payload->Visible) { // Payload ?>
		<th class="<?php echo $t002_kapaldetail_delete->Payload->headerCellClass() ?>"><span id="elh_t002_kapaldetail_Payload" class="t002_kapaldetail_Payload"><?php echo $t002_kapaldetail_delete->Payload->caption() ?></span></th>
<?php } ?>
<?php if ($t002_kapaldetail_delete->DischRate->Visible) { // DischRate ?>
		<th class="<?php echo $t002_kapaldetail_delete->DischRate->headerCellClass() ?>"><span id="elh_t002_kapaldetail_DischRate" class="t002_kapaldetail_DischRate"><?php echo $t002_kapaldetail_delete->DischRate->caption() ?></span></th>
<?php } ?>
<?php if ($t002_kapaldetail_delete->Tch->Visible) { // Tch ?>
		<th class="<?php echo $t002_kapaldetail_delete->Tch->headerCellClass() ?>"><span id="elh_t002_kapaldetail_Tch" class="t002_kapaldetail_Tch"><?php echo $t002_kapaldetail_delete->Tch->caption() ?></span></th>
<?php } ?>
<?php if ($t002_kapaldetail_delete->VarCost->Visible) { // VarCost ?>
		<th class="<?php echo $t002_kapaldetail_delete->VarCost->headerCellClass() ?>"><span id="elh_t002_kapaldetail_VarCost" class="t002_kapaldetail_VarCost"><?php echo $t002_kapaldetail_delete->VarCost->caption() ?></span></th>
<?php } ?>
<?php if ($t002_kapaldetail_delete->VsLaden->Visible) { // VsLaden ?>
		<th class="<?php echo $t002_kapaldetail_delete->VsLaden->headerCellClass() ?>"><span id="elh_t002_kapaldetail_VsLaden" class="t002_kapaldetail_VsLaden"><?php echo $t002_kapaldetail_delete->VsLaden->caption() ?></span></th>
<?php } ?>
<?php if ($t002_kapaldetail_delete->VsBallast->Visible) { // VsBallast ?>
		<th class="<?php echo $t002_kapaldetail_delete->VsBallast->headerCellClass() ?>"><span id="elh_t002_kapaldetail_VsBallast" class="t002_kapaldetail_VsBallast"><?php echo $t002_kapaldetail_delete->VsBallast->caption() ?></span></th>
<?php } ?>
<?php if ($t002_kapaldetail_delete->ComDay->Visible) { // ComDay ?>
		<th class="<?php echo $t002_kapaldetail_delete->ComDay->headerCellClass() ?>"><span id="elh_t002_kapaldetail_ComDay" class="t002_kapaldetail_ComDay"><?php echo $t002_kapaldetail_delete->ComDay->caption() ?></span></th>
<?php } ?>
<?php if ($t002_kapaldetail_delete->Jumlah->Visible) { // Jumlah ?>
		<th class="<?php echo $t002_kapaldetail_delete->Jumlah->headerCellClass() ?>"><span id="elh_t002_kapaldetail_Jumlah" class="t002_kapaldetail_Jumlah"><?php echo $t002_kapaldetail_delete->Jumlah->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t002_kapaldetail_delete->RecordCount = 0;
$i = 0;
while (!$t002_kapaldetail_delete->Recordset->EOF) {
	$t002_kapaldetail_delete->RecordCount++;
	$t002_kapaldetail_delete->RowCount++;

	// Set row properties
	$t002_kapaldetail->resetAttributes();
	$t002_kapaldetail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t002_kapaldetail_delete->loadRowValues($t002_kapaldetail_delete->Recordset);

	// Render row
	$t002_kapaldetail_delete->renderRow();
?>
	<tr <?php echo $t002_kapaldetail->rowAttributes() ?>>
<?php if ($t002_kapaldetail_delete->Payload->Visible) { // Payload ?>
		<td <?php echo $t002_kapaldetail_delete->Payload->cellAttributes() ?>>
<span id="el<?php echo $t002_kapaldetail_delete->RowCount ?>_t002_kapaldetail_Payload" class="t002_kapaldetail_Payload">
<span<?php echo $t002_kapaldetail_delete->Payload->viewAttributes() ?>><?php echo $t002_kapaldetail_delete->Payload->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_kapaldetail_delete->DischRate->Visible) { // DischRate ?>
		<td <?php echo $t002_kapaldetail_delete->DischRate->cellAttributes() ?>>
<span id="el<?php echo $t002_kapaldetail_delete->RowCount ?>_t002_kapaldetail_DischRate" class="t002_kapaldetail_DischRate">
<span<?php echo $t002_kapaldetail_delete->DischRate->viewAttributes() ?>><?php echo $t002_kapaldetail_delete->DischRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_kapaldetail_delete->Tch->Visible) { // Tch ?>
		<td <?php echo $t002_kapaldetail_delete->Tch->cellAttributes() ?>>
<span id="el<?php echo $t002_kapaldetail_delete->RowCount ?>_t002_kapaldetail_Tch" class="t002_kapaldetail_Tch">
<span<?php echo $t002_kapaldetail_delete->Tch->viewAttributes() ?>><?php echo $t002_kapaldetail_delete->Tch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_kapaldetail_delete->VarCost->Visible) { // VarCost ?>
		<td <?php echo $t002_kapaldetail_delete->VarCost->cellAttributes() ?>>
<span id="el<?php echo $t002_kapaldetail_delete->RowCount ?>_t002_kapaldetail_VarCost" class="t002_kapaldetail_VarCost">
<span<?php echo $t002_kapaldetail_delete->VarCost->viewAttributes() ?>><?php echo $t002_kapaldetail_delete->VarCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_kapaldetail_delete->VsLaden->Visible) { // VsLaden ?>
		<td <?php echo $t002_kapaldetail_delete->VsLaden->cellAttributes() ?>>
<span id="el<?php echo $t002_kapaldetail_delete->RowCount ?>_t002_kapaldetail_VsLaden" class="t002_kapaldetail_VsLaden">
<span<?php echo $t002_kapaldetail_delete->VsLaden->viewAttributes() ?>><?php echo $t002_kapaldetail_delete->VsLaden->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_kapaldetail_delete->VsBallast->Visible) { // VsBallast ?>
		<td <?php echo $t002_kapaldetail_delete->VsBallast->cellAttributes() ?>>
<span id="el<?php echo $t002_kapaldetail_delete->RowCount ?>_t002_kapaldetail_VsBallast" class="t002_kapaldetail_VsBallast">
<span<?php echo $t002_kapaldetail_delete->VsBallast->viewAttributes() ?>><?php echo $t002_kapaldetail_delete->VsBallast->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_kapaldetail_delete->ComDay->Visible) { // ComDay ?>
		<td <?php echo $t002_kapaldetail_delete->ComDay->cellAttributes() ?>>
<span id="el<?php echo $t002_kapaldetail_delete->RowCount ?>_t002_kapaldetail_ComDay" class="t002_kapaldetail_ComDay">
<span<?php echo $t002_kapaldetail_delete->ComDay->viewAttributes() ?>><?php echo $t002_kapaldetail_delete->ComDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_kapaldetail_delete->Jumlah->Visible) { // Jumlah ?>
		<td <?php echo $t002_kapaldetail_delete->Jumlah->cellAttributes() ?>>
<span id="el<?php echo $t002_kapaldetail_delete->RowCount ?>_t002_kapaldetail_Jumlah" class="t002_kapaldetail_Jumlah">
<span<?php echo $t002_kapaldetail_delete->Jumlah->viewAttributes() ?>><?php echo $t002_kapaldetail_delete->Jumlah->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t002_kapaldetail_delete->Recordset->moveNext();
}
$t002_kapaldetail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_kapaldetail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t002_kapaldetail_delete->showPageFooter();
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
$t002_kapaldetail_delete->terminate();
?>