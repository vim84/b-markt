<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$slidersCount = count($arResult["ITEMS"]);

if ($slidersCount > 0)
{
	?>
	<div class="carousel slide" id="carousel-<?=$arResult["ID"]?>">
		<ol class="carousel-indicators">
			<?php
			for ($i = 0; $i < $slidersCount; $i++)
			{
				if ($i == 0)
					$activeClass = ' class="active"';
				else 
					$activeClass = '';
					
				echo '<li data-slide-to="'.$i.'" data-target="#carousel-'.$arResult["ID"].'" '.$activeClass.'></li>';
			}
			?>
		</ol>
		<div class="carousel-inner carousel-block">
			<?php
			foreach ($arResult["ITEMS"] as $keyItem => $arItem)
			{
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
				
				if ($keyItem == 0)
					$activeItemClass = ' active';
				else 
					$activeItemClass = '';
				?>
				<div class="item<?=$activeItemClass?>" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
					<img alt="<?=$arItem["NAME"]?>" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" />
					<div class="carousel-caption">
						<h4><?=$arItem["NAME"]?></h4>
						<p><?=$arItem["PREVIEW_TEXT"]?></p>
						<p><a href="<?=$arItem["PROPERTIES"]["SLIDE_LINK"]["VALUE"]?>">Подробнее</a></p>
					</div>
				</div>
		        <?php
			}
			?>
		</div>
		<a class="left carousel-control" href="#carousel-<?=$arResult["ID"]?>" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-<?=$arResult["ID"]?>" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
	<?php
}
?>