<?php

namespace JiraSdk\Exception;

class CreateIssueTypeBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if the request is invalid because:

 *  no content is sent.
 *  the issue type name exceeds 60 characters.
 *  a subtask issue type is requested on an instance where subtasks are disabled.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
