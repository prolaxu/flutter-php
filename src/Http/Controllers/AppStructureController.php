<?php

namespace FlutterPHP\Http\Controllers;

use App\MobileUI\AppStructure;
use Illuminate\Http\JsonResponse;

class AppStructureController
{
    public function __invoke(): JsonResponse
    {
        return response()->json((new AppStructure)->toArray());
    }
}
