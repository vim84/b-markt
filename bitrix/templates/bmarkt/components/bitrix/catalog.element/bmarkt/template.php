<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div itemscope itemtype="http://schema.org/Product">
	<div class="product">
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
		</div><!--product_gallery-->
		
		<div class="product_info">
			<div class="group-wrap">
				<div class="group">
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
										<div class="price old-price">
											<big><?=$arPrice["PRINT_VALUE"]?></big>
										</div>
										<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
											<big itemprop="price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></big>
										</div>
										<?
									}
									else
									{
										?>
										<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
											<big itemprop="price"><?=$arPrice["PRINT_VALUE"]?></big>
										</div>
										<?
									}
									
									break;
								}
				            }
				            
				            // Проверка, добавлен ли товар в сравнение
							if (array_key_exists($arResult["ID"], $_SESSION["CATALOG_COMPARE_LIST"][IBLOCK_CATALOG]["ITEMS"]))
								$cmpDisabledClass = ' disabled';
							else 
								$cmpDisabledClass = '';
							?>
							<div class="actions">
								<div class="action compare<?=$cmpDisabledClass?>"><a href="#" rel="nofollow" data-product-id="<?=$arResult["ID"]?>" class="add-to-compare"><span>Сравнить товар</span></a></div>
							</div>
							<div class="buy">
								<a class="css-button green-button cb-mid add-to-cart" href="#" rel="nofollow" data-product-id="<?=$arResult["ID"]?>">В корзину</a>
							</div>
						</div><!--price_and_actions-->
						<?php
					}
					?>
				</div><!--group-->
			</div><!--group-wrap-->
		</div><!--product_info-->
	</div><!--product-->
	
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
	</div><!--no_micro-->
</div>