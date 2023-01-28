<?php

namespace JiraSdk\Exception;

class RequestedRangeNotSatisfiableException extends \RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 416);
    }
}
