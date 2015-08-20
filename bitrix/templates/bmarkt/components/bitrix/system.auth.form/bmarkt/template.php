<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?php
if ($arResult["FORM_TYPE"] == "login")
{
	?>
	<span class="user-id-block">Ваш ID: <span>TEMP</span></span>
	<a href="/login/" class="login-link" rel="nofollow">Войти<i class="glyphicon glyphicon-log-in"></i></a>
	<?php
}
else
{
	$userId = $USER->GetID();
	?>
	<span class="user-id-block">Ваш ID: <a href="<?=$arResult['PROFILE_URL']?>"><?=$userId?></a></span>
	<a href="<?=$APPLICATION->GetCurPageParam("logout=yes", array("logout"))?>" class="login-link" rel="nofollow">Выйти<i class="glyphicon glyphicon-log-out"></i></a>
	<?php
}
?>