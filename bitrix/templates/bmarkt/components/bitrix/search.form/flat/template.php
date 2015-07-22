<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<form action="<?=$arResult["FORM_ACTION"]?>" name="search-form" id="search-form">
	<div class="col-md-10 col-sm-10 col-xs-10">
		<div class="input-group">
			<input type="text" class="form-control" aria-label="..." name="q" value="<?=htmlspecialcharsEx($_GET["q"])?>" autocomplete="off">
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">По всему каталогу 		<span class="caret"></span></button>
				<ul class="dropdown-menu dropdown-menu-right" role="menu">
			  		<li><a href="#">Ванны</a></li>
			  		<li><a href="#">Душевые кабины</a></li>
			  		<li><a href="#">Смесители</a></li>
				</ul>
			</div><!-- /btn-group -->
		</div><!-- /input-group -->
	</div>
	<div class="col-md-2 col-sm-2 col-xs-2">
		<button type="submit" class="btn btn-primary btn-block">Найти</button>
	</div>
</form>