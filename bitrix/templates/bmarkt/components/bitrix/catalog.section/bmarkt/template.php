<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ITEMS']))
{
	?>
	<div class="row goods-list gl-hits">
		<?
		$itemCount = 0;
		
		foreach ($arResult['ITEMS'] as $key => $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
		
			$bHasPicture = is_array($arItem['PREVIEW_PICTURE']);
			?>
			
			<div class="col-md-3 col-sm-3 col-xs-6 gl-item-wrap" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="gl-item">
					<?php
					if (!empty($arItem["PROPERTIES"]["ACTION"]["VALUE"]))
						echo '<span class="label label-warning">Акция</span>';
						
					if (!empty($arItem["PROPERTIES"]["NEW"]["VALUE"]))
						echo '<span class="label label-warning">New</span>';
						
					if (!empty($arItem["PROPERTIES"]["SALELEADER"]["VALUE"]))
						echo '<span class="label label-primary">New</span>';
					?>
					
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<?php
					if ($bHasPicture)
						echo '<img src="'.$arItem["PREVIEW_PICTURE"]["SRC"].'" alt="'.$arItem["NAME"].'"/>';
					else 
						echo '<img src="http://dummyimage.com/140x140/efefef/999999.png&text='.NO_IMG_TEXT.'" alt="'.$arItem["NAME"].'" />';
					?>
					</a>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
					<div class="gl-buy-block">
						<?php
						foreach ($arItem["PRICES"] as $code => $arPrice)
						{
							if ($arPrice["CAN_ACCESS"])
							{
								if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"])
									echo '<span class="gl-price gl-old-price">'.$arPrice["PRINT_VALUE"].'</span><span class="gl-price">'.$arPrice["PRINT_DISCOUNT_VALUE"].'</span>';
								else
									echo '<span class="gl-price">'.$arPrice["PRINT_VALUE"].'</span>';
									
								break;
							}
						}
						/*
						if ($arItem["CAN_BUY"])
						{
							?>
							<a href="#" class="btn btn-success add-to-cart" type="button" data-product-id="<?=$arItem["ID"]?>" rel="nofollow">В корзину</a>
							<?php
						}*/
						
						?>
						<a href="#" class="btn btn-success add-to-cart" type="button" data-product-id="<?=$arItem["ID"]?>" rel="nofollow">В корзину</a>
					</div>
				</div>
			</div>
			<?php
			$itemCount++;
			if ($itemCount % 4 == 0)
				echo '<br class="clear" />';
		}
		?>
	</div>
	
	<?php
	if ($arParams["DISPLAY_BOTTOM_PAGER"])
		echo $arResult["NAV_STRING"];
}
else 
	echo '<div class="text-block"><p class="warning">Нет товаров, удовлетворяющих фильтру</p></div>'
?>