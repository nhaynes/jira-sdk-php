<?php

namespace JiraSdk\Exception;

class AddonPropertiesResourceDeleteAddonPropertyDeleteBadRequestException extends BadRequestException
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
        parent::__construct('Returned if the property key is longer than 127 characters.');
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
