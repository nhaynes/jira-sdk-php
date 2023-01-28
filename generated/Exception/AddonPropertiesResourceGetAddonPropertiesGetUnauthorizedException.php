<?php

namespace JiraSdk\Exception;

class AddonPropertiesResourceGetAddonPropertiesGetUnauthorizedException extends UnauthorizedException
{
    /**
     * @var \JiraSdk\Model\OperationMessage
     */
    private $operationMessage;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\JiraSdk\Model\OperationMessage $operationMessage, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Returned if the authentication credentials are incorrect or missing.');
        $this->operationMessage = $operationMessage;
        $this->response = $response;
    }
    public function getOperationMessage(): \JiraSdk\Model\OperationMessage
    {
        return $this->operationMessage;
    }
    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
