<?php

namespace JiraSdk\Exception;

class GetAttachmentThumbnailNotFoundException extends NotFoundException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  the attachment is not found.
 *  attachments are disabled in the Jira settings.
 *  `fallbackToDefault` is `false` and the request thumbnail cannot be downloaded.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}