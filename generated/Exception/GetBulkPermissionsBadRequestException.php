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

class GetBulkPermissionsBadRequestException extends BadRequestException
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
        parent::__construct('Returned if:

 *  `projectPermissions` is provided without at least one project permission being provided.
 *  an invalid global permission is provided in the global permissions list.
 *  an invalid project permission is provided in the project permissions list.
 *  more than 1000 valid project IDs or more than 1000 valid issue IDs are provided.
 *  an invalid account ID is provided.');
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
