<?php
/**
 * Created by PhpStorm.
 * User: entymon
 * Date: 30/10/2018
 * Time: 19:25
 */

namespace App\Interfaces;

use App\Service\URLShortnerService;
use Symfony\Component\HttpFoundation\Request;

interface URLShortnerControllerInterface
{
	public function makeUrlShorten(Request $request, URLShortnerService $service);
	public function getLocalizationOfUrlShorten($shortenUrl, URLShortnerService $service);
}