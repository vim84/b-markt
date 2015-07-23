<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

// Раздел виден только авторизованным пользователям
if ($USER->IsAuthorized())
{
	?>
	<style type="text/css">
		.conteiner {
			color: #333;
			padding: 20px 30px;
		}
		
		.goods-list {
			border-collapse: collapse;
			width: 100%;
		}
		
		.goods-list td, .goods-list th {
			border: 1px solid #ddd;
			padding: 5px 10px;
		}
		
		.goods-list td img {display: block;}
		
		.goods-list .td-photo {width: 50px;}
		
		.filter {overflow: hidden;}
		
		.filter .f-item {float: left; padding-right: 20px;}
		
		.goods-list tr:hover td {background: #f8f8f8}
		
		.clear {
			clear: both;
			width: 100%;
			height: 0;
			line-height: 0;
			font-size: 0;
		}
		
		.set-to-edit-block {
			float: right;
		}
		
		.add-to-edit {
			float: right;
			padding: 10px 15px;
		}
		
		.warning-text, .success-text {
			background: #eee;
			
			-webkit-border-radius: 5px;
			   -moz-border-radius: 5px;
					border-radius: 5px;
			
			border: 1px solid #333;
			padding: 5px 10px;
		}
		
		.warning-text {
			border-color: red;
			color: red
		}
		
		.success-text {
			border-color: green;
			color: green
		}
	</style>
	<?php
	if (CModule::IncludeModule("iblock"))
	{
		?>
		<div class="conteiner">
		<h1>Список товаров к обработке</h1>
		<h3>Ответственный: <?=$USER->GetFullName()?></h3>
		<p>После обработки позиции снимите галочку «Отправлено на доработку» и позиция исчезнет из этого списка</p>
		<?php
		// Только товары, где ответственный текущий пользователь
		$GLOBALS["arrFilterSec"]["PROPERTY_C_MANAGER"] = $USER->GetID();
		// и помеченный на редактирование
		$GLOBALS["arrFilterSec"]["!PROPERTY_C_TO_EDIT_FLAG"] = false;
		
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section", 
			"content-to-edit", 
			array(
				"IBLOCK_TYPE" => "catalog",
				"IBLOCK_ID" => "4",
				"SECTION_ID" => "",
				"SECTION_CODE" => "",
				"SECTION_USER_FIELDS" => array(
					0 => "",
					1 => "",
				),
				"ELEMENT_SORT_FIELD" => "",
				"ELEMENT_SORT_ORDER" => "",
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
				"CACHE_TYPE" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_GROUPS" => "N",
				"SET_META_KEYWORDS" => "Y",
				"META_KEYWORDS" => "UF_KEYWORDS",
				"SET_META_DESCRIPTION" => "Y",
				"META_DESCRIPTION" => "UF_META_DESCRIPTION",
				"BROWSER_TITLE" => "-",
				"ADD_SECTIONS_CHAIN" => "Y",
				"DISPLAY_COMPARE" => "N",
				"SET_TITLE" => "N",
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
				"DISPLAY_TOP_PAGER" => "Y",
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
	}
	else
		echo '<p>Не удалось подключить модуль «iblock»</p>';
}
else
	echo '<p>Чтобы просматривать этот файл необходимо авторизоваться</p>';