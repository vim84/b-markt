<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ITEMS']))
{
	?>
	<div class="row goods-list gl-hits">
		<div class="col-md-12 gh-title">Хиты и новинки</div>
		<?php
		foreach ($arResult['ITEMS'] as $key => $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
		
			$bHasPicture = is_array($arItem['DETAIL_PICTURE_MID']);
			?>
			<div class="col-md-3 col-sm-3 col-xs-6 gl-item-wrap" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="gl-item">
					<?=(!empty($arItem["PROPERTIES"]["G_NEW_FLAG"]["VALUE"]))? '<span class="gl-sticker sticker-new">New</span>' : ''?>
					<?=(!empty($arItem["PROPERTIES"]["G_HIT_FLAG"]["VALUE"]))? '<span class="gl-sticker sticker-hit">Хит</span>' : ''?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="gl-name"><?=$arItem["NAME"]?></a>
					<div class="gl-preview-text"><?=$arItem["PREVIEW_TEXT"]?></div>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="gl-img">
					<?php
						if ($bHasPicture)
							echo '<img src="'.$arItem["DETAIL_PICTURE_MID"]["SRC"].'" alt="'.$arItem["NAME"].'" />';
						else 
							echo '<img src="http://dummyimage.com/300x300/efefef/999999.png&text='.NO_IMG_TEXT.'" alt="'.$arItem["NAME"].'" />';
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
	echo '<div class="alert alert-warning" role="alert"><strong>Этот текст видят только администраторы</strong>. Тут блок Хитов и новинок. Надо просто отметить хиты или новинки.</div>';
?>