<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult['MORE_PHOTO_FLAG'] = false;

if (is_array($arResult["DETAIL_PICTURE"]))
{
	$arFileTmp = CFile::ResizeImageGet(
		$arResult['DETAIL_PICTURE'],
		array("width" => 420, "height" => 225),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		true
	);
	
	$arFileTmpSm = CFile::ResizeImageGet(
		$arResult['DETAIL_PICTURE'],
		array("width" => 51, "height" => 51),
		BX_RESIZE_IMAGE_EXACT,
		true
	);

	$arResult['DETAIL_PICTURE_MID'] = array(
		'SRC' => $arFileTmp["src"],
		'WIDTH' => $arFileTmp["width"],
		'HEIGHT' => $arFileTmp["height"],
	);
	
	$arResult['DETAIL_PICTURE_SM'] = array(
		'SRC' => $arFileTmpSm["src"],
		'WIDTH' => $arFileTmpSm["width"],
		'HEIGHT' => $arFileTmpSm["height"],
	);
}

if (is_array($arResult['PROPERTIES']['G_MORE_PHOTO']['VALUE']) && count($arResult['PROPERTIES']['G_MORE_PHOTO']['VALUE']) > 0)
{
	$arResult['MORE_PHOTO_FLAG'] = true;
	
	foreach ($arResult['PROPERTIES']['G_MORE_PHOTO']['VALUE'] as $key => $arFileId)
	{
		$arFileTmp = CFile::ResizeImageGet(
			$arFileId,
			array("width" => 420, "height" => 225),
			BX_RESIZE_IMAGE_PROPORTIONAL,
			true
		);

		$arResult['MORE_PHOTO_MID'][$key]['ID'] = $arFileId;
		$arResult['MORE_PHOTO_MID'][$key]['PREVIEW_WIDTH'] = $arFileTmp["width"];
		$arResult['MORE_PHOTO_MID'][$key]['PREVIEW_HEIGHT'] = $arFileTmp["height"];

		$arResult['MORE_PHOTO_MID'][$key]['SRC'] = $arFileTmp['src'];
	}
	
	foreach ($arResult['PROPERTIES']['G_MORE_PHOTO']['VALUE'] as $key => $arFileId)
	{
		$arFileTmp = CFile::ResizeImageGet(
			$arFileId,
			array("width" => 51, "height" => 51),
			BX_RESIZE_IMAGE_EXACT,
			true
		);

		$arResult['MORE_PHOTO_SM'][$key]['ID'] = $arFileId;
		$arResult['MORE_PHOTO_SM'][$key]['PREVIEW_WIDTH'] = $arFileTmp["width"];
		$arResult['MORE_PHOTO_SM'][$key]['PREVIEW_HEIGHT'] = $arFileTmp["height"];

		$arResult['MORE_PHOTO_SM'][$key]['SRC'] = $arFileTmp['src'];
	}
	
	foreach ($arResult['PROPERTIES']['G_MORE_PHOTO']['VALUE'] as $key => $arFileId)
	{
		$arFileTmp = CFile::ResizeImageGet(
			$arFileId,
			array("width" => 2000, "height" => 2000),
			BX_RESIZE_IMAGE_EXACT,
			true
		);

		$arResult['MORE_PHOTO_BIG'][$key]['ID'] = $arFileId;
		$arResult['MORE_PHOTO_BIG'][$key]['PREVIEW_WIDTH'] = $arFileTmp["width"];
		$arResult['MORE_PHOTO_BIG'][$key]['PREVIEW_HEIGHT'] = $arFileTmp["height"];

		$arResult['MORE_PHOTO_BIG'][$key]['SRC'] = $arFileTmp['src'];
	}
}
?>