<?php

namespace App\Exceptions;

use Exception;

class JobException extends Exception
{
    public static function JobNotFound(): JobException
    {
        throw new self('Job not found');
    }

    public static function AlreadyApplied(): JobException
    {
        throw new self('Job already applied');
    }
}
