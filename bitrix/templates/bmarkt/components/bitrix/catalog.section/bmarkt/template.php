<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ITEMS']))
{
	?>
	<div class="row goods-list catalog-section">
		<?
		foreach ($arResult['ITEMS'] as $key => $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
		
			$bHasPicture = is_array($arItem['PREVIEW_PICTURE']);
			?>
			
			<div class="col-md-4 col-sm-6 col-xs-6 gl-item-wrap" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="gl-item">
					<?php
					if (!empty($arItem["PROPERTIES"]["G_NEW_FLAG"]["VALUE"]))
						echo '<span class="gl-sticker sticker-new">New</span>';
						
					if (!empty($arItem["PROPERTIES"]["G_HIT_FLAG"]["VALUE"]))
						echo '<span class="gl-sticker sticker-hit">Хит</span>';
						
					if (!empty($arItem["PROPERTIES"]["G_ACTION_FLAG"]["VALUE"]))
						echo '<span class="gl-sticker sticker-action">Акция</span>';
					?>
					
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="gl-name"><?=$arItem["NAME"]?></a>
					<div class="gl-preview-text"><?=$arItem["PREVIEW_TEXT"]?></div>
					
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="gl-img">
					<?php
					if ($bHasPicture)
						echo '<img src="'.$arItem["PREVIEW_PICTURE"]["SRC"].'" alt="'.$arItem["NAME"].'"/>';
					else 
						echo '<img src="http://dummyimage.com/600x600/efefef/999999.png&text='.NO_IMG_TEXT.'" alt="'.$arItem["NAME"].'" />';
					?>
					</a>
					<div class="rating"></div>
					<div class="gl-buy-block">
						<div class="gl-price-wrap">
						<?php
						foreach ($arItem["PRICES"] as $code => $arPrice)
						{
							if ($arPrice["CAN_ACCESS"])
							{
								if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"])
									echo '<span class="gl-price gl-old-price">'.$arPrice["PRINT_VALUE"].'</span> <span class="gl-price">'.$arPrice["PRINT_DISCOUNT_VALUE"].'</span>';
								else
									echo '<span class="gl-price">'.$arPrice["PRINT_VALUE"].'</span>';
									
								break;
							}
						}
						echo '</div>';
						
						if ($arItem["CAN_BUY"])
						{
							?>
							<a href="#" class="btn btn-success add-to-cart" type="button" data-product-id="<?=$arItem["ID"]?>" rel="nofollow">В корзину</a>
							<?php
						}
						else 
							echo '<span class="gl-unavailable">нет в наличии</span>';
						?>
					</div>
				</div>
				
				<div class="gl-cmp-fav">
					<noindex>
					<a href="#" class="gl-compare-link" rel="nofollow"><i class="icon-compare"></i><i class="icon-compare-act"></i><span>К сравнению</span></a>
					<a href="#" class="gl-favorite-link" rel="nofollow"><span>В изрбранное</span><i class="icon-heart"></i><i class="icon-heart-act"></i></a>
					</noindex>
				</div>
			</div>
			<?php
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