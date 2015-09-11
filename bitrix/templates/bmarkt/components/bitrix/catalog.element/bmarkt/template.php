<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//pre($arResult["PROPERTIES"]["G_REFERENCE"]["VALUE"])?>
<div class="row">
	<div class="col-md-12">
		<?=(!empty($arResult["PREVIEW_TEXT"]))? '<div class="gd-preview-text">'.$arResult["PREVIEW_TEXT"].'</div>' : ''?>
		<div class="gb-params-links">
			<div class="gd-rating"><div class="rating"></div></div>
			<div class="gd-article">Код товара: <span><?=$arResult["PROPERTIES"]["G_REFERENCE"]["VALUE"]?></span></div>
			<div class="gd-compare-wrap">
				<div class="gd-compare-link"><a href="#" rel="nofollow"><i class="icon-compare"></i><i class="icon-compare-act"></i>К сравнению</a></div>
				<div class="gd-fc-link"><a href="#" rel="nofollow"><i class="icon-heart"></i><i class="icon-heart-act"></i>В избранное</a></div>
			</div>
		</div>
	</div>
</div>
<div class="row gd-main-props">
	<div class="col-md-6 col-sm-6">
		<div class="product_gallery">
			<?php
	    	if (is_array($arResult['DETAIL_PICTURE_MID']))
	    	{
	    		if (is_array($arResult['DETAIL_PICTURE_MID']))
				{
					?>
					<div class="big_image">
						<span><em>
							<a href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" data-fancybox-group="group-<?=$arResult["ID"]?>" title="<?=(strlen($arResult["DETAIL_PICTURE"]["DESCRIPTION"]) > 0 ? $arResult["DETAIL_PICTURE"]["DESCRIPTION"] : $arResult["NAME"])?>" class="fancybox" id="middle-photo-main" rel="nofollow"><img src="<?=$arResult['DETAIL_PICTURE_MID']['SRC']?>" alt="<?=(strlen($arResult["DETAIL_PICTURE"]["DESCRIPTION"]) > 0 ? $arResult["DETAIL_PICTURE"]["DESCRIPTION"] : $arResult["NAME"])?>" itemprop="image" /></a>
							
							<?php
							if ($arResult['MORE_PHOTO_FLAG'])
							{
								foreach ($arResult["MORE_PHOTO_MID"] as $keyPh => $photoMid)
								{
									?>
									<a href="<?=$arResult["MORE_PHOTO_BIG"][$keyPh]["SRC"]?>" data-fancybox-group="group-<?=$arResult["ID"]?>" id="middle-photo-<?=$photoMid["ID"]?>" title="<?=(strlen($photoMid["DESCRIPTION"]) > 0 ? $photoMid["DESCRIPTION"] : $arResult["NAME"])?>" class="fancybox" style="display: none;" rel="nofollow"><img src="<?=$photoMid["SRC"]?>" alt="<?=(strlen($photoMid["DESCRIPTION"]) > 0 ? $photoMid["DESCRIPTION"] : $arResult["NAME"])?>" /><div class="zoom"></div></a>
									<?php
								}
							}
							?>
						</em></span>
					</div><!--big_image-->
					<?php
				}
	
				if ($arResult['MORE_PHOTO_FLAG'])
				{
					echo '<div class="thumbs"><ul>';
					?>
					
					<li class="active">
						<a href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" data-img="middle-photo-main" title="<?=(strlen($arResult["DETAIL_PICTURE"]["DESCRIPTION"]) > 0 ? $arResult["DETAIL_PICTURE"]["DESCRIPTION"] : $arResult["NAME"])?>" rel="nofollow"><img src="<?=$arResult['DETAIL_PICTURE_SM']['SRC']?>" alt="<?=(strlen($arResult["DETAIL_PICTURE"]["DESCRIPTION"]) > 0 ? $arResult["DETAIL_PICTURE"]["DESCRIPTION"] : $arResult["NAME"])?>" /></a>
					</li>
					
					<?php
					foreach ($arResult["MORE_PHOTO_SM"] as $keyPh => $photoSm)
					{
						?>
						<li>
							<a href="<?=$arResult["MORE_PHOTO_BIG"][$keyPh]["SRC"]?>" data-img="middle-photo-<?=$photoSm["ID"]?>" title="<?=(strlen($photoSm["DESCRIPTION"]) > 0 ? $photoSm["DESCRIPTION"] : $arResult["NAME"])?>" rel="nofollow"><img src="<?=$photoSm["SRC"]?>" alt="<?=(strlen($photoSm["DESCRIPTION"]) > 0 ? $photoSm["DESCRIPTION"] : $arResult["NAME"])?>" /></a>
						</li>
						<?
					}
					echo '</ul><div class="prev"></div><div class="next"></div></div><!--thumbs-->';
				}
	    	}
	    	else
	    	{
		    	?>
		    	<div class="big_image">
					<span><em><img src="http://dummyimage.com/420x225/efefef/999999.png&text=<?=NO_IMG_TEXT?>" alt="<?=$arResult["NAME"]?>"/></em></span>
				</div><!--big_image-->
				<?
	    	}
	    	?>	
		</div>
	</div>
	<div class="col-md-3 col-sm-3">
		<div class="gd-price-block">
			<div class="gd-discount"><span>Скидка</span> 21<i>%</i></span></div>
			<?php
				if ($arResult["CAN_BUY"])
				{
					?>
					<div class="price_and_actions">
						<?php
						foreach($arResult["PRICES"] as $code => $arPrice)
			            {
							if ($arPrice["CAN_ACCESS"])
							{
								if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"])
								{
									?>
									<div class="old-price">
										<span>Старая цена:</span>
										<i><?=$arPrice["PRINT_VALUE"]?></i>
										<?// Скидка $arPrice["DISCOUNT_DIFF_PERCENT"]?>
									</div>
									<div class="price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></div>
									<?
								}
								else
								{
									?>
									<div class="price"><?=$arPrice["PRINT_VALUE"]?></div>
									<?
								}
								
								break;
							}
			            }       
						?>
						
						<div class="buy">
							<a class="btn btn-success btn-block add-to-cart" href="#" rel="nofollow" data-product-id="<?=$arResult["ID"]?>">Купить</a>
						</div>
					</div>
					<table class="buy-params">
						<tr><td class="bp-name">Ожидаемая дата доставки:</td><td>15.01.2016</td></tr>
						<tr><td class="bp-name">Стоимость доставки:</td><td>500 р.</td></tr>
						<tr><td class="bp-name">Стоимость установки:</td><td>500 р.</td></tr>
					</table>
					<?php
				}
				?>
		</div>
	</div>
	<div class="col-md-3 col-sm-3">
		<div class="gd-props-block">
			<?php
			// Основные свойства (первые 10)
			if (!empty($arResult["DISPLAY_PROPERTIES"]))
			{
				echo '<span class="props-title">Основные характеристики:</span><table>';
				
				$propsCount = 0;
				
				foreach ($arResult["DISPLAY_PROPERTIES"] as $propertyVal)
				{
					$propsCount++;
					
					if (is_array($propertyVal["DISPLAY_VALUE"]))
						echo '<tr><td>'.$propertyVal["NAME"].'</td><td>'.implode($propertyVal["DISPLAY_VALUE"], ", ").'</td></tr>';
					else
						echo '<tr><td>'.$propertyVal["NAME"].'</td><td>'.$propertyVal["DISPLAY_VALUE"].'</td></tr>';
					
					if ($propsCount == 10)
						break;
				}
				
				echo '</table>';
			}
			
			if (!empty($arResult["PREVIEW_TEXT"]))
				echo '<div class="props-preview-text"><span class="props-text-title">Описание:</span>'.$arResult["PREVIEW_TEXT"].'</div>';
			?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12">
		<ul class="nav nav-tabs nav-justified">
		  <li role="presentation" class="active"><a href="#">Характеристики</a></li>
		  <li role="presentation"><a href="#">Доставка и оплата</a></li>
		  <li role="presentation"><a href="#">Дополнительно</a></li>
		</ul>
	</div>
</div>

<?php
/*
// Проверка, добавлен ли товар в сравнение
if (array_key_exists($arResult["ID"], $_SESSION["CATALOG_COMPARE_LIST"][IBLOCK_CATALOG]["ITEMS"]))
	$cmpDisabledClass = ' disabled';
else 
	$cmpDisabledClass = '';
?>
<div class="actions">
	<div class="action compare<?=$cmpDisabledClass?>"><a href="#" rel="nofollow" data-product-id="<?=$arResult["ID"]?>" class="add-to-compare"><span>Сравнить товар</span></a></div>
</div>
<?php
*/
?>

<dl class="tabs">
	<?php
	if (!empty($arResult["DETAIL_TEXT"]))
		echo '<dt id="description" class="active">Описание</dt><dd itemprop="description">'.$arResult["DETAIL_TEXT"].'</dd>';
	?>
	
	<?php
	if (!empty($arResult["DISPLAY_PROPERTIES"]))
	{
		echo '<dt id="properties">Все характеристики</dt><dd><ul>';
		
		foreach ($arResult["DISPLAY_PROPERTIES"] as $propertyVal)
		{
			if (is_array($propertyVal["DISPLAY_VALUE"]))
				echo '<li><b>'.$propertyVal["NAME"].'</b>: '.implode($propertyVal["DISPLAY_VALUE"], ", ").'</li>';
			else
			{
				if ($propertyVal["CODE"] == "CML2_MANUFACTURER")
					echo '<li><b>'.$propertyVal["NAME"].'</b>: <span itemprop="manufacturer">'.$propertyVal["DISPLAY_VALUE"].'</span></li>';
				elseif ($propertyVal["CODE"] == "TSVET")
					echo '<li><b>'.$propertyVal["NAME"].'</b>: <span itemprop="color">'.$propertyVal["DISPLAY_VALUE"].'</span></li>';
				else 
					echo '<li><b>'.$propertyVal["NAME"].'</b>: '.$propertyVal["DISPLAY_VALUE"].'</li>';
			}
		}
		
		echo '</ul></dd>';
	}
	?>
</dl><!--tabs-->

<div class="no_micro">
<?php /*
// Комплект
if (!empty($arResult["PROPERTIES"]["KOMPLEKT"]["VALUE"]))
{
	$arKomplekt = explode(";", $arResult["PROPERTIES"]["KOMPLEKT"]["VALUE"]);
	
	$GLOBALS["arrFilterKomplekt"] = array("XML_ID" => $arKomplekt);
	
	$APPLICATION->IncludeComponent(
"bitrix:catalog.top", 
"komplekt", 
array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "4",
	"ELEMENT_SORT_FIELD" => "RAND",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "arrFilterKomplekt",
	"HIDE_NOT_AVAILABLE" => "N",
	"ELEMENT_COUNT" => "5",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "ID_MODELI_NA_YANDEKS_MARKET",
		2 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "N",
	"DISPLAY_COMPARE" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
		0 => "ТВК.РУ: Санкт-Петербург",
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
	"PRODUCT_QUANTITY_VARIABLE" => "quantity"
),
false
);
}
elseif ($USER->isAdmin())
	echo '<div class="warning"><b>Этот текст видят только администраторы</b>. Тут блок "Комплект". Надо просто добавить товары, дополняющие комплект.</div>';
?>

<?php
// Лучший товар
$GLOBALS["arrFilterBest"] = array("!PROPERTY_SALELEADER_VALUE" => false);

$APPLICATION->IncludeComponent(
"bitrix:catalog.top", 
"best", 
array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "4",
	"ELEMENT_SORT_FIELD" => "RAND",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "arrFilterBest",
	"HIDE_NOT_AVAILABLE" => "N",
	"ELEMENT_COUNT" => "1",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "ID_MODELI_NA_YANDEKS_MARKET",
		2 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "N",
	"DISPLAY_COMPARE" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
		
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
	"PRODUCT_QUANTITY_VARIABLE" => "quantity"
),
false
);
?>

<?php
// С этим товаром рекомендуем
//if (!empty($arResult["PROPERTIES"]["RECOMMEND"]["VALUE"]))
//{
	// Был вывод по галочке
	//$GLOBALS["arrFilterRecomended"] = array("ID" => $arResult["PROPERTIES"]["RECOMMEND"]["VALUE"]);
	// Теперь вывод 4 случайных товаров из этой же категории, но кроме текущего товара
	$GLOBALS["arrFilterRecomended"] = array("SECTION_ID" => intval($arResult["SECTION"]["ID"]), "!ID" => intval($arResult["ID"]));
	
	$APPLICATION->IncludeComponent(
"bitrix:catalog.top", 
"recomended", 
array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "4",
	"ELEMENT_SORT_FIELD" => "RAND",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "arrFilterRecomended",
	"HIDE_NOT_AVAILABLE" => "N",
	"ELEMENT_COUNT" => "4",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "ID_MODELI_NA_YANDEKS_MARKET",
		2 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "N",
	"DISPLAY_COMPARE" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
		
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
	"PRODUCT_QUANTITY_VARIABLE" => "quantity"
),
false
);
//}
//elseif ($USER->isAdmin())
//	echo '<div class="warning lefted"><b>Этот текст видят только администраторы</b>. Тут блок "Мы рекомендуем". Надо просто добавить рекомендованные товары.</div>';

*/
?>
</div>