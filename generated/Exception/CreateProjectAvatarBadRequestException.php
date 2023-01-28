<?php

namespace JiraSdk\Exception;

class CreateProjectAvatarBadRequestException extends BadRequestException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('Returned if:

 *  an image isn\'t included in the request.
 *  the image type is unsupported.
 *  the crop parameters extend the crop area beyond the edge of the image.');
        $this->response = $response;
    }
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
