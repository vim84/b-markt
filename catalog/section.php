<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");

// Поле сортировки (цена)
$sortBy = "CATALOG_PRICE_5";
// Направление сортировки
if ($_GET['order'] == "asc")
{
	$order = "asc";
	$reverseOrder = "desc";
	$sortArr = "&#9650;";
}
elseif ($_GET['order'] == "desc")
{
	$order = "desc";
	$reverseOrder = "asc";
	$sortArr = "&#9660;";
}
else 
{
	$order = "asc";
	$reverseOrder = "desc";
	$sortArr = "&#9650;";
}

$arrSectionInfo = secInfoByPath($_REQUEST["SECTION_PATH"]);

// Если раздел каталога не найден, то 404
if (empty($arrSectionInfo["ID"]))
   @define('ERROR_404', 'Y');
?>

<div class="left_column">
	<?php
	$APPLICATION->IncludeComponent("pure:super.component", "catalog.subsections.list", array(
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SECTION_ID" => $arrSectionInfo["ID"]
		),
		false
	);
	?>
	
	<?/*$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter", 
	"visual_horizontal", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "4",
		"SECTION_ID" => $arrSectionInfo["ID"],
		"FILTER_NAME" => "arrFilterSec",
		"HIDE_NOT_AVAILABLE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"SAVE_IN_SESSION" => "N",
		"INSTANT_RELOAD" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"XML_EXPORT" => "N",
		"SECTION_TITLE" => "NAME",
		"SECTION_DESCRIPTION" => "DESCRIPTION",
		"SHOW_PROPS" => "",
		"COMPONENT_TEMPLATE" => "visual_horizontal",
		"SECTION_CODE" => "",
		"TEMPLATE_THEME" => "blue",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"CONVERT_CURRENCY" => "N"
	),
	false
);*/?>
	
</div><!--left_column-->

<div class="right_column">

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter", 
	"visual_horizontal", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "4",
		"SECTION_ID" => $arrSectionInfo["ID"],
		"FILTER_NAME" => "arrFilterSec",
		"HIDE_NOT_AVAILABLE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"SAVE_IN_SESSION" => "N",
		"INSTANT_RELOAD" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"XML_EXPORT" => "N",
		"SECTION_TITLE" => "NAME",
		"SECTION_DESCRIPTION" => "DESCRIPTION",
		"SHOW_PROPS" => "",
		"COMPONENT_TEMPLATE" => "visual_horizontal",
		"SECTION_CODE" => "",
		"TEMPLATE_THEME" => "blue",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"CONVERT_CURRENCY" => "N"
	),
	false
);?>

<?php
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"bmarkt", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "4",
		"SECTION_ID" => $arrSectionInfo["ID"],
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => "\$sortBy",
		"ELEMENT_SORT_ORDER" => "\$order",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrFilterSec",
		"INCLUDE_SUBSECTIONS" => "A",
		"SHOW_ALL_WO_SECTION" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"PAGE_ELEMENT_COUNT" => "20",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "G_MANUFACTURER",
			1 => "NEWPRODUCT",
			2 => "SALELEADER",
			3 => "",
		),
		"OFFERS_LIMIT" => "5",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "UF_KEYWORDS",
		"SET_META_DESCRIPTION" => "Y",
		"META_DESCRIPTION" => "UF_META_DESCRIPTION",
		"BROWSER_TITLE" => "-",
		"ADD_SECTIONS_CHAIN" => "Y",
		"DISPLAY_COMPARE" => "N",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"CACHE_FILTER" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"COMPONENT_TEMPLATE" => "bmarkt",
		"SET_BROWSER_TITLE" => "Y"
	),
	false
);
?>

<?php
// Описание группы
if ($arrSectionInfo["DESCRIPTION"])
	echo '<article>'.$arrSectionInfo["DESCRIPTION"].'</article>';
?>

</div>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>