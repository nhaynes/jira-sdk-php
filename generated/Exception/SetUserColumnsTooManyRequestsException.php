<?php

namespace JiraSdk\Exception;

class SetUserColumnsTooManyRequestsException extends TooManyRequestsException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if the rate limit is exceeded. User search endpoints share a collective rate limit for the tenant, in addition to Jira\'s normal rate limiting you may receive a rate limit for user search. Please respect the Retry-After header.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
