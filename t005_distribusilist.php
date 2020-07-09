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
$t005_distribusi_list = new t005_distribusi_list();

// Run the page
$t005_distribusi_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_distribusi_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t005_distribusi_list->isExport()) { ?>
<script>
var ft005_distribusilist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft005_distribusilist = currentForm = new ew.Form("ft005_distribusilist", "list");
	ft005_distribusilist.formKeyCountName = '<?php echo $t005_distribusi_list->FormKeyCountName ?>';

	// Validate form
	ft005_distribusilist.validate = function() {
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
			<?php if ($t005_distribusi_list->source_id->Required) { ?>
				elm = this.getElements("x" + infix + "_source_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_list->source_id->caption(), $t005_distribusi_list->source_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_distribusi_list->destination_id->Required) { ?>
				elm = this.getElements("x" + infix + "_destination_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_list->destination_id->caption(), $t005_distribusi_list->destination_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_distribusi_list->Jarak->Required) { ?>
				elm = this.getElements("x" + infix + "_Jarak");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_list->Jarak->caption(), $t005_distribusi_list->Jarak->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jarak");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_distribusi_list->Jarak->errorMessage()) ?>");
			<?php if ($t005_distribusi_list->RateO->Required) { ?>
				elm = this.getElements("x" + infix + "_RateO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_list->RateO->caption(), $t005_distribusi_list->RateO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RateO");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_distribusi_list->RateO->errorMessage()) ?>");
			<?php if ($t005_distribusi_list->RateD->Required) { ?>
				elm = this.getElements("x" + infix + "_RateD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_list->RateD->caption(), $t005_distribusi_list->RateD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RateD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_distribusi_list->RateD->errorMessage()) ?>");
			<?php if ($t005_distribusi_list->Demand->Required) { ?>
				elm = this.getElements("x" + infix + "_Demand");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_list->Demand->caption(), $t005_distribusi_list->Demand->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Demand");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_distribusi_list->Demand->errorMessage()) ?>");

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
	ft005_distribusilist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "source_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "destination_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "Jarak", false)) return false;
		if (ew.valueChanged(fobj, infix, "RateO", false)) return false;
		if (ew.valueChanged(fobj, infix, "RateD", false)) return false;
		if (ew.valueChanged(fobj, infix, "Demand", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft005_distribusilist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft005_distribusilist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft005_distribusilist.lists["x_source_id"] = <?php echo $t005_distribusi_list->source_id->Lookup->toClientList($t005_distribusi_list) ?>;
	ft005_distribusilist.lists["x_source_id"].options = <?php echo JsonEncode($t005_distribusi_list->source_id->lookupOptions()) ?>;
	ft005_distribusilist.lists["x_destination_id"] = <?php echo $t005_distribusi_list->destination_id->Lookup->toClientList($t005_distribusi_list) ?>;
	ft005_distribusilist.lists["x_destination_id"].options = <?php echo JsonEncode($t005_distribusi_list->destination_id->lookupOptions()) ?>;
	loadjs.done("ft005_distribusilist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t005_distribusi_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t005_distribusi_list->TotalRecords > 0 && $t005_distribusi_list->ExportOptions->visible()) { ?>
<?php $t005_distribusi_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t005_distribusi_list->ImportOptions->visible()) { ?>
<?php $t005_distribusi_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t005_distribusi_list->renderOtherOptions();
?>
<?php $t005_distribusi_list->showPageHeader(); ?>
<?php
$t005_distribusi_list->showMessage();
?>
<?php if ($t005_distribusi_list->TotalRecords > 0 || $t005_distribusi->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t005_distribusi_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t005_distribusi">
<form name="ft005_distribusilist" id="ft005_distribusilist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_distribusi">
<div id="gmp_t005_distribusi" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t005_distribusi_list->TotalRecords > 0 || $t005_distribusi_list->isGridEdit()) { ?>
<table id="tbl_t005_distribusilist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t005_distribusi->RowType = ROWTYPE_HEADER;

// Render list options
$t005_distribusi_list->renderListOptions();

// Render list options (header, left)
$t005_distribusi_list->ListOptions->render("header", "left");
?>
<?php if ($t005_distribusi_list->source_id->Visible) { // source_id ?>
	<?php if ($t005_distribusi_list->SortUrl($t005_distribusi_list->source_id) == "") { ?>
		<th data-name="source_id" class="<?php echo $t005_distribusi_list->source_id->headerCellClass() ?>"><div id="elh_t005_distribusi_source_id" class="t005_distribusi_source_id"><div class="ew-table-header-caption"><?php echo $t005_distribusi_list->source_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="source_id" class="<?php echo $t005_distribusi_list->source_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_distribusi_list->SortUrl($t005_distribusi_list->source_id) ?>', 1);"><div id="elh_t005_distribusi_source_id" class="t005_distribusi_source_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_distribusi_list->source_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_distribusi_list->source_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_distribusi_list->source_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_distribusi_list->destination_id->Visible) { // destination_id ?>
	<?php if ($t005_distribusi_list->SortUrl($t005_distribusi_list->destination_id) == "") { ?>
		<th data-name="destination_id" class="<?php echo $t005_distribusi_list->destination_id->headerCellClass() ?>"><div id="elh_t005_distribusi_destination_id" class="t005_distribusi_destination_id"><div class="ew-table-header-caption"><?php echo $t005_distribusi_list->destination_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="destination_id" class="<?php echo $t005_distribusi_list->destination_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_distribusi_list->SortUrl($t005_distribusi_list->destination_id) ?>', 1);"><div id="elh_t005_distribusi_destination_id" class="t005_distribusi_destination_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_distribusi_list->destination_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_distribusi_list->destination_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_distribusi_list->destination_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_distribusi_list->Jarak->Visible) { // Jarak ?>
	<?php if ($t005_distribusi_list->SortUrl($t005_distribusi_list->Jarak) == "") { ?>
		<th data-name="Jarak" class="<?php echo $t005_distribusi_list->Jarak->headerCellClass() ?>"><div id="elh_t005_distribusi_Jarak" class="t005_distribusi_Jarak"><div class="ew-table-header-caption"><?php echo $t005_distribusi_list->Jarak->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jarak" class="<?php echo $t005_distribusi_list->Jarak->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_distribusi_list->SortUrl($t005_distribusi_list->Jarak) ?>', 1);"><div id="elh_t005_distribusi_Jarak" class="t005_distribusi_Jarak">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_distribusi_list->Jarak->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_distribusi_list->Jarak->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_distribusi_list->Jarak->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_distribusi_list->RateO->Visible) { // RateO ?>
	<?php if ($t005_distribusi_list->SortUrl($t005_distribusi_list->RateO) == "") { ?>
		<th data-name="RateO" class="<?php echo $t005_distribusi_list->RateO->headerCellClass() ?>"><div id="elh_t005_distribusi_RateO" class="t005_distribusi_RateO"><div class="ew-table-header-caption"><?php echo $t005_distribusi_list->RateO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RateO" class="<?php echo $t005_distribusi_list->RateO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_distribusi_list->SortUrl($t005_distribusi_list->RateO) ?>', 1);"><div id="elh_t005_distribusi_RateO" class="t005_distribusi_RateO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_distribusi_list->RateO->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_distribusi_list->RateO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_distribusi_list->RateO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_distribusi_list->RateD->Visible) { // RateD ?>
	<?php if ($t005_distribusi_list->SortUrl($t005_distribusi_list->RateD) == "") { ?>
		<th data-name="RateD" class="<?php echo $t005_distribusi_list->RateD->headerCellClass() ?>"><div id="elh_t005_distribusi_RateD" class="t005_distribusi_RateD"><div class="ew-table-header-caption"><?php echo $t005_distribusi_list->RateD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RateD" class="<?php echo $t005_distribusi_list->RateD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_distribusi_list->SortUrl($t005_distribusi_list->RateD) ?>', 1);"><div id="elh_t005_distribusi_RateD" class="t005_distribusi_RateD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_distribusi_list->RateD->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_distribusi_list->RateD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_distribusi_list->RateD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_distribusi_list->Demand->Visible) { // Demand ?>
	<?php if ($t005_distribusi_list->SortUrl($t005_distribusi_list->Demand) == "") { ?>
		<th data-name="Demand" class="<?php echo $t005_distribusi_list->Demand->headerCellClass() ?>"><div id="elh_t005_distribusi_Demand" class="t005_distribusi_Demand"><div class="ew-table-header-caption"><?php echo $t005_distribusi_list->Demand->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Demand" class="<?php echo $t005_distribusi_list->Demand->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_distribusi_list->SortUrl($t005_distribusi_list->Demand) ?>', 1);"><div id="elh_t005_distribusi_Demand" class="t005_distribusi_Demand">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_distribusi_list->Demand->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_distribusi_list->Demand->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_distribusi_list->Demand->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t005_distribusi_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t005_distribusi_list->ExportAll && $t005_distribusi_list->isExport()) {
	$t005_distribusi_list->StopRecord = $t005_distribusi_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t005_distribusi_list->TotalRecords > $t005_distribusi_list->StartRecord + $t005_distribusi_list->DisplayRecords - 1)
		$t005_distribusi_list->StopRecord = $t005_distribusi_list->StartRecord + $t005_distribusi_list->DisplayRecords - 1;
	else
		$t005_distribusi_list->StopRecord = $t005_distribusi_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t005_distribusi->isConfirm() || $t005_distribusi_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t005_distribusi_list->FormKeyCountName) && ($t005_distribusi_list->isGridAdd() || $t005_distribusi_list->isGridEdit() || $t005_distribusi->isConfirm())) {
		$t005_distribusi_list->KeyCount = $CurrentForm->getValue($t005_distribusi_list->FormKeyCountName);
		$t005_distribusi_list->StopRecord = $t005_distribusi_list->StartRecord + $t005_distribusi_list->KeyCount - 1;
	}
}
$t005_distribusi_list->RecordCount = $t005_distribusi_list->StartRecord - 1;
if ($t005_distribusi_list->Recordset && !$t005_distribusi_list->Recordset->EOF) {
	$t005_distribusi_list->Recordset->moveFirst();
	$selectLimit = $t005_distribusi_list->UseSelectLimit;
	if (!$selectLimit && $t005_distribusi_list->StartRecord > 1)
		$t005_distribusi_list->Recordset->move($t005_distribusi_list->StartRecord - 1);
} elseif (!$t005_distribusi->AllowAddDeleteRow && $t005_distribusi_list->StopRecord == 0) {
	$t005_distribusi_list->StopRecord = $t005_distribusi->GridAddRowCount;
}

// Initialize aggregate
$t005_distribusi->RowType = ROWTYPE_AGGREGATEINIT;
$t005_distribusi->resetAttributes();
$t005_distribusi_list->renderRow();
if ($t005_distribusi_list->isGridAdd())
	$t005_distribusi_list->RowIndex = 0;
if ($t005_distribusi_list->isGridEdit())
	$t005_distribusi_list->RowIndex = 0;
while ($t005_distribusi_list->RecordCount < $t005_distribusi_list->StopRecord) {
	$t005_distribusi_list->RecordCount++;
	if ($t005_distribusi_list->RecordCount >= $t005_distribusi_list->StartRecord) {
		$t005_distribusi_list->RowCount++;
		if ($t005_distribusi_list->isGridAdd() || $t005_distribusi_list->isGridEdit() || $t005_distribusi->isConfirm()) {
			$t005_distribusi_list->RowIndex++;
			$CurrentForm->Index = $t005_distribusi_list->RowIndex;
			if ($CurrentForm->hasValue($t005_distribusi_list->FormActionName) && ($t005_distribusi->isConfirm() || $t005_distribusi_list->EventCancelled))
				$t005_distribusi_list->RowAction = strval($CurrentForm->getValue($t005_distribusi_list->FormActionName));
			elseif ($t005_distribusi_list->isGridAdd())
				$t005_distribusi_list->RowAction = "insert";
			else
				$t005_distribusi_list->RowAction = "";
		}

		// Set up key count
		$t005_distribusi_list->KeyCount = $t005_distribusi_list->RowIndex;

		// Init row class and style
		$t005_distribusi->resetAttributes();
		$t005_distribusi->CssClass = "";
		if ($t005_distribusi_list->isGridAdd()) {
			$t005_distribusi_list->loadRowValues(); // Load default values
		} else {
			$t005_distribusi_list->loadRowValues($t005_distribusi_list->Recordset); // Load row values
		}
		$t005_distribusi->RowType = ROWTYPE_VIEW; // Render view
		if ($t005_distribusi_list->isGridAdd()) // Grid add
			$t005_distribusi->RowType = ROWTYPE_ADD; // Render add
		if ($t005_distribusi_list->isGridAdd() && $t005_distribusi->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t005_distribusi_list->restoreCurrentRowFormValues($t005_distribusi_list->RowIndex); // Restore form values
		if ($t005_distribusi_list->isGridEdit()) { // Grid edit
			if ($t005_distribusi->EventCancelled)
				$t005_distribusi_list->restoreCurrentRowFormValues($t005_distribusi_list->RowIndex); // Restore form values
			if ($t005_distribusi_list->RowAction == "insert")
				$t005_distribusi->RowType = ROWTYPE_ADD; // Render add
			else
				$t005_distribusi->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t005_distribusi_list->isGridEdit() && ($t005_distribusi->RowType == ROWTYPE_EDIT || $t005_distribusi->RowType == ROWTYPE_ADD) && $t005_distribusi->EventCancelled) // Update failed
			$t005_distribusi_list->restoreCurrentRowFormValues($t005_distribusi_list->RowIndex); // Restore form values
		if ($t005_distribusi->RowType == ROWTYPE_EDIT) // Edit row
			$t005_distribusi_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t005_distribusi->RowAttrs->merge(["data-rowindex" => $t005_distribusi_list->RowCount, "id" => "r" . $t005_distribusi_list->RowCount . "_t005_distribusi", "data-rowtype" => $t005_distribusi->RowType]);

		// Render row
		$t005_distribusi_list->renderRow();

		// Render list options
		$t005_distribusi_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t005_distribusi_list->RowAction != "delete" && $t005_distribusi_list->RowAction != "insertdelete" && !($t005_distribusi_list->RowAction == "insert" && $t005_distribusi->isConfirm() && $t005_distribusi_list->emptyRow())) {
?>
	<tr <?php echo $t005_distribusi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t005_distribusi_list->ListOptions->render("body", "left", $t005_distribusi_list->RowCount);
?>
	<?php if ($t005_distribusi_list->source_id->Visible) { // source_id ?>
		<td data-name="source_id" <?php echo $t005_distribusi_list->source_id->cellAttributes() ?>>
<?php if ($t005_distribusi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_source_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t005_distribusi_list->RowIndex ?>_source_id"><?php echo EmptyValue(strval($t005_distribusi_list->source_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t005_distribusi_list->source_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t005_distribusi_list->source_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t005_distribusi_list->source_id->ReadOnly || $t005_distribusi_list->source_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t005_distribusi_list->RowIndex ?>_source_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t005_distribusi_list->source_id->Lookup->getParamTag($t005_distribusi_list, "p_x" . $t005_distribusi_list->RowIndex . "_source_id") ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_source_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t005_distribusi_list->source_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t005_distribusi_list->RowIndex ?>_source_id" id="x<?php echo $t005_distribusi_list->RowIndex ?>_source_id" value="<?php echo $t005_distribusi_list->source_id->CurrentValue ?>"<?php echo $t005_distribusi_list->source_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_source_id" name="o<?php echo $t005_distribusi_list->RowIndex ?>_source_id" id="o<?php echo $t005_distribusi_list->RowIndex ?>_source_id" value="<?php echo HtmlEncode($t005_distribusi_list->source_id->OldValue) ?>">
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_source_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t005_distribusi_list->RowIndex ?>_source_id"><?php echo EmptyValue(strval($t005_distribusi_list->source_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t005_distribusi_list->source_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t005_distribusi_list->source_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t005_distribusi_list->source_id->ReadOnly || $t005_distribusi_list->source_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t005_distribusi_list->RowIndex ?>_source_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t005_distribusi_list->source_id->Lookup->getParamTag($t005_distribusi_list, "p_x" . $t005_distribusi_list->RowIndex . "_source_id") ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_source_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t005_distribusi_list->source_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t005_distribusi_list->RowIndex ?>_source_id" id="x<?php echo $t005_distribusi_list->RowIndex ?>_source_id" value="<?php echo $t005_distribusi_list->source_id->CurrentValue ?>"<?php echo $t005_distribusi_list->source_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_source_id">
<span<?php echo $t005_distribusi_list->source_id->viewAttributes() ?>><?php echo $t005_distribusi_list->source_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_id" name="x<?php echo $t005_distribusi_list->RowIndex ?>_id" id="x<?php echo $t005_distribusi_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_distribusi_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t005_distribusi" data-field="x_id" name="o<?php echo $t005_distribusi_list->RowIndex ?>_id" id="o<?php echo $t005_distribusi_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_distribusi_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_EDIT || $t005_distribusi->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_id" name="x<?php echo $t005_distribusi_list->RowIndex ?>_id" id="x<?php echo $t005_distribusi_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_distribusi_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t005_distribusi_list->destination_id->Visible) { // destination_id ?>
		<td data-name="destination_id" <?php echo $t005_distribusi_list->destination_id->cellAttributes() ?>>
<?php if ($t005_distribusi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_destination_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id"><?php echo EmptyValue(strval($t005_distribusi_list->destination_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t005_distribusi_list->destination_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t005_distribusi_list->destination_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t005_distribusi_list->destination_id->ReadOnly || $t005_distribusi_list->destination_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t005_distribusi_list->destination_id->Lookup->getParamTag($t005_distribusi_list, "p_x" . $t005_distribusi_list->RowIndex . "_destination_id") ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_destination_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t005_distribusi_list->destination_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" id="x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" value="<?php echo $t005_distribusi_list->destination_id->CurrentValue ?>"<?php echo $t005_distribusi_list->destination_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_destination_id" name="o<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" id="o<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" value="<?php echo HtmlEncode($t005_distribusi_list->destination_id->OldValue) ?>">
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_destination_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id"><?php echo EmptyValue(strval($t005_distribusi_list->destination_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t005_distribusi_list->destination_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t005_distribusi_list->destination_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t005_distribusi_list->destination_id->ReadOnly || $t005_distribusi_list->destination_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t005_distribusi_list->destination_id->Lookup->getParamTag($t005_distribusi_list, "p_x" . $t005_distribusi_list->RowIndex . "_destination_id") ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_destination_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t005_distribusi_list->destination_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" id="x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" value="<?php echo $t005_distribusi_list->destination_id->CurrentValue ?>"<?php echo $t005_distribusi_list->destination_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_destination_id">
<span<?php echo $t005_distribusi_list->destination_id->viewAttributes() ?>><?php echo $t005_distribusi_list->destination_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_distribusi_list->Jarak->Visible) { // Jarak ?>
		<td data-name="Jarak" <?php echo $t005_distribusi_list->Jarak->cellAttributes() ?>>
<?php if ($t005_distribusi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_Jarak" class="form-group">
<input type="text" data-table="t005_distribusi" data-field="x_Jarak" name="x<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" id="x<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->Jarak->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->Jarak->EditValue ?>"<?php echo $t005_distribusi_list->Jarak->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_Jarak" name="o<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" id="o<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" value="<?php echo HtmlEncode($t005_distribusi_list->Jarak->OldValue) ?>">
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_Jarak" class="form-group">
<input type="text" data-table="t005_distribusi" data-field="x_Jarak" name="x<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" id="x<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->Jarak->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->Jarak->EditValue ?>"<?php echo $t005_distribusi_list->Jarak->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_Jarak">
<span<?php echo $t005_distribusi_list->Jarak->viewAttributes() ?>><?php echo $t005_distribusi_list->Jarak->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_distribusi_list->RateO->Visible) { // RateO ?>
		<td data-name="RateO" <?php echo $t005_distribusi_list->RateO->cellAttributes() ?>>
<?php if ($t005_distribusi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_RateO" class="form-group">
<input type="text" data-table="t005_distribusi" data-field="x_RateO" name="x<?php echo $t005_distribusi_list->RowIndex ?>_RateO" id="x<?php echo $t005_distribusi_list->RowIndex ?>_RateO" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->RateO->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->RateO->EditValue ?>"<?php echo $t005_distribusi_list->RateO->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_RateO" name="o<?php echo $t005_distribusi_list->RowIndex ?>_RateO" id="o<?php echo $t005_distribusi_list->RowIndex ?>_RateO" value="<?php echo HtmlEncode($t005_distribusi_list->RateO->OldValue) ?>">
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_RateO" class="form-group">
<input type="text" data-table="t005_distribusi" data-field="x_RateO" name="x<?php echo $t005_distribusi_list->RowIndex ?>_RateO" id="x<?php echo $t005_distribusi_list->RowIndex ?>_RateO" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->RateO->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->RateO->EditValue ?>"<?php echo $t005_distribusi_list->RateO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_RateO">
<span<?php echo $t005_distribusi_list->RateO->viewAttributes() ?>><?php echo $t005_distribusi_list->RateO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_distribusi_list->RateD->Visible) { // RateD ?>
		<td data-name="RateD" <?php echo $t005_distribusi_list->RateD->cellAttributes() ?>>
<?php if ($t005_distribusi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_RateD" class="form-group">
<input type="text" data-table="t005_distribusi" data-field="x_RateD" name="x<?php echo $t005_distribusi_list->RowIndex ?>_RateD" id="x<?php echo $t005_distribusi_list->RowIndex ?>_RateD" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->RateD->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->RateD->EditValue ?>"<?php echo $t005_distribusi_list->RateD->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_RateD" name="o<?php echo $t005_distribusi_list->RowIndex ?>_RateD" id="o<?php echo $t005_distribusi_list->RowIndex ?>_RateD" value="<?php echo HtmlEncode($t005_distribusi_list->RateD->OldValue) ?>">
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_RateD" class="form-group">
<input type="text" data-table="t005_distribusi" data-field="x_RateD" name="x<?php echo $t005_distribusi_list->RowIndex ?>_RateD" id="x<?php echo $t005_distribusi_list->RowIndex ?>_RateD" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->RateD->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->RateD->EditValue ?>"<?php echo $t005_distribusi_list->RateD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_RateD">
<span<?php echo $t005_distribusi_list->RateD->viewAttributes() ?>><?php echo $t005_distribusi_list->RateD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_distribusi_list->Demand->Visible) { // Demand ?>
		<td data-name="Demand" <?php echo $t005_distribusi_list->Demand->cellAttributes() ?>>
<?php if ($t005_distribusi->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_Demand" class="form-group">
<input type="text" data-table="t005_distribusi" data-field="x_Demand" name="x<?php echo $t005_distribusi_list->RowIndex ?>_Demand" id="x<?php echo $t005_distribusi_list->RowIndex ?>_Demand" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->Demand->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->Demand->EditValue ?>"<?php echo $t005_distribusi_list->Demand->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_Demand" name="o<?php echo $t005_distribusi_list->RowIndex ?>_Demand" id="o<?php echo $t005_distribusi_list->RowIndex ?>_Demand" value="<?php echo HtmlEncode($t005_distribusi_list->Demand->OldValue) ?>">
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_Demand" class="form-group">
<input type="text" data-table="t005_distribusi" data-field="x_Demand" name="x<?php echo $t005_distribusi_list->RowIndex ?>_Demand" id="x<?php echo $t005_distribusi_list->RowIndex ?>_Demand" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->Demand->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->Demand->EditValue ?>"<?php echo $t005_distribusi_list->Demand->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_distribusi->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_distribusi_list->RowCount ?>_t005_distribusi_Demand">
<span<?php echo $t005_distribusi_list->Demand->viewAttributes() ?>><?php echo $t005_distribusi_list->Demand->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t005_distribusi_list->ListOptions->render("body", "right", $t005_distribusi_list->RowCount);
?>
	</tr>
<?php if ($t005_distribusi->RowType == ROWTYPE_ADD || $t005_distribusi->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft005_distribusilist", "load"], function() {
	ft005_distribusilist.updateLists(<?php echo $t005_distribusi_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t005_distribusi_list->isGridAdd())
		if (!$t005_distribusi_list->Recordset->EOF)
			$t005_distribusi_list->Recordset->moveNext();
}
?>
<?php
	if ($t005_distribusi_list->isGridAdd() || $t005_distribusi_list->isGridEdit()) {
		$t005_distribusi_list->RowIndex = '$rowindex$';
		$t005_distribusi_list->loadRowValues();

		// Set row properties
		$t005_distribusi->resetAttributes();
		$t005_distribusi->RowAttrs->merge(["data-rowindex" => $t005_distribusi_list->RowIndex, "id" => "r0_t005_distribusi", "data-rowtype" => ROWTYPE_ADD]);
		$t005_distribusi->RowAttrs->appendClass("ew-template");
		$t005_distribusi->RowType = ROWTYPE_ADD;

		// Render row
		$t005_distribusi_list->renderRow();

		// Render list options
		$t005_distribusi_list->renderListOptions();
		$t005_distribusi_list->StartRowCount = 0;
?>
	<tr <?php echo $t005_distribusi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t005_distribusi_list->ListOptions->render("body", "left", $t005_distribusi_list->RowIndex);
?>
	<?php if ($t005_distribusi_list->source_id->Visible) { // source_id ?>
		<td data-name="source_id">
<span id="el$rowindex$_t005_distribusi_source_id" class="form-group t005_distribusi_source_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t005_distribusi_list->RowIndex ?>_source_id"><?php echo EmptyValue(strval($t005_distribusi_list->source_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t005_distribusi_list->source_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t005_distribusi_list->source_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t005_distribusi_list->source_id->ReadOnly || $t005_distribusi_list->source_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t005_distribusi_list->RowIndex ?>_source_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t005_distribusi_list->source_id->Lookup->getParamTag($t005_distribusi_list, "p_x" . $t005_distribusi_list->RowIndex . "_source_id") ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_source_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t005_distribusi_list->source_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t005_distribusi_list->RowIndex ?>_source_id" id="x<?php echo $t005_distribusi_list->RowIndex ?>_source_id" value="<?php echo $t005_distribusi_list->source_id->CurrentValue ?>"<?php echo $t005_distribusi_list->source_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_source_id" name="o<?php echo $t005_distribusi_list->RowIndex ?>_source_id" id="o<?php echo $t005_distribusi_list->RowIndex ?>_source_id" value="<?php echo HtmlEncode($t005_distribusi_list->source_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_distribusi_list->destination_id->Visible) { // destination_id ?>
		<td data-name="destination_id">
<span id="el$rowindex$_t005_distribusi_destination_id" class="form-group t005_distribusi_destination_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id"><?php echo EmptyValue(strval($t005_distribusi_list->destination_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t005_distribusi_list->destination_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t005_distribusi_list->destination_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t005_distribusi_list->destination_id->ReadOnly || $t005_distribusi_list->destination_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t005_distribusi_list->destination_id->Lookup->getParamTag($t005_distribusi_list, "p_x" . $t005_distribusi_list->RowIndex . "_destination_id") ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_destination_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t005_distribusi_list->destination_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" id="x<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" value="<?php echo $t005_distribusi_list->destination_id->CurrentValue ?>"<?php echo $t005_distribusi_list->destination_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_destination_id" name="o<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" id="o<?php echo $t005_distribusi_list->RowIndex ?>_destination_id" value="<?php echo HtmlEncode($t005_distribusi_list->destination_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_distribusi_list->Jarak->Visible) { // Jarak ?>
		<td data-name="Jarak">
<span id="el$rowindex$_t005_distribusi_Jarak" class="form-group t005_distribusi_Jarak">
<input type="text" data-table="t005_distribusi" data-field="x_Jarak" name="x<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" id="x<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->Jarak->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->Jarak->EditValue ?>"<?php echo $t005_distribusi_list->Jarak->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_Jarak" name="o<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" id="o<?php echo $t005_distribusi_list->RowIndex ?>_Jarak" value="<?php echo HtmlEncode($t005_distribusi_list->Jarak->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_distribusi_list->RateO->Visible) { // RateO ?>
		<td data-name="RateO">
<span id="el$rowindex$_t005_distribusi_RateO" class="form-group t005_distribusi_RateO">
<input type="text" data-table="t005_distribusi" data-field="x_RateO" name="x<?php echo $t005_distribusi_list->RowIndex ?>_RateO" id="x<?php echo $t005_distribusi_list->RowIndex ?>_RateO" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->RateO->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->RateO->EditValue ?>"<?php echo $t005_distribusi_list->RateO->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_RateO" name="o<?php echo $t005_distribusi_list->RowIndex ?>_RateO" id="o<?php echo $t005_distribusi_list->RowIndex ?>_RateO" value="<?php echo HtmlEncode($t005_distribusi_list->RateO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_distribusi_list->RateD->Visible) { // RateD ?>
		<td data-name="RateD">
<span id="el$rowindex$_t005_distribusi_RateD" class="form-group t005_distribusi_RateD">
<input type="text" data-table="t005_distribusi" data-field="x_RateD" name="x<?php echo $t005_distribusi_list->RowIndex ?>_RateD" id="x<?php echo $t005_distribusi_list->RowIndex ?>_RateD" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->RateD->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->RateD->EditValue ?>"<?php echo $t005_distribusi_list->RateD->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_RateD" name="o<?php echo $t005_distribusi_list->RowIndex ?>_RateD" id="o<?php echo $t005_distribusi_list->RowIndex ?>_RateD" value="<?php echo HtmlEncode($t005_distribusi_list->RateD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_distribusi_list->Demand->Visible) { // Demand ?>
		<td data-name="Demand">
<span id="el$rowindex$_t005_distribusi_Demand" class="form-group t005_distribusi_Demand">
<input type="text" data-table="t005_distribusi" data-field="x_Demand" name="x<?php echo $t005_distribusi_list->RowIndex ?>_Demand" id="x<?php echo $t005_distribusi_list->RowIndex ?>_Demand" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_list->Demand->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_list->Demand->EditValue ?>"<?php echo $t005_distribusi_list->Demand->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_distribusi" data-field="x_Demand" name="o<?php echo $t005_distribusi_list->RowIndex ?>_Demand" id="o<?php echo $t005_distribusi_list->RowIndex ?>_Demand" value="<?php echo HtmlEncode($t005_distribusi_list->Demand->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t005_distribusi_list->ListOptions->render("body", "right", $t005_distribusi_list->RowIndex);
?>
<script>
loadjs.ready(["ft005_distribusilist", "load"], function() {
	ft005_distribusilist.updateLists(<?php echo $t005_distribusi_list->RowIndex ?>);
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
<?php if ($t005_distribusi_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t005_distribusi_list->FormKeyCountName ?>" id="<?php echo $t005_distribusi_list->FormKeyCountName ?>" value="<?php echo $t005_distribusi_list->KeyCount ?>">
<?php echo $t005_distribusi_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t005_distribusi_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t005_distribusi_list->FormKeyCountName ?>" id="<?php echo $t005_distribusi_list->FormKeyCountName ?>" value="<?php echo $t005_distribusi_list->KeyCount ?>">
<?php echo $t005_distribusi_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t005_distribusi->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t005_distribusi_list->Recordset)
	$t005_distribusi_list->Recordset->Close();
?>
<?php if (!$t005_distribusi_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t005_distribusi_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t005_distribusi_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t005_distribusi_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t005_distribusi_list->TotalRecords == 0 && !$t005_distribusi->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t005_distribusi_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t005_distribusi_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t005_distribusi_list->isExport()) { ?>
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
$t005_distribusi_list->terminate();
?>