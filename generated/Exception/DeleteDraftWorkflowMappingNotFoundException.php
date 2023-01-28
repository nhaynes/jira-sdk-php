<?php

namespace JiraSdk\Exception;

class DeleteDraftWorkflowMappingNotFoundException extends NotFoundException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if any of the following is true:

 *  The workflow scheme is not found.
 *  The workflow scheme does not have a draft.
 *  The workflow is not found.
 *  The workflow is not specified.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
