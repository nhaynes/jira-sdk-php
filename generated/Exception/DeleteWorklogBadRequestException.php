<?php

namespace JiraSdk\Exception;

class DeleteWorklogBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  `adjustEstimate` is set to `new` but `newEstimate` is not provided or is invalid.
 *  `adjustEstimate` is set to `manual` but `reduceBy` is not provided or is invalid.
 *  the user does not have permission to delete the worklog.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
