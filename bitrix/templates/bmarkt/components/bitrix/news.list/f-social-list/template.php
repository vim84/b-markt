<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (count($arResult["ITEMS"]) > 0)
{
	?>
	<div class="social">
		<?php
		foreach ($arResult["ITEMS"] as $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
			?>
				<a id="<?=$this->GetEditAreaId($arItem['ID'])?>" href="<?=$arItem["PROPERTIES"]["SOCIAL_LINK"]["VALUE"]?>" title="<?=$arItem["NAME"]?>" rel="nofollow" target="_blank"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" /></a>
	        <?php
		}
		?>
	</div>
	<?php
}
?>