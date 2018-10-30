<?php
/**
 * Created by PhpStorm.
 * User: entymon
 * Date: 30/10/2018
 * Time: 19:23
 */

namespace App\Interfaces;


interface ValidationInterface
{
	/**
	 * @param $requestedData
	 * @return mixed
	 */
	public function checkRequestValid($requestedData);
}