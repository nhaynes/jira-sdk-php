<?php

namespace JiraSdk\Exception;

class GetUserEmailBulkServiceUnavailableException extends ServiceUnavailableException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Indicates the API is not currently enabled.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}