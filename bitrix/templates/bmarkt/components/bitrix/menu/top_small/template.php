<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult))
	return;

echo '<ul>';

foreach ($arResult as $itemIdex => $arItem)
{
	$linkToClass = preg_replace("/[^a-z-]/", '', $arItem["LINK"]);
	
	if ($arItem["SELECTED"])
		echo '<li class="'.$linkToClass.'"><span><i></i>'.$arItem["TEXT"].'</span></li>';
	else 
		echo '<li class="'.$linkToClass.'"><a href="'.$arItem["LINK"].'"><i></i>'.$arItem["TEXT"].'</a></li>';
}

echo '</ul>';
?>