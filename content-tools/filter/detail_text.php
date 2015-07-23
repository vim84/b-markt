<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Отобрать с детальным описанием и без
?>
<div class="sections-list f-item">
	<?php
	$arText = array(1 => "только без описания", 2 => "только c описанием");
	
	//pre ($arPhoto);
	?>
	<strong>Детальное описание:</strong>
	<select name="text">
		<option value="">(любые)</option>
		<?php
		foreach ($arText as $textId => $textTitle)
		{
			$selected = ($_GET["text"] == $textId)? ' selected="selected"' : '';
			
			echo '<option value="'.$textId.'"'.$selected.'>'.$textTitle.'</option>';
		}
		?>
	</select>
</div>

<?php
// Добавим данные в фильтр
if ($_GET["text"] == 2) // Если выбрали только с описанием
	$GLOBALS["arrFilterSec"]["!DETAIL_TEXT"] = false;
elseif ($_GET["text"] == 1) // Если выбрали только без описания
	$GLOBALS["arrFilterSec"]["DETAIL_TEXT"] = false;
?>