<?php

namespace App\Http\Controllers\CepController;

use App\Http\Controllers\Controller;

class CepSwagger extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/cep/via-cep",
     *     summary="consultar cep",
     *     description="consultar cep",
     *     tags={"CEP"},
     *     @OA\Parameter(
     *         name="cep",
     *         in="query",
     *         description="cep",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *
     * )
     */

    function ViaCep() {}
}
