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
$Report1_summary = new Report1_summary();

// Run the page
$Report1_summary->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$Report1_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$Report1_summary->isExport() && !$Report1_summary->DrillDown && !$DashboardReport) { ?>
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
<?php if ((!$Report1_summary->isExport() || $Report1_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Report1_summary->DrillDownInPanel) {
	$Report1_summary->ExportOptions->render("body");
	$Report1_summary->SearchOptions->render("body");
	$Report1_summary->FilterOptions->render("body");
}
?>
</div>
<?php $Report1_summary->showPageHeader(); ?>
<?php
$Report1_summary->showMessage();
?>
<?php if ((!$Report1_summary->isExport() || $Report1_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Top Container -->
<div class="row">
	<div id="ew-top" class="<?php echo $Report1_summary->TopContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

	// Set up page break
	if (($Report1_summary->isExport("print") || $Report1_summary->isExport("pdf") || $Report1_summary->isExport("email") || $Report1_summary->isExport("excel") && Config("USE_PHPEXCEL") || $Report1_summary->isExport("word") && Config("USE_PHPWORD")) && $Report1_summary->ExportChartPageBreak) {

		// Page_Breaking server event
		$Report1_summary->Page_Breaking($Report1_summary->ExportChartPageBreak, $Report1_summary->PageBreakContent);
		$Report1->Chart1->PageBreakType = "after"; // Page break type
		$Report1->Chart1->PageBreak = $Report1_summary->ExportChartPageBreak;
		$Report1->Chart1->PageBreakContent = $Report1_summary->PageBreakContent;
	}

	// Set up chart drilldown
	$Report1->Chart1->DrillDownInPanel = $Report1_summary->DrillDownInPanel;
	$Report1->Chart1->render("ew-chart-top");
}
?>
<?php if ((!$Report1_summary->isExport() || $Report1_summary->isExport("print")) && !$DashboardReport) { ?>
	</div>
</div>
<!-- /#ew-top -->
<?php } ?>
<?php if ((!$Report1_summary->isExport() || $Report1_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$Report1_summary->isExport() || $Report1_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $Report1_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<?php if (!$Report1_summary->isExport("pdf")) { ?>
<div id="report_summary">
<?php } ?>
<?php if (!$Report1_summary->isExport() && !$Report1_summary->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php if (!$Report1_summary->isExport("pdf")) { ?>
</div>
<!-- /#report-summary -->
<?php } ?>
<!-- Summary report (end) -->
<?php if ((!$Report1_summary->isExport() || $Report1_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$Report1_summary->isExport() || $Report1_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$Report1_summary->isExport() || $Report1_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$Report1_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$Report1_summary->isExport() && !$Report1_summary->DrillDown && !$DashboardReport) { ?>
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
$Report1_summary->terminate();
?>