<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
if (count($arResult["ITEMS"]) > 0)
{
	?>
	<div class="news-idx">
		<a href="<?=SITE_DIR?>news/" class="news-title"><i class="icon-news-big"></i>Новости</a>
		<ul>
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
		<a href="<?=SITE_DIR?>news/" class="more-link"><i class="icon-more"></i>Другие новости</a>
	</div>
	<?php
}
else 
{
	echo '<div class="alert alert-warning" role="alert">Новостей нет</div>';
}
?>