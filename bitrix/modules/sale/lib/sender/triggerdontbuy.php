<?

namespace Bitrix\Sale\Sender;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class TriggerDontBuy extends \Bitrix\Sender\TriggerConnectorClosed
{

	public function getName()
	{
		return Loc::getMessage('sender_trigger_dont_buy_name');
	}

	public function getCode()
	{
		return "dont_buy";
	}

	/** @return bool */
	public static function canBeTarget()
	{
		return false;
	}

	public function filter()
	{
	\Bitrix\Main\Loader::includeModule('sale');

		$daysDontBuy = $this->getFieldValue('DAYS_DONT_BUY');
		if(!is_numeric($daysDontBuy))
			$daysDontBuy = 90;

		$dateFrom = new \Bitrix\Main\Type\Date;
		$dateTo = new \Bitrix\Main\Type\Date;

		$dateFrom->add('-' . $daysDontBuy . ' days');
		$dateTo->add('1 days')->add('-' . $daysDontBuy . ' days');

		$userListDb = \Bitrix\Sale\OrderTable::getList(array(
			'select' => array('BUYER_USER_ID' => 'BUYER.ID', 'EMAIL' => 'BUYER.EMAIL', 'BUYER_USER_NAME' => 'BUYER.NAME'),
			'filter' => array(
				'=LID' => $this->getSiteId(),
				'>MAX_DATE_INSERT' => $dateFrom->format(\Bitrix\Main\UserFieldTable::MULTIPLE_DATE_FORMAT),
				'<MAX_DATE_INSERT' => $dateTo->format(\Bitrix\Main\UserFieldTable::MULTIPLE_DATE_FORMAT),

			),
			'runtime' => array(
				new \Bitrix\Main\Entity\ExpressionField('MAX_DATE_INSERT', 'MAX(%s)', 'DATE_INSERT'),
			),
			'order' => array('USER_ID' => 'ASC')
		));

		if($userListDb->getSelectedRowsCount() > 0)
		{
			$userListDb->addFetchDataModifier(array($this, 'getFetchDataModifier'));
			$this->recipient = $userListDb;
			return true;
		}
		else
			return false;
	}

	public function getForm()
	{
		$daysDontBuyInput = ' <input size=3 type="text" name="'.$this->getFieldName('DAYS_DONT_BUY').'" value="'.htmlspecialcharsbx($this->getFieldValue('DAYS_DONT_BUY', 90)).'"> ';

		return '
			<table>
				<tr>
					<td>'.Loc::getMessage('sender_trigger_dont_buy_days').'</td>
					<td>'.$daysDontBuyInput.'</td>
				</tr>
			</table>
		';
	}

	public function getRecipient()
	{
		return $this->recipient;
	}

	public function getFetchDataModifier($fields)
	{
		if(isset($fields['BUYER_USER_NAME']))
		{
			$fields['NAME'] = $fields['BUYER_USER_NAME'];
			unset($fields['BUYER_USER_NAME']);
		}
		if(isset($fields['BUYER_USER_ID']))
		{
			$fields['USER_ID'] = $fields['BUYER_USER_ID'];
			unset($fields['BUYER_USER_ID']);
		}

		return $fields;
	}
}