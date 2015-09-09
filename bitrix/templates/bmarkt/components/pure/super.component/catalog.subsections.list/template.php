<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
    die();

if (!empty($arResult))
{
	echo '<ul class="catalog-submenu">';
	
	foreach ($arResult["ITEMS"] as $arItem)
	{
		echo '<li><a href="'.$arItem['SECTION_PAGE_URL'].'"><i>('.$arItem['ELEMENT_CNT'].')</i><span>'.$arItem['NAME'].'</span></a></li>';
	}
		
	echo '</ul>';
}
