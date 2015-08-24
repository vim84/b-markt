<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?php
if ($arResult["FORM_TYPE"] == "login")
{
	?>
	<span class="user-id-block"><span class="hidden-xs">Ваш</span> ID: <span>TEMP</span></span>
	<a href="/login/" class="login-link" rel="nofollow"><span class="hidden-sm hidden-xs">Войти</span><i class="glyphicon glyphicon-log-in"></i></a>
	<?php
}
else
{
	$userId = $USER->GetID();
	?>
	<span class="user-id-block"><span class="hidden-xs">Ваш</span> ID: <a href="<?=$arResult['PROFILE_URL']?>"><?=$userId?></a></span>
	<a href="<?=$APPLICATION->GetCurPageParam("logout=yes", array("logout"))?>" class="login-link" rel="nofollow"><span class="hidden-sm hidden-xs">Выйти</span><i class="glyphicon glyphicon-log-out"></i></a>
	<?php
}
?>