<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ITEMS']))
{
	if ($arParams["DISPLAY_TOP_PAGER"])
		echo $arResult["NAV_STRING"];
	?>
	<br /><br />
	<table class="goods-list">
		<tr>
			<td class="td-photo">Фото</td>
			<td>Наименование</td>
			<td>Артикул</td>
			<td>Производитель</td>
		</tr>
		<?
		$itemCount = 0;
		
		foreach ($arResult['ITEMS'] as $key => $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
		
			$bHasPicture = is_array($arItem['DETAIL_PICTURE_MID']);
			?>
			
			<tr id="<?=$this->GetEditAreaId($arItem['ID']);?>">
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