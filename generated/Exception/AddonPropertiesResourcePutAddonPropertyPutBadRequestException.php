<?php

namespace JiraSdk\Exception;

class AddonPropertiesResourcePutAddonPropertyPutBadRequestException extends BadRequestException
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
        parent::__construct('Returned if:
  * the property key is longer than 127 characters.
  * the value is not valid JSON.
  * the value is longer than 32768 characters.');
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
