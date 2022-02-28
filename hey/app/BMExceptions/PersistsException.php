<?php

namespace App\BMExceptions;

use \Exception;

/**
 * Custom  library exception
 */
class PersistsException extends Exception
{
    public function __construct($message='', $code='0', Exception $previous=null)
    {
        parent::__construct($message, $code, $previous);
    }
}