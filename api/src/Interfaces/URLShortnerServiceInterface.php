<?php
/**
 * Created by PhpStorm.
 * User: entymon
 * Date: 30/10/2018
 * Time: 19:58
 */

namespace App\Interfaces;


interface URLShortnerServiceInterface
{
	public function getShortenName($url);
	public function getOriginUrl($shortenName);

}