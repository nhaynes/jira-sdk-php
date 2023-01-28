<?php

namespace JiraSdk\Exception;

class GetNotificationSchemeToProjectMappingsBadRequestException extends BadRequestException
{
    /**
     * @var \JiraSdk\Model\ErrorCollection
     */
    private $errorCollection;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\JiraSdk\Model\ErrorCollection $errorCollection, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Returned if search criteria are invalid, strings vs numbers for projectId, notificationSchemeId, startAt and maxResult');
        $this->errorCollection = $errorCollection;
        $this->response = $response;
    }
    public function getErrorCollection(): \JiraSdk\Model\ErrorCollection
    {
        return $this->errorCollection;
    }
    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
