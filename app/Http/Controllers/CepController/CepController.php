<?php

namespace App\Http\Controllers\CepController;

use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use App\Http\Requests\CepRequest\CepRequest;
use App\Services\CepServices\CepServices;
use Illuminate\Http\JsonResponse;

class CepController extends Controller
{

    public function __construct(
        private readonly CepServices $CepServices
    ) {}

    public function ViaCEP(CepRequest $request): JsonResponse
    {
        try {
           return $this->CepServices->ViaCEP($request->validated());
        } catch (\Exception $e) {
            return Utils::exceptionReturn($e);
        }

    }
   
}
