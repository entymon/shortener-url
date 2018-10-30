<?php
/**
 * Created by PhpStorm.
 * User: entymon
 * Date: 30/10/2018
 * Time: 19:21
 */

namespace App\Validation;

use App\Interfaces\ValidationInterface;

class Validation implements ValidationInterface
{
	/**
	 * @param $requestedData
	 * @return bool
	 */
	public function checkRequestValid($requestedData)
	{
		if (isset($requestedData['url'])) {
			return true;
		}
		return false;
	}
}