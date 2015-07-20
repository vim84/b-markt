<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
	array(
		"CONDITION" => "#^/personal/order/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.order",
		"PATH" => "/personal/order/index.php",
	),
	/*array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),*/
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
	array(
		"CONDITION" => "#^/santekhnika/([a-zA-Z0-9_\\/\\-]+)/el-([a-zA-Z0-9_\\-]+)(\\?(.*))?\$#",
		"RULE" => "SECTION_PATH=\$1&ELEMENT_CODE=\$2",
		"ID" => "",
		"PATH" => "/catalog/detail.php",
	),
	array(
		"CONDITION" => "#^/santekhnika/([a-zA-Z0-9_\\/\\-]+)/(\\?(.*))?\$#",
		"RULE" => "SECTION_PATH=\$1",
		"ID" => "",
		"PATH" => "/catalog/section.php",
	),
);

?>