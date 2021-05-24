<?php

namespace App\Services;

use Throwable;
use Illuminate\Support\Facades\Log;

class LogService
{
    public static function log(Throwable $throwable)
    {
        Log::error([
            "line" => $throwable->getLine(),
            "file" => $throwable->getFile(),
            "message" => $throwable->getMessage()
        ]);
    }
}