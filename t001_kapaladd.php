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
$t001_kapal_add = new t001_kapal_add();

// Run the page
$t001_kapal_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_kapal_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft001_kapaladd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft001_kapaladd = currentForm = new ew.Form("ft001_kapaladd", "add");

	// Validate form
	ft001_kapaladd.validate = function() {
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
			<?php if ($t001_kapal_add->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_kapal_add->Nama->caption(), $t001_kapal_add->Nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_kapal_add->Diproses->Required) { ?>
				elm = this.getElements("x" + infix + "_Diproses[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_kapal_add->Diproses->caption(), $t001_kapal_add->Diproses->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft001_kapaladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_kapaladd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft001_kapaladd.lists["x_Diproses[]"] = <?php echo $t001_kapal_add->Diproses->Lookup->toClientList($t001_kapal_add) ?>;
	ft001_kapaladd.lists["x_Diproses[]"].options = <?php echo JsonEncode($t001_kapal_add->Diproses->options(FALSE, TRUE)) ?>;
	loadjs.done("ft001_kapaladd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_kapal_add->showPageHeader(); ?>
<?php
$t001_kapal_add->showMessage();
?>
<form name="ft001_kapaladd" id="ft001_kapaladd" class="<?php echo $t001_kapal_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_kapal">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t001_kapal_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t001_kapal_add->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t001_kapal_Nama" for="x_Nama" class="<?php echo $t001_kapal_add->LeftColumnClass ?>"><?php echo $t001_kapal_add->Nama->caption() ?><?php echo $t001_kapal_add->Nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_kapal_add->RightColumnClass ?>"><div <?php echo $t001_kapal_add->Nama->cellAttributes() ?>>
<span id="el_t001_kapal_Nama">
<input type="text" data-table="t001_kapal" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t001_kapal_add->Nama->getPlaceHolder()) ?>" value="<?php echo $t001_kapal_add->Nama->EditValue ?>"<?php echo $t001_kapal_add->Nama->editAttributes() ?>>
</span>
<?php echo $t001_kapal_add->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_kapal_add->Diproses->Visible) { // Diproses ?>
	<div id="r_Diproses" class="form-group row">
		<label id="elh_t001_kapal_Diproses" class="<?php echo $t001_kapal_add->LeftColumnClass ?>"><?php echo $t001_kapal_add->Diproses->caption() ?><?php echo $t001_kapal_add->Diproses->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_kapal_add->RightColumnClass ?>"><div <?php echo $t001_kapal_add->Diproses->cellAttributes() ?>>
<span id="el_t001_kapal_Diproses">
<?php
$selwrk = ConvertToBool($t001_kapal_add->Diproses->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="t001_kapal" data-field="x_Diproses" name="x_Diproses[]" id="x_Diproses[]_199797" value="1"<?php echo $selwrk ?><?php echo $t001_kapal_add->Diproses->editAttributes() ?>>
	<label class="custom-control-label" for="x_Diproses[]_199797"></label>
</div>
</span>
<?php echo $t001_kapal_add->Diproses->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t002_kapaldetail", explode(",", $t001_kapal->getCurrentDetailTable())) && $t002_kapaldetail->DetailAdd) {
?>
<?php if ($t001_kapal->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t002_kapaldetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t002_kapaldetailgrid.php" ?>
<?php } ?>
<?php if (!$t001_kapal_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t001_kapal_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_kapal_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t001_kapal_add->showPageFooter();
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
$t001_kapal_add->terminate();
?>