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
$t007_operator_list = new t007_operator_list();

// Run the page
$t007_operator_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_operator_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t007_operator_list->isExport()) { ?>
<script>
var ft007_operatorlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft007_operatorlist = currentForm = new ew.Form("ft007_operatorlist", "list");
	ft007_operatorlist.formKeyCountName = '<?php echo $t007_operator_list->FormKeyCountName ?>';

	// Validate form
	ft007_operatorlist.validate = function() {
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
			<?php if ($t007_operator_list->Generasi->Required) { ?>
				elm = this.getElements("x" + infix + "_Generasi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_list->Generasi->caption(), $t007_operator_list->Generasi->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Generasi");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_list->Generasi->errorMessage()) ?>");
			<?php if ($t007_operator_list->Populasi->Required) { ?>
				elm = this.getElements("x" + infix + "_Populasi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_list->Populasi->caption(), $t007_operator_list->Populasi->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Populasi");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_list->Populasi->errorMessage()) ?>");
			<?php if ($t007_operator_list->Seleksi->Required) { ?>
				elm = this.getElements("x" + infix + "_Seleksi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_list->Seleksi->caption(), $t007_operator_list->Seleksi->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Seleksi");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_list->Seleksi->errorMessage()) ?>");
			<?php if ($t007_operator_list->CO->Required) { ?>
				elm = this.getElements("x" + infix + "_CO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_list->CO->caption(), $t007_operator_list->CO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CO");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_list->CO->errorMessage()) ?>");
			<?php if ($t007_operator_list->Mutasi->Required) { ?>
				elm = this.getElements("x" + infix + "_Mutasi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_list->Mutasi->caption(), $t007_operator_list->Mutasi->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Mutasi");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_list->Mutasi->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft007_operatorlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft007_operatorlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft007_operatorlist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t007_operator_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t007_operator_list->TotalRecords > 0 && $t007_operator_list->ExportOptions->visible()) { ?>
<?php $t007_operator_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t007_operator_list->ImportOptions->visible()) { ?>
<?php $t007_operator_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t007_operator_list->renderOtherOptions();
?>
<?php $t007_operator_list->showPageHeader(); ?>
<?php
$t007_operator_list->showMessage();
?>
<?php if ($t007_operator_list->TotalRecords > 0 || $t007_operator->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t007_operator_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t007_operator">
<form name="ft007_operatorlist" id="ft007_operatorlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_operator">
<div id="gmp_t007_operator" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t007_operator_list->TotalRecords > 0 || $t007_operator_list->isGridEdit()) { ?>
<table id="tbl_t007_operatorlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t007_operator->RowType = ROWTYPE_HEADER;

// Render list options
$t007_operator_list->renderListOptions();

// Render list options (header, left)
$t007_operator_list->ListOptions->render("header", "left");
?>
<?php if ($t007_operator_list->Generasi->Visible) { // Generasi ?>
	<?php if ($t007_operator_list->SortUrl($t007_operator_list->Generasi) == "") { ?>
		<th data-name="Generasi" class="<?php echo $t007_operator_list->Generasi->headerCellClass() ?>"><div id="elh_t007_operator_Generasi" class="t007_operator_Generasi"><div class="ew-table-header-caption"><?php echo $t007_operator_list->Generasi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generasi" class="<?php echo $t007_operator_list->Generasi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_operator_list->SortUrl($t007_operator_list->Generasi) ?>', 1);"><div id="elh_t007_operator_Generasi" class="t007_operator_Generasi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_operator_list->Generasi->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_operator_list->Generasi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_operator_list->Generasi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t007_operator_list->Populasi->Visible) { // Populasi ?>
	<?php if ($t007_operator_list->SortUrl($t007_operator_list->Populasi) == "") { ?>
		<th data-name="Populasi" class="<?php echo $t007_operator_list->Populasi->headerCellClass() ?>"><div id="elh_t007_operator_Populasi" class="t007_operator_Populasi"><div class="ew-table-header-caption"><?php echo $t007_operator_list->Populasi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Populasi" class="<?php echo $t007_operator_list->Populasi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_operator_list->SortUrl($t007_operator_list->Populasi) ?>', 1);"><div id="elh_t007_operator_Populasi" class="t007_operator_Populasi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_operator_list->Populasi->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_operator_list->Populasi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_operator_list->Populasi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t007_operator_list->Seleksi->Visible) { // Seleksi ?>
	<?php if ($t007_operator_list->SortUrl($t007_operator_list->Seleksi) == "") { ?>
		<th data-name="Seleksi" class="<?php echo $t007_operator_list->Seleksi->headerCellClass() ?>"><div id="elh_t007_operator_Seleksi" class="t007_operator_Seleksi"><div class="ew-table-header-caption"><?php echo $t007_operator_list->Seleksi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Seleksi" class="<?php echo $t007_operator_list->Seleksi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_operator_list->SortUrl($t007_operator_list->Seleksi) ?>', 1);"><div id="elh_t007_operator_Seleksi" class="t007_operator_Seleksi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_operator_list->Seleksi->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_operator_list->Seleksi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_operator_list->Seleksi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t007_operator_list->CO->Visible) { // CO ?>
	<?php if ($t007_operator_list->SortUrl($t007_operator_list->CO) == "") { ?>
		<th data-name="CO" class="<?php echo $t007_operator_list->CO->headerCellClass() ?>"><div id="elh_t007_operator_CO" class="t007_operator_CO"><div class="ew-table-header-caption"><?php echo $t007_operator_list->CO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CO" class="<?php echo $t007_operator_list->CO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_operator_list->SortUrl($t007_operator_list->CO) ?>', 1);"><div id="elh_t007_operator_CO" class="t007_operator_CO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_operator_list->CO->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_operator_list->CO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_operator_list->CO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t007_operator_list->Mutasi->Visible) { // Mutasi ?>
	<?php if ($t007_operator_list->SortUrl($t007_operator_list->Mutasi) == "") { ?>
		<th data-name="Mutasi" class="<?php echo $t007_operator_list->Mutasi->headerCellClass() ?>"><div id="elh_t007_operator_Mutasi" class="t007_operator_Mutasi"><div class="ew-table-header-caption"><?php echo $t007_operator_list->Mutasi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mutasi" class="<?php echo $t007_operator_list->Mutasi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_operator_list->SortUrl($t007_operator_list->Mutasi) ?>', 1);"><div id="elh_t007_operator_Mutasi" class="t007_operator_Mutasi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_operator_list->Mutasi->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_operator_list->Mutasi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_operator_list->Mutasi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t007_operator_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t007_operator_list->ExportAll && $t007_operator_list->isExport()) {
	$t007_operator_list->StopRecord = $t007_operator_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t007_operator_list->TotalRecords > $t007_operator_list->StartRecord + $t007_operator_list->DisplayRecords - 1)
		$t007_operator_list->StopRecord = $t007_operator_list->StartRecord + $t007_operator_list->DisplayRecords - 1;
	else
		$t007_operator_list->StopRecord = $t007_operator_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t007_operator->isConfirm() || $t007_operator_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t007_operator_list->FormKeyCountName) && ($t007_operator_list->isGridAdd() || $t007_operator_list->isGridEdit() || $t007_operator->isConfirm())) {
		$t007_operator_list->KeyCount = $CurrentForm->getValue($t007_operator_list->FormKeyCountName);
		$t007_operator_list->StopRecord = $t007_operator_list->StartRecord + $t007_operator_list->KeyCount - 1;
	}
}
$t007_operator_list->RecordCount = $t007_operator_list->StartRecord - 1;
if ($t007_operator_list->Recordset && !$t007_operator_list->Recordset->EOF) {
	$t007_operator_list->Recordset->moveFirst();
	$selectLimit = $t007_operator_list->UseSelectLimit;
	if (!$selectLimit && $t007_operator_list->StartRecord > 1)
		$t007_operator_list->Recordset->move($t007_operator_list->StartRecord - 1);
} elseif (!$t007_operator->AllowAddDeleteRow && $t007_operator_list->StopRecord == 0) {
	$t007_operator_list->StopRecord = $t007_operator->GridAddRowCount;
}

// Initialize aggregate
$t007_operator->RowType = ROWTYPE_AGGREGATEINIT;
$t007_operator->resetAttributes();
$t007_operator_list->renderRow();
if ($t007_operator_list->isGridEdit())
	$t007_operator_list->RowIndex = 0;
while ($t007_operator_list->RecordCount < $t007_operator_list->StopRecord) {
	$t007_operator_list->RecordCount++;
	if ($t007_operator_list->RecordCount >= $t007_operator_list->StartRecord) {
		$t007_operator_list->RowCount++;
		if ($t007_operator_list->isGridAdd() || $t007_operator_list->isGridEdit() || $t007_operator->isConfirm()) {
			$t007_operator_list->RowIndex++;
			$CurrentForm->Index = $t007_operator_list->RowIndex;
			if ($CurrentForm->hasValue($t007_operator_list->FormActionName) && ($t007_operator->isConfirm() || $t007_operator_list->EventCancelled))
				$t007_operator_list->RowAction = strval($CurrentForm->getValue($t007_operator_list->FormActionName));
			elseif ($t007_operator_list->isGridAdd())
				$t007_operator_list->RowAction = "insert";
			else
				$t007_operator_list->RowAction = "";
		}

		// Set up key count
		$t007_operator_list->KeyCount = $t007_operator_list->RowIndex;

		// Init row class and style
		$t007_operator->resetAttributes();
		$t007_operator->CssClass = "";
		if ($t007_operator_list->isGridAdd()) {
			$t007_operator_list->loadRowValues(); // Load default values
		} else {
			$t007_operator_list->loadRowValues($t007_operator_list->Recordset); // Load row values
		}
		$t007_operator->RowType = ROWTYPE_VIEW; // Render view
		if ($t007_operator_list->isGridEdit()) { // Grid edit
			if ($t007_operator->EventCancelled)
				$t007_operator_list->restoreCurrentRowFormValues($t007_operator_list->RowIndex); // Restore form values
			if ($t007_operator_list->RowAction == "insert")
				$t007_operator->RowType = ROWTYPE_ADD; // Render add
			else
				$t007_operator->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t007_operator_list->isGridEdit() && ($t007_operator->RowType == ROWTYPE_EDIT || $t007_operator->RowType == ROWTYPE_ADD) && $t007_operator->EventCancelled) // Update failed
			$t007_operator_list->restoreCurrentRowFormValues($t007_operator_list->RowIndex); // Restore form values
		if ($t007_operator->RowType == ROWTYPE_EDIT) // Edit row
			$t007_operator_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t007_operator->RowAttrs->merge(["data-rowindex" => $t007_operator_list->RowCount, "id" => "r" . $t007_operator_list->RowCount . "_t007_operator", "data-rowtype" => $t007_operator->RowType]);

		// Render row
		$t007_operator_list->renderRow();

		// Render list options
		$t007_operator_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t007_operator_list->RowAction != "delete" && $t007_operator_list->RowAction != "insertdelete" && !($t007_operator_list->RowAction == "insert" && $t007_operator->isConfirm() && $t007_operator_list->emptyRow())) {
?>
	<tr <?php echo $t007_operator->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t007_operator_list->ListOptions->render("body", "left", $t007_operator_list->RowCount);
?>
	<?php if ($t007_operator_list->Generasi->Visible) { // Generasi ?>
		<td data-name="Generasi" <?php echo $t007_operator_list->Generasi->cellAttributes() ?>>
<?php if ($t007_operator->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Generasi" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_Generasi" name="x<?php echo $t007_operator_list->RowIndex ?>_Generasi" id="x<?php echo $t007_operator_list->RowIndex ?>_Generasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Generasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Generasi->EditValue ?>"<?php echo $t007_operator_list->Generasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_Generasi" name="o<?php echo $t007_operator_list->RowIndex ?>_Generasi" id="o<?php echo $t007_operator_list->RowIndex ?>_Generasi" value="<?php echo HtmlEncode($t007_operator_list->Generasi->OldValue) ?>">
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Generasi" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_Generasi" name="x<?php echo $t007_operator_list->RowIndex ?>_Generasi" id="x<?php echo $t007_operator_list->RowIndex ?>_Generasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Generasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Generasi->EditValue ?>"<?php echo $t007_operator_list->Generasi->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Generasi">
<span<?php echo $t007_operator_list->Generasi->viewAttributes() ?>><?php echo $t007_operator_list->Generasi->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t007_operator" data-field="x_id" name="x<?php echo $t007_operator_list->RowIndex ?>_id" id="x<?php echo $t007_operator_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t007_operator_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t007_operator" data-field="x_id" name="o<?php echo $t007_operator_list->RowIndex ?>_id" id="o<?php echo $t007_operator_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t007_operator_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_EDIT || $t007_operator->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t007_operator" data-field="x_id" name="x<?php echo $t007_operator_list->RowIndex ?>_id" id="x<?php echo $t007_operator_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t007_operator_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t007_operator_list->Populasi->Visible) { // Populasi ?>
		<td data-name="Populasi" <?php echo $t007_operator_list->Populasi->cellAttributes() ?>>
<?php if ($t007_operator->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Populasi" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_Populasi" name="x<?php echo $t007_operator_list->RowIndex ?>_Populasi" id="x<?php echo $t007_operator_list->RowIndex ?>_Populasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Populasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Populasi->EditValue ?>"<?php echo $t007_operator_list->Populasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_Populasi" name="o<?php echo $t007_operator_list->RowIndex ?>_Populasi" id="o<?php echo $t007_operator_list->RowIndex ?>_Populasi" value="<?php echo HtmlEncode($t007_operator_list->Populasi->OldValue) ?>">
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Populasi" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_Populasi" name="x<?php echo $t007_operator_list->RowIndex ?>_Populasi" id="x<?php echo $t007_operator_list->RowIndex ?>_Populasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Populasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Populasi->EditValue ?>"<?php echo $t007_operator_list->Populasi->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Populasi">
<span<?php echo $t007_operator_list->Populasi->viewAttributes() ?>><?php echo $t007_operator_list->Populasi->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t007_operator_list->Seleksi->Visible) { // Seleksi ?>
		<td data-name="Seleksi" <?php echo $t007_operator_list->Seleksi->cellAttributes() ?>>
<?php if ($t007_operator->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Seleksi" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_Seleksi" name="x<?php echo $t007_operator_list->RowIndex ?>_Seleksi" id="x<?php echo $t007_operator_list->RowIndex ?>_Seleksi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Seleksi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Seleksi->EditValue ?>"<?php echo $t007_operator_list->Seleksi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_Seleksi" name="o<?php echo $t007_operator_list->RowIndex ?>_Seleksi" id="o<?php echo $t007_operator_list->RowIndex ?>_Seleksi" value="<?php echo HtmlEncode($t007_operator_list->Seleksi->OldValue) ?>">
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Seleksi" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_Seleksi" name="x<?php echo $t007_operator_list->RowIndex ?>_Seleksi" id="x<?php echo $t007_operator_list->RowIndex ?>_Seleksi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Seleksi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Seleksi->EditValue ?>"<?php echo $t007_operator_list->Seleksi->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Seleksi">
<span<?php echo $t007_operator_list->Seleksi->viewAttributes() ?>><?php echo $t007_operator_list->Seleksi->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t007_operator_list->CO->Visible) { // CO ?>
		<td data-name="CO" <?php echo $t007_operator_list->CO->cellAttributes() ?>>
<?php if ($t007_operator->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_CO" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_CO" name="x<?php echo $t007_operator_list->RowIndex ?>_CO" id="x<?php echo $t007_operator_list->RowIndex ?>_CO" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->CO->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->CO->EditValue ?>"<?php echo $t007_operator_list->CO->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_CO" name="o<?php echo $t007_operator_list->RowIndex ?>_CO" id="o<?php echo $t007_operator_list->RowIndex ?>_CO" value="<?php echo HtmlEncode($t007_operator_list->CO->OldValue) ?>">
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_CO" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_CO" name="x<?php echo $t007_operator_list->RowIndex ?>_CO" id="x<?php echo $t007_operator_list->RowIndex ?>_CO" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->CO->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->CO->EditValue ?>"<?php echo $t007_operator_list->CO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_CO">
<span<?php echo $t007_operator_list->CO->viewAttributes() ?>><?php echo $t007_operator_list->CO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t007_operator_list->Mutasi->Visible) { // Mutasi ?>
		<td data-name="Mutasi" <?php echo $t007_operator_list->Mutasi->cellAttributes() ?>>
<?php if ($t007_operator->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Mutasi" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_Mutasi" name="x<?php echo $t007_operator_list->RowIndex ?>_Mutasi" id="x<?php echo $t007_operator_list->RowIndex ?>_Mutasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Mutasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Mutasi->EditValue ?>"<?php echo $t007_operator_list->Mutasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_Mutasi" name="o<?php echo $t007_operator_list->RowIndex ?>_Mutasi" id="o<?php echo $t007_operator_list->RowIndex ?>_Mutasi" value="<?php echo HtmlEncode($t007_operator_list->Mutasi->OldValue) ?>">
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Mutasi" class="form-group">
<input type="text" data-table="t007_operator" data-field="x_Mutasi" name="x<?php echo $t007_operator_list->RowIndex ?>_Mutasi" id="x<?php echo $t007_operator_list->RowIndex ?>_Mutasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Mutasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Mutasi->EditValue ?>"<?php echo $t007_operator_list->Mutasi->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t007_operator->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_operator_list->RowCount ?>_t007_operator_Mutasi">
<span<?php echo $t007_operator_list->Mutasi->viewAttributes() ?>><?php echo $t007_operator_list->Mutasi->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t007_operator_list->ListOptions->render("body", "right", $t007_operator_list->RowCount);
?>
	</tr>
<?php if ($t007_operator->RowType == ROWTYPE_ADD || $t007_operator->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft007_operatorlist", "load"], function() {
	ft007_operatorlist.updateLists(<?php echo $t007_operator_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t007_operator_list->isGridAdd())
		if (!$t007_operator_list->Recordset->EOF)
			$t007_operator_list->Recordset->moveNext();
}
?>
<?php
	if ($t007_operator_list->isGridAdd() || $t007_operator_list->isGridEdit()) {
		$t007_operator_list->RowIndex = '$rowindex$';
		$t007_operator_list->loadRowValues();

		// Set row properties
		$t007_operator->resetAttributes();
		$t007_operator->RowAttrs->merge(["data-rowindex" => $t007_operator_list->RowIndex, "id" => "r0_t007_operator", "data-rowtype" => ROWTYPE_ADD]);
		$t007_operator->RowAttrs->appendClass("ew-template");
		$t007_operator->RowType = ROWTYPE_ADD;

		// Render row
		$t007_operator_list->renderRow();

		// Render list options
		$t007_operator_list->renderListOptions();
		$t007_operator_list->StartRowCount = 0;
?>
	<tr <?php echo $t007_operator->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t007_operator_list->ListOptions->render("body", "left", $t007_operator_list->RowIndex);
?>
	<?php if ($t007_operator_list->Generasi->Visible) { // Generasi ?>
		<td data-name="Generasi">
<span id="el$rowindex$_t007_operator_Generasi" class="form-group t007_operator_Generasi">
<input type="text" data-table="t007_operator" data-field="x_Generasi" name="x<?php echo $t007_operator_list->RowIndex ?>_Generasi" id="x<?php echo $t007_operator_list->RowIndex ?>_Generasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Generasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Generasi->EditValue ?>"<?php echo $t007_operator_list->Generasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_Generasi" name="o<?php echo $t007_operator_list->RowIndex ?>_Generasi" id="o<?php echo $t007_operator_list->RowIndex ?>_Generasi" value="<?php echo HtmlEncode($t007_operator_list->Generasi->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_operator_list->Populasi->Visible) { // Populasi ?>
		<td data-name="Populasi">
<span id="el$rowindex$_t007_operator_Populasi" class="form-group t007_operator_Populasi">
<input type="text" data-table="t007_operator" data-field="x_Populasi" name="x<?php echo $t007_operator_list->RowIndex ?>_Populasi" id="x<?php echo $t007_operator_list->RowIndex ?>_Populasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Populasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Populasi->EditValue ?>"<?php echo $t007_operator_list->Populasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_Populasi" name="o<?php echo $t007_operator_list->RowIndex ?>_Populasi" id="o<?php echo $t007_operator_list->RowIndex ?>_Populasi" value="<?php echo HtmlEncode($t007_operator_list->Populasi->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_operator_list->Seleksi->Visible) { // Seleksi ?>
		<td data-name="Seleksi">
<span id="el$rowindex$_t007_operator_Seleksi" class="form-group t007_operator_Seleksi">
<input type="text" data-table="t007_operator" data-field="x_Seleksi" name="x<?php echo $t007_operator_list->RowIndex ?>_Seleksi" id="x<?php echo $t007_operator_list->RowIndex ?>_Seleksi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Seleksi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Seleksi->EditValue ?>"<?php echo $t007_operator_list->Seleksi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_Seleksi" name="o<?php echo $t007_operator_list->RowIndex ?>_Seleksi" id="o<?php echo $t007_operator_list->RowIndex ?>_Seleksi" value="<?php echo HtmlEncode($t007_operator_list->Seleksi->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_operator_list->CO->Visible) { // CO ?>
		<td data-name="CO">
<span id="el$rowindex$_t007_operator_CO" class="form-group t007_operator_CO">
<input type="text" data-table="t007_operator" data-field="x_CO" name="x<?php echo $t007_operator_list->RowIndex ?>_CO" id="x<?php echo $t007_operator_list->RowIndex ?>_CO" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->CO->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->CO->EditValue ?>"<?php echo $t007_operator_list->CO->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_CO" name="o<?php echo $t007_operator_list->RowIndex ?>_CO" id="o<?php echo $t007_operator_list->RowIndex ?>_CO" value="<?php echo HtmlEncode($t007_operator_list->CO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_operator_list->Mutasi->Visible) { // Mutasi ?>
		<td data-name="Mutasi">
<span id="el$rowindex$_t007_operator_Mutasi" class="form-group t007_operator_Mutasi">
<input type="text" data-table="t007_operator" data-field="x_Mutasi" name="x<?php echo $t007_operator_list->RowIndex ?>_Mutasi" id="x<?php echo $t007_operator_list->RowIndex ?>_Mutasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_list->Mutasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_list->Mutasi->EditValue ?>"<?php echo $t007_operator_list->Mutasi->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_operator" data-field="x_Mutasi" name="o<?php echo $t007_operator_list->RowIndex ?>_Mutasi" id="o<?php echo $t007_operator_list->RowIndex ?>_Mutasi" value="<?php echo HtmlEncode($t007_operator_list->Mutasi->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t007_operator_list->ListOptions->render("body", "right", $t007_operator_list->RowIndex);
?>
<script>
loadjs.ready(["ft007_operatorlist", "load"], function() {
	ft007_operatorlist.updateLists(<?php echo $t007_operator_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t007_operator_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t007_operator_list->FormKeyCountName ?>" id="<?php echo $t007_operator_list->FormKeyCountName ?>" value="<?php echo $t007_operator_list->KeyCount ?>">
<?php echo $t007_operator_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t007_operator->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t007_operator_list->Recordset)
	$t007_operator_list->Recordset->Close();
?>
<?php if (!$t007_operator_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t007_operator_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t007_operator_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t007_operator_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t007_operator_list->TotalRecords == 0 && !$t007_operator->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t007_operator_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t007_operator_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t007_operator_list->isExport()) { ?>
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
$t007_operator_list->terminate();
?>