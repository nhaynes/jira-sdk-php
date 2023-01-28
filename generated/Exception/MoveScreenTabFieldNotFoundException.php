<?php

namespace JiraSdk\Exception;

class MoveScreenTabFieldNotFoundException extends NotFoundException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if the screen, screen tab, or field is not found or the field can\'t be moved to the requested position.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}