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
$t001_kapal_list = new t001_kapal_list();

// Run the page
$t001_kapal_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_kapal_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_kapal_list->isExport()) { ?>
<script>
var ft001_kapallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft001_kapallist = currentForm = new ew.Form("ft001_kapallist", "list");
	ft001_kapallist.formKeyCountName = '<?php echo $t001_kapal_list->FormKeyCountName ?>';

	// Validate form
	ft001_kapallist.validate = function() {
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
			<?php if ($t001_kapal_list->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_kapal_list->Nama->caption(), $t001_kapal_list->Nama->RequiredErrorMessage)) ?>");
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
	ft001_kapallist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Nama", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft001_kapallist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_kapallist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft001_kapallist");
});
var ft001_kapallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft001_kapallistsrch = currentSearchForm = new ew.Form("ft001_kapallistsrch");

	// Dynamic selection lists
	// Filters

	ft001_kapallistsrch.filterList = <?php echo $t001_kapal_list->getFilterList() ?>;
	loadjs.done("ft001_kapallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_kapal_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t001_kapal_list->TotalRecords > 0 && $t001_kapal_list->ExportOptions->visible()) { ?>
<?php $t001_kapal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_kapal_list->ImportOptions->visible()) { ?>
<?php $t001_kapal_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_kapal_list->SearchOptions->visible()) { ?>
<?php $t001_kapal_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t001_kapal_list->FilterOptions->visible()) { ?>
<?php $t001_kapal_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t001_kapal_list->renderOtherOptions();
?>
<?php if (!$t001_kapal_list->isExport() && !$t001_kapal->CurrentAction) { ?>
<form name="ft001_kapallistsrch" id="ft001_kapallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft001_kapallistsrch-search-panel" class="<?php echo $t001_kapal_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t001_kapal">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t001_kapal_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t001_kapal_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t001_kapal_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t001_kapal_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t001_kapal_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t001_kapal_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t001_kapal_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t001_kapal_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php $t001_kapal_list->showPageHeader(); ?>
<?php
$t001_kapal_list->showMessage();
?>
<?php if ($t001_kapal_list->TotalRecords > 0 || $t001_kapal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t001_kapal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t001_kapal">
<form name="ft001_kapallist" id="ft001_kapallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_kapal">
<div id="gmp_t001_kapal" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t001_kapal_list->TotalRecords > 0 || $t001_kapal_list->isGridEdit()) { ?>
<table id="tbl_t001_kapallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t001_kapal->RowType = ROWTYPE_HEADER;

// Render list options
$t001_kapal_list->renderListOptions();

// Render list options (header, left)
$t001_kapal_list->ListOptions->render("header", "left");
?>
<?php if ($t001_kapal_list->Nama->Visible) { // Nama ?>
	<?php if ($t001_kapal_list->SortUrl($t001_kapal_list->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t001_kapal_list->Nama->headerCellClass() ?>"><div id="elh_t001_kapal_Nama" class="t001_kapal_Nama"><div class="ew-table-header-caption"><?php echo $t001_kapal_list->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t001_kapal_list->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_kapal_list->SortUrl($t001_kapal_list->Nama) ?>', 1);"><div id="elh_t001_kapal_Nama" class="t001_kapal_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_kapal_list->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_kapal_list->Nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_kapal_list->Nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t001_kapal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t001_kapal_list->ExportAll && $t001_kapal_list->isExport()) {
	$t001_kapal_list->StopRecord = $t001_kapal_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t001_kapal_list->TotalRecords > $t001_kapal_list->StartRecord + $t001_kapal_list->DisplayRecords - 1)
		$t001_kapal_list->StopRecord = $t001_kapal_list->StartRecord + $t001_kapal_list->DisplayRecords - 1;
	else
		$t001_kapal_list->StopRecord = $t001_kapal_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t001_kapal->isConfirm() || $t001_kapal_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t001_kapal_list->FormKeyCountName) && ($t001_kapal_list->isGridAdd() || $t001_kapal_list->isGridEdit() || $t001_kapal->isConfirm())) {
		$t001_kapal_list->KeyCount = $CurrentForm->getValue($t001_kapal_list->FormKeyCountName);
		$t001_kapal_list->StopRecord = $t001_kapal_list->StartRecord + $t001_kapal_list->KeyCount - 1;
	}
}
$t001_kapal_list->RecordCount = $t001_kapal_list->StartRecord - 1;
if ($t001_kapal_list->Recordset && !$t001_kapal_list->Recordset->EOF) {
	$t001_kapal_list->Recordset->moveFirst();
	$selectLimit = $t001_kapal_list->UseSelectLimit;
	if (!$selectLimit && $t001_kapal_list->StartRecord > 1)
		$t001_kapal_list->Recordset->move($t001_kapal_list->StartRecord - 1);
} elseif (!$t001_kapal->AllowAddDeleteRow && $t001_kapal_list->StopRecord == 0) {
	$t001_kapal_list->StopRecord = $t001_kapal->GridAddRowCount;
}

// Initialize aggregate
$t001_kapal->RowType = ROWTYPE_AGGREGATEINIT;
$t001_kapal->resetAttributes();
$t001_kapal_list->renderRow();
if ($t001_kapal_list->isGridAdd())
	$t001_kapal_list->RowIndex = 0;
if ($t001_kapal_list->isGridEdit())
	$t001_kapal_list->RowIndex = 0;
while ($t001_kapal_list->RecordCount < $t001_kapal_list->StopRecord) {
	$t001_kapal_list->RecordCount++;
	if ($t001_kapal_list->RecordCount >= $t001_kapal_list->StartRecord) {
		$t001_kapal_list->RowCount++;
		if ($t001_kapal_list->isGridAdd() || $t001_kapal_list->isGridEdit() || $t001_kapal->isConfirm()) {
			$t001_kapal_list->RowIndex++;
			$CurrentForm->Index = $t001_kapal_list->RowIndex;
			if ($CurrentForm->hasValue($t001_kapal_list->FormActionName) && ($t001_kapal->isConfirm() || $t001_kapal_list->EventCancelled))
				$t001_kapal_list->RowAction = strval($CurrentForm->getValue($t001_kapal_list->FormActionName));
			elseif ($t001_kapal_list->isGridAdd())
				$t001_kapal_list->RowAction = "insert";
			else
				$t001_kapal_list->RowAction = "";
		}

		// Set up key count
		$t001_kapal_list->KeyCount = $t001_kapal_list->RowIndex;

		// Init row class and style
		$t001_kapal->resetAttributes();
		$t001_kapal->CssClass = "";
		if ($t001_kapal_list->isGridAdd()) {
			$t001_kapal_list->loadRowValues(); // Load default values
		} else {
			$t001_kapal_list->loadRowValues($t001_kapal_list->Recordset); // Load row values
		}
		$t001_kapal->RowType = ROWTYPE_VIEW; // Render view
		if ($t001_kapal_list->isGridAdd()) // Grid add
			$t001_kapal->RowType = ROWTYPE_ADD; // Render add
		if ($t001_kapal_list->isGridAdd() && $t001_kapal->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t001_kapal_list->restoreCurrentRowFormValues($t001_kapal_list->RowIndex); // Restore form values
		if ($t001_kapal_list->isGridEdit()) { // Grid edit
			if ($t001_kapal->EventCancelled)
				$t001_kapal_list->restoreCurrentRowFormValues($t001_kapal_list->RowIndex); // Restore form values
			if ($t001_kapal_list->RowAction == "insert")
				$t001_kapal->RowType = ROWTYPE_ADD; // Render add
			else
				$t001_kapal->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t001_kapal_list->isGridEdit() && ($t001_kapal->RowType == ROWTYPE_EDIT || $t001_kapal->RowType == ROWTYPE_ADD) && $t001_kapal->EventCancelled) // Update failed
			$t001_kapal_list->restoreCurrentRowFormValues($t001_kapal_list->RowIndex); // Restore form values
		if ($t001_kapal->RowType == ROWTYPE_EDIT) // Edit row
			$t001_kapal_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t001_kapal->RowAttrs->merge(["data-rowindex" => $t001_kapal_list->RowCount, "id" => "r" . $t001_kapal_list->RowCount . "_t001_kapal", "data-rowtype" => $t001_kapal->RowType]);

		// Render row
		$t001_kapal_list->renderRow();

		// Render list options
		$t001_kapal_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t001_kapal_list->RowAction != "delete" && $t001_kapal_list->RowAction != "insertdelete" && !($t001_kapal_list->RowAction == "insert" && $t001_kapal->isConfirm() && $t001_kapal_list->emptyRow())) {
?>
	<tr <?php echo $t001_kapal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_kapal_list->ListOptions->render("body", "left", $t001_kapal_list->RowCount);
?>
	<?php if ($t001_kapal_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama" <?php echo $t001_kapal_list->Nama->cellAttributes() ?>>
<?php if ($t001_kapal->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t001_kapal_list->RowCount ?>_t001_kapal_Nama" class="form-group">
<input type="text" data-table="t001_kapal" data-field="x_Nama" name="x<?php echo $t001_kapal_list->RowIndex ?>_Nama" id="x<?php echo $t001_kapal_list->RowIndex ?>_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t001_kapal_list->Nama->getPlaceHolder()) ?>" value="<?php echo $t001_kapal_list->Nama->EditValue ?>"<?php echo $t001_kapal_list->Nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_kapal" data-field="x_Nama" name="o<?php echo $t001_kapal_list->RowIndex ?>_Nama" id="o<?php echo $t001_kapal_list->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t001_kapal_list->Nama->OldValue) ?>">
<?php } ?>
<?php if ($t001_kapal->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t001_kapal_list->RowCount ?>_t001_kapal_Nama" class="form-group">
<input type="text" data-table="t001_kapal" data-field="x_Nama" name="x<?php echo $t001_kapal_list->RowIndex ?>_Nama" id="x<?php echo $t001_kapal_list->RowIndex ?>_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t001_kapal_list->Nama->getPlaceHolder()) ?>" value="<?php echo $t001_kapal_list->Nama->EditValue ?>"<?php echo $t001_kapal_list->Nama->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t001_kapal->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t001_kapal_list->RowCount ?>_t001_kapal_Nama">
<span<?php echo $t001_kapal_list->Nama->viewAttributes() ?>><?php echo $t001_kapal_list->Nama->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t001_kapal->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t001_kapal" data-field="x_id" name="x<?php echo $t001_kapal_list->RowIndex ?>_id" id="x<?php echo $t001_kapal_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t001_kapal_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t001_kapal" data-field="x_id" name="o<?php echo $t001_kapal_list->RowIndex ?>_id" id="o<?php echo $t001_kapal_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t001_kapal_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t001_kapal->RowType == ROWTYPE_EDIT || $t001_kapal->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t001_kapal" data-field="x_id" name="x<?php echo $t001_kapal_list->RowIndex ?>_id" id="x<?php echo $t001_kapal_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t001_kapal_list->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t001_kapal_list->ListOptions->render("body", "right", $t001_kapal_list->RowCount);
?>
	</tr>
<?php if ($t001_kapal->RowType == ROWTYPE_ADD || $t001_kapal->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft001_kapallist", "load"], function() {
	ft001_kapallist.updateLists(<?php echo $t001_kapal_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t001_kapal_list->isGridAdd())
		if (!$t001_kapal_list->Recordset->EOF)
			$t001_kapal_list->Recordset->moveNext();
}
?>
<?php
	if ($t001_kapal_list->isGridAdd() || $t001_kapal_list->isGridEdit()) {
		$t001_kapal_list->RowIndex = '$rowindex$';
		$t001_kapal_list->loadRowValues();

		// Set row properties
		$t001_kapal->resetAttributes();
		$t001_kapal->RowAttrs->merge(["data-rowindex" => $t001_kapal_list->RowIndex, "id" => "r0_t001_kapal", "data-rowtype" => ROWTYPE_ADD]);
		$t001_kapal->RowAttrs->appendClass("ew-template");
		$t001_kapal->RowType = ROWTYPE_ADD;

		// Render row
		$t001_kapal_list->renderRow();

		// Render list options
		$t001_kapal_list->renderListOptions();
		$t001_kapal_list->StartRowCount = 0;
?>
	<tr <?php echo $t001_kapal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_kapal_list->ListOptions->render("body", "left", $t001_kapal_list->RowIndex);
?>
	<?php if ($t001_kapal_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama">
<span id="el$rowindex$_t001_kapal_Nama" class="form-group t001_kapal_Nama">
<input type="text" data-table="t001_kapal" data-field="x_Nama" name="x<?php echo $t001_kapal_list->RowIndex ?>_Nama" id="x<?php echo $t001_kapal_list->RowIndex ?>_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t001_kapal_list->Nama->getPlaceHolder()) ?>" value="<?php echo $t001_kapal_list->Nama->EditValue ?>"<?php echo $t001_kapal_list->Nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t001_kapal" data-field="x_Nama" name="o<?php echo $t001_kapal_list->RowIndex ?>_Nama" id="o<?php echo $t001_kapal_list->RowIndex ?>_Nama" value="<?php echo HtmlEncode($t001_kapal_list->Nama->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t001_kapal_list->ListOptions->render("body", "right", $t001_kapal_list->RowIndex);
?>
<script>
loadjs.ready(["ft001_kapallist", "load"], function() {
	ft001_kapallist.updateLists(<?php echo $t001_kapal_list->RowIndex ?>);
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
<?php if ($t001_kapal_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t001_kapal_list->FormKeyCountName ?>" id="<?php echo $t001_kapal_list->FormKeyCountName ?>" value="<?php echo $t001_kapal_list->KeyCount ?>">
<?php echo $t001_kapal_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t001_kapal_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t001_kapal_list->FormKeyCountName ?>" id="<?php echo $t001_kapal_list->FormKeyCountName ?>" value="<?php echo $t001_kapal_list->KeyCount ?>">
<?php echo $t001_kapal_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t001_kapal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t001_kapal_list->Recordset)
	$t001_kapal_list->Recordset->Close();
?>
<?php if (!$t001_kapal_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t001_kapal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t001_kapal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t001_kapal_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t001_kapal_list->TotalRecords == 0 && !$t001_kapal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t001_kapal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t001_kapal_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_kapal_list->isExport()) { ?>
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
$t001_kapal_list->terminate();
?>