<?php

namespace JiraSdk\Exception;

class LinkIssuesNotFoundException extends NotFoundException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  issue linking is disabled.
 *  the user cannot view one or both of the issues. For example, the user doesn\'t have *Browse project* project permission for a project containing one of the issues.
 *  the user does not have *link issues* project permission.
 *  either of the link issues are not found.
 *  the issue link type is not found.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
