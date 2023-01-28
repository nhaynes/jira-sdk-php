<?php

namespace JiraSdk\Exception;

class GetBulkPermissionsBadRequestException extends BadRequestException
{
    /**
     * @var \JiraSdk\Model\ErrorCollection
     */
    private $errorCollection;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\JiraSdk\Model\ErrorCollection $errorCollection, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Returned if:

 *  `projectPermissions` is provided without at least one project permission being provided.
 *  an invalid global permission is provided in the global permissions list.
 *  an invalid project permission is provided in the project permissions list.
 *  more than 1000 valid project IDs or more than 1000 valid issue IDs are provided.
 *  an invalid account ID is provided.');
        $this->errorCollection = $errorCollection;
        $this->response = $response;
    }
    public function getErrorCollection(): \JiraSdk\Model\ErrorCollection
    {
        return $this->errorCollection;
    }
    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
