<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult))
	return;

echo '<ul class="list-unstyled">';

foreach ($arResult as $itemIdex => $arItem)
{
	if ($arItem["SELECTED"])
		echo '<li><span>'.$arItem["TEXT"].'</span></li>';
	else 
		echo '<li><a href="'.$arItem["LINK"].'">'.$arItem["TEXT"].'</a></li>';
}

echo '</ul>';
?>