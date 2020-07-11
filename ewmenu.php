<?php
namespace PHPMaker2020\p_distribusi;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(3, "mi_c001_dashboard", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "c001_dashboard.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mci_Setup", $MenuLanguage->MenuPhrase("4", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t001_kapal", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_kapallist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t003_source", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t003_sourcelist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mi_t004_destination", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "t004_destinationlist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(7, "mi_t005_distribusi", $MenuLanguage->MenuPhrase("7", "MenuText"), $MenuRelativePath . "t005_distribusilist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(8, "mi_t006_parameter", $MenuLanguage->MenuPhrase("8", "MenuText"), $MenuRelativePath . "t006_parameterlist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(9, "mi_t007_operator", $MenuLanguage->MenuPhrase("9", "MenuText"), $MenuRelativePath . "t007_operatorlist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(10, "mi_c002_input1", $MenuLanguage->MenuPhrase("10", "MenuText"), $MenuRelativePath . "c002_input1.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(18, "mi_c005_bf1", $MenuLanguage->MenuPhrase("18", "MenuText"), $MenuRelativePath . "c005_bf1.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(3, "mi_c001_dashboard", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "c001_dashboard.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mci_Setup", $MenuLanguage->MenuPhrase("4", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t001_kapal", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_kapallist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t003_source", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t003_sourcelist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mi_t004_destination", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "t004_destinationlist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(7, "mi_t005_distribusi", $MenuLanguage->MenuPhrase("7", "MenuText"), $MenuRelativePath . "t005_distribusilist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(8, "mi_t006_parameter", $MenuLanguage->MenuPhrase("8", "MenuText"), $MenuRelativePath . "t006_parameterlist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(9, "mi_t007_operator", $MenuLanguage->MenuPhrase("9", "MenuText"), $MenuRelativePath . "t007_operatorlist.php", 4, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(10, "mi_c002_input1", $MenuLanguage->MenuPhrase("10", "MenuText"), $MenuRelativePath . "c002_input1.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(18, "mi_c005_bf1", $MenuLanguage->MenuPhrase("18", "MenuText"), $MenuRelativePath . "c005_bf1.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>