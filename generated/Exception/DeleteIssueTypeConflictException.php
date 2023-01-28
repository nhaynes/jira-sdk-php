<?php

namespace JiraSdk\Exception;

class DeleteIssueTypeConflictException extends ConflictException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if the issue type is in use and:

 *  also specified as the alternative issue type.
 *  is a *standard* issue type and the alternative issue type is a *subtask*.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
