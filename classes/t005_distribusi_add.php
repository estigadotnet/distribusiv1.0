<?php
namespace PHPMaker2020\p_distribusi;

/**
 * Page class
 */
class t005_distribusi_add extends t005_distribusi
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{E205BC04-25FF-44F6-B4D4-68928549C8E5}";

	// Table name
	public $TableName = 't005_distribusi';

	// Page object name
	public $PageObjName = "t005_distribusi_add";

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

		// Table object (t005_distribusi)
		if (!isset($GLOBALS["t005_distribusi"]) || get_class($GLOBALS["t005_distribusi"]) == PROJECT_NAMESPACE . "t005_distribusi") {
			$GLOBALS["t005_distribusi"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t005_distribusi"];
		}

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't005_distribusi');

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
		global $t005_distribusi;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t005_distribusi);
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
					if ($pageName == "t005_distribusiview.php")
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
		$this->source_id->setVisibility();
		$this->destination_id->setVisibility();
		$this->Jarak->setVisibility();
		$this->RateO->setVisibility();
		$this->RateD->setVisibility();
		$this->Demand->setVisibility();
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
		$this->setupLookupOptions($this->source_id);
		$this->setupLookupOptions($this->destination_id);

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
					$this->terminate("t005_distribusilist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t005_distribusilist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t005_distribusiview.php")
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
		$this->source_id->CurrentValue = NULL;
		$this->source_id->OldValue = $this->source_id->CurrentValue;
		$this->destination_id->CurrentValue = NULL;
		$this->destination_id->OldValue = $this->destination_id->CurrentValue;
		$this->Jarak->CurrentValue = NULL;
		$this->Jarak->OldValue = $this->Jarak->CurrentValue;
		$this->RateO->CurrentValue = NULL;
		$this->RateO->OldValue = $this->RateO->CurrentValue;
		$this->RateD->CurrentValue = NULL;
		$this->RateD->OldValue = $this->RateD->CurrentValue;
		$this->Demand->CurrentValue = NULL;
		$this->Demand->OldValue = $this->Demand->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'source_id' first before field var 'x_source_id'
		$val = $CurrentForm->hasValue("source_id") ? $CurrentForm->getValue("source_id") : $CurrentForm->getValue("x_source_id");
		if (!$this->source_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->source_id->Visible = FALSE; // Disable update for API request
			else
				$this->source_id->setFormValue($val);
		}

		// Check field name 'destination_id' first before field var 'x_destination_id'
		$val = $CurrentForm->hasValue("destination_id") ? $CurrentForm->getValue("destination_id") : $CurrentForm->getValue("x_destination_id");
		if (!$this->destination_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->destination_id->Visible = FALSE; // Disable update for API request
			else
				$this->destination_id->setFormValue($val);
		}

		// Check field name 'Jarak' first before field var 'x_Jarak'
		$val = $CurrentForm->hasValue("Jarak") ? $CurrentForm->getValue("Jarak") : $CurrentForm->getValue("x_Jarak");
		if (!$this->Jarak->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Jarak->Visible = FALSE; // Disable update for API request
			else
				$this->Jarak->setFormValue($val);
		}

		// Check field name 'RateO' first before field var 'x_RateO'
		$val = $CurrentForm->hasValue("RateO") ? $CurrentForm->getValue("RateO") : $CurrentForm->getValue("x_RateO");
		if (!$this->RateO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RateO->Visible = FALSE; // Disable update for API request
			else
				$this->RateO->setFormValue($val);
		}

		// Check field name 'RateD' first before field var 'x_RateD'
		$val = $CurrentForm->hasValue("RateD") ? $CurrentForm->getValue("RateD") : $CurrentForm->getValue("x_RateD");
		if (!$this->RateD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RateD->Visible = FALSE; // Disable update for API request
			else
				$this->RateD->setFormValue($val);
		}

		// Check field name 'Demand' first before field var 'x_Demand'
		$val = $CurrentForm->hasValue("Demand") ? $CurrentForm->getValue("Demand") : $CurrentForm->getValue("x_Demand");
		if (!$this->Demand->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Demand->Visible = FALSE; // Disable update for API request
			else
				$this->Demand->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->source_id->CurrentValue = $this->source_id->FormValue;
		$this->destination_id->CurrentValue = $this->destination_id->FormValue;
		$this->Jarak->CurrentValue = $this->Jarak->FormValue;
		$this->RateO->CurrentValue = $this->RateO->FormValue;
		$this->RateD->CurrentValue = $this->RateD->FormValue;
		$this->Demand->CurrentValue = $this->Demand->FormValue;
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
		$this->source_id->setDbValue($row['source_id']);
		$this->destination_id->setDbValue($row['destination_id']);
		$this->Jarak->setDbValue($row['Jarak']);
		$this->RateO->setDbValue($row['RateO']);
		$this->RateD->setDbValue($row['RateD']);
		$this->Demand->setDbValue($row['Demand']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['source_id'] = $this->source_id->CurrentValue;
		$row['destination_id'] = $this->destination_id->CurrentValue;
		$row['Jarak'] = $this->Jarak->CurrentValue;
		$row['RateO'] = $this->RateO->CurrentValue;
		$row['RateD'] = $this->RateD->CurrentValue;
		$row['Demand'] = $this->Demand->CurrentValue;
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

		if ($this->Jarak->FormValue == $this->Jarak->CurrentValue && is_numeric(ConvertToFloatString($this->Jarak->CurrentValue)))
			$this->Jarak->CurrentValue = ConvertToFloatString($this->Jarak->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RateO->FormValue == $this->RateO->CurrentValue && is_numeric(ConvertToFloatString($this->RateO->CurrentValue)))
			$this->RateO->CurrentValue = ConvertToFloatString($this->RateO->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RateD->FormValue == $this->RateD->CurrentValue && is_numeric(ConvertToFloatString($this->RateD->CurrentValue)))
			$this->RateD->CurrentValue = ConvertToFloatString($this->RateD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Demand->FormValue == $this->Demand->CurrentValue && is_numeric(ConvertToFloatString($this->Demand->CurrentValue)))
			$this->Demand->CurrentValue = ConvertToFloatString($this->Demand->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// source_id
		// destination_id
		// Jarak
		// RateO
		// RateD
		// Demand

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// source_id
			$curVal = strval($this->source_id->CurrentValue);
			if ($curVal != "") {
				$this->source_id->ViewValue = $this->source_id->lookupCacheOption($curVal);
				if ($this->source_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->source_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->source_id->ViewValue = $this->source_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->source_id->ViewValue = $this->source_id->CurrentValue;
					}
				}
			} else {
				$this->source_id->ViewValue = NULL;
			}
			$this->source_id->ViewCustomAttributes = "";

			// destination_id
			$curVal = strval($this->destination_id->CurrentValue);
			if ($curVal != "") {
				$this->destination_id->ViewValue = $this->destination_id->lookupCacheOption($curVal);
				if ($this->destination_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->destination_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->destination_id->ViewValue = $this->destination_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->destination_id->ViewValue = $this->destination_id->CurrentValue;
					}
				}
			} else {
				$this->destination_id->ViewValue = NULL;
			}
			$this->destination_id->ViewCustomAttributes = "";

			// Jarak
			$this->Jarak->ViewValue = $this->Jarak->CurrentValue;
			$this->Jarak->ViewValue = FormatNumber($this->Jarak->ViewValue, 2, -2, -2, -2);
			$this->Jarak->ViewCustomAttributes = "";

			// RateO
			$this->RateO->ViewValue = $this->RateO->CurrentValue;
			$this->RateO->ViewValue = FormatNumber($this->RateO->ViewValue, 2, -2, -2, -2);
			$this->RateO->ViewCustomAttributes = "";

			// RateD
			$this->RateD->ViewValue = $this->RateD->CurrentValue;
			$this->RateD->ViewValue = FormatNumber($this->RateD->ViewValue, 2, -2, -2, -2);
			$this->RateD->ViewCustomAttributes = "";

			// Demand
			$this->Demand->ViewValue = $this->Demand->CurrentValue;
			$this->Demand->ViewValue = FormatNumber($this->Demand->ViewValue, 2, -2, -2, -2);
			$this->Demand->ViewCustomAttributes = "";

			// source_id
			$this->source_id->LinkCustomAttributes = "";
			$this->source_id->HrefValue = "";
			$this->source_id->TooltipValue = "";

			// destination_id
			$this->destination_id->LinkCustomAttributes = "";
			$this->destination_id->HrefValue = "";
			$this->destination_id->TooltipValue = "";

			// Jarak
			$this->Jarak->LinkCustomAttributes = "";
			$this->Jarak->HrefValue = "";
			$this->Jarak->TooltipValue = "";

			// RateO
			$this->RateO->LinkCustomAttributes = "";
			$this->RateO->HrefValue = "";
			$this->RateO->TooltipValue = "";

			// RateD
			$this->RateD->LinkCustomAttributes = "";
			$this->RateD->HrefValue = "";
			$this->RateD->TooltipValue = "";

			// Demand
			$this->Demand->LinkCustomAttributes = "";
			$this->Demand->HrefValue = "";
			$this->Demand->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// source_id
			$this->source_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->source_id->CurrentValue));
			if ($curVal != "")
				$this->source_id->ViewValue = $this->source_id->lookupCacheOption($curVal);
			else
				$this->source_id->ViewValue = $this->source_id->Lookup !== NULL && is_array($this->source_id->Lookup->Options) ? $curVal : NULL;
			if ($this->source_id->ViewValue !== NULL) { // Load from cache
				$this->source_id->EditValue = array_values($this->source_id->Lookup->Options);
				if ($this->source_id->ViewValue == "")
					$this->source_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->source_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->source_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->source_id->ViewValue = $this->source_id->displayValue($arwrk);
				} else {
					$this->source_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->source_id->EditValue = $arwrk;
			}

			// destination_id
			$this->destination_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->destination_id->CurrentValue));
			if ($curVal != "")
				$this->destination_id->ViewValue = $this->destination_id->lookupCacheOption($curVal);
			else
				$this->destination_id->ViewValue = $this->destination_id->Lookup !== NULL && is_array($this->destination_id->Lookup->Options) ? $curVal : NULL;
			if ($this->destination_id->ViewValue !== NULL) { // Load from cache
				$this->destination_id->EditValue = array_values($this->destination_id->Lookup->Options);
				if ($this->destination_id->ViewValue == "")
					$this->destination_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->destination_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->destination_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->destination_id->ViewValue = $this->destination_id->displayValue($arwrk);
				} else {
					$this->destination_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->destination_id->EditValue = $arwrk;
			}

			// Jarak
			$this->Jarak->EditAttrs["class"] = "form-control";
			$this->Jarak->EditCustomAttributes = "";
			$this->Jarak->EditValue = HtmlEncode($this->Jarak->CurrentValue);
			$this->Jarak->PlaceHolder = RemoveHtml($this->Jarak->caption());
			if (strval($this->Jarak->EditValue) != "" && is_numeric($this->Jarak->EditValue))
				$this->Jarak->EditValue = FormatNumber($this->Jarak->EditValue, -2, -2, -2, -2);
			

			// RateO
			$this->RateO->EditAttrs["class"] = "form-control";
			$this->RateO->EditCustomAttributes = "";
			$this->RateO->EditValue = HtmlEncode($this->RateO->CurrentValue);
			$this->RateO->PlaceHolder = RemoveHtml($this->RateO->caption());
			if (strval($this->RateO->EditValue) != "" && is_numeric($this->RateO->EditValue))
				$this->RateO->EditValue = FormatNumber($this->RateO->EditValue, -2, -2, -2, -2);
			

			// RateD
			$this->RateD->EditAttrs["class"] = "form-control";
			$this->RateD->EditCustomAttributes = "";
			$this->RateD->EditValue = HtmlEncode($this->RateD->CurrentValue);
			$this->RateD->PlaceHolder = RemoveHtml($this->RateD->caption());
			if (strval($this->RateD->EditValue) != "" && is_numeric($this->RateD->EditValue))
				$this->RateD->EditValue = FormatNumber($this->RateD->EditValue, -2, -2, -2, -2);
			

			// Demand
			$this->Demand->EditAttrs["class"] = "form-control";
			$this->Demand->EditCustomAttributes = "";
			$this->Demand->EditValue = HtmlEncode($this->Demand->CurrentValue);
			$this->Demand->PlaceHolder = RemoveHtml($this->Demand->caption());
			if (strval($this->Demand->EditValue) != "" && is_numeric($this->Demand->EditValue))
				$this->Demand->EditValue = FormatNumber($this->Demand->EditValue, -2, -2, -2, -2);
			

			// Add refer script
			// source_id

			$this->source_id->LinkCustomAttributes = "";
			$this->source_id->HrefValue = "";

			// destination_id
			$this->destination_id->LinkCustomAttributes = "";
			$this->destination_id->HrefValue = "";

			// Jarak
			$this->Jarak->LinkCustomAttributes = "";
			$this->Jarak->HrefValue = "";

			// RateO
			$this->RateO->LinkCustomAttributes = "";
			$this->RateO->HrefValue = "";

			// RateD
			$this->RateD->LinkCustomAttributes = "";
			$this->RateD->HrefValue = "";

			// Demand
			$this->Demand->LinkCustomAttributes = "";
			$this->Demand->HrefValue = "";
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
		if ($this->source_id->Required) {
			if (!$this->source_id->IsDetailKey && $this->source_id->FormValue != NULL && $this->source_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->source_id->caption(), $this->source_id->RequiredErrorMessage));
			}
		}
		if ($this->destination_id->Required) {
			if (!$this->destination_id->IsDetailKey && $this->destination_id->FormValue != NULL && $this->destination_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->destination_id->caption(), $this->destination_id->RequiredErrorMessage));
			}
		}
		if ($this->Jarak->Required) {
			if (!$this->Jarak->IsDetailKey && $this->Jarak->FormValue != NULL && $this->Jarak->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Jarak->caption(), $this->Jarak->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Jarak->FormValue)) {
			AddMessage($FormError, $this->Jarak->errorMessage());
		}
		if ($this->RateO->Required) {
			if (!$this->RateO->IsDetailKey && $this->RateO->FormValue != NULL && $this->RateO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RateO->caption(), $this->RateO->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RateO->FormValue)) {
			AddMessage($FormError, $this->RateO->errorMessage());
		}
		if ($this->RateD->Required) {
			if (!$this->RateD->IsDetailKey && $this->RateD->FormValue != NULL && $this->RateD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RateD->caption(), $this->RateD->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RateD->FormValue)) {
			AddMessage($FormError, $this->RateD->errorMessage());
		}
		if ($this->Demand->Required) {
			if (!$this->Demand->IsDetailKey && $this->Demand->FormValue != NULL && $this->Demand->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Demand->caption(), $this->Demand->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Demand->FormValue)) {
			AddMessage($FormError, $this->Demand->errorMessage());
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

		// source_id
		$this->source_id->setDbValueDef($rsnew, $this->source_id->CurrentValue, 0, FALSE);

		// destination_id
		$this->destination_id->setDbValueDef($rsnew, $this->destination_id->CurrentValue, 0, FALSE);

		// Jarak
		$this->Jarak->setDbValueDef($rsnew, $this->Jarak->CurrentValue, 0, FALSE);

		// RateO
		$this->RateO->setDbValueDef($rsnew, $this->RateO->CurrentValue, 0, FALSE);

		// RateD
		$this->RateD->setDbValueDef($rsnew, $this->RateD->CurrentValue, 0, FALSE);

		// Demand
		$this->Demand->setDbValueDef($rsnew, $this->Demand->CurrentValue, 0, FALSE);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t005_distribusilist.php"), "", $this->TableVar, TRUE);
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
				case "x_source_id":
					break;
				case "x_destination_id":
					break;
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
						case "x_source_id":
							break;
						case "x_destination_id":
							break;
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