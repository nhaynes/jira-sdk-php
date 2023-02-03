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

class DynamicModulesResourceGetModulesGetUnauthorizedException extends UnauthorizedException
{
    /**
     * @var \JiraSdk\Api\Model\ErrorMessage
     */
    private $errorMessage;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(\JiraSdk\Api\Model\ErrorMessage $errorMessage, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Returned if the call is not from a Connect app.');
        $this->errorMessage = $errorMessage;
        $this->response = $response;
    }

    public function getErrorMessage(): \JiraSdk\Api\Model\ErrorMessage
    {
        return $this->errorMessage;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
