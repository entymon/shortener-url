<?php
/**
 * Created by PhpStorm.
 * User: entymon
 * Date: 30/10/2018
 * Time: 19:37
 */

namespace App\Service;

use App\Interfaces\URLShortnerServiceInterface;

class URLShortnerService implements URLShortnerServiceInterface
{

	const ORIGIN_URL_INDEX = 0;
	const SHORTEN_NAME_INDEX = 1;
	const SHORTEN_URL_INDEX = 2;

	/**
	 * @param $url
	 * @return string
	 */
	public function getShortenName($url)
	{
		$shortenName = substr( str_shuffle("ASDFGHJKLZXCVBNMQWERTYUIOP0123456789asdfghjklzxcvbnmqwertyuiop"), 0, 6 );
		$shortenUrl = 'http://localhost:9090/' . $shortenName;

		$file = fopen(__DIR__ . '/../Data/file.csv', 'w');
		$data = [
			[$url, $shortenName, $shortenUrl]
		];

		foreach ($data as $row) {
			fputcsv($file, $row);
		}
		fclose($file);
		return $shortenUrl;
	}

	/**
	 * @param $shortenName
	 * @throws \Exception
	 * @return string
	 */
	public function getOriginUrl($shortenName)
	{
		$originUrl = false;
		if (($handle = fopen(__DIR__ . '/../Data/file.csv', "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

				if ($data[self::SHORTEN_NAME_INDEX] === $shortenName) {
					$originUrl = $data[self::ORIGIN_URL_INDEX];
				}
			}
			fclose($handle);

			if ($originUrl) {
				return $originUrl;
			} else {
				throw new \Exception('origin url for given shorten name does not exist');
			}
		} else {
			throw new \Exception('file does not exist');
		}
	}
}