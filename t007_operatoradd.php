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
$t007_operator_add = new t007_operator_add();

// Run the page
$t007_operator_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_operator_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft007_operatoradd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft007_operatoradd = currentForm = new ew.Form("ft007_operatoradd", "add");

	// Validate form
	ft007_operatoradd.validate = function() {
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
			<?php if ($t007_operator_add->Generasi->Required) { ?>
				elm = this.getElements("x" + infix + "_Generasi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_add->Generasi->caption(), $t007_operator_add->Generasi->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Generasi");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_add->Generasi->errorMessage()) ?>");
			<?php if ($t007_operator_add->Populasi->Required) { ?>
				elm = this.getElements("x" + infix + "_Populasi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_add->Populasi->caption(), $t007_operator_add->Populasi->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Populasi");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_add->Populasi->errorMessage()) ?>");
			<?php if ($t007_operator_add->Seleksi->Required) { ?>
				elm = this.getElements("x" + infix + "_Seleksi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_add->Seleksi->caption(), $t007_operator_add->Seleksi->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Seleksi");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_add->Seleksi->errorMessage()) ?>");
			<?php if ($t007_operator_add->CO->Required) { ?>
				elm = this.getElements("x" + infix + "_CO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_add->CO->caption(), $t007_operator_add->CO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CO");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_add->CO->errorMessage()) ?>");
			<?php if ($t007_operator_add->Mutasi->Required) { ?>
				elm = this.getElements("x" + infix + "_Mutasi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_operator_add->Mutasi->caption(), $t007_operator_add->Mutasi->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Mutasi");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_operator_add->Mutasi->errorMessage()) ?>");

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
	ft007_operatoradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft007_operatoradd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft007_operatoradd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t007_operator_add->showPageHeader(); ?>
<?php
$t007_operator_add->showMessage();
?>
<form name="ft007_operatoradd" id="ft007_operatoradd" class="<?php echo $t007_operator_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_operator">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t007_operator_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t007_operator_add->Generasi->Visible) { // Generasi ?>
	<div id="r_Generasi" class="form-group row">
		<label id="elh_t007_operator_Generasi" for="x_Generasi" class="<?php echo $t007_operator_add->LeftColumnClass ?>"><?php echo $t007_operator_add->Generasi->caption() ?><?php echo $t007_operator_add->Generasi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_operator_add->RightColumnClass ?>"><div <?php echo $t007_operator_add->Generasi->cellAttributes() ?>>
<span id="el_t007_operator_Generasi">
<input type="text" data-table="t007_operator" data-field="x_Generasi" name="x_Generasi" id="x_Generasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_add->Generasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_add->Generasi->EditValue ?>"<?php echo $t007_operator_add->Generasi->editAttributes() ?>>
</span>
<?php echo $t007_operator_add->Generasi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t007_operator_add->Populasi->Visible) { // Populasi ?>
	<div id="r_Populasi" class="form-group row">
		<label id="elh_t007_operator_Populasi" for="x_Populasi" class="<?php echo $t007_operator_add->LeftColumnClass ?>"><?php echo $t007_operator_add->Populasi->caption() ?><?php echo $t007_operator_add->Populasi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_operator_add->RightColumnClass ?>"><div <?php echo $t007_operator_add->Populasi->cellAttributes() ?>>
<span id="el_t007_operator_Populasi">
<input type="text" data-table="t007_operator" data-field="x_Populasi" name="x_Populasi" id="x_Populasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_add->Populasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_add->Populasi->EditValue ?>"<?php echo $t007_operator_add->Populasi->editAttributes() ?>>
</span>
<?php echo $t007_operator_add->Populasi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t007_operator_add->Seleksi->Visible) { // Seleksi ?>
	<div id="r_Seleksi" class="form-group row">
		<label id="elh_t007_operator_Seleksi" for="x_Seleksi" class="<?php echo $t007_operator_add->LeftColumnClass ?>"><?php echo $t007_operator_add->Seleksi->caption() ?><?php echo $t007_operator_add->Seleksi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_operator_add->RightColumnClass ?>"><div <?php echo $t007_operator_add->Seleksi->cellAttributes() ?>>
<span id="el_t007_operator_Seleksi">
<input type="text" data-table="t007_operator" data-field="x_Seleksi" name="x_Seleksi" id="x_Seleksi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_add->Seleksi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_add->Seleksi->EditValue ?>"<?php echo $t007_operator_add->Seleksi->editAttributes() ?>>
</span>
<?php echo $t007_operator_add->Seleksi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t007_operator_add->CO->Visible) { // CO ?>
	<div id="r_CO" class="form-group row">
		<label id="elh_t007_operator_CO" for="x_CO" class="<?php echo $t007_operator_add->LeftColumnClass ?>"><?php echo $t007_operator_add->CO->caption() ?><?php echo $t007_operator_add->CO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_operator_add->RightColumnClass ?>"><div <?php echo $t007_operator_add->CO->cellAttributes() ?>>
<span id="el_t007_operator_CO">
<input type="text" data-table="t007_operator" data-field="x_CO" name="x_CO" id="x_CO" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_add->CO->getPlaceHolder()) ?>" value="<?php echo $t007_operator_add->CO->EditValue ?>"<?php echo $t007_operator_add->CO->editAttributes() ?>>
</span>
<?php echo $t007_operator_add->CO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t007_operator_add->Mutasi->Visible) { // Mutasi ?>
	<div id="r_Mutasi" class="form-group row">
		<label id="elh_t007_operator_Mutasi" for="x_Mutasi" class="<?php echo $t007_operator_add->LeftColumnClass ?>"><?php echo $t007_operator_add->Mutasi->caption() ?><?php echo $t007_operator_add->Mutasi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_operator_add->RightColumnClass ?>"><div <?php echo $t007_operator_add->Mutasi->cellAttributes() ?>>
<span id="el_t007_operator_Mutasi">
<input type="text" data-table="t007_operator" data-field="x_Mutasi" name="x_Mutasi" id="x_Mutasi" size="5" maxlength="4" placeholder="<?php echo HtmlEncode($t007_operator_add->Mutasi->getPlaceHolder()) ?>" value="<?php echo $t007_operator_add->Mutasi->EditValue ?>"<?php echo $t007_operator_add->Mutasi->editAttributes() ?>>
</span>
<?php echo $t007_operator_add->Mutasi->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t007_operator_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t007_operator_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t007_operator_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t007_operator_add->showPageFooter();
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
$t007_operator_add->terminate();
?>