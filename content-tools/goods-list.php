<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if ($USER->isAdmin())
{
	?>
	<style type="text/css">
	.conteiner {
		color: #333;
		padding: 50px 30px;
	}
	
	.goods-list {
		border-collapse: collapse;
		width: 100%;
	}
	
	.goods-list td, .goods-list th {
		border: 1px solid #ddd;
		padding: 5px 10px;
	}
	
	.goods-list .td-photo {width: 50px;}
	
	.filter {overflow: hidden;}
	
	.filter .f-item {float: left; padding-right: 20px;}
	</style>
	<?php
	if (CModule::IncludeModule("iblock"))
	{
		?>
		<div class="conteiner">
		<h1>Список всех товаров каталога</h1>
		<form name="filter" id="filter" method="GET" action="" class="filter">
		<div class="brands-list f-item">
			<?php
			// Массив брендов
			$arBrands = array();
			
			// Список брендов
			$property_enums = CIBlockPropertyEnum::GetList(array("SORT"=>"ASC"), array("IBLOCK_ID" => IBLOCK_CATALOGUE, "CODE" => "G_MANUFACTURER"));
			while($enum_fields = $property_enums->GetNext())
				$arBrands[$enum_fields["ID"]] = $enum_fields["VALUE"];
			?>
			<strong>Производитель</strong>
			<select name="brand">
				<option value="">(любой)</option>
				<?php
				foreach ($arBrands as $brandId => $brandVal)
				{
					$selected = ($_GET["brand"] == $brandId)? ' selected="selected"' : '';
					
					echo '<option value="'.$brandId.'"'.$selected.'>'.$brandVal.'</option>';
				}
				?>
			</select>
		</div>
		
		<div class="sections-list f-item">
			<?php
			// Массив брендов
			$arSectionsAll = array();
			
			$obSections = CIBlockSection::GetList(array("NAME" => "ASC"), array("IBLOCK_ID" => IBLOCK_CATALOGUE, "GLOBAL_ACTIVE" => "Y"), false, array("ID", "NAME"));
	   
			while ($arSections = $obSections->GetNext())
				$arSectionsAll[$arSections["ID"]] = $arSections["NAME"];
			?>
			<strong>Раздел каталога</strong>
			<select name="section">
				<option value="">(любой)</option>
				<?php
				foreach ($arSectionsAll as $sectionId => $sectionName)
				{
					$selected = ($_GET["section"] == $sectionId)? ' selected="selected"' : '';
					
					echo '<option value="'.$sectionId.'"'.$selected.'>'.$sectionName.'</option>';
				}
				?>
			</select>
		</div>
		
		<div class="sections-list f-item">
			<?php
			$checkedPhotoY = ($_GET["photo-y"] == 1)? ' checked = "checked"' : '';
			$checkedPhotoN = ($_GET["photo-n"] == 1)? ' checked = "checked"' : '';
			?>
			<strong>Фото</strong>
			<label><input type="checkbox" name="photo-y" value="1"<?=$checkedPhotoY?>>Есть</label>
			<label><input type="checkbox" name="photo-n" value="1"<?=$checkedPhotoN?>>Нет</label>
		</div>
		
		<input type="submit" value="Показать">
		</form>
		<?php
		$GLOBALS["arrFilterSec"] = array("PROPERTY_G_MANUFACTURER" => $_GET["brand"]);
		
		// Если хотим и с фото и без фото
		if (($_GET["photo-y"] == 1) && ($_GET["photo-n"] == 1))
		{
			$GLOBALS["arrFilterPhotos"] = array(
				array(
					"LOGIC" => "OR",
					array("!DETAIL_PICTURE" => false),
					array("DETAIL_PICTURE" => false)
				)
			);
			
			$GLOBALS["arrFilterSec"] = array_merge($GLOBALS["arrFilterSec"], $GLOBALS["arrFilterPhotos"]);
		}
		elseif ($_GET["photo-y"] == 1) // Если выбрали только с фото
			$GLOBALS["arrFilterSec"]["!DETAIL_PICTURE"] = false;
		elseif ($_GET["photo-n"] == 1) // Если выбрали только без фото
			$GLOBALS["arrFilterSec"]["DETAIL_PICTURE"] = false;

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

	}
	else
		echo '<p>Не удалось подключить модуль «iblock»</p>';
}
else
	echo '<p>Чтобы просматривать этот файл необходимо иметь права администратора</p>';