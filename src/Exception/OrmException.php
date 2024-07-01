<?php

namespace Henrik\ORM\SqlQueryBuilder\Exception;

use Exception;
use Throwable;

class OrmException extends Exception
{
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}