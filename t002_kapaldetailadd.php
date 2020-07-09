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
$t002_kapaldetail_add = new t002_kapaldetail_add();

// Run the page
$t002_kapaldetail_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_kapaldetail_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_kapaldetailadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft002_kapaldetailadd = currentForm = new ew.Form("ft002_kapaldetailadd", "add");

	// Validate form
	ft002_kapaldetailadd.validate = function() {
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
			<?php if ($t002_kapaldetail_add->Payload->Required) { ?>
				elm = this.getElements("x" + infix + "_Payload");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_add->Payload->caption(), $t002_kapaldetail_add->Payload->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Payload");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_add->Payload->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_add->DischRate->Required) { ?>
				elm = this.getElements("x" + infix + "_DischRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_add->DischRate->caption(), $t002_kapaldetail_add->DischRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DischRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_add->DischRate->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_add->Tch->Required) { ?>
				elm = this.getElements("x" + infix + "_Tch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_add->Tch->caption(), $t002_kapaldetail_add->Tch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tch");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_add->Tch->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_add->VarCost->Required) { ?>
				elm = this.getElements("x" + infix + "_VarCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_add->VarCost->caption(), $t002_kapaldetail_add->VarCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VarCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_add->VarCost->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_add->VsLaden->Required) { ?>
				elm = this.getElements("x" + infix + "_VsLaden");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_add->VsLaden->caption(), $t002_kapaldetail_add->VsLaden->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VsLaden");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_add->VsLaden->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_add->VsBallast->Required) { ?>
				elm = this.getElements("x" + infix + "_VsBallast");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_add->VsBallast->caption(), $t002_kapaldetail_add->VsBallast->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VsBallast");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_add->VsBallast->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_add->ComDay->Required) { ?>
				elm = this.getElements("x" + infix + "_ComDay");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_add->ComDay->caption(), $t002_kapaldetail_add->ComDay->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComDay");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_add->ComDay->errorMessage()) ?>");
			<?php if ($t002_kapaldetail_add->Jumlah->Required) { ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_kapaldetail_add->Jumlah->caption(), $t002_kapaldetail_add->Jumlah->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jumlah");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t002_kapaldetail_add->Jumlah->errorMessage()) ?>");

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
	ft002_kapaldetailadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_kapaldetailadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_kapaldetailadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_kapaldetail_add->showPageHeader(); ?>
<?php
$t002_kapaldetail_add->showMessage();
?>
<form name="ft002_kapaldetailadd" id="ft002_kapaldetailadd" class="<?php echo $t002_kapaldetail_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_kapaldetail">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t002_kapaldetail_add->IsModal ?>">
<?php if ($t002_kapaldetail->getCurrentMasterTable() == "t001_kapal") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t001_kapal">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t002_kapaldetail_add->kapal_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($t002_kapaldetail_add->Payload->Visible) { // Payload ?>
	<div id="r_Payload" class="form-group row">
		<label id="elh_t002_kapaldetail_Payload" for="x_Payload" class="<?php echo $t002_kapaldetail_add->LeftColumnClass ?>"><?php echo $t002_kapaldetail_add->Payload->caption() ?><?php echo $t002_kapaldetail_add->Payload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_add->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_add->Payload->cellAttributes() ?>>
<span id="el_t002_kapaldetail_Payload">
<input type="text" data-table="t002_kapaldetail" data-field="x_Payload" name="x_Payload" id="x_Payload" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_add->Payload->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_add->Payload->EditValue ?>"<?php echo $t002_kapaldetail_add->Payload->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_add->Payload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_add->DischRate->Visible) { // DischRate ?>
	<div id="r_DischRate" class="form-group row">
		<label id="elh_t002_kapaldetail_DischRate" for="x_DischRate" class="<?php echo $t002_kapaldetail_add->LeftColumnClass ?>"><?php echo $t002_kapaldetail_add->DischRate->caption() ?><?php echo $t002_kapaldetail_add->DischRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_add->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_add->DischRate->cellAttributes() ?>>
<span id="el_t002_kapaldetail_DischRate">
<input type="text" data-table="t002_kapaldetail" data-field="x_DischRate" name="x_DischRate" id="x_DischRate" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_add->DischRate->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_add->DischRate->EditValue ?>"<?php echo $t002_kapaldetail_add->DischRate->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_add->DischRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_add->Tch->Visible) { // Tch ?>
	<div id="r_Tch" class="form-group row">
		<label id="elh_t002_kapaldetail_Tch" for="x_Tch" class="<?php echo $t002_kapaldetail_add->LeftColumnClass ?>"><?php echo $t002_kapaldetail_add->Tch->caption() ?><?php echo $t002_kapaldetail_add->Tch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_add->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_add->Tch->cellAttributes() ?>>
<span id="el_t002_kapaldetail_Tch">
<input type="text" data-table="t002_kapaldetail" data-field="x_Tch" name="x_Tch" id="x_Tch" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_add->Tch->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_add->Tch->EditValue ?>"<?php echo $t002_kapaldetail_add->Tch->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_add->Tch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_add->VarCost->Visible) { // VarCost ?>
	<div id="r_VarCost" class="form-group row">
		<label id="elh_t002_kapaldetail_VarCost" for="x_VarCost" class="<?php echo $t002_kapaldetail_add->LeftColumnClass ?>"><?php echo $t002_kapaldetail_add->VarCost->caption() ?><?php echo $t002_kapaldetail_add->VarCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_add->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_add->VarCost->cellAttributes() ?>>
<span id="el_t002_kapaldetail_VarCost">
<input type="text" data-table="t002_kapaldetail" data-field="x_VarCost" name="x_VarCost" id="x_VarCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_add->VarCost->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_add->VarCost->EditValue ?>"<?php echo $t002_kapaldetail_add->VarCost->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_add->VarCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_add->VsLaden->Visible) { // VsLaden ?>
	<div id="r_VsLaden" class="form-group row">
		<label id="elh_t002_kapaldetail_VsLaden" for="x_VsLaden" class="<?php echo $t002_kapaldetail_add->LeftColumnClass ?>"><?php echo $t002_kapaldetail_add->VsLaden->caption() ?><?php echo $t002_kapaldetail_add->VsLaden->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_add->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_add->VsLaden->cellAttributes() ?>>
<span id="el_t002_kapaldetail_VsLaden">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsLaden" name="x_VsLaden" id="x_VsLaden" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_add->VsLaden->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_add->VsLaden->EditValue ?>"<?php echo $t002_kapaldetail_add->VsLaden->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_add->VsLaden->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_add->VsBallast->Visible) { // VsBallast ?>
	<div id="r_VsBallast" class="form-group row">
		<label id="elh_t002_kapaldetail_VsBallast" for="x_VsBallast" class="<?php echo $t002_kapaldetail_add->LeftColumnClass ?>"><?php echo $t002_kapaldetail_add->VsBallast->caption() ?><?php echo $t002_kapaldetail_add->VsBallast->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_add->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_add->VsBallast->cellAttributes() ?>>
<span id="el_t002_kapaldetail_VsBallast">
<input type="text" data-table="t002_kapaldetail" data-field="x_VsBallast" name="x_VsBallast" id="x_VsBallast" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_add->VsBallast->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_add->VsBallast->EditValue ?>"<?php echo $t002_kapaldetail_add->VsBallast->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_add->VsBallast->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_add->ComDay->Visible) { // ComDay ?>
	<div id="r_ComDay" class="form-group row">
		<label id="elh_t002_kapaldetail_ComDay" for="x_ComDay" class="<?php echo $t002_kapaldetail_add->LeftColumnClass ?>"><?php echo $t002_kapaldetail_add->ComDay->caption() ?><?php echo $t002_kapaldetail_add->ComDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_add->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_add->ComDay->cellAttributes() ?>>
<span id="el_t002_kapaldetail_ComDay">
<input type="text" data-table="t002_kapaldetail" data-field="x_ComDay" name="x_ComDay" id="x_ComDay" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t002_kapaldetail_add->ComDay->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_add->ComDay->EditValue ?>"<?php echo $t002_kapaldetail_add->ComDay->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_add->ComDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_kapaldetail_add->Jumlah->Visible) { // Jumlah ?>
	<div id="r_Jumlah" class="form-group row">
		<label id="elh_t002_kapaldetail_Jumlah" for="x_Jumlah" class="<?php echo $t002_kapaldetail_add->LeftColumnClass ?>"><?php echo $t002_kapaldetail_add->Jumlah->caption() ?><?php echo $t002_kapaldetail_add->Jumlah->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_kapaldetail_add->RightColumnClass ?>"><div <?php echo $t002_kapaldetail_add->Jumlah->cellAttributes() ?>>
<span id="el_t002_kapaldetail_Jumlah">
<input type="text" data-table="t002_kapaldetail" data-field="x_Jumlah" name="x_Jumlah" id="x_Jumlah" size="10" maxlength="4" placeholder="<?php echo HtmlEncode($t002_kapaldetail_add->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t002_kapaldetail_add->Jumlah->EditValue ?>"<?php echo $t002_kapaldetail_add->Jumlah->editAttributes() ?>>
</span>
<?php echo $t002_kapaldetail_add->Jumlah->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<?php if (strval($t002_kapaldetail_add->kapal_id->getSessionValue()) != "") { ?>
	<input type="hidden" name="x_kapal_id" id="x_kapal_id" value="<?php echo HtmlEncode(strval($t002_kapaldetail_add->kapal_id->getSessionValue())) ?>">
	<?php } ?>
<?php if (!$t002_kapaldetail_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t002_kapaldetail_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_kapaldetail_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t002_kapaldetail_add->showPageFooter();
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
$t002_kapaldetail_add->terminate();
?>