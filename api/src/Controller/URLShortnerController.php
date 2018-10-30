<?php

namespace App\Controller;

use App\Interfaces\URLShortnerControllerInterface;
use App\Service\URLShortnerService;
use App\Validation\Validation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class URLShortnerController extends AbstractController implements URLShortnerControllerInterface
{
		const URL_DATA = 'url';
		/**
		 * @param Request $request
		 * @param URLShortnerService $service
		 * @return Response
		 */
    public function makeUrlShorten(Request $request, URLShortnerService $service)
    {
			$data = json_decode($request->getContent(), true);
			$validator = new Validation();

			$port = $request->getPort();

			$response = new Response();
			$response->headers->set('Content-Type', 'application/json');
			$response->headers->set('Access-Control-Allow-Origin', '*');

			if ($validator->checkRequestValid($data)) {
				$shortenUrl = $service->getShortenName($data[self::URL_DATA], $port);
				$responseData = [
					'shorten_url' => $shortenUrl,
					'url' => $data[self::URL_DATA]
				];
				$response->setStatusCode(Response::HTTP_OK);
				$response->setContent(json_encode($responseData));
				return $response;
			} else {
				$responseData = [
					'error' => 'Parameter "URL" is required',
				];
				$response->setContent(json_encode($responseData));
				$response->setStatusCode(Response::HTTP_BAD_REQUEST);
				return $response;
			}
    }

		/**
		 * @param $shortenUrl
		 * @param URLShortnerService $service
		 * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
		 */
    public function getLocalizationOfUrlShorten($shortenUrl, URLShortnerService $service)
		{
			$response = new Response();
			$response->headers->set('Content-Type', 'application/json');

			try {
				$redirectUrl = $service->getOriginUrl($shortenUrl);
			} catch(\Exception $error) {
				$responseData = [
					'error' => $error->getMessage(),
				];
				$response->setContent(json_encode($responseData));
				$response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
				return $response;
			}
			return $this->redirect($redirectUrl, 301);
		}
}
