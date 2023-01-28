<?php

namespace JiraSdk\Exception;

class MethodNotAllowedException extends \RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 405);
    }
}
