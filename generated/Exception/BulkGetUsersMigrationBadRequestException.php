<?php

namespace JiraSdk\Exception;

class BulkGetUsersMigrationBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if `key` or `username`');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
