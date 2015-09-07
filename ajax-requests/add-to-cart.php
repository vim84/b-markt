<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
	// Если к нам идёт Ajax запрос, то ловим его
	if (isset($_POST["ajax_filter"]) && ($_POST["ajax_filter"] == "y"))
	{
		if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog"))
		{
			Add2BasketByProductID($_POST["productId"], 1, array());

			$arBasketItems = array();
			$productsCount = 0;
			
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
			
			$productsCount = count($arBasketItems);
			
			$summ = 0;
			
			for ($i=0; $i <= $productsCount; $i++)
			{                
				$summ = $summ + $arBasketItems[$i]["PRICE"] * $arBasketItems[$i]["QUANTITY"];
			}

			// Склонение "товаров"
			$goods_title = declOfNum($productsCount, array('товар', 'товара', 'товаров'));
			
			?>
			<span class="hc-icon"><i class="icon-cart"></i></span><span class="hidden-xs">В корзине</span> <b><?=$productsCount?> <?=$goods_title?></b> на сумму <b><?=SaleFormatCurrency($summ, "RUB");?></b>
			<a href="/personal/cart/" class="btn btn-success btn-sm" type="button" rel="nofollow">Купить</a>
			<?php
		}
	}
}
else
{
	//Если это не ajax запрос
	echo 'Эта страница не для глаз. Обратитесь к администратору сайта';
}
?>