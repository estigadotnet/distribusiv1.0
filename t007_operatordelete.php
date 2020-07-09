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
$t007_operator_delete = new t007_operator_delete();

// Run the page
$t007_operator_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_operator_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft007_operatordelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft007_operatordelete = currentForm = new ew.Form("ft007_operatordelete", "delete");
	loadjs.done("ft007_operatordelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t007_operator_delete->showPageHeader(); ?>
<?php
$t007_operator_delete->showMessage();
?>
<form name="ft007_operatordelete" id="ft007_operatordelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_operator">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t007_operator_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t007_operator_delete->Generasi->Visible) { // Generasi ?>
		<th class="<?php echo $t007_operator_delete->Generasi->headerCellClass() ?>"><span id="elh_t007_operator_Generasi" class="t007_operator_Generasi"><?php echo $t007_operator_delete->Generasi->caption() ?></span></th>
<?php } ?>
<?php if ($t007_operator_delete->Populasi->Visible) { // Populasi ?>
		<th class="<?php echo $t007_operator_delete->Populasi->headerCellClass() ?>"><span id="elh_t007_operator_Populasi" class="t007_operator_Populasi"><?php echo $t007_operator_delete->Populasi->caption() ?></span></th>
<?php } ?>
<?php if ($t007_operator_delete->Seleksi->Visible) { // Seleksi ?>
		<th class="<?php echo $t007_operator_delete->Seleksi->headerCellClass() ?>"><span id="elh_t007_operator_Seleksi" class="t007_operator_Seleksi"><?php echo $t007_operator_delete->Seleksi->caption() ?></span></th>
<?php } ?>
<?php if ($t007_operator_delete->CO->Visible) { // CO ?>
		<th class="<?php echo $t007_operator_delete->CO->headerCellClass() ?>"><span id="elh_t007_operator_CO" class="t007_operator_CO"><?php echo $t007_operator_delete->CO->caption() ?></span></th>
<?php } ?>
<?php if ($t007_operator_delete->Mutasi->Visible) { // Mutasi ?>
		<th class="<?php echo $t007_operator_delete->Mutasi->headerCellClass() ?>"><span id="elh_t007_operator_Mutasi" class="t007_operator_Mutasi"><?php echo $t007_operator_delete->Mutasi->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t007_operator_delete->RecordCount = 0;
$i = 0;
while (!$t007_operator_delete->Recordset->EOF) {
	$t007_operator_delete->RecordCount++;
	$t007_operator_delete->RowCount++;

	// Set row properties
	$t007_operator->resetAttributes();
	$t007_operator->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t007_operator_delete->loadRowValues($t007_operator_delete->Recordset);

	// Render row
	$t007_operator_delete->renderRow();
?>
	<tr <?php echo $t007_operator->rowAttributes() ?>>
<?php if ($t007_operator_delete->Generasi->Visible) { // Generasi ?>
		<td <?php echo $t007_operator_delete->Generasi->cellAttributes() ?>>
<span id="el<?php echo $t007_operator_delete->RowCount ?>_t007_operator_Generasi" class="t007_operator_Generasi">
<span<?php echo $t007_operator_delete->Generasi->viewAttributes() ?>><?php echo $t007_operator_delete->Generasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t007_operator_delete->Populasi->Visible) { // Populasi ?>
		<td <?php echo $t007_operator_delete->Populasi->cellAttributes() ?>>
<span id="el<?php echo $t007_operator_delete->RowCount ?>_t007_operator_Populasi" class="t007_operator_Populasi">
<span<?php echo $t007_operator_delete->Populasi->viewAttributes() ?>><?php echo $t007_operator_delete->Populasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t007_operator_delete->Seleksi->Visible) { // Seleksi ?>
		<td <?php echo $t007_operator_delete->Seleksi->cellAttributes() ?>>
<span id="el<?php echo $t007_operator_delete->RowCount ?>_t007_operator_Seleksi" class="t007_operator_Seleksi">
<span<?php echo $t007_operator_delete->Seleksi->viewAttributes() ?>><?php echo $t007_operator_delete->Seleksi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t007_operator_delete->CO->Visible) { // CO ?>
		<td <?php echo $t007_operator_delete->CO->cellAttributes() ?>>
<span id="el<?php echo $t007_operator_delete->RowCount ?>_t007_operator_CO" class="t007_operator_CO">
<span<?php echo $t007_operator_delete->CO->viewAttributes() ?>><?php echo $t007_operator_delete->CO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t007_operator_delete->Mutasi->Visible) { // Mutasi ?>
		<td <?php echo $t007_operator_delete->Mutasi->cellAttributes() ?>>
<span id="el<?php echo $t007_operator_delete->RowCount ?>_t007_operator_Mutasi" class="t007_operator_Mutasi">
<span<?php echo $t007_operator_delete->Mutasi->viewAttributes() ?>><?php echo $t007_operator_delete->Mutasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t007_operator_delete->Recordset->moveNext();
}
$t007_operator_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t007_operator_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t007_operator_delete->showPageFooter();
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
$t007_operator_delete->terminate();
?>