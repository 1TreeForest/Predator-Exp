<?php
// This script and data application were generated by AppGini 23.17
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/rental_owners.php');
	include_once(__DIR__ . '/rental_owners_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('rental_owners');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'rental_owners';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`rental_owners`.`id`" => "id",
		"`rental_owners`.`first_name`" => "first_name",
		"`rental_owners`.`last_name`" => "last_name",
		"`rental_owners`.`company_name`" => "company_name",
		"if(`rental_owners`.`date_of_birth`,date_format(`rental_owners`.`date_of_birth`,'%m/%d/%Y'),'')" => "date_of_birth",
		"`rental_owners`.`primary_email`" => "primary_email",
		"`rental_owners`.`alternate_email`" => "alternate_email",
		"CONCAT_WS('-', LEFT(`rental_owners`.`phone`,3), MID(`rental_owners`.`phone`,4,3), RIGHT(`rental_owners`.`phone`,4))" => "phone",
		"`rental_owners`.`country`" => "country",
		"`rental_owners`.`street`" => "street",
		"`rental_owners`.`city`" => "city",
		"`rental_owners`.`state`" => "state",
		"`rental_owners`.`zip`" => "zip",
		"`rental_owners`.`comments`" => "comments",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`rental_owners`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => '`rental_owners`.`date_of_birth`',
		6 => 6,
		7 => 7,
		8 => 8,
		9 => 9,
		10 => 10,
		11 => 11,
		12 => 12,
		13 => '`rental_owners`.`zip`',
		14 => 14,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`rental_owners`.`id`" => "id",
		"`rental_owners`.`first_name`" => "first_name",
		"`rental_owners`.`last_name`" => "last_name",
		"`rental_owners`.`company_name`" => "company_name",
		"if(`rental_owners`.`date_of_birth`,date_format(`rental_owners`.`date_of_birth`,'%m/%d/%Y'),'')" => "date_of_birth",
		"`rental_owners`.`primary_email`" => "primary_email",
		"`rental_owners`.`alternate_email`" => "alternate_email",
		"CONCAT_WS('-', LEFT(`rental_owners`.`phone`,3), MID(`rental_owners`.`phone`,4,3), RIGHT(`rental_owners`.`phone`,4))" => "phone",
		"`rental_owners`.`country`" => "country",
		"`rental_owners`.`street`" => "street",
		"`rental_owners`.`city`" => "city",
		"`rental_owners`.`state`" => "state",
		"`rental_owners`.`zip`" => "zip",
		"`rental_owners`.`comments`" => "comments",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`rental_owners`.`id`" => "ID",
		"`rental_owners`.`first_name`" => "First name",
		"`rental_owners`.`last_name`" => "Last name",
		"`rental_owners`.`company_name`" => "Company name",
		"`rental_owners`.`date_of_birth`" => "Date of birth",
		"`rental_owners`.`primary_email`" => "Primary email",
		"`rental_owners`.`alternate_email`" => "Alternate email",
		"`rental_owners`.`phone`" => "Phone",
		"`rental_owners`.`country`" => "Country",
		"`rental_owners`.`street`" => "Street",
		"`rental_owners`.`city`" => "City",
		"`rental_owners`.`state`" => "State",
		"`rental_owners`.`zip`" => "Zip",
		"`rental_owners`.`comments`" => "Comments",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`rental_owners`.`id`" => "id",
		"`rental_owners`.`first_name`" => "first_name",
		"`rental_owners`.`last_name`" => "last_name",
		"`rental_owners`.`company_name`" => "company_name",
		"if(`rental_owners`.`date_of_birth`,date_format(`rental_owners`.`date_of_birth`,'%m/%d/%Y'),'')" => "date_of_birth",
		"`rental_owners`.`primary_email`" => "primary_email",
		"`rental_owners`.`alternate_email`" => "alternate_email",
		"CONCAT_WS('-', LEFT(`rental_owners`.`phone`,3), MID(`rental_owners`.`phone`,4,3), RIGHT(`rental_owners`.`phone`,4))" => "phone",
		"`rental_owners`.`country`" => "country",
		"`rental_owners`.`street`" => "street",
		"`rental_owners`.`city`" => "city",
		"`rental_owners`.`state`" => "state",
		"`rental_owners`.`zip`" => "zip",
		"`rental_owners`.`comments`" => "comments",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`rental_owners` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'rental_owners_view.php';
	$x->RedirectAfterInsert = 'rental_owners_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Landlords';
	$x->TableIcon = 'resources/table_icons/administrator.png';
	$x->PrimaryKey = '`rental_owners`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 100, ];
	$x->ColCaption = ['First name', 'Last name', 'Company name', 'Primary email', 'Alternate email', 'Phone', 'Country', 'Street', 'City', 'State', 'Zip', 'Comments', 'Properties', ];
	$x->ColFieldName = ['first_name', 'last_name', 'company_name', 'primary_email', 'alternate_email', 'phone', 'country', 'street', 'city', 'state', 'zip', 'comments', '%properties.owner%', ];
	$x->ColNumber  = [2, 3, 4, 6, 7, 8, 9, 10, 11, 12, 13, 14, -1, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/rental_owners_templateTV.html';
	$x->SelectedTemplate = 'templates/rental_owners_templateTVS.html';
	$x->TemplateDV = 'templates/rental_owners_templateDV.html';
	$x->TemplateDVP = 'templates/rental_owners_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: rental_owners_init
	$render = true;
	if(function_exists('rental_owners_init')) {
		$args = [];
		$render = rental_owners_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: rental_owners_header
	$headerCode = '';
	if(function_exists('rental_owners_header')) {
		$args = [];
		$headerCode = rental_owners_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: rental_owners_footer
	$footerCode = '';
	if(function_exists('rental_owners_footer')) {
		$args = [];
		$footerCode = rental_owners_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
