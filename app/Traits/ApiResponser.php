<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
	
	trait ApiResponser
	{
		private function successResponse($data, $code)
		{
			return repsonse()->json($data, $code);

		}


		protected function errorResponse($message, $code)
		{
			return repsonse()->json(['error' => $message, 'code' => $code], $code);
		}

		protected function showAll(Collection $collection, $code = 200)
		{
			return $this->successResponse(['data' => $collection], $code);
		}

		protected function showOne(Model $instance, $code = 200)
		{
			return $this->successResponse(['data' => $instance], $code);
		}
	}



