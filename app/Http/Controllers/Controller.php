<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public function LogError($e, string $function)
    {
        Log::error(get_class($this) . ', method: ' . $function . ' error: ' . $e->getMessage);
    }

    public function defaultResponse(Exception $e): JsonResponse
    {
        return response()->json(['message' => 'Estamos experimentando dificultades', $e->getMessage()], 500);
    }

}