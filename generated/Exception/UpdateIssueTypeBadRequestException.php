<?php

namespace JiraSdk\Exception;

class UpdateIssueTypeBadRequestException extends BadRequestException
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
 *  the avatar is not associated with this issue type.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
