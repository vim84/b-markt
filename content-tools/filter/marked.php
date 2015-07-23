<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Отобрать Отправленые на доработку
?>
<div class="sections-list f-item">
	<?php
	$arMarked = array(1 => "только не отправленные", 2 => "только отправленные");
	
	//pre ($arPhoto);
	?>
	<strong>Отправленые на доработку:</strong>
	<select name="marked">
		<option value="">(любые)</option>
		<?php
		foreach ($arMarked as $markedId => $markedTitle)
		{
			$selected = ($_GET["marked"] == $markedId)? ' selected="selected"' : '';
			
			echo '<option value="'.$markedId.'"'.$selected.'>'.$markedTitle.'</option>';
		}
		?>
	</select>
</div>

<?php
// Добавим данные в фильтр
if ($_GET["marked"] == 2) // Если выбрали только отправленые
	$GLOBALS["arrFilterSec"]["!PROPERTY_C_TO_EDIT_FLAG"] = false;
elseif ($_GET["marked"] == 1) // Если выбрали только не отправленные
	$GLOBALS["arrFilterSec"]["PROPERTY_C_TO_EDIT_FLAG"] = false;
?>