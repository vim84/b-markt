<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Список пользователей
?>
<div class="sent-to-edit-mess">
	<?php
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
			}
			
			echo '<p class="success-text">Отправили на редактирование позиций: '.count($_GET["check"]).'<br />Ответственный: '.$arUsersAll[$_GET["set-content-manager"]].'</p>';
			
		}
	}
	
	// Список пользователей
	/*$arUsersAll = array();
	
	$rsContentUsers = CUser::GetList(($by = "ID"), ($order = "asc"), array()); // выбираем пользователей
	while ($arContentUser = $rsContentUsers->Fetch())
	{
		$arUsersAll[$arContentUser['ID']] = (!empty($arContentUser['NAME']))? $arContentUser['NAME'].' '.$arContentUser['LAST_NAME'] : $arContentUser['LOGIN'];
	}
	?>
	<strong>Ответственный:</strong>
	<select name="content-manager">
		<option value="">(любой)</option>
		<?php
		foreach ($arUsersAll as $userId => $userName)
		{
			$selected = ($_GET["content-manager"] == $userId)? ' selected="selected"' : '';
			
			echo '<option value="'.$userId.'"'.$selected.'>'.trim($userName).'</option>';
		}
		?>
	</select>
</div>

<?php
// Добавим данные в фильтр
if (intval($_GET["content-manager"]) > 0)
	$GLOBALS["arrFilterSec"]["PROPERTY_C_MANAGER"] = $_GET["content-manager"];
	
	*/
?>