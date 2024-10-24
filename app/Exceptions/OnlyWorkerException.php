<?php

namespace App\Exceptions;

use Exception;

class OnlyWorkerException extends Exception
{
    public static function OnlyWorker(): OnlyWorkerException
    {
        return new self("Only Worker Allowed To Access This Endpoint");
    }
}
