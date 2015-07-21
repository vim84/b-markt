<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;

$cp = $this->__component; // объект компонента

if (is_object($cp))
{
    // добавим в arResult компонента поле анонса для новости, чтобы передать в component_epilog.php (по умолчанию не передаётся)
    $cp->SetResultCacheKeys(array('PREVIEW_TEXT'));
}
?>