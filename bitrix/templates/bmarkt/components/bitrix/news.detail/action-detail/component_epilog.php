<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$metaName = trim($arResult["NAME"]);
$metaDescriptions = trim(strip_tags($arResult["PREVIEW_TEXT"]));

$APPLICATION->SetPageProperty("keywords", $metaName);
$APPLICATION->SetPageProperty("description", $metaDescriptions);
?>