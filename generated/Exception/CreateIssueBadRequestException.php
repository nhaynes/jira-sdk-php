<?php

namespace JiraSdk\Exception;

class CreateIssueBadRequestException extends BadRequestException
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
        parent::__construct('Returned if the request:

 *  is missing required fields.
 *  contains invalid field values.
 *  contains fields that cannot be set for the issue type.
 *  is by a user who does not have the necessary permission.
 *  is to create a subtype in a project different that of the parent issue.
 *  is for a subtask when the option to create subtasks is disabled.
 *  is invalid for any other reason.');
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
