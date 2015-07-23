<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Список брендов
?>
<div class="brands-list f-item">
	<?php
	// Массив брендов
	$arBrands = array();
	
	// Список брендов
	$property_enums = CIBlockPropertyEnum::GetList(array("SORT"=>"ASC"), array("IBLOCK_ID" => IBLOCK_CATALOGUE, "CODE" => "G_MANUFACTURER"));
	
	while($enum_fields = $property_enums->GetNext())
		$arBrands[$enum_fields["ID"]] = $enum_fields["VALUE"];
	?>
	<strong>Производитель:</strong>
	<select name="brand">
		<option value="">(любой)</option>
		<?php
		foreach ($arBrands as $brandId => $brandVal)
		{
			$selected = ($_GET["brand"] == $brandId)? ' selected="selected"' : '';
			
			echo '<option value="'.$brandId.'"'.$selected.'>'.$brandVal.'</option>';
		}
		?>
	</select>
</div>

<?php
// Добавим данные в фильтр
if (!empty($_GET["brand"]))
	$GLOBALS["arrFilterSec"]["PROPERTY_G_MANUFACTURER"] = $_GET["brand"];
?>