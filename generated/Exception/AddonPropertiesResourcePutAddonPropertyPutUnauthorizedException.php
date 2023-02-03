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

class AddonPropertiesResourcePutAddonPropertyPutUnauthorizedException extends UnauthorizedException
{
    /**
     * @var \JiraSdk\Api\Model\OperationMessage
     */
    private $operationMessage;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(\JiraSdk\Api\Model\OperationMessage $operationMessage, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Returned if the authentication credentials are incorrect or missing.');
        $this->operationMessage = $operationMessage;
        $this->response = $response;
    }

    public function getOperationMessage(): \JiraSdk\Api\Model\OperationMessage
    {
        return $this->operationMessage;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
