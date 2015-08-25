<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$bMainPage = false;
if ($APPLICATION->GetCurPage() == '/')
	$bMainPage = true;
	
$bCataloguePage = false;
if (!empty($_REQUEST["SECTION_PATH"]))
	$bCatalogPage = true;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php $APPLICATION->ShowTitle()?> — B-Markt</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,100italic,300italic,400italic,500,500italic,700,700italic,900italic,900&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<?php
		$APPLICATION->ShowHead();
		
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.min.js');
		
		// Fancybox
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.pack.js');
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.css');
		
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/scripts.js");
		
		// Bootstrap
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/bootstrap.min.css');
		?>
		<link rel="stylesheet" type="text/css" href="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH."/css/style.css")?>" />
		
	</head>
	<body>
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<noindex>
	<nav role="navigation" class="navbar navbar-default navbar-bmarkt">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-3">
				<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "bmarkt", array(
						"REGISTER_URL" => SITE_DIR."login/",
						"PROFILE_URL" => SITE_DIR."personal/",
						"SHOW_ERRORS" => "N"
					),
					false,
					array()
				);?>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-9 h-cart-wrap">
					<div class="h-cart">
						<span class="hc-icon"><i></i></span><span class="hidden-xs">В корзине</span> <b>3 товара</b> на сумму <b>13 666 р.</b>
						<a href="/personal/cart/" class="btn btn-success btn-sm" type="button" rel="nofollow">Купить</a>
					</div>
					
					<div class="fav-compare-wrap">
						<a href="/favorites/" rel="nofollow" class="fc-link"><i></i><span class="hidden-sm hidden-xs">Избранное</span></a>
						<a href="/compare/" class="h-compare-link"><i></i><span class="hidden-sm hidden-xs">Сравнить <span>5 товаров</span></span></a>
					</div>
				</div>
		</div>
	</nav>
	
	<div class="container-fluid header-wrap">
		<div class="container">
			<div class="row header">
				<div class="col-md-3 col-sm-3 h-logo">
					<?php
					if ($bMainPage)
						echo '<span><img src="'.SITE_TEMPLATE_PATH.'/img/logo.png" alt="B-Markt"/></span>';
					else 
						echo '<a href="/" title="B-Markt"><img src="'.SITE_TEMPLATE_PATH.'/img/logo.png" alt="B-Markt"/></a>';
					?>
					
				</div>
				<div class="col-md-1 col-sm-1"></div>
				<div class="col-md-3 col-sm-3 h-contacts">
					<span class="hc-city">Санкт-Петербург:</span>
					<span class="hc-phone">+7 (812) 000-00-00</span>
					<a href="#">Заказать звонок</a>
				</div>
				<div class="col-md-3 col-sm-3 h-contacts">
					<span class="hc-city">Россия:</span>
					<div class="hc-phone">
					<?php
					$APPLICATION->IncludeFile(
						SITE_DIR."include/phone-russia.php",
						Array(),
						Array("MODE"=>"text")
					);
					?>
					</div>
					<span class="hc-notice">Звонок бесплатный</span>
				</div>
				<div class="col-md-2 col-sm-2">
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"top_small", 
						array(
							"ROOT_MENU_TYPE" => "top_small",
							"MENU_CACHE_TYPE" => "Y",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "N",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MAX_LEVEL" => "1",
							"USE_EXT" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"COMPONENT_TEMPLATE" => "top_small",
							"CHILD_MENU_TYPE" => "left",
							"DELAY" => "N"
						),
						false
					);?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row search-form">
			<?php
			$APPLICATION->IncludeComponent("bitrix:search.form", "flat", Array(
				"PAGE" => "#SITE_DIR#search/",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
				),
				false
			);
			?>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<?php
				$APPLICATION->IncludeComponent("bitrix:menu", "v-multi-catalog-cols", array(
					"ROOT_MENU_TYPE" => "left",
					"MENU_CACHE_TYPE" => "A",
					"MENU_CACHE_TIME" => "36000000",
					"MENU_CACHE_USE_GROUPS" => "N",
					"MENU_CACHE_GET_VARS" => array(
					),
					"MAX_LEVEL" => "2",
					"CHILD_MENU_TYPE" => "",
					"USE_EXT" => "Y",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N"
					),
					false
				);
				?>
			</div>
			<?php
			if ($bMainPage)
			{
				?>
				<div class="col-md-9 col-sm-9">
					<?php
					// Слайдер баннеров
					$APPLICATION->IncludeComponent(
						"bitrix:news.list", 
						"main-slider", 
						array(
							"IBLOCK_TYPE" => "banners",
							"IBLOCK_ID" => "8",
							"NEWS_COUNT" => "20",
							"SORT_BY1" => "SORT",
							"SORT_ORDER1" => "ASC",
							"SORT_BY2" => "TIMESTAMP_X",
							"SORT_ORDER2" => "DESC",
							"FILTER_NAME" => "arrFilter",
							"FIELD_CODE" => array(
								0 => "NAME",
								1 => "PREVIEW_TEXT",
								2 => "DETAIL_PICTURE",
								3 => "",
							),
							"PROPERTY_CODE" => array(
								0 => "SLIDE_LINK",
								1 => "",
							),
							"CHECK_DATES" => "N",
							"DETAIL_URL" => "",
							"AJAX_MODE" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"AJAX_OPTION_HISTORY" => "N",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "3600",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "N",
							"PREVIEW_TRUNCATE_LEN" => "",
							"ACTIVE_DATE_FORMAT" => "d.m.Y",
							"SET_TITLE" => "N",
							"SET_STATUS_404" => "N",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"ADD_SECTIONS_CHAIN" => "N",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"PARENT_SECTION" => "",
							"PARENT_SECTION_CODE" => "",
							"INCLUDE_SUBSECTIONS" => "N",
							"PAGER_TEMPLATE" => ".default",
							"DISPLAY_TOP_PAGER" => "N",
							"DISPLAY_BOTTOM_PAGER" => "N",
							"PAGER_TITLE" => "Новости",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N",
							"AJAX_OPTION_ADDITIONAL" => "",
							"COMPONENT_TEMPLATE" => "main-slider",
							"SET_BROWSER_TITLE" => "N",
							"SET_META_KEYWORDS" => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_LAST_MODIFIED" => "N",
							"PAGER_BASE_LINK_ENABLE" => "N",
							"SHOW_404" => "N",
							"MESSAGE_404" => ""
						),
						false
					);
					?>
					<?php
					// Акционные товары
						$GLOBALS["arrFilterAction"] = array("!PROPERTY_G_ACTION_FLAG_VALUE" => false);
							
					    $APPLICATION->IncludeComponent(
						"bitrix:catalog.top", 
						"action", 
						array(
							"IBLOCK_TYPE" => "catalog",
							"IBLOCK_ID" => "4",
							"ELEMENT_SORT_FIELD" => "RAND",
							"ELEMENT_SORT_ORDER" => "asc",
							"ELEMENT_SORT_FIELD2" => "id",
							"ELEMENT_SORT_ORDER2" => "desc",
							"FILTER_NAME" => "arrFilterAction",
							"HIDE_NOT_AVAILABLE" => "N",
							"ELEMENT_COUNT" => "3",
							"LINE_ELEMENT_COUNT" => "1",
							"PROPERTY_CODE" => array(
								0 => "",
								1 => "",
							),
							"OFFERS_LIMIT" => "5",
							"SECTION_URL" => "",
							"DETAIL_URL" => "",
							"SECTION_ID_VARIABLE" => "SECTION_ID",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "360000",
							"CACHE_GROUPS" => "N",
							"DISPLAY_COMPARE" => "N",
							"CACHE_FILTER" => "N",
							"PRICE_CODE" => array(
								0 => "BASE",
							),
							"USE_PRICE_COUNT" => "N",
							"SHOW_PRICE_COUNT" => "1",
							"PRICE_VAT_INCLUDE" => "Y",
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
							"PRODUCT_QUANTITY_VARIABLE" => "quantity",
							"COMPONENT_TEMPLATE" => "action",
							"SEF_MODE" => "N"
						),
						false
					);
					?>
					</div>
				</div>
				<?php
			}
			else 
			{
				$contentClass = '';
				
				if (!$bCatalogPage)
					$contentClass = ' content';
				?>
				<div class="col-md-9 col-sm-9<?=$contentClass?>">
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", array(
							"START_FROM" => "0",
							"PATH" => "",
							"SITE_ID" => "-"
						),
						false,
						Array('HIDE_ICONS' => 'Y')
					);?>
					<h1><?=$APPLICATION->ShowTitle(false);?></h1>
				<?php
			}
			?>