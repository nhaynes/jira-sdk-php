<?php

namespace JiraSdk\Exception;

class ReorderCustomFieldOptionsNotFoundException extends NotFoundException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if the field, the context, or one or more of the options is not found..');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}