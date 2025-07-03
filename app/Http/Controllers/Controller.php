<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="API VIACEP", version="1.0.0")
 * 
 * @OA\SecurityScheme(
 *     securityScheme="bearerToken",
 *     type="http",
 *     scheme="bearer",
 *     in="header",
 *     description="Use 'Bearer' seguido do token, ex: Bearer {token}"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
