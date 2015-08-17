<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Отобрать Отправленые на доработку
?>
<div class="sections-list f-item">
	<?php
	$arMarkedContent = array(1 => "только не обработанные", 2 => "только обработанные");
	
	//pre ($arPhoto);
	?>
	<strong>Обработано контент-менеджером:</strong>
	<select name="marked-by-content">
		<option value="">(любые)</option>
		<?php
		foreach ($arMarkedContent as $markedContentId => $markedContentTitle)
		{
			$selected = ($_GET["marked-by-content"] == $markedContentId)? ' selected="selected"' : '';
			
			echo '<option value="'.$markedContentId.'"'.$selected.'>'.$markedContentTitle.'</option>';
		}
		?>
	</select>
</div>

<?php
// Добавим данные в фильтр
if ($_GET["marked-by-content"] == 2) // Если выбрали только отправленые
	$GLOBALS["arrFilterSec"]["!PROPERTY_C_EDITED_FLAG"] = false;
elseif ($_GET["marked-by-content"] == 1) // Если выбрали только не отправленные
	$GLOBALS["arrFilterSec"]["PROPERTY_C_EDITED_FLAG"] = false;
?>