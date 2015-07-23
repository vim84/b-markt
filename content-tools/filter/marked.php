<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Отобрать Отправленые на доработку

$bMarked = ($_GET["marked"] == 1)? true : false;
$checkedMarked = ($bMarked)? ' checked = "checked"' : '';
?>
<div class="sections-list f-item">
	<label><input type="checkbox" name="marked" value="1"<?=$checkedMarked?>>Отправлено на доработку</label>
</div>

<?php
// Добавим данные в фильтр
if ($bMarked)
	$GLOBALS["arrFilterSec"]["!PROPERTY_C_TO_EDIT_FLAG"] = false;
?>