<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
if (count($arResult["ITEMS"]) > 0)
{
	?>
	<div class="news-list">
		<?php
		foreach($arResult["ITEMS"] as $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => "Будет удалена вся информация, связанная с этой новостью. Продолжить?"));
			?>
			<div class="nl-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<?php
				if (is_array($arItem["PREVIEW_PICTURE"]))
				{
					?>
					<span class="ni-img">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>"><img
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
							height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
							alt="<?=$arItem["NAME"]?>"
							/></a>
					</span>
					<?php
				}
				?>
				<div class="ni-right-block">
					<span class="ni-date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="ni-title"><?=$arItem["NAME"]?></a>
					<div class="ni-text"><?=$arItem["PREVIEW_TEXT"]?></div>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	
	<?php
	if($arParams["DISPLAY_BOTTOM_PAGER"])
		echo $arResult["NAV_STRING"];
}
else 
{
	echo '<div class="alert alert-warning" role="alert">Новостей нет</div>';
}
?>