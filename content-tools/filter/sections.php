<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Список разделов каталога
?>
<div class="sections-list f-item">
	<?php
	// Массив разделов
	$arSectionsAll = array();
	
	$obSections = CIBlockSection::GetList(array("NAME" => "ASC"), array("IBLOCK_ID" => IBLOCK_CATALOGUE, "GLOBAL_ACTIVE" => "Y"), false, array("ID", "NAME"));

	while ($arSections = $obSections->GetNext())
		$arSectionsAll[$arSections["ID"]] = $arSections["NAME"];
	?>
	<strong>Раздел каталога:</strong>
	<select name="section">
		<option value="">(любой)</option>
		<?php
		foreach ($arSectionsAll as $sectionId => $sectionName)
		{
			$selected = ($_GET["section"] == $sectionId)? ' selected="selected"' : '';
			
			echo '<option value="'.$sectionId.'"'.$selected.'>'.$sectionName.'</option>';
		}
		?>
	</select>
</div>