<?php
namespace PHPMaker2020\p_distribusi;

/**
 * Page class
 */
class t002_kapaldetail_add extends t002_kapaldetail
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{E205BC04-25FF-44F6-B4D4-68928549C8E5}";

	// Table name
	public $TableName = 't002_kapaldetail';

	// Page object name
	public $PageObjName = "t002_kapaldetail_add";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = TRUE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (t002_kapaldetail)
		if (!isset($GLOBALS["t002_kapaldetail"]) || get_class($GLOBALS["t002_kapaldetail"]) == PROJECT_NAMESPACE . "t002_kapaldetail") {
			$GLOBALS["t002_kapaldetail"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t002_kapaldetail"];
		}

		// Table object (t001_kapal)
		if (!isset($GLOBALS['t001_kapal']))
			$GLOBALS['t001_kapal'] = new t001_kapal();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't002_kapaldetail');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $t002_kapaldetail;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t002_kapaldetail);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t002_kapaldetailview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!ValidApiRequest())
			return FALSE;
		$this->setupApiSecurity();

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
		} else {
			$Security = new AdvancedSecurity();
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->kapal_id->Visible = FALSE;
		$this->Payload->setVisibility();
		$this->DischRate->setVisibility();
		$this->Tch->setVisibility();
		$this->VarCost->setVisibility();
		$this->VsLaden->setVisibility();
		$this->VsBallast->setVisibility();
		$this->ComDay->setVisibility();
		$this->Jumlah->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		// Check modal

		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t002_kapaldetaillist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t002_kapaldetaillist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t002_kapaldetailview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->kapal_id->CurrentValue = NULL;
		$this->kapal_id->OldValue = $this->kapal_id->CurrentValue;
		$this->Payload->CurrentValue = NULL;
		$this->Payload->OldValue = $this->Payload->CurrentValue;
		$this->DischRate->CurrentValue = NULL;
		$this->DischRate->OldValue = $this->DischRate->CurrentValue;
		$this->Tch->CurrentValue = NULL;
		$this->Tch->OldValue = $this->Tch->CurrentValue;
		$this->VarCost->CurrentValue = NULL;
		$this->VarCost->OldValue = $this->VarCost->CurrentValue;
		$this->VsLaden->CurrentValue = NULL;
		$this->VsLaden->OldValue = $this->VsLaden->CurrentValue;
		$this->VsBallast->CurrentValue = NULL;
		$this->VsBallast->OldValue = $this->VsBallast->CurrentValue;
		$this->ComDay->CurrentValue = NULL;
		$this->ComDay->OldValue = $this->ComDay->CurrentValue;
		$this->Jumlah->CurrentValue = NULL;
		$this->Jumlah->OldValue = $this->Jumlah->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Payload' first before field var 'x_Payload'
		$val = $CurrentForm->hasValue("Payload") ? $CurrentForm->getValue("Payload") : $CurrentForm->getValue("x_Payload");
		if (!$this->Payload->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Payload->Visible = FALSE; // Disable update for API request
			else
				$this->Payload->setFormValue($val);
		}

		// Check field name 'DischRate' first before field var 'x_DischRate'
		$val = $CurrentForm->hasValue("DischRate") ? $CurrentForm->getValue("DischRate") : $CurrentForm->getValue("x_DischRate");
		if (!$this->DischRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DischRate->Visible = FALSE; // Disable update for API request
			else
				$this->DischRate->setFormValue($val);
		}

		// Check field name 'Tch' first before field var 'x_Tch'
		$val = $CurrentForm->hasValue("Tch") ? $CurrentForm->getValue("Tch") : $CurrentForm->getValue("x_Tch");
		if (!$this->Tch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tch->Visible = FALSE; // Disable update for API request
			else
				$this->Tch->setFormValue($val);
		}

		// Check field name 'VarCost' first before field var 'x_VarCost'
		$val = $CurrentForm->hasValue("VarCost") ? $CurrentForm->getValue("VarCost") : $CurrentForm->getValue("x_VarCost");
		if (!$this->VarCost->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VarCost->Visible = FALSE; // Disable update for API request
			else
				$this->VarCost->setFormValue($val);
		}

		// Check field name 'VsLaden' first before field var 'x_VsLaden'
		$val = $CurrentForm->hasValue("VsLaden") ? $CurrentForm->getValue("VsLaden") : $CurrentForm->getValue("x_VsLaden");
		if (!$this->VsLaden->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VsLaden->Visible = FALSE; // Disable update for API request
			else
				$this->VsLaden->setFormValue($val);
		}

		// Check field name 'VsBallast' first before field var 'x_VsBallast'
		$val = $CurrentForm->hasValue("VsBallast") ? $CurrentForm->getValue("VsBallast") : $CurrentForm->getValue("x_VsBallast");
		if (!$this->VsBallast->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VsBallast->Visible = FALSE; // Disable update for API request
			else
				$this->VsBallast->setFormValue($val);
		}

		// Check field name 'ComDay' first before field var 'x_ComDay'
		$val = $CurrentForm->hasValue("ComDay") ? $CurrentForm->getValue("ComDay") : $CurrentForm->getValue("x_ComDay");
		if (!$this->ComDay->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ComDay->Visible = FALSE; // Disable update for API request
			else
				$this->ComDay->setFormValue($val);
		}

		// Check field name 'Jumlah' first before field var 'x_Jumlah'
		$val = $CurrentForm->hasValue("Jumlah") ? $CurrentForm->getValue("Jumlah") : $CurrentForm->getValue("x_Jumlah");
		if (!$this->Jumlah->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Jumlah->Visible = FALSE; // Disable update for API request
			else
				$this->Jumlah->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Payload->CurrentValue = $this->Payload->FormValue;
		$this->DischRate->CurrentValue = $this->DischRate->FormValue;
		$this->Tch->CurrentValue = $this->Tch->FormValue;
		$this->VarCost->CurrentValue = $this->VarCost->FormValue;
		$this->VsLaden->CurrentValue = $this->VsLaden->FormValue;
		$this->VsBallast->CurrentValue = $this->VsBallast->FormValue;
		$this->ComDay->CurrentValue = $this->ComDay->FormValue;
		$this->Jumlah->CurrentValue = $this->Jumlah->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id->setDbValue($row['id']);
		$this->kapal_id->setDbValue($row['kapal_id']);
		$this->Payload->setDbValue($row['Payload']);
		$this->DischRate->setDbValue($row['DischRate']);
		$this->Tch->setDbValue($row['Tch']);
		$this->VarCost->setDbValue($row['VarCost']);
		$this->VsLaden->setDbValue($row['VsLaden']);
		$this->VsBallast->setDbValue($row['VsBallast']);
		$this->ComDay->setDbValue($row['ComDay']);
		$this->Jumlah->setDbValue($row['Jumlah']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['kapal_id'] = $this->kapal_id->CurrentValue;
		$row['Payload'] = $this->Payload->CurrentValue;
		$row['DischRate'] = $this->DischRate->CurrentValue;
		$row['Tch'] = $this->Tch->CurrentValue;
		$row['VarCost'] = $this->VarCost->CurrentValue;
		$row['VsLaden'] = $this->VsLaden->CurrentValue;
		$row['VsBallast'] = $this->VsBallast->CurrentValue;
		$row['ComDay'] = $this->ComDay->CurrentValue;
		$row['Jumlah'] = $this->Jumlah->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) != "")
			$this->id->OldValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->Payload->FormValue == $this->Payload->CurrentValue && is_numeric(ConvertToFloatString($this->Payload->CurrentValue)))
			$this->Payload->CurrentValue = ConvertToFloatString($this->Payload->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DischRate->FormValue == $this->DischRate->CurrentValue && is_numeric(ConvertToFloatString($this->DischRate->CurrentValue)))
			$this->DischRate->CurrentValue = ConvertToFloatString($this->DischRate->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Tch->FormValue == $this->Tch->CurrentValue && is_numeric(ConvertToFloatString($this->Tch->CurrentValue)))
			$this->Tch->CurrentValue = ConvertToFloatString($this->Tch->CurrentValue);

		// Convert decimal values if posted back
		if ($this->VarCost->FormValue == $this->VarCost->CurrentValue && is_numeric(ConvertToFloatString($this->VarCost->CurrentValue)))
			$this->VarCost->CurrentValue = ConvertToFloatString($this->VarCost->CurrentValue);

		// Convert decimal values if posted back
		if ($this->VsLaden->FormValue == $this->VsLaden->CurrentValue && is_numeric(ConvertToFloatString($this->VsLaden->CurrentValue)))
			$this->VsLaden->CurrentValue = ConvertToFloatString($this->VsLaden->CurrentValue);

		// Convert decimal values if posted back
		if ($this->VsBallast->FormValue == $this->VsBallast->CurrentValue && is_numeric(ConvertToFloatString($this->VsBallast->CurrentValue)))
			$this->VsBallast->CurrentValue = ConvertToFloatString($this->VsBallast->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ComDay->FormValue == $this->ComDay->CurrentValue && is_numeric(ConvertToFloatString($this->ComDay->CurrentValue)))
			$this->ComDay->CurrentValue = ConvertToFloatString($this->ComDay->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// kapal_id
		// Payload
		// DischRate
		// Tch
		// VarCost
		// VsLaden
		// VsBallast
		// ComDay
		// Jumlah

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// kapal_id
			$this->kapal_id->ViewValue = $this->kapal_id->CurrentValue;
			$this->kapal_id->ViewValue = FormatNumber($this->kapal_id->ViewValue, 0, -2, -2, -2);
			$this->kapal_id->ViewCustomAttributes = "";

			// Payload
			$this->Payload->ViewValue = $this->Payload->CurrentValue;
			$this->Payload->ViewValue = FormatNumber($this->Payload->ViewValue, 2, -2, -2, -2);
			$this->Payload->ViewCustomAttributes = "";

			// DischRate
			$this->DischRate->ViewValue = $this->DischRate->CurrentValue;
			$this->DischRate->ViewValue = FormatNumber($this->DischRate->ViewValue, 2, -2, -2, -2);
			$this->DischRate->ViewCustomAttributes = "";

			// Tch
			$this->Tch->ViewValue = $this->Tch->CurrentValue;
			$this->Tch->ViewValue = FormatNumber($this->Tch->ViewValue, 2, -2, -2, -2);
			$this->Tch->ViewCustomAttributes = "";

			// VarCost
			$this->VarCost->ViewValue = $this->VarCost->CurrentValue;
			$this->VarCost->ViewValue = FormatNumber($this->VarCost->ViewValue, 2, -2, -2, -2);
			$this->VarCost->ViewCustomAttributes = "";

			// VsLaden
			$this->VsLaden->ViewValue = $this->VsLaden->CurrentValue;
			$this->VsLaden->ViewValue = FormatNumber($this->VsLaden->ViewValue, 2, -2, -2, -2);
			$this->VsLaden->ViewCustomAttributes = "";

			// VsBallast
			$this->VsBallast->ViewValue = $this->VsBallast->CurrentValue;
			$this->VsBallast->ViewValue = FormatNumber($this->VsBallast->ViewValue, 2, -2, -2, -2);
			$this->VsBallast->ViewCustomAttributes = "";

			// ComDay
			$this->ComDay->ViewValue = $this->ComDay->CurrentValue;
			$this->ComDay->ViewValue = FormatNumber($this->ComDay->ViewValue, 2, -2, -2, -2);
			$this->ComDay->ViewCustomAttributes = "";

			// Jumlah
			$this->Jumlah->ViewValue = $this->Jumlah->CurrentValue;
			$this->Jumlah->ViewValue = FormatNumber($this->Jumlah->ViewValue, 0, -2, -2, -2);
			$this->Jumlah->ViewCustomAttributes = "";

			// Payload
			$this->Payload->LinkCustomAttributes = "";
			$this->Payload->HrefValue = "";
			$this->Payload->TooltipValue = "";

			// DischRate
			$this->DischRate->LinkCustomAttributes = "";
			$this->DischRate->HrefValue = "";
			$this->DischRate->TooltipValue = "";

			// Tch
			$this->Tch->LinkCustomAttributes = "";
			$this->Tch->HrefValue = "";
			$this->Tch->TooltipValue = "";

			// VarCost
			$this->VarCost->LinkCustomAttributes = "";
			$this->VarCost->HrefValue = "";
			$this->VarCost->TooltipValue = "";

			// VsLaden
			$this->VsLaden->LinkCustomAttributes = "";
			$this->VsLaden->HrefValue = "";
			$this->VsLaden->TooltipValue = "";

			// VsBallast
			$this->VsBallast->LinkCustomAttributes = "";
			$this->VsBallast->HrefValue = "";
			$this->VsBallast->TooltipValue = "";

			// ComDay
			$this->ComDay->LinkCustomAttributes = "";
			$this->ComDay->HrefValue = "";
			$this->ComDay->TooltipValue = "";

			// Jumlah
			$this->Jumlah->LinkCustomAttributes = "";
			$this->Jumlah->HrefValue = "";
			$this->Jumlah->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Payload
			$this->Payload->EditAttrs["class"] = "form-control";
			$this->Payload->EditCustomAttributes = "";
			$this->Payload->EditValue = HtmlEncode($this->Payload->CurrentValue);
			$this->Payload->PlaceHolder = RemoveHtml($this->Payload->caption());
			if (strval($this->Payload->EditValue) != "" && is_numeric($this->Payload->EditValue))
				$this->Payload->EditValue = FormatNumber($this->Payload->EditValue, -2, -2, -2, -2);
			

			// DischRate
			$this->DischRate->EditAttrs["class"] = "form-control";
			$this->DischRate->EditCustomAttributes = "";
			$this->DischRate->EditValue = HtmlEncode($this->DischRate->CurrentValue);
			$this->DischRate->PlaceHolder = RemoveHtml($this->DischRate->caption());
			if (strval($this->DischRate->EditValue) != "" && is_numeric($this->DischRate->EditValue))
				$this->DischRate->EditValue = FormatNumber($this->DischRate->EditValue, -2, -2, -2, -2);
			

			// Tch
			$this->Tch->EditAttrs["class"] = "form-control";
			$this->Tch->EditCustomAttributes = "";
			$this->Tch->EditValue = HtmlEncode($this->Tch->CurrentValue);
			$this->Tch->PlaceHolder = RemoveHtml($this->Tch->caption());
			if (strval($this->Tch->EditValue) != "" && is_numeric($this->Tch->EditValue))
				$this->Tch->EditValue = FormatNumber($this->Tch->EditValue, -2, -2, -2, -2);
			

			// VarCost
			$this->VarCost->EditAttrs["class"] = "form-control";
			$this->VarCost->EditCustomAttributes = "";
			$this->VarCost->EditValue = HtmlEncode($this->VarCost->CurrentValue);
			$this->VarCost->PlaceHolder = RemoveHtml($this->VarCost->caption());
			if (strval($this->VarCost->EditValue) != "" && is_numeric($this->VarCost->EditValue))
				$this->VarCost->EditValue = FormatNumber($this->VarCost->EditValue, -2, -2, -2, -2);
			

			// VsLaden
			$this->VsLaden->EditAttrs["class"] = "form-control";
			$this->VsLaden->EditCustomAttributes = "";
			$this->VsLaden->EditValue = HtmlEncode($this->VsLaden->CurrentValue);
			$this->VsLaden->PlaceHolder = RemoveHtml($this->VsLaden->caption());
			if (strval($this->VsLaden->EditValue) != "" && is_numeric($this->VsLaden->EditValue))
				$this->VsLaden->EditValue = FormatNumber($this->VsLaden->EditValue, -2, -2, -2, -2);
			

			// VsBallast
			$this->VsBallast->EditAttrs["class"] = "form-control";
			$this->VsBallast->EditCustomAttributes = "";
			$this->VsBallast->EditValue = HtmlEncode($this->VsBallast->CurrentValue);
			$this->VsBallast->PlaceHolder = RemoveHtml($this->VsBallast->caption());
			if (strval($this->VsBallast->EditValue) != "" && is_numeric($this->VsBallast->EditValue))
				$this->VsBallast->EditValue = FormatNumber($this->VsBallast->EditValue, -2, -2, -2, -2);
			

			// ComDay
			$this->ComDay->EditAttrs["class"] = "form-control";
			$this->ComDay->EditCustomAttributes = "";
			$this->ComDay->EditValue = HtmlEncode($this->ComDay->CurrentValue);
			$this->ComDay->PlaceHolder = RemoveHtml($this->ComDay->caption());
			if (strval($this->ComDay->EditValue) != "" && is_numeric($this->ComDay->EditValue))
				$this->ComDay->EditValue = FormatNumber($this->ComDay->EditValue, -2, -2, -2, -2);
			

			// Jumlah
			$this->Jumlah->EditAttrs["class"] = "form-control";
			$this->Jumlah->EditCustomAttributes = "";
			$this->Jumlah->EditValue = HtmlEncode($this->Jumlah->CurrentValue);
			$this->Jumlah->PlaceHolder = RemoveHtml($this->Jumlah->caption());

			// Add refer script
			// Payload

			$this->Payload->LinkCustomAttributes = "";
			$this->Payload->HrefValue = "";

			// DischRate
			$this->DischRate->LinkCustomAttributes = "";
			$this->DischRate->HrefValue = "";

			// Tch
			$this->Tch->LinkCustomAttributes = "";
			$this->Tch->HrefValue = "";

			// VarCost
			$this->VarCost->LinkCustomAttributes = "";
			$this->VarCost->HrefValue = "";

			// VsLaden
			$this->VsLaden->LinkCustomAttributes = "";
			$this->VsLaden->HrefValue = "";

			// VsBallast
			$this->VsBallast->LinkCustomAttributes = "";
			$this->VsBallast->HrefValue = "";

			// ComDay
			$this->ComDay->LinkCustomAttributes = "";
			$this->ComDay->HrefValue = "";

			// Jumlah
			$this->Jumlah->LinkCustomAttributes = "";
			$this->Jumlah->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->Payload->Required) {
			if (!$this->Payload->IsDetailKey && $this->Payload->FormValue != NULL && $this->Payload->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Payload->caption(), $this->Payload->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Payload->FormValue)) {
			AddMessage($FormError, $this->Payload->errorMessage());
		}
		if ($this->DischRate->Required) {
			if (!$this->DischRate->IsDetailKey && $this->DischRate->FormValue != NULL && $this->DischRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DischRate->caption(), $this->DischRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DischRate->FormValue)) {
			AddMessage($FormError, $this->DischRate->errorMessage());
		}
		if ($this->Tch->Required) {
			if (!$this->Tch->IsDetailKey && $this->Tch->FormValue != NULL && $this->Tch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tch->caption(), $this->Tch->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Tch->FormValue)) {
			AddMessage($FormError, $this->Tch->errorMessage());
		}
		if ($this->VarCost->Required) {
			if (!$this->VarCost->IsDetailKey && $this->VarCost->FormValue != NULL && $this->VarCost->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VarCost->caption(), $this->VarCost->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->VarCost->FormValue)) {
			AddMessage($FormError, $this->VarCost->errorMessage());
		}
		if ($this->VsLaden->Required) {
			if (!$this->VsLaden->IsDetailKey && $this->VsLaden->FormValue != NULL && $this->VsLaden->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VsLaden->caption(), $this->VsLaden->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->VsLaden->FormValue)) {
			AddMessage($FormError, $this->VsLaden->errorMessage());
		}
		if ($this->VsBallast->Required) {
			if (!$this->VsBallast->IsDetailKey && $this->VsBallast->FormValue != NULL && $this->VsBallast->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VsBallast->caption(), $this->VsBallast->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->VsBallast->FormValue)) {
			AddMessage($FormError, $this->VsBallast->errorMessage());
		}
		if ($this->ComDay->Required) {
			if (!$this->ComDay->IsDetailKey && $this->ComDay->FormValue != NULL && $this->ComDay->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ComDay->caption(), $this->ComDay->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ComDay->FormValue)) {
			AddMessage($FormError, $this->ComDay->errorMessage());
		}
		if ($this->Jumlah->Required) {
			if (!$this->Jumlah->IsDetailKey && $this->Jumlah->FormValue != NULL && $this->Jumlah->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Jumlah->caption(), $this->Jumlah->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Jumlah->FormValue)) {
			AddMessage($FormError, $this->Jumlah->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// Payload
		$this->Payload->setDbValueDef($rsnew, $this->Payload->CurrentValue, 0, FALSE);

		// DischRate
		$this->DischRate->setDbValueDef($rsnew, $this->DischRate->CurrentValue, 0, FALSE);

		// Tch
		$this->Tch->setDbValueDef($rsnew, $this->Tch->CurrentValue, 0, FALSE);

		// VarCost
		$this->VarCost->setDbValueDef($rsnew, $this->VarCost->CurrentValue, 0, FALSE);

		// VsLaden
		$this->VsLaden->setDbValueDef($rsnew, $this->VsLaden->CurrentValue, 0, FALSE);

		// VsBallast
		$this->VsBallast->setDbValueDef($rsnew, $this->VsBallast->CurrentValue, 0, FALSE);

		// ComDay
		$this->ComDay->setDbValueDef($rsnew, $this->ComDay->CurrentValue, 0, FALSE);

		// Jumlah
		$this->Jumlah->setDbValueDef($rsnew, $this->Jumlah->CurrentValue, 0, FALSE);

		// kapal_id
		if ($this->kapal_id->getSessionValue() != "") {
			$rsnew['kapal_id'] = $this->kapal_id->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Clean upload path if any
		if ($addRow) {
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t001_kapal") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("kapal_id"))) !== NULL) {
					$GLOBALS["t001_kapal"]->id->setQueryStringValue($parm);
					$this->kapal_id->setQueryStringValue($GLOBALS["t001_kapal"]->id->QueryStringValue);
					$this->kapal_id->setSessionValue($this->kapal_id->QueryStringValue);
					if (!is_numeric($GLOBALS["t001_kapal"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t001_kapal") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("kapal_id"))) !== NULL) {
					$GLOBALS["t001_kapal"]->id->setFormValue($parm);
					$this->kapal_id->setFormValue($GLOBALS["t001_kapal"]->id->FormValue);
					$this->kapal_id->setSessionValue($this->kapal_id->FormValue);
					if (!is_numeric($GLOBALS["t001_kapal"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "t001_kapal") {
				if ($this->kapal_id->CurrentValue == "")
					$this->kapal_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t002_kapaldetaillist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>