<?php

namespace JiraSdk\Exception;

class DynamicModulesResourceRemoveModulesDeleteUnauthorizedException extends UnauthorizedException
{
    /**
     * @var \JiraSdk\Model\ErrorMessage
     */
    private $errorMessage;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\JiraSdk\Model\ErrorMessage $errorMessage, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Returned if the call is not from a Connect app.');
        $this->errorMessage = $errorMessage;
        $this->response = $response;
    }
    public function getErrorMessage(): \JiraSdk\Model\ErrorMessage
    {
        return $this->errorMessage;
    }
    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
