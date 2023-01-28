<?php

namespace JiraSdk\Exception;

class FindUsersWithBrowsePermissionBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  `issueKey` or `projectKey` is missing.
 *  `query` or `accountId` is missing.
 *  `query` and `accountId` are provided.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
