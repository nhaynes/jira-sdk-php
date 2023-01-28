<?php

namespace JiraSdk\Exception;

class ChangeFilterOwnerBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned when:

 *  The new owner of the filter owns a filter with the same name.
 *  An attempt is made to change owner of the default filter.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
