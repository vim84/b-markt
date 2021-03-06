<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Список пользователей
?>
<div class="sent-to-edit-mess">
	<?php
	// Если кликнули Отправить на доработку
	if (isset($_GET["add-to-edit"]) && !empty($_GET["add-to-edit"]))
	{
		if (empty($_GET["check"]))
		{
			echo '<p class="warning-text">Необходимо выбрать позиции для отправки на редактирование</p>';
		}
		else 
		{
			// Для каждого элеметна установим флаг отправки на редактирование и назначим ответственного
			foreach ($_GET["check"] as $elementId)
			{
				// Галочка на редактирование
				CIBlockElement::SetPropertyValuesEx(intval($elementId), IBLOCK_CATALOGUE, array("C_TO_EDIT_FLAG" => 809));
				// Ответственный контент-менеджер
				CIBlockElement::SetPropertyValuesEx(intval($elementId), IBLOCK_CATALOGUE, array("C_MANAGER" => intval($_GET["set-content-manager"])));
				// Комментарий к доработкам
				CIBlockElement::SetPropertyValuesEx(intval($elementId), IBLOCK_CATALOGUE, array("C_COMMENT" => $_GET["to-edit-comment"]));
			}
			
			echo '<p class="success-text">Отправлено на редактирование позиций: '.count($_GET["check"]).'<br />Ответственный: '.$arUsersAll[$_GET["set-content-manager"]].'</p>';
		}
	}
	
	// Если кликнули Принять (снять галочку «на доработку»)
	if (isset($_GET["add-to-completed"]) && !empty($_GET["add-to-completed"]))
	{
		if (empty($_GET["check"]))
		{
			echo '<p class="warning-text">Необходимо выбрать позиции к принятию</p>';
		}
		else 
		{
			// Для каждого элеметна установим флаг отправки на редактирование и назначим ответственного
			foreach ($_GET["check"] as $elementId)
			{
				// Галочка на редактирование
				CIBlockElement::SetPropertyValuesEx(intval($elementId), IBLOCK_CATALOGUE, array("C_TO_EDIT_FLAG" => false));
			}
			
			echo '<p class="success-text">Принято позиций: '.count($_GET["check"]).'</p>';
		}
	}
?>