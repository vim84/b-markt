<?php
namespace Bitrix\Security;

use Bitrix\Main\Text\String;


class Random
{
	const RANDOM_BLOCK_LENGTH = 64;

	/**
	 * Returns random (if possible) ASCII string
	 *
	 * @param int $length Result string length.
	 * @return string
	 */
	public function getString($length)
	{
		$result = $this->getBytes((int) ($length/2 + 1));
		$result = bin2hex($result);
		return String::getBinarySubstring($result, 0, $length);
	}

	/**
	 * Returns random (if possible) byte string
	 *
	 * @param int $length Result byte string length.
	 * @return string
	 */
	public function getBytes($length)
	{
		$backup = null;

		if (static::isOpensslSkipped())
		{
			$bytes = openssl_random_pseudo_bytes($length, $strong);
			if ($bytes && String::getBinaryLength($bytes) >= $length)
			{
				if ($strong)
					return String::getBinarySubstring($bytes, 0, $length);
				else
					$backup = $bytes;
			}
		}

		if (function_exists('mcrypt_create_iv'))
		{
			$bytes = mcrypt_create_iv($length, MCRYPT_DEV_URANDOM);
			if ($bytes && String::getBinaryLength($bytes) >= $length)
			{
				return String::getBinarySubstring($bytes, 0, $length);
			}
		}

		if ($file = @fopen('/dev/urandom','rb'))
		{
			$bytes = @fread($file, $length + 1);
			@fclose($file);
			if ($bytes && String::getBinaryLength($bytes) >= $length)
			{
				return String::getBinarySubstring($bytes, 0, $length);
			}
		}

		if ($backup && String::getBinaryLength($backup) >= $length)
		{
			return String::getBinarySubstring($backup, 0, $length);
		}

		$bytes = '';
		while (String::getBinaryLength($bytes) < $length)
		{
			$bytes .= $this->getPseudoRandomBlock();
		}

		return String::getBinarySubstring($bytes, 0, $length);
	}

	/**
	 * Returns pseudo random block
	 *
	 * @return string
	 */
	protected function getPseudoRandomBlock()
	{
		global $APPLICATION;

		if (static::isOpensslSkipped())
		{
			$bytes = openssl_random_pseudo_bytes(static::RANDOM_BLOCK_LENGTH);
			if ($bytes && String::getBinaryLength($bytes) >= static::RANDOM_BLOCK_LENGTH)
			{
				return String::getBinarySubstring($bytes, 0, static::RANDOM_BLOCK_LENGTH);
			}
		}

		$bytes = '';
		for ($i=0; $i < static::RANDOM_BLOCK_LENGTH; $i++)
		{
			$bytes .= pack('S', mt_rand(0,0xffff));
		}

		$bytes .= $APPLICATION->getServerUniqID();

		return hash('sha512', $bytes, true);
	}

	protected function isOpensslSkipped()
	{
		static $result = null;
		if ($result === null)
		{
			$result = (
				!function_exists('openssl_random_pseudo_bytes')
				|| (
					// PHP have strange behavior for "openssl_random_pseudo_bytes" on older PHP versions
					\CSecuritySystemInformation::isRunOnWin()
					&& version_compare(phpversion(),"5.4.0","<")
				)
			);
		}

		return $result;
	}

}