<?php

namespace JiraSdk\Exception;

class AddSharePermissionBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  the request object is invalid. For example, it contains an invalid type, the ID does not match the type, or the project or group is not found.
 *  the user does not own the filter.
 *  the user does not have the required permissions.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
