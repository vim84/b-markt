<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

global $CACHE_MANAGER;

//TODO: result_modifier and compinent_epilog time modifier

$cacheTime = 0;
if (!empty($arParams['CACHE_TIME'])) {
    $cacheTime = (int) $arParams['CACHE_TIME'];
}

$cacheSalt = false;

$cachePath = false;
if (!empty($arParams['CACHE_DIR'])) {
    $cachePath = $CACHE_MANAGER->getCompCachePath('/' . $arParams['CACHE_DIR']);
}

// Сбрасываем кеш
if ($_GET['clear_cache'] == 'Y')
    $this->clearResultCache($cacheSalt, $cachePath);

// Включаем кеширование. Подключаем result_modifier.php, template.php и component_epilog.php. Последний вне кеширования.
if ($this->startResultCache($cacheTime, $cacheSalt, $cachePath))
    $this->includeComponentTemplate();