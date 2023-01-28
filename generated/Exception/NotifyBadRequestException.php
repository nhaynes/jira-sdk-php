<?php

namespace JiraSdk\Exception;

class NotifyBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  the recipient is the same as the calling user.
 *  the recipient is invalid. For example, the recipient is set to the assignee, but the issue is unassigned.
 *  the request is invalid. For example, required fields are missing or have invalid values.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}