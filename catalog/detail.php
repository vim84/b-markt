<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");

$sectionId = secIdByPath($_REQUEST["SECTION_PATH"]);

// Если раздел каталога или товар не найден, то 404
if (empty($sectionId) || empty($_REQUEST["ELEMENT_CODE"]))
   @define('ERROR_404', 'Y');
?>

<?php //pre($sectionId); pre ($_REQUEST["ELEMENT_CODE"]); exit(1);
	$APPLICATION->IncludeComponent(
	"bitrix:catalog.element", 
	"bmarkt", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "4",
		"ELEMENT_ID" => "",
		"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
		"SECTION_ID" => $sectionId,
		"SECTION_CODE" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"PROPERTY_CODE" => array(
			0 => "G_MANUFACTURER",
			1 => "G_SERIES",
			2 => "G_WIDTH",
			3 => "G_HEIGHT",
			4 => "G_LENGTH",
			5 => "G_DEPTH",
			6 => "G_WEIGHT",
			7 => "G_PACK_DIMENSIONS",
			8 => "G_WARRANTY",
			9 => "G_COUNTRY",
			10 => "G_STYLE",
			11 => "G_REFERENCE",
			12 => "G_INS_METHOD",
			13 => "G_MATERIALVANNA",
			14 => "G_VOLUME",
			15 => "G_COLORVANN",
			16 => "G_KOLCHEL",
			17 => "G_TOLLIST",
			18 => "G_INSTVANN",
			19 => "G_FORMAVANN",
			20 => "G_ORIENTVANN",
			21 => "G_GMVANN",
			22 => "G_NUMFORSGMVANN",
			23 => "G_REGINTENCEGMVANN",
			24 => "G_GMSPINYVANN",
			25 => "G_NUMFORSSPINYVANN",
			26 => "G_BOKGMVANN",
			27 => "G_NUMFORSBOKVANN",
			28 => "G_GMNOGVANN",
			29 => "G_NUMFORSNOGVANN",
			30 => "G_AMVANN",
			31 => "G_NUMFORSAMVANN",
			32 => "G_UPRVANN",
			33 => "G_AROMAVANN",
			34 => "G_HROMOVANN",
			35 => "G_PODSVETVANN",
			36 => "G_DEZINFVANN",
			37 => "G_POKRDNAVANN",
			38 => "G_SAMOOCHPOKRVANN",
			39 => "G_RUCHKIVANN",
			40 => "G_NESKONSTRVANN",
			41 => "G_REGNOZEKVANN",
			42 => "G_EKRANVANN",
			43 => "G_SLIVPERELIVVANN",
			44 => "G_MESTOPERELIVAVANN",
			45 => "G_DIAMETRSLIVAVANN",
			46 => "G_PODGOLOVNIKVANN",
			47 => "G_NUMPODGOLVANN",
			48 => "G_RADIOVANN",
			49 => "G_TVVANN",
			50 => "G_PHONEVANN",
			51 => "G_PODOGREVVANN",
			52 => "G_VOLNMASSAJVANN",
			53 => "G_WATERLEVELVANN",
			54 => "G_PODLOKOTNVANN",
			55 => "G_STEKLVSTAVVANN",
			56 => "G_SMESITVANN",
			57 => "G_TIPKABINY",
			58 => "G_INSTKABIN",
			59 => "G_ORIENTKABIN",
			60 => "G_KRYSHAKABIN",
			61 => "G_FORMPODDONAKABIN",
			62 => "G_TIPPODDONAKABIN",
			63 => "G_HEIGHTPODDKABIN",
			64 => "G_MATDVERKABIN",
			65 => "G_MATPODDKABIN",
			66 => "G_MATZADSTENKABIN",
			67 => "G_MATPROFKABIN",
			68 => "G_KONSTRDVERKABIN",
			69 => "G_NUMDVERKABIN",
			70 => "G_COLGLASSKABIN",
			71 => "G_COLZADSTENKABIN",
			72 => "G_COLPROFKABIN",
			73 => "G_COLPODDKABIN",
			74 => "G_FAKTGLASSKABIN",
			75 => "G_ISPZADSTENYKABIN",
			76 => "G_UPRKABIN",
			77 => "G_PODSVETPANELKABIN",
			78 => "G_GMKABIN",
			79 => "G_GMSPINKABIN",
			80 => "G_NUMFORSGMSPINYKAB",
			81 => "G_GMNOGKABIN",
			82 => "G_GMNECKKABIN",
			83 => "G_BOKGMKABIN",
			84 => "G_AMVANNKABIN",
			85 => "G_NUMFORSAMKABIN",
			86 => "G_GNSPINVANNKABIN",
			87 => "G_TURBANYAKABIN",
			88 => "G_IKSAUNAKABIN",
			89 => "G_FINNSAUNAKABIN",
			90 => "G_VERHDUSHKABIN",
			91 => "G_TROPICRAINKABIN",
			92 => "G_DUSHLEIKAKABIN",
			93 => "G_AROMAKABIN",
			94 => "G_CHROMOKABIN",
			95 => "G_OZONKABIN",
			96 => "G_KONTRDUSHKABIN",
			97 => "G_VENTKABIN",
			98 => "G_PHONEKABIN",
			99 => "G_SEATKABIN",
			100 => "G_SEATPODDKABIN",
			101 => "G_TIMERKABIN",
			102 => "G_RADIOKABIN",
			103 => "G_SMESKABIN",
			104 => "G_LIGHTKABIN",
			105 => "G_TYPELIGHTKABIN",
			106 => "G_ACSESKABIN",
			107 => "G_REGHIGHNOGKABIN",
			108 => "G_AUDIOCDKABIN",
			109 => "G_REGTEMPKABIN",
			110 => "G_PROTECTPEREGREVKABIN",
			111 => "G_PAROGENKABIN",
			112 => "G_TYPEDUSHOGR",
			113 => "G_INSTDUSHOGR",
			114 => "G_FORMPODDDUSHOGR",
			115 => "G_ORIENTDUSHOGR",
			116 => "G_KONSTRDVERDUSHOGR",
			117 => "G_NUMDVERDUSHOGR",
			118 => "G_MATSTENOKDUSHOGR",
			119 => "G_TOLSTENDUSHOGR",
			120 => "G_COLORSTENDUSHOGR",
			121 => "G_FAKTSTENDUSHOGR",
			122 => "G_MATPROFDUSHOGR",
			123 => "G_COLORPROFDUSHOGR",
			124 => "G_REGSHIRDUSHOGR",
			125 => "G_DIAPREGDUSHOGR",
			126 => "G_DIASLIVDUSHOGR",
			127 => "G_PODDUSHOGR",
			128 => "G_COLORPODDUSHOGR",
			129 => "G_MATPODDUSHOGR",
			130 => "G_HEIGHTPODDUSHOGR",
			131 => "G_NESKOLDNODUSHOGR",
			132 => "G_TYPYKONSTRDUSHOGR",
			133 => "G_ANTICALCDUSHOGR",
			134 => "G_FIXMEHDVERDUSHOGR",
			135 => "G_NOGIDUSHOGR",
			136 => "G_SIFONDUSHOGR",
			137 => "G_NAKLSLIVDUSHOGR",
			138 => "G_NAZNACHSMES",
			139 => "G_UPRSMES",
			140 => "G_MATSMES",
			141 => "G_COLORSMES",
			142 => "G_COLORCOMBSMES",
			143 => "G_COLORNAMESMES",
			144 => "G_MEHSMESHSMES",
			145 => "G_SPOSOBINSTSMES",
			146 => "G_NUMOTVERSTSMES",
			147 => "G_DIAMMONTOTVSMES",
			148 => "G_TYPEINSTSMES",
			149 => "G_TYPEPODVSMES",
			150 => "G_FORMIZLSMES",
			151 => "G_DLINAIZLSMES",
			152 => "G_HEIGHTIZLSMES",
			153 => "G_DLINARUKSMES",
			154 => "G_POVOROTIZLSMES",
			155 => "G_FILTRSMES",
			156 => "G_DONKLAPSMES",
			157 => "G_REGRASHODVODSMES",
			158 => "G_STANDPODVSMES",
			159 => "G_TERMOSTATSMES",
			160 => "G_ISTPITSMES",
			161 => "G_RASHODVODSMES",
			162 => "G_DUSHLEISMES",
			163 => "G_SGIGIENICHDUSHEM",
			164 => "G_VIDVIJIZLIVSMES",
			165 => "G_AERATORSMES",
			166 => "G_BISTRMONTSMES",
			167 => "G_SOBREKSSMES",
			168 => "G_OBRKLAPANSMES",
			169 => "G_PERNAPOSSMES",
			170 => "G_PERNASTIRSMES",
			171 => "G_PERFILTRSMES",
			172 => "G_ECOREJIMSMES",
			173 => "G_DERJLEIKISMES",
			174 => "G_REGPOVERTSMES",
			175 => "G_REGPOGORSMES",
			176 => "G_DUSHSLANGSMES",
			177 => "G_AVTOTKLSMES",
			178 => "G_ANTIZVESTSMES",
			179 => "G_GIBKIZLSMES",
			180 => "G_OBRATNPOTOKSMES",
			181 => "G_KRANPITVODSMES",
			182 => "G_OGRANTEMPSMES",
			183 => "G_PODSVETSMES",
			184 => "G_PROTOCHVODOGREISMES",
			185 => "G_VIDVIJDUSHSMES",
			186 => "G_SLIVGARNSMES",
			187 => "G_CHAINSMES",
			188 => "",
		),
		"OFFERS_LIMIT" => "5",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_ELEMENT_COUNTER" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"LINK_IBLOCK_TYPE" => "catalog",
		"LINK_IBLOCK_ID" => "4",
		"LINK_PROPERTY_SID" => "RECOMMEND",
		"LINK_ELEMENTS_URL" => "",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"DISPLAY_NAME" => "Y",
		"DETAIL_PICTURE_MODE" => "IMG",
		"ADD_DETAIL_TO_SLIDER" => "N",
		"DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"DISPLAY_COMPARE" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"USE_VOTE_RATING" => "N",
		"USE_COMMENTS" => "N",
		"COMPONENT_TEMPLATE" => "bmarkt",
		"CHECK_SECTION_ID_VARIABLE" => "N",
		"SET_CANONICAL_URL" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SHOW_DEACTIVATED" => "N",
		"SEF_MODE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>