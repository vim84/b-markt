<?php
// ID инфоблока Каталога
define("IBLOCK_CATALOGUE", 4);

// Текст при отсутствии изображения
define("NO_IMG_TEXT", "Нет картинки");

// определим константу LOG_FILENAME, в которой зададим путь к лог-файлу
define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");

// Функция записи в лог-файл двумерного массива
function AddMessToLogByMass ($array)
{
	$text = "";
	// Сохраним в лог сообщение
	foreach ($array as $k => $v)
	{
		if (is_array($v)) {
			
			$text .= $k.": ".$v."\n";
			foreach ($v as $k1 => $v1)
			{
				$text .= "----- ".$k1.": ".$v1."\n";
			}
		}
		else
		{
			$text .= $k.": ".$v."\n";
		}
	}
	AddMessage2Log($text);
}

function pre($a)
{
	global $USER;
	if ($USER->isAdmin() && ($USER->GetID() == 1))
	{
		echo "
		<style>
			.pre {
				background-color: #eceef5;
				background-color: #eceef5;
				border: 1px solid #cad4e7;
				border-radius: 3px;
				color: #3b5998;
				margin-bottom: 20px;
				padding: 10px;
			}
		</style>";
	    echo "<div class=\"pre\"><pre>"; print_r($a); echo "</pre></div>";
	}
}

// Сбрасывает буфер и выводит содержание файла /404.php
AddEventHandler("main", "OnEpilog", "Redirect404");
function Redirect404() {
    if( 
     !defined('ADMIN_SECTION') &&  
     defined("ERROR_404")
   ) {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        CHTTP::SetStatus("404 Not Found");
        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/header.php");
        include($_SERVER["DOCUMENT_ROOT"]."/404.php");
        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/footer.php");
    }
}

// Сгенерировать почтовое событие при запросах
/*AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("AddReview", "SendMailOnReviewAdd"));

class AddReview
{
    function SendMailOnReviewAdd(&$arFields)
    {
		// Узнать мою цену
		if($arFields["IBLOCK_ID"] == IBLOCK_MY_PRICE)
		{
		
			$sitesIds = array();
			$goodName = "";
			$goodUrl = "";
			
			$rsSites = CSite::GetList($by="sort", $order="desc");
			while ($arSite = $rsSites->Fetch())
			{
				$sitesIds[] = $arSite["ID"];
			}
			
			// Записать вид товара
			if (strpos($arFields["PROPERTY_VALUES"]["38"], "/watches/") !== false)
			{
				$goodType = 'часы'; // тип товара
				$goodTypeC = 'Часы'; // с большой буквы
				$goodTypeRod = 'часов'; // родительный падеж
			}
			else 
			{
				$goodType = 'украшение';
				$goodTypeC = 'Украшение';
				$goodTypeRod = 'украшения';
			}
			
			$arEventFields = array(
				"ID"		=> $arFields["ID"],
				"NAME"		=> $arFields["NAME"],
				"EMAIL"	=> $arFields["PROPERTY_VALUES"]["32"],
				"PHONE"	=> $arFields["PROPERTY_VALUES"]["33"],
				"CITY"	=> $arFields["PROPERTY_VALUES"]["34"],
				"INFO"		=> $arFields["PROPERTY_VALUES"]["35"],
				"GOOD_ID"	=> $arFields["PROPERTY_VALUES"]["36"],
				"GOOD_NAME"	=> $arFields["PROPERTY_VALUES"]["37"],
				"GOOD_URL" 	=> $arFields["PROPERTY_VALUES"]["38"],
				"GOOD_TYPE"	=> $goodType,
				"GOOD_TYPE_C"	=> $goodTypeC,
				"GOOD_TYPE_ROD"	=> $goodTypeRod,
				"GOOD_REF" 	=> $arFields["PROPERTY_VALUES"]["188"],
				"DATE"		=> date("d.m.Y H:m:s")
			);
			
			CEvent::Send("MY_PRICE", $sitesIds, $arEventFields, "N");
		}
    }
}
*/

// Склонение слов в зависимости от числительных
function declOfNum ($number, $titles) {
	$cases = array (2, 0, 1, 1, 1, 2);
	return $titles[(($number % 100 > 4) && ($number % 100 < 20))? 2 : $cases[min($number % 10, 5)]];
}

// Формат цены на сайте
function formatPrice ($price)
{
	return number_format($price, 0, '.', ' ').' р.';
}

// Транслит Битрикс
function translitBx ($string) {
	$params = Array(
		"max_len" => "100",
		"change_case" => "L",
		"replace_space" => "-",
		"replace_other" => "-",
		"delete_repeat_replace" => "true",
	);
	
	return CUtil::translit($string, "ru", $params); 
}

// Получение id-раздела по пути разделов SECTION_PATH
// (оставил пока для совместимости)
// Эту функцию заменит secInfoByPath
function secIdByPath ($sectionPath = '')
{
	if (CModule::IncludeModule('iblock'))
	{
		// Массив кодов разделов
		$arrSecCodes = explode('/', $sectionPath);
		$arrSecCodesReverse = array_reverse($arrSecCodes);
		
		// Ищем по уровню вложенности, если будут разделы с одинаковым символьным кодом
		$defLevel = count($arrSecCodes) + 1;
		
		$obSec = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => IBLOCK_CATALOGUE, "CODE" => $arrSecCodesReverse[0], "DEPTH_LEVEL" => $defLevel), false, array("ID", "NAME"));
		   
		if ($arSec = $obSec->GetNext())
			return $arSec["ID"];
		else 
			return false;
	}
	else 
		return false;
}

// Получение информации по пути разделов SECTION_PATH
function secInfoByPath ($sectionPath = '')
{
	if (CModule::IncludeModule('iblock'))
	{
		// Массив кодов разделов
		$arrSecCodes = explode('/', $sectionPath);
		$arrSecCodesReverse = array_reverse($arrSecCodes);
		
		// Ищем по уровню вложенности, если будут разделы с одинаковым символьным кодом
		$defLevel = count($arrSecCodes) + 1;

		$obSec = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => IBLOCK_CATALOGUE, "CODE" => $arrSecCodesReverse[0], "DEPTH_LEVEL" => $defLevel), false, array("ID", "NAME", "CODE", "DESCRIPTION"));
		   
		if ($arSec = $obSec->GetNext())
			return $arSec;
		else 
			return false;
	}
	else 
		return false;
}
?>