<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

// Редактируемый инфоблок
$iblockId = IBLOCK_WATCHES;
// Редактируемая секция
$sectionId = 24;

if ($USER->isAdmin())
{
	if (CModule::IncludeModule("iblock"))
	{
		// Получим все элементы
		$arFilter = array(
			"IBLOCK_ID" => $iblockId,
			"ACTIVE" => "Y",
			"SECTION_ID" => $sectionId,
			"PROPERTY_BRAND_LOMBARD" => false, // только те, у кого поле "Бренд для фильтра" пустое
		 );
		
		 $obElementsList = CIBlockElement::GetList(
		 	array("ID" => "ASC"),
		 	$arFilter,
		 	false,
		 	array ("nTopCount" => 100),
		 	//false,
		 	array(
		 		"ID",
		 		"IBLOCK_ID",
		 		"NAME",
		 		"IBLOCK_SECTION_ID"
		 	)
		);
	
		echo '<ol>';
		
		while ($arElementsList = $obElementsList->GetNext())
		{
			// Установим новое значение для данного свойства данного элемента
			if ($arElementsList["IBLOCK_SECTION_ID"] == 5) // Audemars Piguet
			{
				$brandValueId = 262;
				$brandName = 'Audemars Piguet';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 11) // Breguet
			{
				$brandValueId = 395;
				$brandName = 'Breguet';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 10) // Breitling
				{
				$brandValueId = 396;
				$brandName = 'Breitling';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 15) // Bvlgari 
				{
				$brandValueId = 397;
				$brandName = 'Bvlgari';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 21) // Cartier
			{
				$brandValueId = 398;
				$brandName = 'Cartier';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 22) // Chopard
			{
				$brandValueId = 399;
				$brandName = 'Chopard';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 12) // IWC
			{
				$brandValueId = 400;
				$brandName = 'IWC';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 13) // Jaeger-LeCoultre
				{
				$brandValueId = 401;
				$brandName = 'Jaeger-LeCoultre';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 24) // Omega
			{
				$brandValueId = 402;
				$brandName = 'Omega';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 25) // Panerai
			{	
				$brandValueId = 403;
				$brandName = 'Panerai';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 14) // Piaget
			{
				$brandValueId = 404;
				$brandName = 'Piaget';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 7) // Rolex
			{
				$brandValueId = 405;
				$brandName = 'Rolex';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 16) // TAG Heuer
			{
				$brandValueId = 406;
				$brandName = 'TAG Heuer';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 23) // Ulysse Nardin
			{
				$brandValueId = 407;
				$brandName = 'Ulysse Nardin';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 17) // Vacheron Constantin
			{
				$brandValueId = 408;
				$brandName = 'Vacheron Constantin';
			}
			elseif ($arElementsList["IBLOCK_SECTION_ID"] == 6) // Zenith
			{
				$brandValueId = 409;
				$brandName = 'Zenith';
			}
			
			//CIBlockElement::SetPropertyValuesEx($arElementsList["ID"], false, array("BRAND_LOMBARD" => $brandValueId));

echo '<li>'.$arElementsList["NAME"].' (id: '.$arElementsList["ID"].') — <span style="color: green">изменено свойство бренд на '.$brandName.'</span></li>';
			
		}
		
		echo '</ol>';
	}
	else
		echo '<p>Не удалось подключить модуль «iblock»</p>';
}
else
	echo '<p>Чтобы просматривать этот файл необходимо иметь права администратора</p>';