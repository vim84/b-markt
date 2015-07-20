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
		<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>/favicon.ico" />
		<?php
		$APPLICATION->ShowHead();
		
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.min.js');
		
		// Fancybox
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.pack.js');
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.css');
		
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/script.js");
		?>
		<link rel="stylesheet" type="text/css" href="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH."/css/bootstrap.min.css")?>" />
		<link rel="stylesheet" type="text/css" href="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH."/css/style.css")?>" />
	</head>
	<body>
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<nav role="navigation" class="navbar navbar-default navbar-bmarkt">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3">Ваш ID: 10001 <a href="#">Войти</a></div>
			<div class="col-md-5 col-sm-5">
				В корзине <b>3</b> товара на сумму <b>13 666 р.</b>
				<a href="#" class="btn btn-info btn-xs" type="button">Купить</a>
			</div>
			<div class="col-md-4 col-sm-4">
				<a href="#">Избранное</a> <a href="#">Сравнить 5 товаров</a>
			</div>
	</div>
</nav>
  
<div class="container-fluid">
	<div class="row header">
		<div class="col-md-3 col-sm-3">
			<?php
			if ($bMainPage)
				echo '<span><img src="'.SITE_TEMPLATE_PATH.'/img/logo.jpg" alt="B-Markt"/></span>';
			else 
				echo '<a href="/" title="B-Markt"><img src="'.SITE_TEMPLATE_PATH.'/img/logo.jpg" alt="B-Markt"/></a>';
			?>
			
		</div>
		<div class="col-md-1 col-sm-1"></div>
		<div class="col-md-3 col-sm-3 h-contacts">
			<span class="wwwww">Санкт-Петербург:</span>
			<span class="hc-phone">+7 (812) 000-00-00</span>
			<a href="#">Заказать звонок</a>
		</div>
		<div class="col-md-3 col-sm-3 h-contacts">
			<span class="hc-city">Россия:</span>
			<span class="hc-phone">+7 (812) 000-00-00</span>
			<span class="hc-notice">Звонок бесплатный</span>
		</div>
		<div class="col-md-2 col-sm-2">
			<ul class="list-unstyled">
				<li><a href="#">Как заказать</a></li>
				<li><a href="#">Доставка и оплата</a></li>
				<li><a href="#">Контакты</a></li>
			</ul>
		</div>
	</div>
	<div class="row search-form">
		<div class="col-md-10 col-sm-10 col-xs-10">
    		<div class="input-group">
      		<input type="text" class="form-control" aria-label="...">
      		<div class="input-group-btn">
        		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">По всему каталогу <span class="caret"></span></button>
        		<ul class="dropdown-menu dropdown-menu-right" role="menu">
          		<li><a href="#">Ванны</a></li>
          		<li><a href="#">Душевые кабины</a></li>
          		<li><a href="#">Смесители</a></li>
        		</ul>
      		</div><!-- /btn-group -->
    		</div><!-- /input-group -->
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<button type="button" class="btn btn-primary btn-block">Найти</button>
		</div>
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
					<div class="carousel slide" id="carousel-840394">
						<ol class="carousel-indicators">
							<li data-slide-to="0" data-target="#carousel-840394">
							</li>
							<li data-slide-to="1" data-target="#carousel-840394" class="active">
							</li>
							<li data-slide-to="2" data-target="#carousel-840394">
							</li>
						</ol>
						<div class="carousel-inner carousel-block">
							<div class="item">
								<img alt="Carousel Bootstrap First" src="http://lorempixel.com/output/sports-q-c-1600-500-1.jpg" />
								<div class="carousel-caption">
									<h4>
										First Thumbnail label
									</h4>
									<p>
										Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
									</p>
								</div>
							</div>
							<div class="item active">
								<img alt="Carousel Bootstrap Second" src="http://lorempixel.com/output/sports-q-c-1600-500-2.jpg" />
								<div class="carousel-caption">
									<h4>
										Second Thumbnail label
									</h4>
									<p>
										Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
									</p>
								</div>
							</div>
							<div class="item">
								<img alt="Carousel Bootstrap Third" src="http://lorempixel.com/output/sports-q-c-1600-500-3.jpg" />
								<div class="carousel-caption">
									<h4>
										Third Thumbnail label
									</h4>
									<p>
										Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
									</p>
								</div>
							</div>
						</div> <a class="left carousel-control" href="#carousel-840394" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-840394" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
					</div>
					
					<div class="row goods-list">
				<div class="col-md-4 col-sm-4 gl-item-wrap">
					<div class="gl-item">
						<span class="label label-danger">Акция</span>
						<h4>Duravit Starck 3</h4>
						<a href="#"><img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /></a>
						
						<div class="gl-buy-block">
							<span class="gl-price">23 490 р.</span>
							<a href="#" class="btn btn-success" type="button">В корзину</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6 gl-item-wrap">
					<div class="gl-item">
						<span class="label label-danger">Акция</span>
						<h4>Duravit Starck 3</h4>
						<a href="#"><img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /></a>
						
						<div class="gl-buy-block">
							<span class="gl-price">23 490 р.</span>
							<a href="#" class="btn btn-success" type="button">В корзину</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6 gl-item-wrap">
					<div class="gl-item">
						<span class="label label-danger">Акция</span>
						<h4>Duravit Starck 3</h4>
						<a href="#"><img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /></a>
						
						<div class="gl-buy-block">
							<span class="gl-price">23 490 р.</span>
							<a href="#" class="btn btn-success" type="button">В корзину</a>
						</div>
					</div>
				</div>
			</div>
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
			

<?/*?>
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
$wizTemplateId = COption::GetOptionString("main", "wizard_template_id", "eshop_adapt_horizontal", SITE_ID);
CUtil::InitJSCore();
CJSCore::Init(array("fx"));
$curPage = $APPLICATION->GetCurPage();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>/favicon.ico" />
	<?//$APPLICATION->ShowHead();
	echo '<meta http-equiv="Content-Type" content="text/html; charset='.LANG_CHARSET.'"'.(true ? ' /':'').'>'."\n";
	$APPLICATION->ShowMeta("robots", false, true);
	$APPLICATION->ShowMeta("keywords", false, true);
	$APPLICATION->ShowMeta("description", false, true);
	$APPLICATION->ShowCSS(true, true);
	?>
	<link rel="stylesheet" type="text/css" href="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH."/colors.css")?>" />
	<?
	$APPLICATION->ShowHeadStrings();
	$APPLICATION->ShowHeadScripts();
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/script.js");
	?>
	<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="wrap" id="bx_eshop_wrap">
	<div class="header_wrap">
		<div class="header_wrap_container">
			<div class="header_top_section">
				<div class="header_top_section_container_one">
					<div class="bx_cart_login_top">
						<table>
							<tr>
								<td>
								<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "", array(
										"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
										"PATH_TO_PERSONAL" => SITE_DIR."personal/",
										"SHOW_PERSONAL_LINK" => "N",
										"SHOW_NUM_PRODUCTS" => "Y",
										"SHOW_TOTAL_PRICE" => "Y",
										"SHOW_PRODUCTS" => "N",
										"POSITION_FIXED" =>"N"
									),
									false,
									array()
								);?>
								</td>
								<td>
								<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "eshop_adapt", array(
										"REGISTER_URL" => SITE_DIR."login/",
										"PROFILE_URL" => SITE_DIR."personal/",
										"SHOW_ERRORS" => "N"
									),
									false,
									array()
								);?>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="header_top_section_container_two">
					<?$APPLICATION->IncludeComponent('bitrix:menu', "top_menu", array(
							"ROOT_MENU_TYPE" => "top",
							"MENU_CACHE_TYPE" => "Y",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(),
							"MAX_LEVEL" => "1",
							"USE_EXT" => "N",
							"ALLOW_MULTI_SELECT" => "N"
						)
					);?>
				</div>
				<div class="clb"></div>
			</div>  <!-- //header_top_section -->

			<div class="header_inner" itemscope itemtype = "http://schema.org/LocalBusiness">
				<?php
				if ($curPage == "/")
					echo '<span class="h-logo"><img src="'.SITE_TEMPLATE_PATH.'/img/logo.jpg" /></span>';
				else
					echo '<a href="/" class="h-logo"><img src="'.SITE_TEMPLATE_PATH.'/img/logo.jpg" /></a>';
				?>	
			
				<div class="header_inner_container_one">
					<div class="header_inner_include_aria"><span style="color: #1b5c79;">
							<strong style="display: inline-block;padding-top: 7px;"><a style="text-decoration: none;color:#1b5c79;" href="<?=SITE_DIR?>about/contacts/" itemprop = "telephone"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/telephone.php"), false);?></a></strong><br />
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/schedule.php"), false);?></span>
					</div>
				</div>

				<div class="header_inner_container_two">
					<?$APPLICATION->IncludeComponent("bitrix:search.title", "visual", array(
							"NUM_CATEGORIES" => "1",
							"TOP_COUNT" => "5",
							"CHECK_DATES" => "N",
							"SHOW_OTHERS" => "N",
							"PAGE" => SITE_DIR."catalog/",
							"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS") ,
							"CATEGORY_0" => array(
								0 => "iblock_catalog",
							),
							"CATEGORY_0_iblock_catalog" => array(
								0 => "all",
							),
							"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
							"SHOW_INPUT" => "Y",
							"INPUT_ID" => "title-search-input",
							"CONTAINER_ID" => "search",
							"PRICE_CODE" => array(
								0 => "BASE",
							),
							"SHOW_PREVIEW" => "Y",
							"PREVIEW_WIDTH" => "75",
							"PREVIEW_HEIGHT" => "75",
							"CONVERT_CURRENCY" => "Y"
						),
						false
					);?>
				</div>

				<div class="clb"></div>

				<div class="header_inner_bottom_line_container">
					<div class="header_inner_bottom_line">
						<?if ($wizTemplateId == "eshop_adapt_horizontal"):?>
						<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"catalog_horizontal", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"CACHE_SELECTED_ITEMS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
						<?endif?>
					</div>
				</div><!-- //header_inner_bottom_line_container -->

			</div>  <!-- //header_inner -->
			<?if ($APPLICATION->GetCurPage(true) == SITE_DIR."index.php"):?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "sect",
						"AREA_FILE_SUFFIX" => "inc",
						"AREA_FILE_RECURSIVE" => "N",
						"EDIT_MODE" => "html",
					),
					false,
					Array('HIDE_ICONS' => 'Y')
				);?>
			<?endif?>

		</div> <!-- //header_wrap_container -->
	</div> <!-- //header_wrap -->

	<div class="workarea_wrap">
		<div class="worakarea_wrap_container workarea <?if ($wizTemplateId == "eshop_adapt_vertical"):?>grid1x3<?else:?>grid<?endif?>">
			<div id="navigation">
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", array(
						"START_FROM" => "0",
						"PATH" => "",
						"SITE_ID" => "-"
					),
					false,
					Array('HIDE_ICONS' => 'Y')
				);?>
			</div>
			<div class="bx_content_section">
				<?if ($curPage != SITE_DIR."index.php"):?>
				<h1><?=$APPLICATION->ShowTitle(false);?></h1>
				<?endif?>
