<?php

namespace JiraSdk\Exception;

class SetWorkflowSchemeIssueTypeBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if the workflow cannot be edited and `updateDraftIfNeeded` is false.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}