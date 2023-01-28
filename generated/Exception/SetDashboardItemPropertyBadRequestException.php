<?php

namespace JiraSdk\Exception;

class SetDashboardItemPropertyBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  Request is invalid
 *  Or if all of these conditions are met in the request:
    
     *  The dashboard item has a spec URI and no complete module key
     *  The value of propertyKey is equal to "config"
     *  The request body contains a JSON object whose keys and values are not strings.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
