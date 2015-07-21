<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
echo '<span class="ni-date">'.$arResult["DISPLAY_ACTIVE_FROM"].'</span>';

echo '<div class="news-plain-text">'.$arResult["DETAIL_TEXT"].'</div>';

echo '<p><a href="'.$arResult["LIST_PAGE_URL"].'" class="back-link">Вернуться к новостям</a></p>';
?>