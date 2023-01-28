<?php

namespace JiraSdk\Exception;

class UpdatePermissionSchemeForbiddenException extends ForbiddenException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  the user does not have the necessary permission to update permission schemes.
 *  the Jira instance is Jira Core Free or Jira Software Free. Permission schemes cannot be updated on free plans.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
