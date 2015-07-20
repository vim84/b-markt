<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ITEMS']))
{
	// Средняя оценка по отзывам
	if (CModule::IncludeModule("iblock"))
	{
		foreach ($arResult["ITEMS"] as $key => $Item)
		{
			// Средняя оценка по отзывам с сайта
			$reviewsCount = 0;
			$reviewsMarkCount = 0;
			$revMarkSumWidth = 0;
			
			$rs = CIBlockElement::GetList(
				array("ACTIVE_FROM" => "DESС", "SORT" => "ASC"),
				array("ACTIVE" => "Y", "IBLOCK_ID" => IBLOCK_REVIEWS_GOODS, "PROPERTY_GOOD" => $Item["ID"]), 
				false,
				array(),
				array("PROPERTY_MARK")
			);
			
			while ($ar = $rs->GetNext()) 
			{	
				$reviewsCount++;
				$reviewsMarkCount += $ar["PROPERTY_MARK_VALUE"];
			}
			
			// Получим отзывы о товаре с ЯндексМаркета
			$ymReviewsCount = 0;
			$ymReviewsMarkCount = 0;
			
			// Если проставлен id этого товара На ЯндексМаркет
			if (!empty($Item["PROPERTIES"]["ID_MODELI_NA_YANDEKS_MARKET"]["VALUE"]))
			{
				$arOpinions = returnYmOpinionsByModelId($Item["PROPERTIES"]["ID_MODELI_NA_YANDEKS_MARKET"]["VALUE"]);
				
				if (is_array($arOpinions))
				{
					$ymReviewsCount = count($arOpinions);
					
					foreach ($arOpinions as $opinon)
					{
						// Оценка
						$grade = 5;
						
						switch ($opinon["grade"])
						{
							case "-2":
								$grade = 1;
								break;
							case "-1":
								$grade = 2;
								break;
							case "0":
								$grade = 3;
								break;
							case "1":
								$grade = 4;
								break;
							case "2":
								$grade = 5;
								break;
							default:
								$grade = 5;
						}
						
						$ymReviewsMarkCount += $grade;
					}
				}
			}
			
			// Всего отзывов
			$reviewsCountAll = $reviewsCount + $ymReviewsCount;
			// Общая оценка за все отзывы
			$reviewsMarkCountAll = $reviewsMarkCount + $ymReviewsMarkCount;
			
			// Длина шкалы рейтинга
			$revMarkSumWidth = round(20 * $reviewsMarkCountAll / $reviewsCountAll);
			
			$arResult["ITEMS"][$key]["REVIEWS_SUM_MARK"] = $revMarkSumWidth;
			$arResult["ITEMS"][$key]["REVIEWS_SUM_MARK_COUNT"] = $reviewsCountAll;
		}
	}
}
?>