<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
if (!$bMainPage)
	echo '</div></div>';
?>

<div class="row news-block">
		<div class="col-md-4 col-sm-4">
		<?
$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news-list-idx", 
	array(
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "news-list-idx",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TITLE" => "Новости"
	),
	false
);
?>
		</div>
		<div class="col-md-4 col-sm-4">
			<h4 class="text-center">Акции</h4>
			<ul class="list-unstyled">
				<li>
					<a href="#">У нас новые душевые кабинки</a>
					<p>С этого момента вы можете купить новые душевые кабинки</p>
				</li>
				<li>
					<a href="#">У нас новые душевые кабинки</a>
					<p>С этого момента вы можете купить новые душевые кабинки</p>
				</li><li>
					<a href="#">У нас новые душевые кабинки</a>
					<p>С этого момента вы можете купить новые душевые кабинки</p>
				</li>
			</ul>
			<a href="#">Больше СКИДОК и АКЦИЙ</a>
		</div>
		<div class="col-md-4 col-sm-4">
			<h4 class="text-center">Статьи</h4>
			<ul class="list-unstyled">
				<li>
					<a href="#">У нас новые душевые кабинки</a>
					<p>С этого момента вы можете купить новые душевые кабинки</p>
				</li>
				<li>
					<a href="#">У нас новые душевые кабинки</a>
					<p>С этого момента вы можете купить новые душевые кабинки</p>
				</li><li>
					<a href="#">У нас новые душевые кабинки</a>
					<p>С этого момента вы можете купить новые душевые кабинки</p>
				</li>
			</ul>
			<a href="#">Ещё статьи</a>
		</div>
	</div>
	<div class="row pre-footer">
		<div class="col-md-2 col-sm-2">
			<ul class="list-unstyled">
				<li><a href="#">Как заказать</a></li>
				<li><a href="#">Доставка и оплата</a></li>
				<li><a href="#">Контакты</a></li>
			</ul>
		</div>
		<div class="col-md-2 col-sm-2">
			<ul class="list-unstyled">
				<li><a href="#">Как заказать</a></li>
				<li><a href="#">Как заказать</a></li>
				<li><a href="#">Как заказать</a></li>
			</ul>
		</div>
		<div class="col-md-2 col-sm-2">
			<ul class="list-unstyled">
				<li><a href="#">Как заказать</a></li>
				<li><a href="#">Как заказать</a></li>
				<li><a href="#">Как заказать</a></li>
			</ul>
		</div>
		<div class="col-md-2 col-sm-2">
			<ul class="list-unstyled">
				<li><a href="#">Как заказать</a></li>
				<li><a href="#">Как заказать</a></li>
				<li><a href="#">Как заказать</a></li>
			</ul>
		</div>
		<div class="col-md-4 col-sm-4">
			<form role="form">
				<div class="form-group">
					<input class="form-control" placeholder="Ваш e-mail" type="email" />
				</div>
			
				<button type="submit" class="btn btn-primary btn-block">Подписаться на новости</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-sm-8">
			<p>
				Информация
			</p>
		</div>
		<div class="col-md-4 col-sm-4">
			<p>
				Принимаем к оплате
			</p><img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/40/" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-3">
			<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/60/" />
			<p>Копирайт</p>
		</div>
		<div class="col-md-3 col-sm-3">
			<ul class="list-unstyled list-inline">
				<li>
					VK
				</li>
				<li>
					FB
				</li>
				<li>
					TW
				</li>
				<li>
					G+
				</li>
			</ul>
		</div>
		<div class="col-md-6 col-sm-6">
		</div>
	</div>
</div>
	<?/*?><script src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH."/js/jquery.min.js")?>"></script><?*/?>
	<script src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH."/js/bootstrap.min.js")?>"></script>
	<script src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH."/js/scripts.js")?>"></script>
  </body>
</html>

<?/*?>
				</div> <!-- //bx_content_section-->
				<?if ($wizTemplateId == "eshop_adapt_vertical"):?>
				<div class="bx_sidebar">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "catalog_vertical", array(
							"ROOT_MENU_TYPE" => "left",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"CACHE_SELECTED_ITEMS" => "N",
							"MENU_THEME" => "site",
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
					<?if (
						$APPLICATION->GetCurPage(false) != SITE_DIR."personal/cart/"
						&& $APPLICATION->GetCurPage(false) != SITE_DIR."personal/order/make/"
					):?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."include/viewed_product.php",
							"AREA_FILE_RECURSIVE" => "N",
							"EDIT_MODE" => "html",
						),
						false,
						Array('HIDE_ICONS' => 'Y')
					);?>
					<?endif?>
				</div>
				<div style="clear: both;"></div>
				<?endif?>
				<?if (
					$wizTemplateId == "eshop_adapt_horizontal"
					&& $APPLICATION->GetCurPage(false) != SITE_DIR."personal/cart/"
					&& $APPLICATION->GetCurPage(false) != SITE_DIR."personal/order/make/"
				):?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => SITE_DIR."include/viewed_product.php",
						"AREA_FILE_RECURSIVE" => "N",
						"EDIT_MODE" => "html",
					),
					false,
					Array('HIDE_ICONS' => 'Y')
				);?>
				<?endif?>
			</div> <!-- //worakarea_wrap_container workarea-->
		</div> <!-- //workarea_wrap-->

		<div class="bottom_wrap">
			<div class="bottom_wrap_container">
				<div class="bottom_container_one">
					<div class="bx_inc_about_footer">
						<h4><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_name.php"), false);?></h4>
						<p><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_about.php"), false);?></p>
						<br/><br/>
						<a href="<?=SITE_DIR?>about/"><?=GetMessage("FOOTER_COMPANY_ABOUT")?></a>
					</div>
				</div>
				<div class="bottom_container_two">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."include/news.php",
							"AREA_FILE_RECURSIVE" => "N",
							"EDIT_MODE" => "html",
						),
						false,
						Array('HIDE_ICONS' => 'Y')
					);?>
				</div>
				<div class="bottom_container_tre">
					<div class="bx_inc_social_footer">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/facebook_plugin.php"), false);?>
					</div>
				</div>
			</div>
		</div>  <!-- //bottom_wrap -->

		<div class="footer_wrap">
			<div class="footer_wrap_container">
				<div class="footer_container_one">
					<div class="bx_inc_catalog_footer">
						<h3><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/catalog_title.php"), false);?></h3>
						<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_menu", array(
							"ROOT_MENU_TYPE" => "left",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MAX_LEVEL" => "1",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N"
						),
						false
					);?>
					</div>
				</div>
				<div class="footer_container_two">
					<div class="bx_inc_menu_footer">
						<h3><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/about_title.php"), false);?></h3>
						<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_menu", array(
							"ROOT_MENU_TYPE" => "bottom",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(
							),
						),
						false
					);?>
					</div>
				</div>
				<div class="footer_container_tre">
					<div class="footer_social_icon">
						<?
						$facebookLink = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_facebook.php");
						$twitterLink = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_twitter.php");
						$googlePlusLink = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_google.php");
						$vkLink = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_vk.php");
						?>
						<ul>
						<?if ($facebookLink):?>
						<li class="fb"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/socnet_facebook.php"), false);?></li>
						<?endif?>
						<?if ($twitterLink):?>
						<li class="tw"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/socnet_twitter.php"), false);?></li>
						<?endif?>
						<?if ($googlePlusLink):?>
						<li class="gp"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/socnet_google.php"), false);?></li>
						<?endif?>
						<?if (LANGUAGE_ID=="ru" && $vkLink):?>
						<li class="vk"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/socnet_vk.php"), false);?></li>
						<?endif?>
						</ul>
					</div>
					<div class="footer_contact">
						<span><?=GetMessage("FOOTER_COMPANY_PHONE")?>:</span>
						<strong><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/telephone.php"), false);?></strong>
					</div>
				</div>
				<div class="copyright"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/copyright.php"), false);?></div>
			</div>
		</div>  <!-- //footer_wrap -->

	</div> <!-- //wrap -->

	<div class="notive header">
		<a href="javascript:void(0)" onclick="eshopOpenNativeMenu()" class="gn_general_nav notive"></a>
		<a href="<?=SITE_DIR?>personal/cart/" class="cart_link notive"></a>
		<div class="title notive"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_name.php"), false);?></div>
		<div class="clb"></div>
	</div>
	<div class="menu-page" id="bx_native_menu">
		<div class="menu-items">
		<?$APPLICATION->IncludeComponent("bitrix:menu", "catalog_native", array(
				"ROOT_MENU_TYPE" => "left",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_TIME" => "36000000",
				"MENU_CACHE_USE_GROUPS" => "Y",
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
		<?$APPLICATION->IncludeComponent("bitrix:menu", "catalog_native", array(
				"ROOT_MENU_TYPE" => "native",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_TIME" => "36000000",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"CACHE_SELECTED_ITEMS" => "N",
				"MENU_CACHE_GET_VARS" => array(
				),
				"MAX_LEVEL" => "3",
				"CHILD_MENU_TYPE" => "personal",
				"USE_EXT" => "Y",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N"
			),
			false
		);?>
		</div>
	</div>
	<div class="menu_bg" id="bx_menu_bg"></div>
</body>
</html>
<?*/?>