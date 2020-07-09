<?php
namespace PHPMaker2020\p_distribusi;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t002_kapaldetail_grid))
	$t002_kapaldetail_grid = new t002_kapaldetail_grid();

// Run the page
$t002_kapaldetail_grid->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_kapaldetail_grid->Page_Render();
?>
<?php if (!$t002_kapaldetail_grid->isExport()) { ?>
<script>
var ft002_kapaldetailgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	ft002_kapaldetailgrid = new ew.Form("ft002_kapaldetailgrid", "grid");
	ft002_kapaldetailgrid.formKeyCountName = '<?php echo $t002_kapaldetail_grid->FormKeyCountName ?>';

	// Validate form
	ft002_kapaldetailgrid.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($t002_kapaldetail_grid->Payload->Required) { ?>
				elm = this.getElements("x" + infix + "_Payload");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_grid->Payload->caption(), $t002_kapaldetail_grid->Payload->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Payload");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_grid->Payload->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_grid->DischRate->Required) { ?>
				elm = this.getElements("x" + infix + "_DischRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_grid->DischRate->caption(), $t002_kapaldetail_grid->DischRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DischRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_grid->DischRate->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_grid->Tch->Required) { ?>
				elm = this.getElements("x" + infix + "_Tch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_grid->Tch->caption(), $t002_kapaldetail_grid->Tch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tch");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_grid->Tch->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_grid->VarCost->Required) { ?>
				elm = this.getElements("x" + infix + "_VarCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_grid->VarCost->caption(), $t002_kapaldetail_grid->VarCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VarCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_grid->VarCost->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_grid->VsLaden->Required) { ?>
				elm = this.getElements("x" + infix + "_VsLaden");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_grid->VsLaden->caption(), $t002_kapaldetail_grid->VsLaden->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VsLaden");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_grid->VsLaden->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_grid->VsBallast->Required) { ?>
				elm = this.getElements("x" + infix + "_VsBallast");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_grid->VsBallast->caption(), $t002_kapaldetail_grid->VsBallast->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VsBallast");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_grid->VsBallast->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_grid->ComDay->Required) { ?>
				elm = this.getElements("x" + infix + "_ComDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_grid->ComDay->caption(), $t002_kapaldetail_grid->ComDay->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComDay");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_grid->ComDay->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_grid->Jumlah->Required) { ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_grid->Jumlah->caption(), $t002_kapaldetail_grid->Jumlah->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_grid->Jumlah->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	ft002_kapaldetailgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Payload", false)) return false;
		if (ew.valueChanged(fobj, infix, "DischRate", false)) return false;
		if (ew.valueChanged(fobj, infix, "Tch", false)) return false;
		if (ew.valueChanged(fobj, infix, "VarCost", false)) return false;
		if (ew.valueChanged(fobj, infix, "VsLaden", false)) return false;
		if (ew.valueChanged(fobj, infix, "VsBallast", false)) return false;
		if (ew.valueChanged(fobj, infix, "ComDay", false)) return false;
		if (ew.valueChanged(fobj, infix, "Jumlah", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft002_kapaldetailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_kapaldetailgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_kapaldetailgrid");
});
</script>
<?php } ?>
<?php
$t002_kapaldetail_grid->renderOtherOptions();
?>
<?php if ($t002_kapaldetail_grid->TotalRecords > 0 || $t002_kapaldetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_kapaldetail_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_kapaldetail">
<div id="ft002_kapaldetailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t002_kapaldetail" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_t002_kapaldetailgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_kapaldetail->RowType = ROWTYPE_HEADER;

// Render list options
$t002_kapaldetail_grid->renderListOptions();

// Render list options (header, left)
$t002_kapaldetail_grid->ListOptions->render("header", "left");
?>
<?php if ($t002_kapaldetail_grid->Payload->Visible) { // Payload ?>
	<?php if ($t002_kapaldetail_grid->SortUrl($t002_kapaldetail_grid->Payload) == "") { ?>
		<th data-name="Payload" class="<?php echo $t002_kapaldetail_grid->Payload->headerCellClass() ?>"><div id="elh_t002_kapaldetail_Payload" class="t002_kapaldetail_Payload"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->Payload->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Payload" class="<?php echo $t002_kapaldetail_grid->Payload->headerCellClass() ?>"><div><div id="elh_t002_kapaldetail_Payload" class="t002_kapaldetail_Payload">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->Payload->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_grid->Payload->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_grid->Payload->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_grid->DischRate->Visible) { // DischRate ?>
	<?php if ($t002_kapaldetail_grid->SortUrl($t002_kapaldetail_grid->DischRate) == "") { ?>
		<th data-name="DischRate" class="<?php echo $t002_kapaldetail_grid->DischRate->headerCellClass() ?>"><div id="elh_t002_kapaldetail_DischRate" class="t002_kapaldetail_DischRate"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->DischRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DischRate" class="<?php echo $t002_kapaldetail_grid->DischRate->headerCellClass() ?>"><div><div id="elh_t002_kapaldetail_DischRate" class="t002_kapaldetail_DischRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->DischRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_grid->DischRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_grid->DischRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_grid->Tch->Visible) { // Tch ?>
	<?php if ($t002_kapaldetail_grid->SortUrl($t002_kapaldetail_grid->Tch) == "") { ?>
		<th data-name="Tch" class="<?php echo $t002_kapaldetail_grid->Tch->headerCellClass() ?>"><div id="elh_t002_kapaldetail_Tch" class="t002_kapaldetail_Tch"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->Tch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tch" class="<?php echo $t002_kapaldetail_grid->Tch->headerCellClass() ?>"><div><div id="elh_t002_kapaldetail_Tch" class="t002_kapaldetail_Tch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->Tch->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_grid->Tch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_grid->Tch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_grid->VarCost->Visible) { // VarCost ?>
	<?php if ($t002_kapaldetail_grid->SortUrl($t002_kapaldetail_grid->VarCost) == "") { ?>
		<th data-name="VarCost" class="<?php echo $t002_kapaldetail_grid->VarCost->headerCellClass() ?>"><div id="elh_t002_kapaldetail_VarCost" class="t002_kapaldetail_VarCost"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->VarCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VarCost" class="<?php echo $t002_kapaldetail_grid->VarCost->headerCellClass() ?>"><div><div id="elh_t002_kapaldetail_VarCost" class="t002_kapaldetail_VarCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->VarCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_grid->VarCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_grid->VarCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_grid->VsLaden->Visible) { // VsLaden ?>
	<?php if ($t002_kapaldetail_grid->SortUrl($t002_kapaldetail_grid->VsLaden) == "") { ?>
		<th data-name="VsLaden" class="<?php echo $t002_kapaldetail_grid->VsLaden->headerCellClass() ?>"><div id="elh_t002_kapaldetail_VsLaden" class="t002_kapaldetail_VsLaden"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->VsLaden->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VsLaden" class="<?php echo $t002_kapaldetail_grid->VsLaden->headerCellClass() ?>"><div><div id="elh_t002_kapaldetail_VsLaden" class="t002_kapaldetail_VsLaden">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->VsLaden->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_grid->VsLaden->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_grid->VsLaden->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_grid->VsBallast->Visible) { // VsBallast ?>
	<?php if ($t002_kapaldetail_grid->SortUrl($t002_kapaldetail_grid->VsBallast) == "") { ?>
		<th data-name="VsBallast" class="<?php echo $t002_kapaldetail_grid->VsBallast->headerCellClass() ?>"><div id="elh_t002_kapaldetail_VsBallast" class="t002_kapaldetail_VsBallast"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->VsBallast->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VsBallast" class="<?php echo $t002_kapaldetail_grid->VsBallast->headerCellClass() ?>"><div><div id="elh_t002_kapaldetail_VsBallast" class="t002_kapaldetail_VsBallast">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->VsBallast->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_grid->VsBallast->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_grid->VsBallast->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_grid->ComDay->Visible) { // ComDay ?>
	<?php if ($t002_kapaldetail_grid->SortUrl($t002_kapaldetail_grid->ComDay) == "") { ?>
		<th data-name="ComDay" class="<?php echo $t002_kapaldetail_grid->ComDay->headerCellClass() ?>"><div id="elh_t002_kapaldetail_ComDay" class="t002_kapaldetail_ComDay"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->ComDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComDay" class="<?php echo $t002_kapaldetail_grid->ComDay->headerCellClass() ?>"><div><div id="elh_t002_kapaldetail_ComDay" class="t002_kapaldetail_ComDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->ComDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_grid->ComDay->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_grid->ComDay->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_grid->Jumlah->Visible) { // Jumlah ?>
	<?php if ($t002_kapaldetail_grid->SortUrl($t002_kapaldetail_grid->Jumlah) == "") { ?>
		<th data-name="Jumlah" class="<?php echo $t002_kapaldetail_grid->Jumlah->headerCellClass() ?>"><div id="elh_t002_kapaldetail_Jumlah" class="t002_kapaldetail_Jumlah"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->Jumlah->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jumlah" class="<?php echo $t002_kapaldetail_grid->Jumlah->headerCellClass() ?>"><div><div id="elh_t002_kapaldetail_Jumlah" class="t002_kapaldetail_Jumlah">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_grid->Jumlah->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_grid->Jumlah->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_grid->Jumlah->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_kapaldetail_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t002_kapaldetail_grid->StartRecord = 1;
$t002_kapaldetail_grid->StopRecord = $t002_kapaldetail_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($t002_kapaldetail->isConfirm() || $t002_kapaldetail_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t002_kapaldetail_grid->FormKeyCountName) && ($t002_kapaldetail_grid->isGridAdd() || $t002_kapaldetail_grid->isGridEdit() || $t002_kapaldetail->isConfirm())) {
		$t002_kapaldetail_grid->KeyCount = $CurrentForm->getValue($t002_kapaldetail_grid->FormKeyCountName);
		$t002_kapaldetail_grid->StopRecord = $t002_kapaldetail_grid->StartRecord + $t002_kapaldetail_grid->KeyCount - 1;
	}
}
$t002_kapaldetail_grid->RecordCount = $t002_kapaldetail_grid->StartRecord - 1;
if ($t002_kapaldetail_grid->Recordset && !$t002_kapaldetail_grid->Recordset->EOF) {
	$t002_kapaldetail_grid->Recordset->moveFirst();
	$selectLimit = $t002_kapaldetail_grid->UseSelectLimit;
	if (!$selectLimit && $t002_kapaldetail_grid->StartRecord > 1)
		$t002_kapaldetail_grid->Recordset->move($t002_kapaldetail_grid->StartRecord - 1);
} elseif (!$t002_kapaldetail->AllowAddDeleteRow && $t002_kapaldetail_grid->StopRecord == 0) {
	$t002_kapaldetail_grid->StopRecord = $t002_kapaldetail->GridAddRowCount;
}

// Initialize aggregate
$t002_kapaldetail->RowType = ROWTYPE_AGGREGATEINIT;
$t002_kapaldetail->resetAttributes();
$t002_kapaldetail_grid->renderRow();
if ($t002_kapaldetail_grid->isGridAdd())
	$t002_kapaldetail_grid->RowIndex = 0;
if ($t002_kapaldetail_grid->isGridEdit())
	$t002_kapaldetail_grid->RowIndex = 0;
while ($t002_kapaldetail_grid->RecordCount < $t002_kapaldetail_grid->StopRecord) {
	$t002_kapaldetail_grid->RecordCount++;
	if ($t002_kapaldetail_grid->RecordCount >= $t002_kapaldetail_grid->StartRecord) {
		$t002_kapaldetail_grid->RowCount++;
		if ($t002_kapaldetail_grid->isGridAdd() || $t002_kapaldetail_grid->isGridEdit() || $t002_kapaldetail->isConfirm()) {
			$t002_kapaldetail_grid->RowIndex++;
			$CurrentForm->Index = $t002_kapaldetail_grid->RowIndex;
			if ($CurrentForm->hasValue($t002_kapaldetail_grid->FormActionName) && ($t002_kapaldetail->isConfirm() || $t002_kapaldetail_grid->EventCancelled))
				$t002_kapaldetail_grid->RowAction = strval($CurrentForm->getValue($t002_kapaldetail_grid->FormActionName));
			elseif ($t002_kapaldetail_grid->isGridAdd())
				$t002_kapaldetail_grid->RowAction = "insert";
			else
				$t002_kapaldetail_grid->RowAction = "";
		}

		// Set up key count
		$t002_kapaldetail_grid->KeyCount = $t002_kapaldetail_grid->RowIndex;

		// Init row class and style
		$t002_kapaldetail->resetAttributes();
		$t002_kapaldetail->CssClass = "";
		if ($t002_kapaldetail_grid->isGridAdd()) {
			if ($t002_kapaldetail->CurrentMode == "copy") {
				$t002_kapaldetail_grid->loadRowValues($t002_kapaldetail_grid->Recordset); // Load row values
				$t002_kapaldetail_grid->setRecordKey($t002_kapaldetail_grid->RowOldKey, $t002_kapaldetail_grid->Recordset); // Set old record key
			} else {
				$t002_kapaldetail_grid->loadRowValues(); // Load default values
				$t002_kapaldetail_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t002_kapaldetail_grid->loadRowValues($t002_kapaldetail_grid->Recordset); // Load row values
		}
		$t002_kapaldetail->RowType = ROWTYPE_VIEW; // Render view
		if ($t002_kapaldetail_grid->isGridAdd()) // Grid add
			$t002_kapaldetail->RowType = ROWTYPE_ADD; // Render add
		if ($t002_kapaldetail_grid->isGridAdd() && $t002_kapaldetail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t002_kapaldetail_grid->restoreCurrentRowFormValues($t002_kapaldetail_grid->RowIndex); // Restore form values
		if ($t002_kapaldetail_grid->isGridEdit()) { // Grid edit
			if ($t002_kapaldetail->EventCancelled)
				$t002_kapaldetail_grid->restoreCurrentRowFormValues($t002_kapaldetail_grid->RowIndex); // Restore form values
			if ($t002_kapaldetail_grid->RowAction == "insert")
				$t002_kapaldetail->RowType = ROWTYPE_ADD; // Render add
			else
				$t002_kapaldetail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t002_kapaldetail_grid->isGridEdit() && ($t002_kapaldetail->RowType == ROWTYPE_EDIT || $t002_kapaldetail->RowType == ROWTYPE_ADD) && $t002_kapaldetail->EventCancelled) // Update failed
			$t002_kapaldetail_grid->restoreCurrentRowFormValues($t002_kapaldetail_grid->RowIndex); // Restore form values
		if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) // Edit row
			$t002_kapaldetail_grid->EditRowCount++;
		if ($t002_kapaldetail->isConfirm()) // Confirm row
			$t002_kapaldetail_grid->restoreCurrentRowFormValues($t002_kapaldetail_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t002_kapaldetail->RowAttrs->merge(["data-rowindex" => $t002_kapaldetail_grid->RowCount, "id" => "r" . $t002_kapaldetail_grid->RowCount . "_t002_kapaldetail", "data-rowtype" => $t002_kapaldetail->RowType]);

		// Render row
		$t002_kapaldetail_grid->renderRow();

		// Render list options
		$t002_kapaldetail_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t002_kapaldetail_grid->RowAction != "delete" && $t002_kapaldetail_grid->RowAction != "insertdelete" && !($t002_kapaldetail_grid->RowAction == "insert" && $t002_kapaldetail->isConfirm() && $t002_kapaldetail_grid->emptyRow())) {
?>
	<tr <?php echo $t002_kapaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_kapaldetail_grid->ListOptions->render("body", "left", $t002_kapaldetail_grid->RowCount);
?>
	<?php if ($t002_kapaldetail_grid->Payload->Visible) { // Payload ?>
		<td data-name="Payload" <?php echo $t002_kapaldetail_grid->Payload->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_Payload" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Payload" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->Payload->EditValue ?>"<?php echo $t002_kapaldetail_grid->Payload->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Payload" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_Payload" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Payload" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->Payload->EditValue ?>"<?php echo $t002_kapaldetail_grid->Payload->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_Payload">
<span<?php echo $t002_kapaldetail_grid->Payload->viewAttributes() ?>><?php echo $t002_kapaldetail_grid->Payload->getViewValue() ?></span>
</span>
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Payload" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Payload" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Payload" name="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Payload" name="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_id" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_id" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_kapaldetail_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_id" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_id" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_kapaldetail_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT || $t002_kapaldetail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_id" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_id" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_kapaldetail_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t002_kapaldetail_grid->DischRate->Visible) { // DischRate ?>
		<td data-name="DischRate" <?php echo $t002_kapaldetail_grid->DischRate->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_DischRate" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_DischRate" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->DischRate->EditValue ?>"<?php echo $t002_kapaldetail_grid->DischRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_DischRate" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" value="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_DischRate" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_DischRate" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->DischRate->EditValue ?>"<?php echo $t002_kapaldetail_grid->DischRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_DischRate">
<span<?php echo $t002_kapaldetail_grid->DischRate->viewAttributes() ?>><?php echo $t002_kapaldetail_grid->DischRate->getViewValue() ?></span>
</span>
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_DischRate" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" value="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_DischRate" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" value="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_DischRate" name="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" value="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_DischRate" name="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" value="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->Tch->Visible) { // Tch ?>
		<td data-name="Tch" <?php echo $t002_kapaldetail_grid->Tch->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_Tch" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Tch" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->Tch->EditValue ?>"<?php echo $t002_kapaldetail_grid->Tch->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Tch" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_Tch" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Tch" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->Tch->EditValue ?>"<?php echo $t002_kapaldetail_grid->Tch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_Tch">
<span<?php echo $t002_kapaldetail_grid->Tch->viewAttributes() ?>><?php echo $t002_kapaldetail_grid->Tch->getViewValue() ?></span>
</span>
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Tch" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Tch" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Tch" name="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Tch" name="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->VarCost->Visible) { // VarCost ?>
		<td data-name="VarCost" <?php echo $t002_kapaldetail_grid->VarCost->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_VarCost" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VarCost" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->VarCost->EditValue ?>"<?php echo $t002_kapaldetail_grid->VarCost->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VarCost" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_VarCost" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VarCost" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->VarCost->EditValue ?>"<?php echo $t002_kapaldetail_grid->VarCost->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_VarCost">
<span<?php echo $t002_kapaldetail_grid->VarCost->viewAttributes() ?>><?php echo $t002_kapaldetail_grid->VarCost->getViewValue() ?></span>
</span>
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VarCost" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VarCost" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VarCost" name="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VarCost" name="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->VsLaden->Visible) { // VsLaden ?>
		<td data-name="VsLaden" <?php echo $t002_kapaldetail_grid->VsLaden->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_VsLaden" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->VsLaden->EditValue ?>"<?php echo $t002_kapaldetail_grid->VsLaden->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsLaden" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_VsLaden" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->VsLaden->EditValue ?>"<?php echo $t002_kapaldetail_grid->VsLaden->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_VsLaden">
<span<?php echo $t002_kapaldetail_grid->VsLaden->viewAttributes() ?>><?php echo $t002_kapaldetail_grid->VsLaden->getViewValue() ?></span>
</span>
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsLaden" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsLaden" name="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsLaden" name="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->VsBallast->Visible) { // VsBallast ?>
		<td data-name="VsBallast" <?php echo $t002_kapaldetail_grid->VsBallast->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_VsBallast" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->VsBallast->EditValue ?>"<?php echo $t002_kapaldetail_grid->VsBallast->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsBallast" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_VsBallast" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->VsBallast->EditValue ?>"<?php echo $t002_kapaldetail_grid->VsBallast->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_VsBallast">
<span<?php echo $t002_kapaldetail_grid->VsBallast->viewAttributes() ?>><?php echo $t002_kapaldetail_grid->VsBallast->getViewValue() ?></span>
</span>
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsBallast" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsBallast" name="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsBallast" name="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->ComDay->Visible) { // ComDay ?>
		<td data-name="ComDay" <?php echo $t002_kapaldetail_grid->ComDay->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_ComDay" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_ComDay" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->ComDay->EditValue ?>"<?php echo $t002_kapaldetail_grid->ComDay->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_ComDay" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" value="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_ComDay" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_ComDay" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->ComDay->EditValue ?>"<?php echo $t002_kapaldetail_grid->ComDay->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_ComDay">
<span<?php echo $t002_kapaldetail_grid->ComDay->viewAttributes() ?>><?php echo $t002_kapaldetail_grid->ComDay->getViewValue() ?></span>
</span>
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_ComDay" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" value="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_ComDay" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" value="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_ComDay" name="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" value="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_ComDay" name="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" value="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah" <?php echo $t002_kapaldetail_grid->Jumlah->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_Jumlah" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" size="10" maxlength="4" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->Jumlah->EditValue ?>"<?php echo $t002_kapaldetail_grid->Jumlah->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Jumlah" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_Jumlah" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" size="10" maxlength="4" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->Jumlah->EditValue ?>"<?php echo $t002_kapaldetail_grid->Jumlah->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_grid->RowCount ?>_t002_kapaldetail_Jumlah">
<span<?php echo $t002_kapaldetail_grid->Jumlah->viewAttributes() ?>><?php echo $t002_kapaldetail_grid->Jumlah->getViewValue() ?></span>
</span>
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Jumlah" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Jumlah" name="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="ft002_kapaldetailgrid$x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->FormValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Jumlah" name="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="ft002_kapaldetailgrid$o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_kapaldetail_grid->ListOptions->render("body", "right", $t002_kapaldetail_grid->RowCount);
?>
	</tr>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD || $t002_kapaldetail->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft002_kapaldetailgrid", "load"], function() {
	ft002_kapaldetailgrid.updateLists(<?php echo $t002_kapaldetail_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t002_kapaldetail_grid->isGridAdd() || $t002_kapaldetail->CurrentMode == "copy")
		if (!$t002_kapaldetail_grid->Recordset->EOF)
			$t002_kapaldetail_grid->Recordset->moveNext();
}
?>
<?php
	if ($t002_kapaldetail->CurrentMode == "add" || $t002_kapaldetail->CurrentMode == "copy" || $t002_kapaldetail->CurrentMode == "edit") {
		$t002_kapaldetail_grid->RowIndex = '$rowindex$';
		$t002_kapaldetail_grid->loadRowValues();

		// Set row properties
		$t002_kapaldetail->resetAttributes();
		$t002_kapaldetail->RowAttrs->merge(["data-rowindex" => $t002_kapaldetail_grid->RowIndex, "id" => "r0_t002_kapaldetail", "data-rowtype" => ROWTYPE_ADD]);
		$t002_kapaldetail->RowAttrs->appendClass("ew-template");
		$t002_kapaldetail->RowType = ROWTYPE_ADD;

		// Render row
		$t002_kapaldetail_grid->renderRow();

		// Render list options
		$t002_kapaldetail_grid->renderListOptions();
		$t002_kapaldetail_grid->StartRowCount = 0;
?>
	<tr <?php echo $t002_kapaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_kapaldetail_grid->ListOptions->render("body", "left", $t002_kapaldetail_grid->RowIndex);
?>
	<?php if ($t002_kapaldetail_grid->Payload->Visible) { // Payload ?>
		<td data-name="Payload">
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t002_kapaldetail_Payload" class="form-group t002_kapaldetail_Payload">
<input type="text" data-table="t002_kapaldetail" data-field="x_Payload" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->Payload->EditValue ?>"<?php echo $t002_kapaldetail_grid->Payload->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_kapaldetail_Payload" class="form-group t002_kapaldetail_Payload">
<span<?php echo $t002_kapaldetail_grid->Payload->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_kapaldetail_grid->Payload->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Payload" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Payload" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Payload" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Payload->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->DischRate->Visible) { // DischRate ?>
		<td data-name="DischRate">
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t002_kapaldetail_DischRate" class="form-group t002_kapaldetail_DischRate">
<input type="text" data-table="t002_kapaldetail" data-field="x_DischRate" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->DischRate->EditValue ?>"<?php echo $t002_kapaldetail_grid->DischRate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_kapaldetail_DischRate" class="form-group t002_kapaldetail_DischRate">
<span<?php echo $t002_kapaldetail_grid->DischRate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_kapaldetail_grid->DischRate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_DischRate" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" value="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_DischRate" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_DischRate" value="<?php echo HtmlEncode($t002_kapaldetail_grid->DischRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->Tch->Visible) { // Tch ?>
		<td data-name="Tch">
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t002_kapaldetail_Tch" class="form-group t002_kapaldetail_Tch">
<input type="text" data-table="t002_kapaldetail" data-field="x_Tch" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->Tch->EditValue ?>"<?php echo $t002_kapaldetail_grid->Tch->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_kapaldetail_Tch" class="form-group t002_kapaldetail_Tch">
<span<?php echo $t002_kapaldetail_grid->Tch->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_kapaldetail_grid->Tch->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Tch" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Tch" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Tch" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Tch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->VarCost->Visible) { // VarCost ?>
		<td data-name="VarCost">
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t002_kapaldetail_VarCost" class="form-group t002_kapaldetail_VarCost">
<input type="text" data-table="t002_kapaldetail" data-field="x_VarCost" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->VarCost->EditValue ?>"<?php echo $t002_kapaldetail_grid->VarCost->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_kapaldetail_VarCost" class="form-group t002_kapaldetail_VarCost">
<span<?php echo $t002_kapaldetail_grid->VarCost->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_kapaldetail_grid->VarCost->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VarCost" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VarCost" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VarCost" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VarCost->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->VsLaden->Visible) { // VsLaden ?>
		<td data-name="VsLaden">
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t002_kapaldetail_VsLaden" class="form-group t002_kapaldetail_VsLaden">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->VsLaden->EditValue ?>"<?php echo $t002_kapaldetail_grid->VsLaden->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_kapaldetail_VsLaden" class="form-group t002_kapaldetail_VsLaden">
<span<?php echo $t002_kapaldetail_grid->VsLaden->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_kapaldetail_grid->VsLaden->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsLaden" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsLaden" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsLaden->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->VsBallast->Visible) { // VsBallast ?>
		<td data-name="VsBallast">
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t002_kapaldetail_VsBallast" class="form-group t002_kapaldetail_VsBallast">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->VsBallast->EditValue ?>"<?php echo $t002_kapaldetail_grid->VsBallast->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_kapaldetail_VsBallast" class="form-group t002_kapaldetail_VsBallast">
<span<?php echo $t002_kapaldetail_grid->VsBallast->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_kapaldetail_grid->VsBallast->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsBallast" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_VsBallast" value="<?php echo HtmlEncode($t002_kapaldetail_grid->VsBallast->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->ComDay->Visible) { // ComDay ?>
		<td data-name="ComDay">
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t002_kapaldetail_ComDay" class="form-group t002_kapaldetail_ComDay">
<input type="text" data-table="t002_kapaldetail" data-field="x_ComDay" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->ComDay->EditValue ?>"<?php echo $t002_kapaldetail_grid->ComDay->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_kapaldetail_ComDay" class="form-group t002_kapaldetail_ComDay">
<span<?php echo $t002_kapaldetail_grid->ComDay->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_kapaldetail_grid->ComDay->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_ComDay" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" value="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_ComDay" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_ComDay" value="<?php echo HtmlEncode($t002_kapaldetail_grid->ComDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_grid->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah">
<?php if (!$t002_kapaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t002_kapaldetail_Jumlah" class="form-group t002_kapaldetail_Jumlah">
<input type="text" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" size="10" maxlength="4" placeholder="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_grid->Jumlah->EditValue ?>"<?php echo $t002_kapaldetail_grid->Jumlah->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_kapaldetail_Jumlah" class="form-group t002_kapaldetail_Jumlah">
<span<?php echo $t002_kapaldetail_grid->Jumlah->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_kapaldetail_grid->Jumlah->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Jumlah" name="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" id="o<?php echo $t002_kapaldetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t002_kapaldetail_grid->Jumlah->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_kapaldetail_grid->ListOptions->render("body", "right", $t002_kapaldetail_grid->RowIndex);
?>
<script>
loadjs.ready(["ft002_kapaldetailgrid", "load"], function() {
	ft002_kapaldetailgrid.updateLists(<?php echo $t002_kapaldetail_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t002_kapaldetail->CurrentMode == "add" || $t002_kapaldetail->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t002_kapaldetail_grid->FormKeyCountName ?>" id="<?php echo $t002_kapaldetail_grid->FormKeyCountName ?>" value="<?php echo $t002_kapaldetail_grid->KeyCount ?>">
<?php echo $t002_kapaldetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t002_kapaldetail->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t002_kapaldetail_grid->FormKeyCountName ?>" id="<?php echo $t002_kapaldetail_grid->FormKeyCountName ?>" value="<?php echo $t002_kapaldetail_grid->KeyCount ?>">
<?php echo $t002_kapaldetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t002_kapaldetail->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft002_kapaldetailgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_kapaldetail_grid->Recordset)
	$t002_kapaldetail_grid->Recordset->Close();
?>
<?php if ($t002_kapaldetail_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t002_kapaldetail_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_kapaldetail_grid->TotalRecords == 0 && !$t002_kapaldetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_kapaldetail_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$t002_kapaldetail_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$t002_kapaldetail_grid->terminate();
?>