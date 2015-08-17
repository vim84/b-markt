<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ITEMS']))
{
	if ($arParams["DISPLAY_TOP_PAGER"])
		echo $arResult["NAV_STRING"];
	?>
	<br /><br />

	<table class="goods-list" id="goods-list">
		<tr>
			<th><input type="checkbox" name="check-all" id="check-all" value="1"></th>
			<th class="td-photo">Фото</th>
			<th>Наименование</th>
			<th>Артикул</th>
			<th>Производитель</th>
			<th>Отправлено на доработку</th>
			<th>Комментарий к доработке</th>
			<th>Обработано контент-менеджером</th>
			<th>Комментарий контент-менеджера</th>
			<th>Ответственный</th>
		</tr>
		<?
		$itemCount = 0;
		
		foreach ($arResult['ITEMS'] as $key => $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
		
			$bHasPicture = is_array($arItem['DETAIL_PICTURE_MID']);
			
			// Если назначен контент-менеджер, проверим
			$sUserInfo = '';
			
			if (intval($arItem["PROPERTIES"]["C_MANAGER"]["VALUE"]) > 0)
			{
				$rsUser = CUser::GetByID(intval($arItem["PROPERTIES"]["C_MANAGER"]["VALUE"]));
				$arUser = $rsUser->Fetch();
				
				$sUserInfo = '<a href="/bitrix/admin/user_edit.php?lang=ru&ID='.$arUser["ID"].'">'.((!empty($arUser["NAME"]))? $arUser["NAME"].' '.$arUser["LAST_NAME"] : $arUser["LOGIN"]).'</a>';
			}
			
			?>
			
			<tr id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<td align="center"><input type="checkbox" name="check[]" id="check-<?=$arItem['ID']?>" value="<?=$arItem['ID']?>"<?=(in_array($arItem['ID'], $_GET["check"])? ' checked="checked"' : '')?> class="good-checkbox"></td>
				<td>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<?php
					if ($bHasPicture)
						echo '<img src="'.$arItem["DETAIL_PICTURE_MID"]["SRC"].'" alt="'.$arItem["NAME"].'"/>';
					else 
						echo '<img src="http://dummyimage.com/50x50/efefef/999999.png&text='.NO_IMG_TEXT.'" alt="'.$arItem["NAME"].'" />';
					?>
					</a>
				</td>
				<td>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
				</td>
				<td><?=$arItem["PROPERTIES"]["G_REFERENCE"]["VALUE"]?></td>
				<td><?=$arItem["PROPERTIES"]["G_MANUFACTURER"]["VALUE"][0]?></td>
				<td><?=(!empty($arItem["PROPERTIES"]["C_TO_EDIT_FLAG"]["VALUE"]))? 'Да' : ''?></td>
				<td><?=$arItem["PROPERTIES"]["C_COMMENT"]["VALUE"]?></td>
				<td><?=(!empty($arItem["PROPERTIES"]["C_EDITED_FLAG"]["VALUE"]))? 'Да' : ''?></td>
				<td><?=$arItem["PROPERTIES"]["C_CONTENT_COMMENT"]["VALUE"]?></td>
				<td><?=$sUserInfo?></td>
			</tr>
			<?php
		}
		?>
	</table>
	<br /><br />
	<?php
	if ($arParams["DISPLAY_BOTTOM_PAGER"])
		echo $arResult["NAV_STRING"];
}
else 
	echo '<div class="text-block"><p class="warning">Нет товаров, удовлетворяющих фильтру</p></div>'
?>