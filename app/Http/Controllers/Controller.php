<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

abstract class Controller
{
    public function LogError($e, string $function)
    {
        Log::error(get_class($this) . ', method: ' . $function . ' error: ' . $e->getMessage);
    }
}