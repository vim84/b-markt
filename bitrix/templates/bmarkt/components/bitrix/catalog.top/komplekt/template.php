<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ITEMS']))
{
	?>
	<div class="h1">Этот товар комплектуется</div>
	<div class="products masonry komplekt-list">
		<ul>
		<?php
		foreach ($arResult['ITEMS'] as $key => $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
		
			$bHasPicture = is_array($arItem['PREVIEW_PICTURE']);
			?>
			<li id="<?=$this->GetEditAreaId($arItem['ID']);?>" itemscope itemtype="http://schema.org/Product">
				<div class="product_image">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<?php
						if ($bHasPicture)
							echo '<img src="'.$arItem["PREVIEW_PICTURE"]["SRC"].'" alt="'.$arItem["NAME"].'" itemprop="image"/>';
						else 
							echo '<img src="http://dummyimage.com/178x150/efefef/999999.png&text='.NO_IMG_TEXT.'" alt="'.$arItem["NAME"].'" />';
						?>
					</a>
				</div>
				<h4><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" itemprop="url"><span itemprop="name"><?=$arItem["NAME"]?></span></a></h4>
				<?php
				foreach ($arItem["PRICES"] as $code => $arPrice)
				{
					if ($arPrice["CAN_ACCESS"])
					{
						if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"])
							echo '<div class="price old-price"><span>'.$arPrice["PRINT_VALUE"].'</span></div><div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span itemprop="price">'.$arPrice["PRINT_DISCOUNT_VALUE"].'</span></div>';
						else
							echo '<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span itemprop="price">'.$arPrice["PRINT_VALUE"].'</span></div>';
							
						break;
					}
				}
				
				// Проверка, добавлен ли товар в сравнение
				if (array_key_exists($arItem["ID"], $_SESSION["CATALOG_COMPARE_LIST"][IBLOCK_CATALOG]["ITEMS"]))
					$cmpDisabledClass = ' disabled';
				else 
					$cmpDisabledClass = '';
				?>
				<div class="info">
					<form action="#" method="post">
						<div class="actions">
							<div class="action compare<?=$cmpDisabledClass?>"><a href="#" rel="nofollow" data-product-id="<?=$arItem["ID"]?>" class="add-to-compare"><span>Сравнить товар</span></a></div>
						</div>
						<div class="rating-wrap">
							<div class="stars-back"><div class="stars-act" style="width: <?=$arItem["REVIEWS_SUM_MARK"]?>%"></div></div>
						</div>
						
						<?php // рейтинг для Schema.org?>
						<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="so-rating">
							<span itemprop="ratingValue"><?=$arItem["REVIEWS_SUM_MARK"]?></span>
							<span itemprop="worstRating">20</span>
							<span itemprop="bestRating">100</span>
							<span itemprop="ratingCount"><?=$arItem["REVIEWS_SUM_MARK_COUNT"]?></span>
						</div>
						
						<?php
						if ($arItem["CAN_BUY"])
						{
							?>
							<div class="buy">
								<a class="button add-to-cart" href="#" rel="nofollow" data-product-id="<?=$arItem["ID"]?>">В корзину</a>
							</div>
							<?php
						}
						?>
					</form>
				</div>
			</li>
			<?php
		}
		?>
		</ul>
	</div>
	<?php
}
elseif ($USER->isAdmin())
	echo '<div class="warning"><b>Этот текст видят только администраторы</b>. Тут блок "Комплект". Надо просто добавить товары, дополняющие комплект.</div>';
?>