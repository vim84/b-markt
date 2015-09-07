<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult))
	return;

echo '<ul>';

foreach ($arResult as $itemIdex => $arItem)
{
	$linkToClass = preg_replace("/[^a-z-]/", '', $arItem["LINK"]);
	
	if ($arItem["SELECTED"])
		echo '<li><span><i class="icon-'.$linkToClass.' hidden-sm hidden-xs"></i>'.$arItem["TEXT"].'</span></li>';
	else 
		echo '<li><a href="'.$arItem["LINK"].'"><i class="icon-'.$linkToClass.' hidden-sm hidden-xs"></i>'.$arItem["TEXT"].'</a></li>';
}

echo '</ul>';
?>