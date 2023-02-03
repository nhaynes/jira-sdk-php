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

class DynamicModulesResourceRegisterModulesPostBadRequestException extends BadRequestException
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
        parent::__construct('Returned if:
* any of the provided modules is invalid. For example, required properties are missing.
* any of the modules conflict with registered dynamic modules or modules defined in the app descriptor. For example, there are duplicate keys.

Details of the issues encountered are included in the error message.');
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
