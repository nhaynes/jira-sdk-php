<?php

namespace JiraSdk\Exception;

class GetAttachmentContentRequestedRangeNotSatisfiableException extends RequestedRangeNotSatisfiableException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if the server is unable to satisfy the range of bytes provided.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
