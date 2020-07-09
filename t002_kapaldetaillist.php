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
$t002_kapaldetail_list = new t002_kapaldetail_list();

// Run the page
$t002_kapaldetail_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_kapaldetail_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_kapaldetail_list->isExport()) { ?>
<script>
var ft002_kapaldetaillist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft002_kapaldetaillist = currentForm = new ew.Form("ft002_kapaldetaillist", "list");
	ft002_kapaldetaillist.formKeyCountName = '<?php echo $t002_kapaldetail_list->FormKeyCountName ?>';

	// Validate form
	ft002_kapaldetaillist.validate = function() {
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
			<?php if ($t002_kapaldetail_list->Payload->Required) { ?>
				elm = this.getElements("x" + infix + "_Payload");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_list->Payload->caption(), $t002_kapaldetail_list->Payload->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Payload");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_list->Payload->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_list->DischRate->Required) { ?>
				elm = this.getElements("x" + infix + "_DischRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_list->DischRate->caption(), $t002_kapaldetail_list->DischRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DischRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_list->DischRate->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_list->Tch->Required) { ?>
				elm = this.getElements("x" + infix + "_Tch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_list->Tch->caption(), $t002_kapaldetail_list->Tch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tch");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_list->Tch->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_list->VarCost->Required) { ?>
				elm = this.getElements("x" + infix + "_VarCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_list->VarCost->caption(), $t002_kapaldetail_list->VarCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VarCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_list->VarCost->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_list->VsLaden->Required) { ?>
				elm = this.getElements("x" + infix + "_VsLaden");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_list->VsLaden->caption(), $t002_kapaldetail_list->VsLaden->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VsLaden");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_list->VsLaden->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_list->VsBallast->Required) { ?>
				elm = this.getElements("x" + infix + "_VsBallast");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_list->VsBallast->caption(), $t002_kapaldetail_list->VsBallast->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VsBallast");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_list->VsBallast->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_list->ComDay->Required) { ?>
				elm = this.getElements("x" + infix + "_ComDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_list->ComDay->caption(), $t002_kapaldetail_list->ComDay->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComDay");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_list->ComDay->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_list->Jumlah->Required) { ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_list->Jumlah->caption(), $t002_kapaldetail_list->Jumlah->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_list->Jumlah->errorMessage()) ?>");

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
	ft002_kapaldetaillist.emptyRow = function(infix) {
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
	ft002_kapaldetaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_kapaldetaillist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_kapaldetaillist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_kapaldetail_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t002_kapaldetail_list->TotalRecords > 0 && $t002_kapaldetail_list->ExportOptions->visible()) { ?>
<?php $t002_kapaldetail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_kapaldetail_list->ImportOptions->visible()) { ?>
<?php $t002_kapaldetail_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t002_kapaldetail_list->isExport() || Config("EXPORT_MASTER_RECORD") && $t002_kapaldetail_list->isExport("print")) { ?>
<?php
if ($t002_kapaldetail_list->DbMasterFilter != "" && $t002_kapaldetail->getCurrentMasterTable() == "t001_kapal") {
	if ($t002_kapaldetail_list->MasterRecordExists) {
		include_once "t001_kapalmaster.php";
	}
}
?>
<?php } ?>
<?php
$t002_kapaldetail_list->renderOtherOptions();
?>
<?php $t002_kapaldetail_list->showPageHeader(); ?>
<?php
$t002_kapaldetail_list->showMessage();
?>
<?php if ($t002_kapaldetail_list->TotalRecords > 0 || $t002_kapaldetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_kapaldetail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_kapaldetail">
<form name="ft002_kapaldetaillist" id="ft002_kapaldetaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_kapaldetail">
<?php if ($t002_kapaldetail->getCurrentMasterTable() == "t001_kapal" && $t002_kapaldetail->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t001_kapal">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t002_kapaldetail_list->kapal_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_t002_kapaldetail" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t002_kapaldetail_list->TotalRecords > 0 || $t002_kapaldetail_list->isGridEdit()) { ?>
<table id="tbl_t002_kapaldetaillist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_kapaldetail->RowType = ROWTYPE_HEADER;

// Render list options
$t002_kapaldetail_list->renderListOptions();

// Render list options (header, left)
$t002_kapaldetail_list->ListOptions->render("header", "left");
?>
<?php if ($t002_kapaldetail_list->Payload->Visible) { // Payload ?>
	<?php if ($t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->Payload) == "") { ?>
		<th data-name="Payload" class="<?php echo $t002_kapaldetail_list->Payload->headerCellClass() ?>"><div id="elh_t002_kapaldetail_Payload" class="t002_kapaldetail_Payload"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->Payload->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Payload" class="<?php echo $t002_kapaldetail_list->Payload->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->Payload) ?>', 1);"><div id="elh_t002_kapaldetail_Payload" class="t002_kapaldetail_Payload">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->Payload->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_list->Payload->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_list->Payload->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_list->DischRate->Visible) { // DischRate ?>
	<?php if ($t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->DischRate) == "") { ?>
		<th data-name="DischRate" class="<?php echo $t002_kapaldetail_list->DischRate->headerCellClass() ?>"><div id="elh_t002_kapaldetail_DischRate" class="t002_kapaldetail_DischRate"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->DischRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DischRate" class="<?php echo $t002_kapaldetail_list->DischRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->DischRate) ?>', 1);"><div id="elh_t002_kapaldetail_DischRate" class="t002_kapaldetail_DischRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->DischRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_list->DischRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_list->DischRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_list->Tch->Visible) { // Tch ?>
	<?php if ($t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->Tch) == "") { ?>
		<th data-name="Tch" class="<?php echo $t002_kapaldetail_list->Tch->headerCellClass() ?>"><div id="elh_t002_kapaldetail_Tch" class="t002_kapaldetail_Tch"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->Tch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tch" class="<?php echo $t002_kapaldetail_list->Tch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->Tch) ?>', 1);"><div id="elh_t002_kapaldetail_Tch" class="t002_kapaldetail_Tch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->Tch->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_list->Tch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_list->Tch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_list->VarCost->Visible) { // VarCost ?>
	<?php if ($t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->VarCost) == "") { ?>
		<th data-name="VarCost" class="<?php echo $t002_kapaldetail_list->VarCost->headerCellClass() ?>"><div id="elh_t002_kapaldetail_VarCost" class="t002_kapaldetail_VarCost"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->VarCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VarCost" class="<?php echo $t002_kapaldetail_list->VarCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->VarCost) ?>', 1);"><div id="elh_t002_kapaldetail_VarCost" class="t002_kapaldetail_VarCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->VarCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_list->VarCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_list->VarCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_list->VsLaden->Visible) { // VsLaden ?>
	<?php if ($t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->VsLaden) == "") { ?>
		<th data-name="VsLaden" class="<?php echo $t002_kapaldetail_list->VsLaden->headerCellClass() ?>"><div id="elh_t002_kapaldetail_VsLaden" class="t002_kapaldetail_VsLaden"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->VsLaden->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VsLaden" class="<?php echo $t002_kapaldetail_list->VsLaden->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->VsLaden) ?>', 1);"><div id="elh_t002_kapaldetail_VsLaden" class="t002_kapaldetail_VsLaden">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->VsLaden->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_list->VsLaden->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_list->VsLaden->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_list->VsBallast->Visible) { // VsBallast ?>
	<?php if ($t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->VsBallast) == "") { ?>
		<th data-name="VsBallast" class="<?php echo $t002_kapaldetail_list->VsBallast->headerCellClass() ?>"><div id="elh_t002_kapaldetail_VsBallast" class="t002_kapaldetail_VsBallast"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->VsBallast->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VsBallast" class="<?php echo $t002_kapaldetail_list->VsBallast->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->VsBallast) ?>', 1);"><div id="elh_t002_kapaldetail_VsBallast" class="t002_kapaldetail_VsBallast">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->VsBallast->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_list->VsBallast->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_list->VsBallast->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_list->ComDay->Visible) { // ComDay ?>
	<?php if ($t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->ComDay) == "") { ?>
		<th data-name="ComDay" class="<?php echo $t002_kapaldetail_list->ComDay->headerCellClass() ?>"><div id="elh_t002_kapaldetail_ComDay" class="t002_kapaldetail_ComDay"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->ComDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComDay" class="<?php echo $t002_kapaldetail_list->ComDay->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->ComDay) ?>', 1);"><div id="elh_t002_kapaldetail_ComDay" class="t002_kapaldetail_ComDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->ComDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_list->ComDay->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_list->ComDay->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_kapaldetail_list->Jumlah->Visible) { // Jumlah ?>
	<?php if ($t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->Jumlah) == "") { ?>
		<th data-name="Jumlah" class="<?php echo $t002_kapaldetail_list->Jumlah->headerCellClass() ?>"><div id="elh_t002_kapaldetail_Jumlah" class="t002_kapaldetail_Jumlah"><div class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->Jumlah->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jumlah" class="<?php echo $t002_kapaldetail_list->Jumlah->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_kapaldetail_list->SortUrl($t002_kapaldetail_list->Jumlah) ?>', 1);"><div id="elh_t002_kapaldetail_Jumlah" class="t002_kapaldetail_Jumlah">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_kapaldetail_list->Jumlah->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_kapaldetail_list->Jumlah->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_kapaldetail_list->Jumlah->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_kapaldetail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t002_kapaldetail_list->ExportAll && $t002_kapaldetail_list->isExport()) {
	$t002_kapaldetail_list->StopRecord = $t002_kapaldetail_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t002_kapaldetail_list->TotalRecords > $t002_kapaldetail_list->StartRecord + $t002_kapaldetail_list->DisplayRecords - 1)
		$t002_kapaldetail_list->StopRecord = $t002_kapaldetail_list->StartRecord + $t002_kapaldetail_list->DisplayRecords - 1;
	else
		$t002_kapaldetail_list->StopRecord = $t002_kapaldetail_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t002_kapaldetail->isConfirm() || $t002_kapaldetail_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t002_kapaldetail_list->FormKeyCountName) && ($t002_kapaldetail_list->isGridAdd() || $t002_kapaldetail_list->isGridEdit() || $t002_kapaldetail->isConfirm())) {
		$t002_kapaldetail_list->KeyCount = $CurrentForm->getValue($t002_kapaldetail_list->FormKeyCountName);
		$t002_kapaldetail_list->StopRecord = $t002_kapaldetail_list->StartRecord + $t002_kapaldetail_list->KeyCount - 1;
	}
}
$t002_kapaldetail_list->RecordCount = $t002_kapaldetail_list->StartRecord - 1;
if ($t002_kapaldetail_list->Recordset && !$t002_kapaldetail_list->Recordset->EOF) {
	$t002_kapaldetail_list->Recordset->moveFirst();
	$selectLimit = $t002_kapaldetail_list->UseSelectLimit;
	if (!$selectLimit && $t002_kapaldetail_list->StartRecord > 1)
		$t002_kapaldetail_list->Recordset->move($t002_kapaldetail_list->StartRecord - 1);
} elseif (!$t002_kapaldetail->AllowAddDeleteRow && $t002_kapaldetail_list->StopRecord == 0) {
	$t002_kapaldetail_list->StopRecord = $t002_kapaldetail->GridAddRowCount;
}

// Initialize aggregate
$t002_kapaldetail->RowType = ROWTYPE_AGGREGATEINIT;
$t002_kapaldetail->resetAttributes();
$t002_kapaldetail_list->renderRow();
if ($t002_kapaldetail_list->isGridAdd())
	$t002_kapaldetail_list->RowIndex = 0;
if ($t002_kapaldetail_list->isGridEdit())
	$t002_kapaldetail_list->RowIndex = 0;
while ($t002_kapaldetail_list->RecordCount < $t002_kapaldetail_list->StopRecord) {
	$t002_kapaldetail_list->RecordCount++;
	if ($t002_kapaldetail_list->RecordCount >= $t002_kapaldetail_list->StartRecord) {
		$t002_kapaldetail_list->RowCount++;
		if ($t002_kapaldetail_list->isGridAdd() || $t002_kapaldetail_list->isGridEdit() || $t002_kapaldetail->isConfirm()) {
			$t002_kapaldetail_list->RowIndex++;
			$CurrentForm->Index = $t002_kapaldetail_list->RowIndex;
			if ($CurrentForm->hasValue($t002_kapaldetail_list->FormActionName) && ($t002_kapaldetail->isConfirm() || $t002_kapaldetail_list->EventCancelled))
				$t002_kapaldetail_list->RowAction = strval($CurrentForm->getValue($t002_kapaldetail_list->FormActionName));
			elseif ($t002_kapaldetail_list->isGridAdd())
				$t002_kapaldetail_list->RowAction = "insert";
			else
				$t002_kapaldetail_list->RowAction = "";
		}

		// Set up key count
		$t002_kapaldetail_list->KeyCount = $t002_kapaldetail_list->RowIndex;

		// Init row class and style
		$t002_kapaldetail->resetAttributes();
		$t002_kapaldetail->CssClass = "";
		if ($t002_kapaldetail_list->isGridAdd()) {
			$t002_kapaldetail_list->loadRowValues(); // Load default values
		} else {
			$t002_kapaldetail_list->loadRowValues($t002_kapaldetail_list->Recordset); // Load row values
		}
		$t002_kapaldetail->RowType = ROWTYPE_VIEW; // Render view
		if ($t002_kapaldetail_list->isGridAdd()) // Grid add
			$t002_kapaldetail->RowType = ROWTYPE_ADD; // Render add
		if ($t002_kapaldetail_list->isGridAdd() && $t002_kapaldetail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t002_kapaldetail_list->restoreCurrentRowFormValues($t002_kapaldetail_list->RowIndex); // Restore form values
		if ($t002_kapaldetail_list->isGridEdit()) { // Grid edit
			if ($t002_kapaldetail->EventCancelled)
				$t002_kapaldetail_list->restoreCurrentRowFormValues($t002_kapaldetail_list->RowIndex); // Restore form values
			if ($t002_kapaldetail_list->RowAction == "insert")
				$t002_kapaldetail->RowType = ROWTYPE_ADD; // Render add
			else
				$t002_kapaldetail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t002_kapaldetail_list->isGridEdit() && ($t002_kapaldetail->RowType == ROWTYPE_EDIT || $t002_kapaldetail->RowType == ROWTYPE_ADD) && $t002_kapaldetail->EventCancelled) // Update failed
			$t002_kapaldetail_list->restoreCurrentRowFormValues($t002_kapaldetail_list->RowIndex); // Restore form values
		if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) // Edit row
			$t002_kapaldetail_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t002_kapaldetail->RowAttrs->merge(["data-rowindex" => $t002_kapaldetail_list->RowCount, "id" => "r" . $t002_kapaldetail_list->RowCount . "_t002_kapaldetail", "data-rowtype" => $t002_kapaldetail->RowType]);

		// Render row
		$t002_kapaldetail_list->renderRow();

		// Render list options
		$t002_kapaldetail_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t002_kapaldetail_list->RowAction != "delete" && $t002_kapaldetail_list->RowAction != "insertdelete" && !($t002_kapaldetail_list->RowAction == "insert" && $t002_kapaldetail->isConfirm() && $t002_kapaldetail_list->emptyRow())) {
?>
	<tr <?php echo $t002_kapaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_kapaldetail_list->ListOptions->render("body", "left", $t002_kapaldetail_list->RowCount);
?>
	<?php if ($t002_kapaldetail_list->Payload->Visible) { // Payload ?>
		<td data-name="Payload" <?php echo $t002_kapaldetail_list->Payload->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_Payload" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Payload" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->Payload->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->Payload->EditValue ?>"<?php echo $t002_kapaldetail_list->Payload->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Payload" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" value="<?php echo HtmlEncode($t002_kapaldetail_list->Payload->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_Payload" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Payload" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->Payload->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->Payload->EditValue ?>"<?php echo $t002_kapaldetail_list->Payload->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_Payload">
<span<?php echo $t002_kapaldetail_list->Payload->viewAttributes() ?>><?php echo $t002_kapaldetail_list->Payload->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_id" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_id" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_kapaldetail_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t002_kapaldetail" data-field="x_id" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_id" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_kapaldetail_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT || $t002_kapaldetail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_id" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_id" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_kapaldetail_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t002_kapaldetail_list->DischRate->Visible) { // DischRate ?>
		<td data-name="DischRate" <?php echo $t002_kapaldetail_list->DischRate->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_DischRate" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_DischRate" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->DischRate->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->DischRate->EditValue ?>"<?php echo $t002_kapaldetail_list->DischRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_DischRate" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" value="<?php echo HtmlEncode($t002_kapaldetail_list->DischRate->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_DischRate" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_DischRate" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->DischRate->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->DischRate->EditValue ?>"<?php echo $t002_kapaldetail_list->DischRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_DischRate">
<span<?php echo $t002_kapaldetail_list->DischRate->viewAttributes() ?>><?php echo $t002_kapaldetail_list->DischRate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->Tch->Visible) { // Tch ?>
		<td data-name="Tch" <?php echo $t002_kapaldetail_list->Tch->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_Tch" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Tch" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->Tch->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->Tch->EditValue ?>"<?php echo $t002_kapaldetail_list->Tch->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Tch" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" value="<?php echo HtmlEncode($t002_kapaldetail_list->Tch->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_Tch" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Tch" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->Tch->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->Tch->EditValue ?>"<?php echo $t002_kapaldetail_list->Tch->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_Tch">
<span<?php echo $t002_kapaldetail_list->Tch->viewAttributes() ?>><?php echo $t002_kapaldetail_list->Tch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->VarCost->Visible) { // VarCost ?>
		<td data-name="VarCost" <?php echo $t002_kapaldetail_list->VarCost->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_VarCost" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VarCost" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->VarCost->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->VarCost->EditValue ?>"<?php echo $t002_kapaldetail_list->VarCost->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VarCost" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" value="<?php echo HtmlEncode($t002_kapaldetail_list->VarCost->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_VarCost" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VarCost" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->VarCost->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->VarCost->EditValue ?>"<?php echo $t002_kapaldetail_list->VarCost->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_VarCost">
<span<?php echo $t002_kapaldetail_list->VarCost->viewAttributes() ?>><?php echo $t002_kapaldetail_list->VarCost->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->VsLaden->Visible) { // VsLaden ?>
		<td data-name="VsLaden" <?php echo $t002_kapaldetail_list->VsLaden->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_VsLaden" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->VsLaden->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->VsLaden->EditValue ?>"<?php echo $t002_kapaldetail_list->VsLaden->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsLaden" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" value="<?php echo HtmlEncode($t002_kapaldetail_list->VsLaden->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_VsLaden" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->VsLaden->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->VsLaden->EditValue ?>"<?php echo $t002_kapaldetail_list->VsLaden->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_VsLaden">
<span<?php echo $t002_kapaldetail_list->VsLaden->viewAttributes() ?>><?php echo $t002_kapaldetail_list->VsLaden->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->VsBallast->Visible) { // VsBallast ?>
		<td data-name="VsBallast" <?php echo $t002_kapaldetail_list->VsBallast->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_VsBallast" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->VsBallast->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->VsBallast->EditValue ?>"<?php echo $t002_kapaldetail_list->VsBallast->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsBallast" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" value="<?php echo HtmlEncode($t002_kapaldetail_list->VsBallast->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_VsBallast" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->VsBallast->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->VsBallast->EditValue ?>"<?php echo $t002_kapaldetail_list->VsBallast->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_VsBallast">
<span<?php echo $t002_kapaldetail_list->VsBallast->viewAttributes() ?>><?php echo $t002_kapaldetail_list->VsBallast->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->ComDay->Visible) { // ComDay ?>
		<td data-name="ComDay" <?php echo $t002_kapaldetail_list->ComDay->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_ComDay" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_ComDay" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->ComDay->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->ComDay->EditValue ?>"<?php echo $t002_kapaldetail_list->ComDay->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_ComDay" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" value="<?php echo HtmlEncode($t002_kapaldetail_list->ComDay->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_ComDay" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_ComDay" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->ComDay->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->ComDay->EditValue ?>"<?php echo $t002_kapaldetail_list->ComDay->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_ComDay">
<span<?php echo $t002_kapaldetail_list->ComDay->viewAttributes() ?>><?php echo $t002_kapaldetail_list->ComDay->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah" <?php echo $t002_kapaldetail_list->Jumlah->cellAttributes() ?>>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_Jumlah" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" size="10" maxlength="4" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->Jumlah->EditValue ?>"<?php echo $t002_kapaldetail_list->Jumlah->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Jumlah" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t002_kapaldetail_list->Jumlah->OldValue) ?>">
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_Jumlah" class="form-group">
<input type="text" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" size="10" maxlength="4" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->Jumlah->EditValue ?>"<?php echo $t002_kapaldetail_list->Jumlah->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_kapaldetail_list->RowCount ?>_t002_kapaldetail_Jumlah">
<span<?php echo $t002_kapaldetail_list->Jumlah->viewAttributes() ?>><?php echo $t002_kapaldetail_list->Jumlah->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_kapaldetail_list->ListOptions->render("body", "right", $t002_kapaldetail_list->RowCount);
?>
	</tr>
<?php if ($t002_kapaldetail->RowType == ROWTYPE_ADD || $t002_kapaldetail->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft002_kapaldetaillist", "load"], function() {
	ft002_kapaldetaillist.updateLists(<?php echo $t002_kapaldetail_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t002_kapaldetail_list->isGridAdd())
		if (!$t002_kapaldetail_list->Recordset->EOF)
			$t002_kapaldetail_list->Recordset->moveNext();
}
?>
<?php
	if ($t002_kapaldetail_list->isGridAdd() || $t002_kapaldetail_list->isGridEdit()) {
		$t002_kapaldetail_list->RowIndex = '$rowindex$';
		$t002_kapaldetail_list->loadRowValues();

		// Set row properties
		$t002_kapaldetail->resetAttributes();
		$t002_kapaldetail->RowAttrs->merge(["data-rowindex" => $t002_kapaldetail_list->RowIndex, "id" => "r0_t002_kapaldetail", "data-rowtype" => ROWTYPE_ADD]);
		$t002_kapaldetail->RowAttrs->appendClass("ew-template");
		$t002_kapaldetail->RowType = ROWTYPE_ADD;

		// Render row
		$t002_kapaldetail_list->renderRow();

		// Render list options
		$t002_kapaldetail_list->renderListOptions();
		$t002_kapaldetail_list->StartRowCount = 0;
?>
	<tr <?php echo $t002_kapaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_kapaldetail_list->ListOptions->render("body", "left", $t002_kapaldetail_list->RowIndex);
?>
	<?php if ($t002_kapaldetail_list->Payload->Visible) { // Payload ?>
		<td data-name="Payload">
<span id="el$rowindex$_t002_kapaldetail_Payload" class="form-group t002_kapaldetail_Payload">
<input type="text" data-table="t002_kapaldetail" data-field="x_Payload" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->Payload->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->Payload->EditValue ?>"<?php echo $t002_kapaldetail_list->Payload->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Payload" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Payload" value="<?php echo HtmlEncode($t002_kapaldetail_list->Payload->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->DischRate->Visible) { // DischRate ?>
		<td data-name="DischRate">
<span id="el$rowindex$_t002_kapaldetail_DischRate" class="form-group t002_kapaldetail_DischRate">
<input type="text" data-table="t002_kapaldetail" data-field="x_DischRate" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->DischRate->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->DischRate->EditValue ?>"<?php echo $t002_kapaldetail_list->DischRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_DischRate" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_DischRate" value="<?php echo HtmlEncode($t002_kapaldetail_list->DischRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->Tch->Visible) { // Tch ?>
		<td data-name="Tch">
<span id="el$rowindex$_t002_kapaldetail_Tch" class="form-group t002_kapaldetail_Tch">
<input type="text" data-table="t002_kapaldetail" data-field="x_Tch" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->Tch->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->Tch->EditValue ?>"<?php echo $t002_kapaldetail_list->Tch->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Tch" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Tch" value="<?php echo HtmlEncode($t002_kapaldetail_list->Tch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->VarCost->Visible) { // VarCost ?>
		<td data-name="VarCost">
<span id="el$rowindex$_t002_kapaldetail_VarCost" class="form-group t002_kapaldetail_VarCost">
<input type="text" data-table="t002_kapaldetail" data-field="x_VarCost" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->VarCost->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->VarCost->EditValue ?>"<?php echo $t002_kapaldetail_list->VarCost->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VarCost" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VarCost" value="<?php echo HtmlEncode($t002_kapaldetail_list->VarCost->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->VsLaden->Visible) { // VsLaden ?>
		<td data-name="VsLaden">
<span id="el$rowindex$_t002_kapaldetail_VsLaden" class="form-group t002_kapaldetail_VsLaden">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->VsLaden->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->VsLaden->EditValue ?>"<?php echo $t002_kapaldetail_list->VsLaden->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsLaden" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VsLaden" value="<?php echo HtmlEncode($t002_kapaldetail_list->VsLaden->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->VsBallast->Visible) { // VsBallast ?>
		<td data-name="VsBallast">
<span id="el$rowindex$_t002_kapaldetail_VsBallast" class="form-group t002_kapaldetail_VsBallast">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->VsBallast->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->VsBallast->EditValue ?>"<?php echo $t002_kapaldetail_list->VsBallast->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_VsBallast" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_VsBallast" value="<?php echo HtmlEncode($t002_kapaldetail_list->VsBallast->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->ComDay->Visible) { // ComDay ?>
		<td data-name="ComDay">
<span id="el$rowindex$_t002_kapaldetail_ComDay" class="form-group t002_kapaldetail_ComDay">
<input type="text" data-table="t002_kapaldetail" data-field="x_ComDay" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->ComDay->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->ComDay->EditValue ?>"<?php echo $t002_kapaldetail_list->ComDay->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_ComDay" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_ComDay" value="<?php echo HtmlEncode($t002_kapaldetail_list->ComDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_kapaldetail_list->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah">
<span id="el$rowindex$_t002_kapaldetail_Jumlah" class="form-group t002_kapaldetail_Jumlah">
<input type="text" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" id="x<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" size="10" maxlength="4" placeholder="<?php echo HtmlEncode($t002_kapaldetail_list->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_list->Jumlah->EditValue ?>"<?php echo $t002_kapaldetail_list->Jumlah->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_kapaldetail" data-field="x_Jumlah" name="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" id="o<?php echo $t002_kapaldetail_list->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t002_kapaldetail_list->Jumlah->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_kapaldetail_list->ListOptions->render("body", "right", $t002_kapaldetail_list->RowIndex);
?>
<script>
loadjs.ready(["ft002_kapaldetaillist", "load"], function() {
	ft002_kapaldetaillist.updateLists(<?php echo $t002_kapaldetail_list->RowIndex ?>);
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
<?php if ($t002_kapaldetail_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t002_kapaldetail_list->FormKeyCountName ?>" id="<?php echo $t002_kapaldetail_list->FormKeyCountName ?>" value="<?php echo $t002_kapaldetail_list->KeyCount ?>">
<?php echo $t002_kapaldetail_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t002_kapaldetail_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t002_kapaldetail_list->FormKeyCountName ?>" id="<?php echo $t002_kapaldetail_list->FormKeyCountName ?>" value="<?php echo $t002_kapaldetail_list->KeyCount ?>">
<?php echo $t002_kapaldetail_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t002_kapaldetail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_kapaldetail_list->Recordset)
	$t002_kapaldetail_list->Recordset->Close();
?>
<?php if (!$t002_kapaldetail_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t002_kapaldetail_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t002_kapaldetail_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_kapaldetail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_kapaldetail_list->TotalRecords == 0 && !$t002_kapaldetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_kapaldetail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t002_kapaldetail_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_kapaldetail_list->isExport()) { ?>
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
$t002_kapaldetail_list->terminate();
?>