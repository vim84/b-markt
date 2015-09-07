<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ITEMS']))
{
	?>
	<div class="row goods-list gl-main-actions">
		<?php
		foreach ($arResult['ITEMS'] as $key => $arItem)
		{
			$disableLast = ($key == ($arParams["ELEMENT_COUNT"] - 1))? ' hidden-sm hidden-xs' : '';
			
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
		
			$bHasPicture = is_array($arItem['DETAIL_PICTURE']);
			?>
			<div class="col-md-4 col-sm-6 col-xs-6 gl-item-wrap<?=$disableLast?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="gl-item">
					<span class="gl-sticker sticker-action">Акция</span>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="gl-name"><?=$arItem["NAME"]?></a>
					<div class="gl-preview-text"><?=$arItem["PREVIEW_TEXT"]?></div>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="gl-img">
					<?php
						if ($bHasPicture)
							echo '<img src="'.$arItem["DETAIL_PICTURE"]["SRC"].'" alt="'.$arItem["NAME"].'" />';
						else 
							echo '<img src="http://dummyimage.com/300x200/efefef/999999.png&text='.NO_IMG_TEXT.'" alt="'.$arItem["NAME"].'" />';
					?></a>
					<div class="rating"></div>
					<div class="gl-buy-block">
						<div class="gl-price-wrap">
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
			</div>
			<?php
		}
		?>
	</div>
	<?php
}
elseif ($USER->isAdmin())
	echo '<div class="alert alert-warning" role="alert"><strong>Этот текст видят только администраторы</strong>. Тут блок Акционных товаров. Надо просто добавить товары, которые участвуют в акции.</div>';
?>