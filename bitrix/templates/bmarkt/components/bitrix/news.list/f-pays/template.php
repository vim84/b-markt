<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (count($arResult["ITEMS"]) > 0)
{
	echo '<div class="payment_methods">';
	foreach ($arResult["ITEMS"] as $arItem)
	{
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
		
		echo '<img id="'.$this->GetEditAreaId($arItem['ID']).'" src="'.$arItem["PREVIEW_PICTURE"]["SRC"].'" alt="'.$arItem["NAME"].'" /> ';
	}	
	echo '</div>';
	
	echo '<div class="payment_methods big">';
	foreach ($arResult["ITEMS"] as $arItem)
		echo '<img id="'.$this->GetEditAreaId($arItem['ID']).'" src="'.$arItem["DETAIL_PICTURE"]["SRC"].'" alt="'.$arItem["NAME"].'" /> ';
	echo '</div>';
}
?>