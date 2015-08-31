<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult))
	return;

echo '<div class="col-md-2 col-sm-2"><ul>';
				
$itemsCount = count($arResult);
// Поделим объекты пополам (для вывода на 4 колонки)
$oneColCount = ceil($itemsCount / 4);

foreach ($arResult as $itemIdex => $arItem)
{
	if ($arItem["SELECTED"])
		echo '<li><span class="active">'.$arItem["TEXT"].'</span></li>';
	else 
		echo '<li><a href="'.$arItem["LINK"].'">'.$arItem["TEXT"].'</a></li>';

	if (((($itemIdex + 1) % $oneColCount) == 0) && (($itemIdex + 1) !== $itemsCount))
		echo '</ul></div><div class="col-md-2 col-sm-2"><ul class="list-unstyled">';
	
}

echo '</ul></div>';
?>