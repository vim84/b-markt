<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
if (count($arResult["ITEMS"]) > 0)
{
	?>
	<span class="news-title">Новости</span>
	<ul class="list-unstyled">
		<?php
		foreach($arResult["ITEMS"] as $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => "Будет удалена вся информация, связанная с этой новостью. Продолжить?"));
			?>
			<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
				<?=(!empty($arItem["PREVIEW_TEXT"]))? '<p>'.$arItem["PREVIEW_TEXT"].'</p>' : ''?>
			</li>
			<?php
		}
		?>

	</ul>
	<a href="<?=SITE_DIR?>news/">Другие новости</a>
	<?php
}
else 
{
	echo '<div class="alert alert-warning" role="alert">Новостей нет</div>';
}
?>