<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
if (!empty($arResult))
{
	// Уровень, с которого начинать показ в меню
	$depthStart = 2;

	echo '<ul><li class="cm-title">Каталог<i></i></li>';

	foreach ($arResult as $arItem)
	{
		$linkToClass = preg_replace("/[^a-z-]/", '', $arItem["LINK"]);
		
		if (($arItem["DEPTH_LEVEL"] <= $arParams["MAX_LEVEL"]) && ($arItem["DEPTH_LEVEL"] >= $depthStart)) // Вложенность $arParams["MAX_LEVEL"]
		{
			if ($arItem["SELECTED"])
				echo '<li><span href="'.$arItem["LINK"].'"><i class="icon-'.$linkToClass.' hidden-sm"></i>'.$arItem["TEXT"].'</span></li>';
			else
				echo '<li><a href="'.$arItem["LINK"].'"><i class="icon-'.$linkToClass.' hidden-sm"></i>'.$arItem["TEXT"].'</a></li>';
		}
	}

	echo '</ul>';
}
?>