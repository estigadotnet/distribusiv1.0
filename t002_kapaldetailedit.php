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
$t002_kapaldetail_edit = new t002_kapaldetail_edit();

// Run the page
$t002_kapaldetail_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_kapaldetail_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_kapaldetailedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft002_kapaldetailedit = currentForm = new ew.Form("ft002_kapaldetailedit", "edit");

	// Validate form
	ft002_kapaldetailedit.validate = function() {
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
			<?php if ($t002_kapaldetail_edit->Payload->Required) { ?>
				elm = this.getElements("x" + infix + "_Payload");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_edit->Payload->caption(), $t002_kapaldetail_edit->Payload->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Payload");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_edit->Payload->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_edit->DischRate->Required) { ?>
				elm = this.getElements("x" + infix + "_DischRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_edit->DischRate->caption(), $t002_kapaldetail_edit->DischRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DischRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_edit->DischRate->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_edit->Tch->Required) { ?>
				elm = this.getElements("x" + infix + "_Tch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_edit->Tch->caption(), $t002_kapaldetail_edit->Tch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tch");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_edit->Tch->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_edit->VarCost->Required) { ?>
				elm = this.getElements("x" + infix + "_VarCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_edit->VarCost->caption(), $t002_kapaldetail_edit->VarCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VarCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_edit->VarCost->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_edit->VsLaden->Required) { ?>
				elm = this.getElements("x" + infix + "_VsLaden");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_edit->VsLaden->caption(), $t002_kapaldetail_edit->VsLaden->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VsLaden");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_edit->VsLaden->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_edit->VsBallast->Required) { ?>
				elm = this.getElements("x" + infix + "_VsBallast");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_edit->VsBallast->caption(), $t002_kapaldetail_edit->VsBallast->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VsBallast");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_edit->VsBallast->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_edit->ComDay->Required) { ?>
				elm = this.getElements("x" + infix + "_ComDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_edit->ComDay->caption(), $t002_kapaldetail_edit->ComDay->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComDay");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_edit->ComDay->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_edit->Jumlah->Required) { ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_edit->Jumlah->caption(), $t002_kapaldetail_edit->Jumlah->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_edit->Jumlah->errorMessage()) ?>");

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
	ft002_kapaldetailedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_kapaldetailedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_kapaldetailedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_kapaldetail_edit->showPageHeader(); ?>
<?php
$t002_kapaldetail_edit->showMessage();
?>
<form name="ft002_kapaldetailedit" id="ft002_kapaldetailedit" class="<?php echo $t002_kapaldetail_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_kapaldetail">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t002_kapaldetail_edit->IsModal ?>">
<?php if ($t002_kapaldetail->getCurrentMasterTable() == "t001_kapal") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t001_kapal">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t002_kapaldetail_edit->kapal_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t002_kapaldetail_edit->Payload->Visible) { // Payload ?>
	<div id="r_Payload" class="form-group row">
		<label id="elh_t002_kapaldetail_Payload" for="x_Payload" class="<?php echo $t002_kapaldetail_edit->LeftColumnClass ?>"><?php echo $t002_kapaldetail_edit->Payload->caption() ?><?php echo $t002_kapaldetail_edit->Payload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_edit->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_edit->Payload->cellAttributes() ?>>
<span id="el_t002_kapaldetail_Payload">
<input type="text" data-table="t002_kapaldetail" data-field="x_Payload" name="x_Payload" id="x_Payload" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_edit->Payload->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_edit->Payload->EditValue ?>"<?php echo $t002_kapaldetail_edit->Payload->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_edit->Payload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_edit->DischRate->Visible) { // DischRate ?>
	<div id="r_DischRate" class="form-group row">
		<label id="elh_t002_kapaldetail_DischRate" for="x_DischRate" class="<?php echo $t002_kapaldetail_edit->LeftColumnClass ?>"><?php echo $t002_kapaldetail_edit->DischRate->caption() ?><?php echo $t002_kapaldetail_edit->DischRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_edit->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_edit->DischRate->cellAttributes() ?>>
<span id="el_t002_kapaldetail_DischRate">
<input type="text" data-table="t002_kapaldetail" data-field="x_DischRate" name="x_DischRate" id="x_DischRate" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_edit->DischRate->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_edit->DischRate->EditValue ?>"<?php echo $t002_kapaldetail_edit->DischRate->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_edit->DischRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_edit->Tch->Visible) { // Tch ?>
	<div id="r_Tch" class="form-group row">
		<label id="elh_t002_kapaldetail_Tch" for="x_Tch" class="<?php echo $t002_kapaldetail_edit->LeftColumnClass ?>"><?php echo $t002_kapaldetail_edit->Tch->caption() ?><?php echo $t002_kapaldetail_edit->Tch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_edit->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_edit->Tch->cellAttributes() ?>>
<span id="el_t002_kapaldetail_Tch">
<input type="text" data-table="t002_kapaldetail" data-field="x_Tch" name="x_Tch" id="x_Tch" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_edit->Tch->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_edit->Tch->EditValue ?>"<?php echo $t002_kapaldetail_edit->Tch->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_edit->Tch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_edit->VarCost->Visible) { // VarCost ?>
	<div id="r_VarCost" class="form-group row">
		<label id="elh_t002_kapaldetail_VarCost" for="x_VarCost" class="<?php echo $t002_kapaldetail_edit->LeftColumnClass ?>"><?php echo $t002_kapaldetail_edit->VarCost->caption() ?><?php echo $t002_kapaldetail_edit->VarCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_edit->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_edit->VarCost->cellAttributes() ?>>
<span id="el_t002_kapaldetail_VarCost">
<input type="text" data-table="t002_kapaldetail" data-field="x_VarCost" name="x_VarCost" id="x_VarCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_edit->VarCost->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_edit->VarCost->EditValue ?>"<?php echo $t002_kapaldetail_edit->VarCost->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_edit->VarCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_edit->VsLaden->Visible) { // VsLaden ?>
	<div id="r_VsLaden" class="form-group row">
		<label id="elh_t002_kapaldetail_VsLaden" for="x_VsLaden" class="<?php echo $t002_kapaldetail_edit->LeftColumnClass ?>"><?php echo $t002_kapaldetail_edit->VsLaden->caption() ?><?php echo $t002_kapaldetail_edit->VsLaden->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_edit->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_edit->VsLaden->cellAttributes() ?>>
<span id="el_t002_kapaldetail_VsLaden">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x_VsLaden" id="x_VsLaden" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_edit->VsLaden->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_edit->VsLaden->EditValue ?>"<?php echo $t002_kapaldetail_edit->VsLaden->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_edit->VsLaden->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_edit->VsBallast->Visible) { // VsBallast ?>
	<div id="r_VsBallast" class="form-group row">
		<label id="elh_t002_kapaldetail_VsBallast" for="x_VsBallast" class="<?php echo $t002_kapaldetail_edit->LeftColumnClass ?>"><?php echo $t002_kapaldetail_edit->VsBallast->caption() ?><?php echo $t002_kapaldetail_edit->VsBallast->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_edit->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_edit->VsBallast->cellAttributes() ?>>
<span id="el_t002_kapaldetail_VsBallast">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x_VsBallast" id="x_VsBallast" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_edit->VsBallast->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_edit->VsBallast->EditValue ?>"<?php echo $t002_kapaldetail_edit->VsBallast->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_edit->VsBallast->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_edit->ComDay->Visible) { // ComDay ?>
	<div id="r_ComDay" class="form-group row">
		<label id="elh_t002_kapaldetail_ComDay" for="x_ComDay" class="<?php echo $t002_kapaldetail_edit->LeftColumnClass ?>"><?php echo $t002_kapaldetail_edit->ComDay->caption() ?><?php echo $t002_kapaldetail_edit->ComDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_edit->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_edit->ComDay->cellAttributes() ?>>
<span id="el_t002_kapaldetail_ComDay">
<input type="text" data-table="t002_kapaldetail" data-field="x_ComDay" name="x_ComDay" id="x_ComDay" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_edit->ComDay->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_edit->ComDay->EditValue ?>"<?php echo $t002_kapaldetail_edit->ComDay->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_edit->ComDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_edit->Jumlah->Visible) { // Jumlah ?>
	<div id="r_Jumlah" class="form-group row">
		<label id="elh_t002_kapaldetail_Jumlah" for="x_Jumlah" class="<?php echo $t002_kapaldetail_edit->LeftColumnClass ?>"><?php echo $t002_kapaldetail_edit->Jumlah->caption() ?><?php echo $t002_kapaldetail_edit->Jumlah->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_edit->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_edit->Jumlah->cellAttributes() ?>>
<span id="el_t002_kapaldetail_Jumlah">
<input type="text" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x_Jumlah" id="x_Jumlah" size="10" maxlength="4" placeholder="<?php echo HtmlEncode($t002_kapaldetail_edit->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_edit->Jumlah->EditValue ?>"<?php echo $t002_kapaldetail_edit->Jumlah->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_edit->Jumlah->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t002_kapaldetail" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t002_kapaldetail_edit->id->CurrentValue) ?>">
<?php if (!$t002_kapaldetail_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t002_kapaldetail_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_kapaldetail_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t002_kapaldetail_edit->showPageFooter();
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
$t002_kapaldetail_edit->terminate();
?>