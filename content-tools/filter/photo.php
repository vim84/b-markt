<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Отобрать с фотографией или без
?>
<div class="sections-list f-item">
	<?php
	$arPhoto = array(1 => "только без фото", 2 => "только c фото");
	
	//pre ($arPhoto);
	?>
	<strong>Фото:</strong>
	<select name="photo">
		<option value="">(любые)</option>
		<?php
		foreach ($arPhoto as $photoId => $photoTitle)
		{
			$selected = ($_GET["photo"] == $photoId)? ' selected="selected"' : '';
			
			echo '<option value="'.$photoId.'"'.$selected.'>'.$photoTitle.'</option>';
		}
		?>
	</select>
</div>

<?php
// Добавим данные в фильтр
if ($_GET["photo"] == 2) // Если выбрали только с фото
	$GLOBALS["arrFilterSec"]["!DETAIL_PICTURE"] = false;
elseif ($_GET["photo"] == 1) // Если выбрали только без фото
	$GLOBALS["arrFilterSec"]["DETAIL_PICTURE"] = false;
?>