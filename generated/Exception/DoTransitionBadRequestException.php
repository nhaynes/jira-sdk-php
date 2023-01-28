<?php

namespace JiraSdk\Exception;

class DoTransitionBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  no transition is specified.
 *  the user does not have permission to transition the issue.
 *  a field that isn\'t included on the transition screen is defined in `fields` or `update`.
 *  a field is specified in both `fields` and `update`.
 *  the request is invalid for any other reason.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
