<?php

namespace App\Exceptions;

use Exception;

class OnlyCompanyException extends Exception
{
    public static function OnlyCompany(): OnlyCompanyException
    {
        return new self("Only Company Allowed To Access This Endpoint");
    }
}
