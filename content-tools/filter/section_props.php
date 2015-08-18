<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Необходимо получить список свойств выбранного раздела
$arMainPropsAll = array();
$secName = '';
$mess = '';

if (isset($_GET["section"]) && intval($_GET["section"]) > 0)
{
	$obSectionsProps = CIBlockSection::GetList(array("NAME" => "ASC"), array("IBLOCK_ID" => IBLOCK_CATALOGUE, "ID" => intval($_GET["section"])), false, array("ID", "NAME", "UF_REQUIRED_PROPS"));
	
	if ($arSectionsProps = $obSectionsProps->GetNext())
	{
		$secName = ' <b>'.$arSectionsProps["NAME"].'</b>';
		
		if (!empty($arSectionsProps["UF_REQUIRED_PROPS"]))
		{
			$arMainPropsAll = explode(";", $arSectionsProps["UF_REQUIRED_PROPS"]);
			
			// Добавим данные в фильтр
			if ($_GET["main-props"] == 2) // Если выбрали только заполнены
			{
				foreach ($arMainPropsAll as $mpVal)
					$GLOBALS["arrFilterSec"]["!PROPERTY_".$mpVal] = false;
			}
			elseif ($_GET["main-props"] == 1) // Если выбрали только НЕ заполнены
			{
				$arTmp = array("LOGIC" => "OR");
				
				foreach ($arMainPropsAll as $mpVal)
					$arTmp[] = array("PROPERTY_".$mpVal => false);
					
				$GLOBALS["arrFilterSec"][] = $arTmp;
			}
		}
		else 
		{
			$mess = 'Для данного раздела основные свойства не заданы главным контент-менеджером!';
		}
	}
	else
		$mess = 'Раздел с id='.intval($_GET["section"]).' не найден!';
}
else 
{
	$mess = 'Выберите раздел!';
}

$arMainProps = array(1 => "НЕ все заполнены", 2 => "все заполнены");
?>
<fieldset>
	<legend>Фильтрация по свойствам раздела<?=$secName?> (не забудьте выбрать раздел):</legend>
	<?=(!empty($mess))? '<div>'.$mess.'</div><br />' : ''?>
	<div class="sections-list f-item">
		<strong>Основные свойства:</strong>
		<select name="main-props">
			<option value="">(не важно)</option>
			<?php
			foreach ($arMainProps as $mpId => $mpTitle)
			{
				$selected = ($_GET["main-props"] == $mpId)? ' selected="selected"' : '';
				
				echo '<option value="'.$mpId.'"'.$selected.'>'.$mpTitle.'</option>';
			}
			?>
		</select>
	</div>
</fieldset>