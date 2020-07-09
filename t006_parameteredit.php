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
$t006_parameter_edit = new t006_parameter_edit();

// Run the page
$t006_parameter_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_parameter_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft006_parameteredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft006_parameteredit = currentForm = new ew.Form("ft006_parameteredit", "edit");

	// Validate form
	ft006_parameteredit.validate = function() {
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
			<?php if ($t006_parameter_edit->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_parameter_edit->Nama->caption(), $t006_parameter_edit->Nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t006_parameter_edit->Nilai->Required) { ?>
				elm = this.getElements("x" + infix + "_Nilai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_parameter_edit->Nilai->caption(), $t006_parameter_edit->Nilai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t006_parameter_edit->Variabel->Required) { ?>
				elm = this.getElements("x" + infix + "_Variabel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_parameter_edit->Variabel->caption(), $t006_parameter_edit->Variabel->RequiredErrorMessage)) ?>");
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
	ft006_parameteredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft006_parameteredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft006_parameteredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t006_parameter_edit->showPageHeader(); ?>
<?php
$t006_parameter_edit->showMessage();
?>
<form name="ft006_parameteredit" id="ft006_parameteredit" class="<?php echo $t006_parameter_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_parameter">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t006_parameter_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t006_parameter_edit->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t006_parameter_Nama" for="x_Nama" class="<?php echo $t006_parameter_edit->LeftColumnClass ?>"><?php echo $t006_parameter_edit->Nama->caption() ?><?php echo $t006_parameter_edit->Nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_parameter_edit->RightColumnClass ?>"><div <?php echo $t006_parameter_edit->Nama->cellAttributes() ?>>
<span id="el_t006_parameter_Nama">
<input type="text" data-table="t006_parameter" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t006_parameter_edit->Nama->getPlaceHolder()) ?>" value="<?php echo $t006_parameter_edit->Nama->EditValue ?>"<?php echo $t006_parameter_edit->Nama->editAttributes() ?>>
</span>
<?php echo $t006_parameter_edit->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_parameter_edit->Nilai->Visible) { // Nilai ?>
	<div id="r_Nilai" class="form-group row">
		<label id="elh_t006_parameter_Nilai" for="x_Nilai" class="<?php echo $t006_parameter_edit->LeftColumnClass ?>"><?php echo $t006_parameter_edit->Nilai->caption() ?><?php echo $t006_parameter_edit->Nilai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_parameter_edit->RightColumnClass ?>"><div <?php echo $t006_parameter_edit->Nilai->cellAttributes() ?>>
<span id="el_t006_parameter_Nilai">
<textarea data-table="t006_parameter" data-field="x_Nilai" name="x_Nilai" id="x_Nilai" cols="35" rows="1" placeholder="<?php echo HtmlEncode($t006_parameter_edit->Nilai->getPlaceHolder()) ?>"<?php echo $t006_parameter_edit->Nilai->editAttributes() ?>><?php echo $t006_parameter_edit->Nilai->EditValue ?></textarea>
</span>
<?php echo $t006_parameter_edit->Nilai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_parameter_edit->Variabel->Visible) { // Variabel ?>
	<div id="r_Variabel" class="form-group row">
		<label id="elh_t006_parameter_Variabel" for="x_Variabel" class="<?php echo $t006_parameter_edit->LeftColumnClass ?>"><?php echo $t006_parameter_edit->Variabel->caption() ?><?php echo $t006_parameter_edit->Variabel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_parameter_edit->RightColumnClass ?>"><div <?php echo $t006_parameter_edit->Variabel->cellAttributes() ?>>
<span id="el_t006_parameter_Variabel">
<input type="text" data-table="t006_parameter" data-field="x_Variabel" name="x_Variabel" id="x_Variabel" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t006_parameter_edit->Variabel->getPlaceHolder()) ?>" value="<?php echo $t006_parameter_edit->Variabel->EditValue ?>"<?php echo $t006_parameter_edit->Variabel->editAttributes() ?>>
</span>
<?php echo $t006_parameter_edit->Variabel->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t006_parameter" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t006_parameter_edit->id->CurrentValue) ?>">
<?php if (!$t006_parameter_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t006_parameter_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t006_parameter_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t006_parameter_edit->showPageFooter();
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
$t006_parameter_edit->terminate();
?>