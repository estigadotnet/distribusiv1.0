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
$t006_parameter_delete = new t006_parameter_delete();

// Run the page
$t006_parameter_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_parameter_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft006_parameterdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft006_parameterdelete = currentForm = new ew.Form("ft006_parameterdelete", "delete");
	loadjs.done("ft006_parameterdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t006_parameter_delete->showPageHeader(); ?>
<?php
$t006_parameter_delete->showMessage();
?>
<form name="ft006_parameterdelete" id="ft006_parameterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_parameter">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t006_parameter_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t006_parameter_delete->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t006_parameter_delete->Nama->headerCellClass() ?>"><span id="elh_t006_parameter_Nama" class="t006_parameter_Nama"><?php echo $t006_parameter_delete->Nama->caption() ?></span></th>
<?php } ?>
<?php if ($t006_parameter_delete->Nilai->Visible) { // Nilai ?>
		<th class="<?php echo $t006_parameter_delete->Nilai->headerCellClass() ?>"><span id="elh_t006_parameter_Nilai" class="t006_parameter_Nilai"><?php echo $t006_parameter_delete->Nilai->caption() ?></span></th>
<?php } ?>
<?php if ($t006_parameter_delete->Variabel->Visible) { // Variabel ?>
		<th class="<?php echo $t006_parameter_delete->Variabel->headerCellClass() ?>"><span id="elh_t006_parameter_Variabel" class="t006_parameter_Variabel"><?php echo $t006_parameter_delete->Variabel->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t006_parameter_delete->RecordCount = 0;
$i = 0;
while (!$t006_parameter_delete->Recordset->EOF) {
	$t006_parameter_delete->RecordCount++;
	$t006_parameter_delete->RowCount++;

	// Set row properties
	$t006_parameter->resetAttributes();
	$t006_parameter->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t006_parameter_delete->loadRowValues($t006_parameter_delete->Recordset);

	// Render row
	$t006_parameter_delete->renderRow();
?>
	<tr <?php echo $t006_parameter->rowAttributes() ?>>
<?php if ($t006_parameter_delete->Nama->Visible) { // Nama ?>
		<td <?php echo $t006_parameter_delete->Nama->cellAttributes() ?>>
<span id="el<?php echo $t006_parameter_delete->RowCount ?>_t006_parameter_Nama" class="t006_parameter_Nama">
<span<?php echo $t006_parameter_delete->Nama->viewAttributes() ?>><?php echo $t006_parameter_delete->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_parameter_delete->Nilai->Visible) { // Nilai ?>
		<td <?php echo $t006_parameter_delete->Nilai->cellAttributes() ?>>
<span id="el<?php echo $t006_parameter_delete->RowCount ?>_t006_parameter_Nilai" class="t006_parameter_Nilai">
<span<?php echo $t006_parameter_delete->Nilai->viewAttributes() ?>><?php echo $t006_parameter_delete->Nilai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_parameter_delete->Variabel->Visible) { // Variabel ?>
		<td <?php echo $t006_parameter_delete->Variabel->cellAttributes() ?>>
<span id="el<?php echo $t006_parameter_delete->RowCount ?>_t006_parameter_Variabel" class="t006_parameter_Variabel">
<span<?php echo $t006_parameter_delete->Variabel->viewAttributes() ?>><?php echo $t006_parameter_delete->Variabel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t006_parameter_delete->Recordset->moveNext();
}
$t006_parameter_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t006_parameter_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t006_parameter_delete->showPageFooter();
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
$t006_parameter_delete->terminate();
?>