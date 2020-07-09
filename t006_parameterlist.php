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
$t006_parameter_list = new t006_parameter_list();

// Run the page
$t006_parameter_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_parameter_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t006_parameter_list->isExport()) { ?>
<script>
var ft006_parameterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft006_parameterlist = currentForm = new ew.Form("ft006_parameterlist", "list");
	ft006_parameterlist.formKeyCountName = '<?php echo $t006_parameter_list->FormKeyCountName ?>';

	// Validate form
	ft006_parameterlist.validate = function() {
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
			<?php if ($t006_parameter_list->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_parameter_list->Nama->caption(), $t006_parameter_list->Nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t006_parameter_list->Nilai->Required) { ?>
				elm = this.getElements("x" + infix + "_Nilai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_parameter_list->Nilai->caption(), $t006_parameter_list->Nilai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t006_parameter_list->Variabel->Required) { ?>
				elm = this.getElements("x" + infix + "_Variabel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_parameter_list->Variabel->caption(), $t006_parameter_list->Variabel->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		if (gridinsert && addcnt == 0) { // No row added
			ew.alert(ew.language.phrase("NoAddRecord"));
			return false;
		}
		return true;
	}

	// Check empty row
	ft006_parameterlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Nama", false)) return false;
		if (ew.valueChanged(fobj, infix, "Nilai", false)) return false;
		if (ew.valueChanged(fobj, infix, "Variabel", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft006_parameterlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft006_parameterlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft006_parameterlist");
});
var ft006_parameterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft006_parameterlistsrch = currentSearchForm = new ew.Form("ft006_parameterlistsrch");

	// Dynamic selection lists
	// Filters

	ft006_parameterlistsrch.filterList = <?php echo $t006_parameter_list->getFilterList() ?>;
	loadjs.done("ft006_parameterlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t006_parameter_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t006_parameter_list->TotalRecords > 0 && $t006_parameter_list->ExportOptions->visible()) { ?>
<?php $t006_parameter_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t006_parameter_list->ImportOptions->visible()) { ?>
<?php $t006_parameter_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t006_parameter_list->SearchOptions->visible()) { ?>
<?php $t006_parameter_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t006_parameter_list->FilterOptions->visible()) { ?>
<?php $t006_parameter_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t006_parameter_list->renderOtherOptions();
?>
<?php if (!$t006_parameter_list->isExport() && !$t006_parameter->CurrentAction) { ?>
<form name="ft006_parameterlistsrch" id="ft006_parameterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft006_parameterlistsrch-search-panel" class="<?php echo $t006_parameter_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t006_parameter">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t006_parameter_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t006_parameter_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t006_parameter_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t006_parameter_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t006_parameter_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t006_parameter_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t006_parameter_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t006_parameter_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php $t006_parameter_list->showPageHeader(); ?>
<?php
$t006_parameter_list->showMessage();
?>
<?php if ($t006_parameter_list->TotalRecords > 0 || $t006_parameter->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t006_parameter_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t006_parameter">
<form name="ft006_parameterlist" id="ft006_parameterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_parameter">
<div id="gmp_t006_parameter" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t006_parameter_list->TotalRecords > 0 || $t006_parameter_list->isGridEdit()) { ?>
<table id="tbl_t006_parameterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t006_parameter->RowType = ROWTYPE_HEADER;

// Render list options
$t006_parameter_list->renderListOptions();

// Render list options (header, left)
$t006_parameter_list->ListOptions->render("header", "left");
?>
<?php if ($t006_parameter_list->Nama->Visible) { // Nama ?>
	<?php if ($t006_parameter_list->SortUrl($t006_parameter_list->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t006_parameter_list->Nama->headerCellClass() ?>"><div id="elh_t006_parameter_Nama" class="t006_parameter_Nama"><div class="ew-table-header-caption"><?php echo $t006_parameter_list->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t006_parameter_list->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_parameter_list->SortUrl($t006_parameter_list->Nama) ?>', 1);"><div id="elh_t006_parameter_Nama" class="t006_parameter_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_parameter_list->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t006_parameter_list->Nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_parameter_list->Nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_parameter_list->Nilai->Visible) { // Nilai ?>
	<?php if ($t006_parameter_list->SortUrl($t006_parameter_list->Nilai) == "") { ?>
		<th data-name="Nilai" class="<?php echo $t006_parameter_list->Nilai->headerCellClass() ?>"><div id="elh_t006_parameter_Nilai" class="t006_parameter_Nilai"><div class="ew-table-header-caption"><?php echo $t006_parameter_list->Nilai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nilai" class="<?php echo $t006_parameter_list->Nilai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_parameter_list->SortUrl($t006_parameter_list->Nilai) ?>', 1);"><div id="elh_t006_parameter_Nilai" class="t006_parameter_Nilai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_parameter_list->Nilai->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t006_parameter_list->Nilai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_parameter_list->Nilai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_parameter_list->Variabel->Visible) { // Variabel ?>
	<?php if ($t006_parameter_list->SortUrl($t006_parameter_list->Variabel) == "") { ?>
		<th data-name="Variabel" class="<?php echo $t006_parameter_list->Variabel->headerCellClass() ?>"><div id="elh_t006_parameter_Variabel" class="t006_parameter_Variabel"><div class="ew-table-header-caption"><?php echo $t006_parameter_list->Variabel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Variabel" class="<?php echo $t006_parameter_list->Variabel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_parameter_list->SortUrl($t006_parameter_list->Variabel) ?>', 1);"><div id="elh_t006_parameter_Variabel" class="t006_parameter_Variabel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_parameter_list->Variabel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t006_parameter_list->Variabel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_parameter_list->Variabel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t006_parameter_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t006_parameter_list->ExportAll && $t006_parameter_list->isExport()) {
	$t006_parameter_list->StopRecord = $t006_parameter_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t006_parameter_list->TotalRecords > $t006_parameter_list->StartRecord + $t006_parameter_list->DisplayRecords - 1)
		$t006_parameter_list->StopRecord = $t006_parameter_list->StartRecord + $t006_parameter_list->DisplayRecords - 1;
	else
		$t006_parameter_list->StopRecord = $t006_parameter_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t006_parameter->isConfirm() || $t006_parameter_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t006_parameter_list->FormKeyCountName) && ($t006_parameter_list->isGridAdd() || $t006_parameter_list->isGridEdit() || $t006_parameter->isConfirm())) {
		$t006_parameter_list->KeyCount = $CurrentForm->getValue($t006_parameter_list->FormKeyCountName);
		$t006_parameter_list->StopRecord = $t006_parameter_list->StartRecord + $t006_parameter_list->KeyCount - 1;
	}
}
$t006_parameter_list->RecordCount = $t006_parameter_list->StartRecord - 1;
if ($t006_parameter_list->Recordset && !$t006_parameter_list->Recordset->EOF) {
	$t006_parameter_list->Recordset->moveFirst();
	$selectLimit = $t006_parameter_list->UseSelectLimit;
	if (!$selectLimit && $t006_parameter_list->StartRecord > 1)
		$t006_parameter_list->Recordset->move($t006_parameter_list->StartRecord - 1);
} elseif (!$t006_parameter->AllowAddDeleteRow && $t006_parameter_list->StopRecord == 0) {
	$t006_parameter_list->StopRecord = $t006_parameter->GridAddRowCount;
}

// Initialize aggregate
$t006_parameter->RowType = ROWTYPE_AGGREGATEINIT;
$t006_parameter->resetAttributes();
$t006_parameter_list->renderRow();
if ($t006_parameter_list->isGridAdd())
	$t006_parameter_list->RowIndex = 0;
if ($t006_parameter_list->isGridEdit())
	$t006_parameter_list->RowIndex = 0;
while ($t006_parameter_list->RecordCount < $t006_parameter_list->StopRecord) {
	$t006_parameter_list->RecordCount++;
	if ($t006_parameter_list->RecordCount >= $t006_parameter_list->StartRecord) {
		$t006_parameter_list->RowCount++;
		if ($t006_parameter_list->isGridAdd() || $t006_parameter_list->isGridEdit() || $t006_parameter->isConfirm()) {
			$t006_parameter_list->RowIndex++;
			$CurrentForm->Index = $t006_parameter_list->RowIndex;
			if ($CurrentForm->hasValue($t006_parameter_list->FormActionName) && ($t006_parameter->isConfirm() || $t006_parameter_list->EventCancelled))
				$t006_parameter_list->RowAction = strval($CurrentForm->getValue($t006_parameter_list->FormActionName));
			elseif ($t006_parameter_list->isGridAdd())
				$t006_parameter_list->RowAction = "insert";
			else
				$t006_parameter_list->RowAction = "";
		}

		// Set up key count
		$t006_parameter_list->KeyCount = $t006_parameter_list->RowIndex;

		// Init row class and style
		$t006_parameter->resetAttributes();
		$t006_parameter->CssClass = "";
		if ($t006_parameter_list->isGridAdd()) {
			$t006_parameter_list->loadRowValues(); // Load default values
		} else {
			$t006_parameter_list->loadRowValues($t006_parameter_list->Recordset); // Load row values
		}
		$t006_parameter->RowType = ROWTYPE_VIEW; // Render view
		if ($t006_parameter_list->isGridAdd()) // Grid add
			$t006_parameter->RowType = ROWTYPE_ADD; // Render add
		if ($t006_parameter_list->isGridAdd() && $t006_parameter->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t006_parameter_list->restoreCurrentRowFormValues($t006_parameter_list->RowIndex); // Restore form values
		if ($t006_parameter_list->isGridEdit()) { // Grid edit
			if ($t006_parameter->EventCancelled)
				$t006_parameter_list->restoreCurrentRowFormValues($t006_parameter_list->RowIndex); // Restore form values
			if ($t006_parameter_list->RowAction == "insert")
				$t006_parameter->RowType = ROWTYPE_ADD; // Render add
			else
				$t006_parameter->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t006_parameter_list->isGridEdit() && ($t006_parameter->RowType == ROWTYPE_EDIT || $t006_parameter->RowType == ROWTYPE_ADD) && $t006_parameter->EventCancelled) // Update failed
			$t006_parameter_list->restoreCurrentRowFormValues($t006_parameter_list->RowIndex); // Restore form values
		if ($t006_parameter->RowType == ROWTYPE_EDIT) // Edit row
			$t006_parameter_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t006_parameter->RowAttrs->merge(["data-rowindex" => $t006_parameter_list->RowCount, "id" => "r" . $t006_parameter_list->RowCount . "_t006_parameter", "data-rowtype" => $t006_parameter->RowType]);

		// Render row
		$t006_parameter_list->renderRow();

		// Render list options
		$t006_parameter_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t006_parameter_list->RowAction != "delete" && $t006_parameter_list->RowAction != "insertdelete" && !($t006_parameter_list->RowAction == "insert" && $t006_parameter->isConfirm() && $t006_parameter_list->emptyRow())) {
?>
	<tr <?php echo $t006_parameter->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t006_parameter_list->ListOptions->render("body", "left", $t006_parameter_list->RowCount);
?>
	<?php if ($t006_parameter_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama" <?php echo $t006_parameter_list->Nama->cellAttributes() ?>>
<?php if ($t006_parameter->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_parameter_list->RowCount ?>_t006_parameter_Nama" class="form-group">
<input type="text" data-table="t006_parameter" data-field="x_Nama" name="x<?php echo $t006_parameter_list->RowIndex ?>_Nama" id="x<?php echo $t006_parameter_list->RowIndex ?>_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t006_parameter_list->Nama->getPlaceHolder()) ?>" value="<?php echo $t006_parameter_list->Nama->EditValue ?>"<?php echo $t006_parameter_list->Nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_parameter" data-field="x_Nama" name="o<?php echo $t006_parameter_list->RowIndex ?>_Nama" id="o<?php echo $t006_parameter_list->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t006_parameter_list->Nama->OldValue) ?>">
<?php } ?>
<?php if ($t006_parameter->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_parameter_list->RowCount ?>_t006_parameter_Nama" class="form-group">
<input type="text" data-table="t006_parameter" data-field="x_Nama" name="x<?php echo $t006_parameter_list->RowIndex ?>_Nama" id="x<?php echo $t006_parameter_list->RowIndex ?>_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t006_parameter_list->Nama->getPlaceHolder()) ?>" value="<?php echo $t006_parameter_list->Nama->EditValue ?>"<?php echo $t006_parameter_list->Nama->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_parameter->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_parameter_list->RowCount ?>_t006_parameter_Nama">
<span<?php echo $t006_parameter_list->Nama->viewAttributes() ?>><?php echo $t006_parameter_list->Nama->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t006_parameter->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t006_parameter" data-field="x_id" name="x<?php echo $t006_parameter_list->RowIndex ?>_id" id="x<?php echo $t006_parameter_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t006_parameter_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t006_parameter" data-field="x_id" name="o<?php echo $t006_parameter_list->RowIndex ?>_id" id="o<?php echo $t006_parameter_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t006_parameter_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t006_parameter->RowType == ROWTYPE_EDIT || $t006_parameter->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t006_parameter" data-field="x_id" name="x<?php echo $t006_parameter_list->RowIndex ?>_id" id="x<?php echo $t006_parameter_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t006_parameter_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t006_parameter_list->Nilai->Visible) { // Nilai ?>
		<td data-name="Nilai" <?php echo $t006_parameter_list->Nilai->cellAttributes() ?>>
<?php if ($t006_parameter->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_parameter_list->RowCount ?>_t006_parameter_Nilai" class="form-group">
<textarea data-table="t006_parameter" data-field="x_Nilai" name="x<?php echo $t006_parameter_list->RowIndex ?>_Nilai" id="x<?php echo $t006_parameter_list->RowIndex ?>_Nilai" cols="35" rows="1" placeholder="<?php echo HtmlEncode($t006_parameter_list->Nilai->getPlaceHolder()) ?>"<?php echo $t006_parameter_list->Nilai->editAttributes() ?>><?php echo $t006_parameter_list->Nilai->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t006_parameter" data-field="x_Nilai" name="o<?php echo $t006_parameter_list->RowIndex ?>_Nilai" id="o<?php echo $t006_parameter_list->RowIndex ?>_Nilai" value="<?php echo HtmlEncode($t006_parameter_list->Nilai->OldValue) ?>">
<?php } ?>
<?php if ($t006_parameter->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_parameter_list->RowCount ?>_t006_parameter_Nilai" class="form-group">
<textarea data-table="t006_parameter" data-field="x_Nilai" name="x<?php echo $t006_parameter_list->RowIndex ?>_Nilai" id="x<?php echo $t006_parameter_list->RowIndex ?>_Nilai" cols="35" rows="1" placeholder="<?php echo HtmlEncode($t006_parameter_list->Nilai->getPlaceHolder()) ?>"<?php echo $t006_parameter_list->Nilai->editAttributes() ?>><?php echo $t006_parameter_list->Nilai->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($t006_parameter->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_parameter_list->RowCount ?>_t006_parameter_Nilai">
<span<?php echo $t006_parameter_list->Nilai->viewAttributes() ?>><?php echo $t006_parameter_list->Nilai->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t006_parameter_list->Variabel->Visible) { // Variabel ?>
		<td data-name="Variabel" <?php echo $t006_parameter_list->Variabel->cellAttributes() ?>>
<?php if ($t006_parameter->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_parameter_list->RowCount ?>_t006_parameter_Variabel" class="form-group">
<input type="text" data-table="t006_parameter" data-field="x_Variabel" name="x<?php echo $t006_parameter_list->RowIndex ?>_Variabel" id="x<?php echo $t006_parameter_list->RowIndex ?>_Variabel" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t006_parameter_list->Variabel->getPlaceHolder()) ?>" value="<?php echo $t006_parameter_list->Variabel->EditValue ?>"<?php echo $t006_parameter_list->Variabel->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_parameter" data-field="x_Variabel" name="o<?php echo $t006_parameter_list->RowIndex ?>_Variabel" id="o<?php echo $t006_parameter_list->RowIndex ?>_Variabel" value="<?php echo HtmlEncode($t006_parameter_list->Variabel->OldValue) ?>">
<?php } ?>
<?php if ($t006_parameter->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_parameter_list->RowCount ?>_t006_parameter_Variabel" class="form-group">
<input type="text" data-table="t006_parameter" data-field="x_Variabel" name="x<?php echo $t006_parameter_list->RowIndex ?>_Variabel" id="x<?php echo $t006_parameter_list->RowIndex ?>_Variabel" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t006_parameter_list->Variabel->getPlaceHolder()) ?>" value="<?php echo $t006_parameter_list->Variabel->EditValue ?>"<?php echo $t006_parameter_list->Variabel->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_parameter->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_parameter_list->RowCount ?>_t006_parameter_Variabel">
<span<?php echo $t006_parameter_list->Variabel->viewAttributes() ?>><?php echo $t006_parameter_list->Variabel->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t006_parameter_list->ListOptions->render("body", "right", $t006_parameter_list->RowCount);
?>
	</tr>
<?php if ($t006_parameter->RowType == ROWTYPE_ADD || $t006_parameter->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft006_parameterlist", "load"], function() {
	ft006_parameterlist.updateLists(<?php echo $t006_parameter_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t006_parameter_list->isGridAdd())
		if (!$t006_parameter_list->Recordset->EOF)
			$t006_parameter_list->Recordset->moveNext();
}
?>
<?php
	if ($t006_parameter_list->isGridAdd() || $t006_parameter_list->isGridEdit()) {
		$t006_parameter_list->RowIndex = '$rowindex$';
		$t006_parameter_list->loadRowValues();

		// Set row properties
		$t006_parameter->resetAttributes();
		$t006_parameter->RowAttrs->merge(["data-rowindex" => $t006_parameter_list->RowIndex, "id" => "r0_t006_parameter", "data-rowtype" => ROWTYPE_ADD]);
		$t006_parameter->RowAttrs->appendClass("ew-template");
		$t006_parameter->RowType = ROWTYPE_ADD;

		// Render row
		$t006_parameter_list->renderRow();

		// Render list options
		$t006_parameter_list->renderListOptions();
		$t006_parameter_list->StartRowCount = 0;
?>
	<tr <?php echo $t006_parameter->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t006_parameter_list->ListOptions->render("body", "left", $t006_parameter_list->RowIndex);
?>
	<?php if ($t006_parameter_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama">
<span id="el$rowindex$_t006_parameter_Nama" class="form-group t006_parameter_Nama">
<input type="text" data-table="t006_parameter" data-field="x_Nama" name="x<?php echo $t006_parameter_list->RowIndex ?>_Nama" id="x<?php echo $t006_parameter_list->RowIndex ?>_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t006_parameter_list->Nama->getPlaceHolder()) ?>" value="<?php echo $t006_parameter_list->Nama->EditValue ?>"<?php echo $t006_parameter_list->Nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_parameter" data-field="x_Nama" name="o<?php echo $t006_parameter_list->RowIndex ?>_Nama" id="o<?php echo $t006_parameter_list->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t006_parameter_list->Nama->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_parameter_list->Nilai->Visible) { // Nilai ?>
		<td data-name="Nilai">
<span id="el$rowindex$_t006_parameter_Nilai" class="form-group t006_parameter_Nilai">
<textarea data-table="t006_parameter" data-field="x_Nilai" name="x<?php echo $t006_parameter_list->RowIndex ?>_Nilai" id="x<?php echo $t006_parameter_list->RowIndex ?>_Nilai" cols="35" rows="1" placeholder="<?php echo HtmlEncode($t006_parameter_list->Nilai->getPlaceHolder()) ?>"<?php echo $t006_parameter_list->Nilai->editAttributes() ?>><?php echo $t006_parameter_list->Nilai->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t006_parameter" data-field="x_Nilai" name="o<?php echo $t006_parameter_list->RowIndex ?>_Nilai" id="o<?php echo $t006_parameter_list->RowIndex ?>_Nilai" value="<?php echo HtmlEncode($t006_parameter_list->Nilai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_parameter_list->Variabel->Visible) { // Variabel ?>
		<td data-name="Variabel">
<span id="el$rowindex$_t006_parameter_Variabel" class="form-group t006_parameter_Variabel">
<input type="text" data-table="t006_parameter" data-field="x_Variabel" name="x<?php echo $t006_parameter_list->RowIndex ?>_Variabel" id="x<?php echo $t006_parameter_list->RowIndex ?>_Variabel" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t006_parameter_list->Variabel->getPlaceHolder()) ?>" value="<?php echo $t006_parameter_list->Variabel->EditValue ?>"<?php echo $t006_parameter_list->Variabel->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_parameter" data-field="x_Variabel" name="o<?php echo $t006_parameter_list->RowIndex ?>_Variabel" id="o<?php echo $t006_parameter_list->RowIndex ?>_Variabel" value="<?php echo HtmlEncode($t006_parameter_list->Variabel->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t006_parameter_list->ListOptions->render("body", "right", $t006_parameter_list->RowIndex);
?>
<script>
loadjs.ready(["ft006_parameterlist", "load"], function() {
	ft006_parameterlist.updateLists(<?php echo $t006_parameter_list->RowIndex ?>);
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
<?php if ($t006_parameter_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t006_parameter_list->FormKeyCountName ?>" id="<?php echo $t006_parameter_list->FormKeyCountName ?>" value="<?php echo $t006_parameter_list->KeyCount ?>">
<?php echo $t006_parameter_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t006_parameter_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t006_parameter_list->FormKeyCountName ?>" id="<?php echo $t006_parameter_list->FormKeyCountName ?>" value="<?php echo $t006_parameter_list->KeyCount ?>">
<?php echo $t006_parameter_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t006_parameter->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t006_parameter_list->Recordset)
	$t006_parameter_list->Recordset->Close();
?>
<?php if (!$t006_parameter_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t006_parameter_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t006_parameter_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t006_parameter_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t006_parameter_list->TotalRecords == 0 && !$t006_parameter->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t006_parameter_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t006_parameter_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t006_parameter_list->isExport()) { ?>
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
$t006_parameter_list->terminate();
?>