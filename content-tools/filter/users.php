<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Список пользователей
?>
<div class="sections-list f-item">
	<?php
	// Список пользователей
	$arUsersAll = array("none" => "нет ответственного");
	
	$rsContentUsers = CUser::GetList(($by = "ID"), ($order = "asc"), array("ACTIVE" => "Y")); // выбираем пользователей
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
if ($_GET["content-manager"] == 'none')
	$GLOBALS["arrFilterSec"]["PROPERTY_C_MANAGER"] = false;
elseif (intval($_GET["content-manager"]) > 0)
	$GLOBALS["arrFilterSec"]["PROPERTY_C_MANAGER"] = $_GET["content-manager"];
?>