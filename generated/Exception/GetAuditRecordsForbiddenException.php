<?php

namespace JiraSdk\Exception;

class GetAuditRecordsForbiddenException extends ForbiddenException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  the user does not have the required permissions.
 *  all Jira products are on free plans. Audit logs are available when at least one Jira product is on a paid plan.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
