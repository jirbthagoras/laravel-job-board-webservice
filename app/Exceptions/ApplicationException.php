<?php

namespace App\Exceptions;

use App\Models\Application;
use Exception;

class ApplicationException extends Exception
{
    public static function notFound(): Application
    {
        throw new self('Application not found', 404);
    }
}
