<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новость детально");

?>
<?$APPLICATION->IncludeComponent("bitrix:news.detail", "article-detail", Array(
	"IBLOCK_TYPE" => "news",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_ID" => "7",	// Код информационного блока
		"ELEMENT_ID" => "",	// ID новости
		"ELEMENT_CODE" => $_REQUEST["N_CODE"],	// Код новости
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"FIELD_CODE" => array(	// Поля
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_TEXT",
			3 => "DATE_ACTIVE_FROM",
			4 => "",
		),
		"PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"IBLOCK_URL" => "",	// URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"BROWSER_TITLE" => "NAME",	// Установить заголовок окна браузера из свойства
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SET_STATUS_404" => "Y",	// Устанавливать статус 404
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
		"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"PAGER_TITLE" => "Страница",	// Название категорий
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"ADD_ELEMENT_CHAIN" => "Y",	// Включать название элемента в цепочку навигации
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"COMPONENT_TEMPLATE" => "news-detail",
		"SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
	),
	false
);?>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>