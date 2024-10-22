<?php

namespace App\Exceptions;

use Exception;

class AlreadyLoggedInException extends Exception
{
    public static function AlreadyloggedIn(): AlreadyLoggedInException
    {
        return new self("You're Already Logged In");
    }
}
