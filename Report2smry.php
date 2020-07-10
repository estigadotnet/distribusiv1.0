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
$Report2_summary = new Report2_summary();

// Run the page
$Report2_summary->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$Report2_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$Report2_summary->isExport() && !$Report2_summary->DrillDown && !$DashboardReport) { ?>
<script>
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<a id="top"></a>
<?php if ((!$Report2_summary->isExport() || $Report2_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Report2_summary->DrillDownInPanel) {
	$Report2_summary->ExportOptions->render("body");
	$Report2_summary->SearchOptions->render("body");
	$Report2_summary->FilterOptions->render("body");
}
?>
</div>
<?php $Report2_summary->showPageHeader(); ?>
<?php
$Report2_summary->showMessage();
?>
<?php if ((!$Report2_summary->isExport() || $Report2_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Top Container -->
<div class="row">
	<div id="ew-top" class="<?php echo $Report2_summary->TopContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($Report2_summary->isExport("print") || $Report2_summary->isExport("pdf") || $Report2_summary->isExport("email") || $Report2_summary->isExport("excel") && Config("USE_PHPEXCEL") || $Report2_summary->isExport("word") && Config("USE_PHPWORD")) && $Report2_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$Report2_summary->Page_Breaking($Report2_summary->ExportChartPageBreak, $Report2_summary->PageBreakContent);
		$Report2->Chart1->PageBreakType = "after"; // Page break type
		$Report2->Chart1->PageBreak = $Report2_summary->ExportChartPageBreak;
		$Report2->Chart1->PageBreakContent = $Report2_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$Report2->Chart1->DrillDownInPanel = $Report2_summary->DrillDownInPanel;
	$Report2->Chart1->render("ew-chart-top");
}
?>
<?php if ((!$Report2_summary->isExport() || $Report2_summary->isExport("print")) && !$DashboardReport) { ?>
	</div>
</div>
<!-- /#ew-top -->
<?php } ?>
<?php if ((!$Report2_summary->isExport() || $Report2_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$Report2_summary->isExport() || $Report2_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $Report2_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<?php if (!$Report2_summary->isExport("pdf")) { ?>
<div id="report_summary">
<?php } ?>
<?php if (!$Report2_summary->isExport() && !$Report2_summary->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php if (!$Report2_summary->isExport("pdf")) { ?>
</div>
<!-- /#report-summary -->
<?php } ?>
<!-- Summary report (end) -->
<?php if ((!$Report2_summary->isExport() || $Report2_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$Report2_summary->isExport() || $Report2_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$Report2_summary->isExport() || $Report2_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$Report2_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$Report2_summary->isExport() && !$Report2_summary->DrillDown && !$DashboardReport) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$Report2_summary->terminate();
?>