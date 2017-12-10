<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ApiController extends Controller
{

	const http_not_found = 404;
	const http_internal_error = 500;
	const http_created = 201;


	// polje statusCode sa getterom i setterom
    
	protected $statusCode = 200;

	public function getStatusCode()
	{

		return $this->statusCode;

	}


	public function setStatusCode($statusCode)
	{
		// When ever you chain, you want to make sure
		// you return the current object from method

		$this->statusCode = $statusCode;

		return $this;

	}

	// JSON response handling

	/**
	 * Main method for returning JSON response
	 *
	 * @param array|string $data
	 * @param array $headers
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respond($data, $headers = [])
	{

		return response()->json($data, $this->getStatusCode(), $headers);

	}

	/**
	 * Return a JSON response with a message and status code
	 *
	 * @param string $message
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondWithError($message)
	{

		return $this->respond([

			'error'=> [

				'message'=> $message,
				'status_code'=> $this->getStatusCode()

			]

		]);

	}

	/**
	 * Returns a JSON response with a given message
	 *
	 * @param string $message
	 * @return 
	 */
	public function respondNotFound($message = 'Not found')
	{

		return $this->setStatusCode(self::http_not_found)->respondWithError($message);

	}

	/**
	 * Desc
	 *
	 * @param 
	 * @return 
	 */
	public function respondInternalError($message = 'Internal error')
	{

		return $this->setStatusCode(self::http_internal_error)->respondWithError($message);

	}

	/**
	 * Desc
	 *
	 * @param 
	 * @return 
	 */
	protected function respondCreated($message)
	{

		return $this->setStatusCode(self::http_created)->respond([

			'message' => $message

		]);

	}

}
