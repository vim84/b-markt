<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Фильтрация по строковым полям
?>
<div class="brands-list f-item">
	<strong>Название:</strong>
	<input type="text" name="name" value="<?=(!empty($_GET["name"]))? $_GET["name"] : ''?>" size="50">
</div>
<div class="brands-list f-item">
	<strong>Артикул:</strong>
	<input type="text" name="reference" value="<?=(!empty($_GET["reference"]))? $_GET["reference"] : ''?>">
</div>
<div class="brands-list f-item">
	<strong>Серия:</strong>
	<input type="text" name="series" value="<?=(!empty($_GET["series"]))? $_GET["series"] : ''?>">
</div>

<?php
// Добавим данные в фильтр
if (!empty($_GET["reference"]))
	$GLOBALS["arrFilterSec"]["PROPERTY_G_REFERENCE"] = '%'.$_GET["reference"].'%';
	
if (!empty($_GET["name"]))
	$GLOBALS["arrFilterSec"]["NAME"] = '%'.$_GET["name"].'%';
	
if (!empty($_GET["series"]))
	$GLOBALS["arrFilterSec"]["PROPERTY_G_SERIES"] = $_GET["series"];
?>