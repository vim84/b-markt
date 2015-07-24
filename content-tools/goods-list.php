<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if ($USER->isAdmin())
{
	?>
	<link rel="stylesheet" type="text/css" href="<?=CUtil::GetAdditionalFileURL("style.css")?>" />
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script>
	$(document).ready(function() {
		$("#check-all").click(function () {
			if (!$("#check-all").is(":checked"))
				$(".goods-list .good-checkbox").removeAttr("checked");
			else
				$(".goods-list .good-checkbox").attr("checked", "checked");
				
			//return false;
		});
	});
	</script>
	<?php
	if (CModule::IncludeModule("iblock"))
	{
		?>
		<div class="conteiner">
		<h1>Список всех товаров каталога</h1>
		
		<a href="goods-list.php">Сбросить фильтр</a><br /><br />
		<form name="filter" id="filter" method="GET" action="" class="filter">
		
		<?php
		// Массив для фильтрации
		$GLOBALS["arrFilterSec"] = array();
		
		// Список брендов
		require_once('filter/brands.php');
		
		// Список разделов каталога
		require_once('filter/sections.php');
		
		// С фотографией и без
		require_once('filter/photo.php');
		
		// С детальным описанием и без
		require_once('filter/detail_text.php');
		?>		
		<input type="submit" value="Показать" name="show-filtered">
		
		<br class="clear" /><br />
		
		<?php
		// По ответственному контент-менеджеру
		require_once('filter/users.php');
		
		// По отправленным на доработку
		require_once('filter/marked.php');
		?>
		
		<br class="clear" /><br />	
		
		<?php
		// По ответственному контент-менеджеру
		require_once('func/sent_to_edit.php');
		?>
			
		<?php
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section", 
			"content-tool", 
			array(
				"IBLOCK_TYPE" => "catalog",
				"IBLOCK_ID" => "4",
				"SECTION_ID" => $_GET["section"],
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
		<br class="clear" /><br />
		
		<div class="set-to-edit-block">
			<strong>Назначить ответственного</strong>
			<select name="set-content-manager">
				<?php
				foreach ($arUsersAll as $userId => $userName)
				{
					$selected = ($_GET["set-content-manager"] == $userId)? ' selected="selected"' : '';
					
					echo '<option value="'.$userId.'"'.$selected.'>'.trim($userName).'</option>';
				}
				?>
			</select>
			<br /><br />
			<textarea placeholder="Комментарий к доработке" name="to-edit-comment" class="to-edit-comment"></textarea>
			<br />
			<input type="submit" value="Отправить на доработку" name="add-to-edit" class="add-to-edit">
		</div>
		</form>
		<?php
	}
	else
		echo '<p>Не удалось подключить модуль «iblock»</p>';
}
else
	echo '<p>Чтобы просматривать этот файл необходимо иметь права администратора</p>';