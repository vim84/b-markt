<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if ($USER->isAdmin())
{
	?>
	<style type="text/css">
		* {color: #333;}
		table {
			border-collapse: collapse;
		}
		table td, table th {
			border: 1px solid #aaa;
			padding: 5px 10px;
			text-align: left;
		}
		
		.tools-block {padding: 20px 50px 0}
	</style>
	<?php
	if (CModule::IncludeModule("iblock"))
	{
		// Вернуть количество элементов по фильтру
		function getCountByFilter ($arFilter) {
			
			$result = CIBlockElement::GetList(array(), $arFilter, array());
			
			return $result;
		}
		
		// Фильтр качественной карточки
		$arFilter100 = array(
			"IBLOCK_ID" => IBLOCK_CATALOGUE,
			"ACTIVE" => "Y",
			"!DETAIL_TEXT" => false,
			"!DETAIL_PICTURE" => false
		);
		
		// Подразделы второго уровня
		// Свойства, обязательные для качественной карточки в UF_REQUIRED_PROPS
		$obSections = CIBlockSection::GetList(
			array("SORT"=>"ASC"),
			array(
				"IBLOCK_ID" => IBLOCK_CATALOGUE,
				"DEPTH_LEVEL" => 2,
				"GLOBAL_ACTIVE" => "Y"
			),
			true,
			array("IBLOCK_ID", "ID", "NAME", "UF_*")
		);
		
		// Массив с данными по разделу
		$arSectionInfo = array();
		// Массив с суммарными данными по всем разделам
		$arSummInfo = array("COUNT_ALL" => 0, "COUNT_100" => 0, "COUNT_0" => 0);
		
		while ($arSection = $obSections->GetNext())
		{
			// Добавим в массив фильтра id раздела
			$arFilterSecId = array("SECTION_ID" => $arSection["ID"]);
			
			// массив фильтра свойств
			$arFilterProps = array();
			
			// Сделаем из обязательных свойств фильтр для раздела
			$arPropsIds = explode(";", $arSection["UF_REQUIRED_PROPS"]);
			
			foreach ($arPropsIds as $propVal)
				$arFilterProps["!PROPERTY_".$propVal] = false;
			
			$arFilter100Sec = array_merge($arFilter100, $arFilterSecId, $arFilterProps);
			
			// Количество качественных карточек
			$count100sec = getCountByFilter($arFilter100Sec);
			
			$arTemp["ID"] = $arSection["ID"];
			$arTemp["NAME"] = $arSection["NAME"];
			$arTemp["COUNT_ALL"] = $arSection["ELEMENT_CNT"];
			$arTemp["COUNT_100"] = $count100sec;
			$arTemp["COUNT_0"] = $arSection["ELEMENT_CNT"] - $count100sec;
			
			$arSectionInfo[] = $arTemp;
			
			$arSummInfo["COUNT_ALL"] += $arTemp["COUNT_ALL"];
			$arSummInfo["COUNT_100"] += $arTemp["COUNT_100"];
			$arSummInfo["COUNT_0"] += $arTemp["COUNT_0"];
		}
		
		/*pre ($arSectionInfo);
		pre ($arSummInfo);
		*/
		
		echo '<div class="tools-block"><h1>Система управления контентом</h1>';
		echo '<h2>Управленческий отчет по качеству контента (суммарная информация)</h2>';
		echo '<h3>Суммарная информация:</h3>';
		
		echo '<table><tr><th>Параметры</th><th>'.date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), time()).'</th></tr>';
		echo '<tr><td>Актив</td><td>'.$arSummInfo["COUNT_100"].'</td></tr>';
		echo '<tr><td>Пассив</td><td>'.$arSummInfo["COUNT_0"].'</td></tr>';
		echo '<tr><td>Цена</td><td>0</td></tr>';
		echo '<tr><td>Фотография</td><td>0</td></tr>';
		echo '<tr><td>Описание</td><td>0</td></tr>';
		echo '<tr><td>Характеристики</td><td>0</td></tr>';
		echo '<tr><td>Инструкции</td><td>0</td></tr>';
		echo '<tr><td>Дополнительное оборудование</td><td>0</td></tr>';
		echo '<tr><td>Отзывы</td><td>0</td></tr>';
		echo '<tr><td>Комплектации</td><td>0</td></tr>';
		echo '<tr><td>Видио</td><td>0</td></tr>';
		echo '<tr><td>Лучший товар</td><td>0</td></tr>';
		echo '<tr><td>Рекомендованные товары</td><td>0</td></tr>';
		echo '<tr><td>Сопутствующие товары</td><td>0</td></tr>';
		
		echo '</table>';
		
		foreach ($arSectionInfo as $secVal)
		{
			// Информация по разделам
			echo '<h3>Раздел '.$secVal["NAME"].':</h3>';
			
			echo '<table><tr><th>Параметры</th><th>'.date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), time()).'</th></tr>';
			echo '<tr><td>Актив</td><td>'.$secVal["COUNT_100"].'</td></tr>';
			echo '<tr><td>Пассив</td><td>'.$secVal["COUNT_0"].'</td></tr>';
			echo '<tr><td>Цена</td><td>0</td></tr>';
			echo '<tr><td>Фотография</td><td>0</td></tr>';
			echo '<tr><td>Описание</td><td>0</td></tr>';
			echo '<tr><td>Характеристики</td><td>0</td></tr>';
			echo '<tr><td>Инструкции</td><td>0</td></tr>';
			echo '<tr><td>Дополнительное оборудование</td><td>0</td></tr>';
			echo '<tr><td>Отзывы</td><td>0</td></tr>';
			echo '<tr><td>Комплектации</td><td>0</td></tr>';
			echo '<tr><td>Видио</td><td>0</td></tr>';
			echo '<tr><td>Лучший товар</td><td>0</td></tr>';
			echo '<tr><td>Рекомендованные товары</td><td>0</td></tr>';
			echo '<tr><td>Сопутствующие товары</td><td>0</td></tr>';
			echo '</table>';
		}
		
		echo '</div>';
	}
	else
		echo '<p>Не удалось подключить модуль «iblock»</p>';
}
else
	echo '<p>Чтобы просматривать этот файл необходимо иметь права администратора</p>';