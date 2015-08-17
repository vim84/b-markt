<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Отобрать с детальным описанием и без
?>
<div class="sections-list f-item">
	<?php
	$arTextContent = array(1 => "только без комментария", 2 => "только c комментарием");
	?>
	<strong>Комментарий контент-менеджера:</strong>
	<select name="content-comment">
		<option value="">(любые)</option>
		<?php
		foreach ($arTextContent as $textContentId => $textContentTitle)
		{
			$selected = ($_GET["content-comment"] == $textContentId)? ' selected="selected"' : '';
			
			echo '<option value="'.$textContentId.'"'.$selected.'>'.$textContentTitle.'</option>';
		}
		?>
	</select>
</div>

<?php
// Добавим данные в фильтр
if ($_GET["content-comment"] == 2) // Если выбрали только с описанием
	$GLOBALS["arrFilterSec"]["!PROPERTY_C_CONTENT_COMMENT"] = false;
elseif ($_GET["content-comment"] == 1) // Если выбрали только без описания
	$GLOBALS["arrFilterSec"]["PROPERTY_C_CONTENT_COMMENT"] = false;
?>