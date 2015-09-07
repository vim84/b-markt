<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (CModule::IncludeModule("sale"))
{	
	echo '<div class="h-cart" id="basket">';
	
	if (IntVal($arResult["NUM_PRODUCTS"]) > 0)
	{
		$arBasketItems = array();
		
		$dbBasketItems = CSaleBasket::GetList(
		     array(
		             "NAME" => "ASC",
		             "ID" => "ASC"
		         ),
		     array(
		             "FUSER_ID" => CSaleBasket::GetBasketUserID(),
		             "LID" => SITE_ID,
		             "ORDER_ID" => "NULL"
		         ),
		     false,
		     false,
		     array("ID", "QUANTITY", "PRICE")
		 );
		 
		while ($arItems = $dbBasketItems->Fetch())
		{
			if (strlen($arItems["CALLBACK_FUNC"]) > 0)
			{
				CSaleBasket::UpdatePrice($arItems["ID"], $arItems["QUANTITY"]);
				$arItems = CSaleBasket::GetByID($arItems["ID"]);
			}
			
			$arBasketItems[] = $arItems;
		}
		
		$summ = 0;
		
		for ($i = 0; $i <= $arResult["NUM_PRODUCTS"]; $i++)
			$summ = $summ + $arBasketItems[$i]["PRICE"] * $arBasketItems[$i]["QUANTITY"];
	
		// Склонение "товаров"
		$goods_title = declOfNum($arResult["NUM_PRODUCTS"],	array('товар', 'товара', 'товаров'));
		
		?>
			<span class="hc-icon"><i class="icon-cart"></i></span><span class="hidden-xs">В корзине</span> <b><?=$arResult["NUM_PRODUCTS"]?> <?=$goods_title?></b> на сумму <b><?=SaleFormatCurrency($summ, "RUB");?></b>
			<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="btn btn-success btn-sm" type="button" rel="nofollow">Купить</a>
		<?php
	}
	else
		echo '<span class="hc-icon"><i class="icon-cart"></i></span><span class="hidden-xs">В корзине</span> <b>0 товаров</b> на сумму <b>0 р.</b>';

	echo '</div>';
}
?>



