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
$t005_distribusi_add = new t005_distribusi_add();

// Run the page
$t005_distribusi_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_distribusi_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft005_distribusiadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft005_distribusiadd = currentForm = new ew.Form("ft005_distribusiadd", "add");

	// Validate form
	ft005_distribusiadd.validate = function() {
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
			<?php if ($t005_distribusi_add->source_id->Required) { ?>
				elm = this.getElements("x" + infix + "_source_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_add->source_id->caption(), $t005_distribusi_add->source_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_distribusi_add->destination_id->Required) { ?>
				elm = this.getElements("x" + infix + "_destination_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_add->destination_id->caption(), $t005_distribusi_add->destination_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_distribusi_add->Jarak->Required) { ?>
				elm = this.getElements("x" + infix + "_Jarak");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_add->Jarak->caption(), $t005_distribusi_add->Jarak->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Jarak");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_distribusi_add->Jarak->errorMessage()) ?>");
			<?php if ($t005_distribusi_add->RateO->Required) { ?>
				elm = this.getElements("x" + infix + "_RateO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_add->RateO->caption(), $t005_distribusi_add->RateO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RateO");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_distribusi_add->RateO->errorMessage()) ?>");
			<?php if ($t005_distribusi_add->RateD->Required) { ?>
				elm = this.getElements("x" + infix + "_RateD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_add->RateD->caption(), $t005_distribusi_add->RateD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RateD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_distribusi_add->RateD->errorMessage()) ?>");
			<?php if ($t005_distribusi_add->Demand->Required) { ?>
				elm = this.getElements("x" + infix + "_Demand");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_distribusi_add->Demand->caption(), $t005_distribusi_add->Demand->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Demand");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_distribusi_add->Demand->errorMessage()) ?>");

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
	ft005_distribusiadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft005_distribusiadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft005_distribusiadd.lists["x_source_id"] = <?php echo $t005_distribusi_add->source_id->Lookup->toClientList($t005_distribusi_add) ?>;
	ft005_distribusiadd.lists["x_source_id"].options = <?php echo JsonEncode($t005_distribusi_add->source_id->lookupOptions()) ?>;
	ft005_distribusiadd.lists["x_destination_id"] = <?php echo $t005_distribusi_add->destination_id->Lookup->toClientList($t005_distribusi_add) ?>;
	ft005_distribusiadd.lists["x_destination_id"].options = <?php echo JsonEncode($t005_distribusi_add->destination_id->lookupOptions()) ?>;
	loadjs.done("ft005_distribusiadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t005_distribusi_add->showPageHeader(); ?>
<?php
$t005_distribusi_add->showMessage();
?>
<form name="ft005_distribusiadd" id="ft005_distribusiadd" class="<?php echo $t005_distribusi_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_distribusi">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t005_distribusi_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t005_distribusi_add->source_id->Visible) { // source_id ?>
	<div id="r_source_id" class="form-group row">
		<label id="elh_t005_distribusi_source_id" for="x_source_id" class="<?php echo $t005_distribusi_add->LeftColumnClass ?>"><?php echo $t005_distribusi_add->source_id->caption() ?><?php echo $t005_distribusi_add->source_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_distribusi_add->RightColumnClass ?>"><div <?php echo $t005_distribusi_add->source_id->cellAttributes() ?>>
<span id="el_t005_distribusi_source_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_source_id"><?php echo EmptyValue(strval($t005_distribusi_add->source_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t005_distribusi_add->source_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t005_distribusi_add->source_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t005_distribusi_add->source_id->ReadOnly || $t005_distribusi_add->source_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_source_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t005_distribusi_add->source_id->Lookup->getParamTag($t005_distribusi_add, "p_x_source_id") ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_source_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t005_distribusi_add->source_id->displayValueSeparatorAttribute() ?>" name="x_source_id" id="x_source_id" value="<?php echo $t005_distribusi_add->source_id->CurrentValue ?>"<?php echo $t005_distribusi_add->source_id->editAttributes() ?>>
</span>
<?php echo $t005_distribusi_add->source_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_distribusi_add->destination_id->Visible) { // destination_id ?>
	<div id="r_destination_id" class="form-group row">
		<label id="elh_t005_distribusi_destination_id" for="x_destination_id" class="<?php echo $t005_distribusi_add->LeftColumnClass ?>"><?php echo $t005_distribusi_add->destination_id->caption() ?><?php echo $t005_distribusi_add->destination_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_distribusi_add->RightColumnClass ?>"><div <?php echo $t005_distribusi_add->destination_id->cellAttributes() ?>>
<span id="el_t005_distribusi_destination_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_destination_id"><?php echo EmptyValue(strval($t005_distribusi_add->destination_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t005_distribusi_add->destination_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t005_distribusi_add->destination_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t005_distribusi_add->destination_id->ReadOnly || $t005_distribusi_add->destination_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_destination_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t005_distribusi_add->destination_id->Lookup->getParamTag($t005_distribusi_add, "p_x_destination_id") ?>
<input type="hidden" data-table="t005_distribusi" data-field="x_destination_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t005_distribusi_add->destination_id->displayValueSeparatorAttribute() ?>" name="x_destination_id" id="x_destination_id" value="<?php echo $t005_distribusi_add->destination_id->CurrentValue ?>"<?php echo $t005_distribusi_add->destination_id->editAttributes() ?>>
</span>
<?php echo $t005_distribusi_add->destination_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_distribusi_add->Jarak->Visible) { // Jarak ?>
	<div id="r_Jarak" class="form-group row">
		<label id="elh_t005_distribusi_Jarak" for="x_Jarak" class="<?php echo $t005_distribusi_add->LeftColumnClass ?>"><?php echo $t005_distribusi_add->Jarak->caption() ?><?php echo $t005_distribusi_add->Jarak->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_distribusi_add->RightColumnClass ?>"><div <?php echo $t005_distribusi_add->Jarak->cellAttributes() ?>>
<span id="el_t005_distribusi_Jarak">
<input type="text" data-table="t005_distribusi" data-field="x_Jarak" name="x_Jarak" id="x_Jarak" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_add->Jarak->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_add->Jarak->EditValue ?>"<?php echo $t005_distribusi_add->Jarak->editAttributes() ?>>
</span>
<?php echo $t005_distribusi_add->Jarak->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_distribusi_add->RateO->Visible) { // RateO ?>
	<div id="r_RateO" class="form-group row">
		<label id="elh_t005_distribusi_RateO" for="x_RateO" class="<?php echo $t005_distribusi_add->LeftColumnClass ?>"><?php echo $t005_distribusi_add->RateO->caption() ?><?php echo $t005_distribusi_add->RateO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_distribusi_add->RightColumnClass ?>"><div <?php echo $t005_distribusi_add->RateO->cellAttributes() ?>>
<span id="el_t005_distribusi_RateO">
<input type="text" data-table="t005_distribusi" data-field="x_RateO" name="x_RateO" id="x_RateO" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_add->RateO->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_add->RateO->EditValue ?>"<?php echo $t005_distribusi_add->RateO->editAttributes() ?>>
</span>
<?php echo $t005_distribusi_add->RateO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_distribusi_add->RateD->Visible) { // RateD ?>
	<div id="r_RateD" class="form-group row">
		<label id="elh_t005_distribusi_RateD" for="x_RateD" class="<?php echo $t005_distribusi_add->LeftColumnClass ?>"><?php echo $t005_distribusi_add->RateD->caption() ?><?php echo $t005_distribusi_add->RateD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_distribusi_add->RightColumnClass ?>"><div <?php echo $t005_distribusi_add->RateD->cellAttributes() ?>>
<span id="el_t005_distribusi_RateD">
<input type="text" data-table="t005_distribusi" data-field="x_RateD" name="x_RateD" id="x_RateD" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_add->RateD->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_add->RateD->EditValue ?>"<?php echo $t005_distribusi_add->RateD->editAttributes() ?>>
</span>
<?php echo $t005_distribusi_add->RateD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_distribusi_add->Demand->Visible) { // Demand ?>
	<div id="r_Demand" class="form-group row">
		<label id="elh_t005_distribusi_Demand" for="x_Demand" class="<?php echo $t005_distribusi_add->LeftColumnClass ?>"><?php echo $t005_distribusi_add->Demand->caption() ?><?php echo $t005_distribusi_add->Demand->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_distribusi_add->RightColumnClass ?>"><div <?php echo $t005_distribusi_add->Demand->cellAttributes() ?>>
<span id="el_t005_distribusi_Demand">
<input type="text" data-table="t005_distribusi" data-field="x_Demand" name="x_Demand" id="x_Demand" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t005_distribusi_add->Demand->getPlaceHolder()) ?>" value="<?php echo $t005_distribusi_add->Demand->EditValue ?>"<?php echo $t005_distribusi_add->Demand->editAttributes() ?>>
</span>
<?php echo $t005_distribusi_add->Demand->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t005_distribusi_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t005_distribusi_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_distribusi_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t005_distribusi_add->showPageFooter();
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
$t005_distribusi_add->terminate();
?>