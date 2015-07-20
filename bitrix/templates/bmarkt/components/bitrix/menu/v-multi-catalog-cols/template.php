<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
if (!empty($arResult))
{
	// Уровень, с которого начинать показ в меню
	$depthStart = 2;

	echo '<div class="list-group"><span class="list-group-item active">Каталог</span>';

	foreach ($arResult as $arItem)
	{
		if (($arItem["DEPTH_LEVEL"] <= $arParams["MAX_LEVEL"]) && ($arItem["DEPTH_LEVEL"] >= $depthStart)) // Вложенность $arParams["MAX_LEVEL"]
		{
			$activeAddClass = ($arItem["SELECTED"])? ' active' : '';
			echo '<a href="'.$arItem["LINK"].'" class="list-group-item'.$activeAddClass.'">'.$arItem["TEXT"].'</a>';
			
		}
	}

	echo '</div>';
}
?>