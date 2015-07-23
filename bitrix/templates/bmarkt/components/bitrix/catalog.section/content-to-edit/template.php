<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ITEMS']))
{
	if ($arParams["DISPLAY_TOP_PAGER"])
		echo $arResult["NAV_STRING"];
	?>
	<br /><br />

	<table class="goods-list">
		<tr>
			<th class="td-photo">Фото</th>
			<th>Наименование</th>
			<th>Артикул</th>
			<th>Производитель</th>
		</tr>
		<?
		$itemCount = 0;
		
		foreach ($arResult['ITEMS'] as $key => $arItem)
		{
			$bHasPicture = is_array($arItem['DETAIL_PICTURE_MID']);

			?>
			
			<tr>
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
	echo '<div class="text-block"><p class="warning">Нет товаров, требующих дорабток</p></div>'
?>