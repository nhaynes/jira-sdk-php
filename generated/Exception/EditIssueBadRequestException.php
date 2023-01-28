<?php

namespace JiraSdk\Exception;

class EditIssueBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  the request body is missing.
 *  the user does not have the necessary permission to edit one or more fields.
 *  the request includes one or more fields that are not found or are not associated with the issue\'s edit screen.
 *  the request includes an invalid transition.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
