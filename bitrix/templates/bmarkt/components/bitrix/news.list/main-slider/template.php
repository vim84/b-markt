<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$slidersCount = count($arResult["ITEMS"]);

if ($slidersCount > 0)
{
	?>
	<div id="slider">
		<ul>
			<?php
			foreach ($arResult["ITEMS"] as $arItem)
			{
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
				?>
				<li id="<?=$this->GetEditAreaId($arItem['ID'])?>">
		            <a href="<?=$arItem["PROPERTIES"]["SLIDE_LINK"]["VALUE"]?>" title="<?=$arItem["NAME"]?>"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" /></a>
		        </li>
		        <?php
			}
			?>
		</ul>
		
		<?php
		if ($slidersCount > 1)
			echo '<div class="pager"></div>';
		?>
		
		<div class="tlc"></div>
		<div class="trc"></div>
		<div class="blc"></div>
		<div class="brc"></div>
	</div><!--slider-->
	<?php
}
?>