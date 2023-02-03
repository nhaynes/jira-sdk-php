<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Exception;

class RegisterDynamicWebhooksBadRequestException extends BadRequestException
{
    /**
     * @var \JiraSdk\Api\Model\ErrorCollection
     */
    private $errorCollection;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(\JiraSdk\Api\Model\ErrorCollection $errorCollection, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Returned if the request is invalid.');
        $this->errorCollection = $errorCollection;
        $this->response = $response;
    }

    public function getErrorCollection(): \JiraSdk\Api\Model\ErrorCollection
    {
        return $this->errorCollection;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
