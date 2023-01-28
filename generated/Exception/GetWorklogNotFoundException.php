<?php

namespace JiraSdk\Exception;

class GetWorklogNotFoundException extends NotFoundException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  the issue is not found or the user does not have permission to view it.
 *  the worklog is not found or the user does not have permission to view it.
 *  time tracking is disabled.

.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
