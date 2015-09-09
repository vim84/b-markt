<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (CModule::IncludeModule('iblock'))
{
	$arFilterSec = array("IBLOCK_ID" => IBLOCK_CATALOGUE, "ACTIVE" => "Y", "SECTION_ID" => intval($arParams["SECTION_ID"]), "ELEMENT_SUBSECTIONS" => "N", "CNT_ACTIVE" => "Y");
		
	$obSecMenu = CIBlockSection::GetList(array("SORT"=>"ASC"), $arFilterSec, true, array("ID", "NAME", "SECTION_PAGE_URL"));
	
	while($arRes = $obSecMenu->GetNext())
		$arResult["ITEMS"][] = $arRes;
}